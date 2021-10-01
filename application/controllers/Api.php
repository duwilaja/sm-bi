<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPublic','mpub');
        
    }
    
	public function index()
	{
        $this->load->view('welcome_message');
	}

    private function upload($path,$files,$types="jpg|png|jpeg|svg")
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => $types,
            'encrypt_name'  => true,
            'max_size'      => 0,
            'max_width'     => 0,
            'max_height'    => 0,                   
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $images[] = $this->upload->data('file_name');
            } else {
                return false;
            }
        }

        return $images;
    }

    private function token()
    {
        $token = @getallheaders()['token'];

        if (!$token) {
            # jika array kosong, dia akan melempar objek Exception baru
            throw new Exception('Header Token tidak terdeteksi');
        }

        return $token;
    }

    private function header($method="POST")
    {
        header("Content-Type: application/json; charset=UTF-8");
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: ".$method);
        header("Access-Control-Allow-Headers: Content-Type, token");

        return true;
    }

    private function cek_token()
    {
        $bool = false;
        $q = $this->db->get_where('token', ['token' => $this->token(),'aktif' => 1]);
        if ($q->num_rows() > 0) 
            $bool = true;

        return $bool;
    }

    private function roleNameUser($polda='',$polres='')
    {
        $x = [];
        if ($polda == '' && $polres == '') {
            return [0,'Nasional'];
        }else if($polda != ''){
            $p = $this->mpub->get('polda',$polda)->row()->da_nam;
            return [1,$p];
        }else if($polres != ''){
            $p = $this->mpub->get('polres',$polres)->row()->da_nam;
            return [2,$p];
        }
    }

    // Login User
	public function auth_users()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal login ke aplikasi";

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                    $nrp=$this->input->post("user");
                    $pwd=$this->input->post("pass");
                    
                    $this->db->where('nrp',$nrp);
                    $this->db->where('pwd',md5($pwd));
                    $acc=$this->db->get("accounts")->result_array();
                        
                    if(count($acc)>0){
                        $this->db->where(array('nrp'=>$nrp,'das'=>'Y'));
                        $retval=$this->db->get("persons")->result_array();
                        if(count($retval)>0){
                         $data['session'] = $retval[0];
                         $data['session']['roleNameUser'] = $this->roleNameUser($data['session']['polda'],$data['session']['polres']);
                         $msg = "Success Login Application";
                         $status = true; 
                     }else{
                        $msg = "Person not found, or not enough privilege";
                     }
                    }else{
                        $msg = "Username or password wrong!";
                    }
                     
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // TMC Lalin
    public function get_tmc_lalin()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mendapatkan data profile petugas";
            $filter = [];
            $filter_before = [];
            $macet_before = 0;
            $padat_before = 0;
            $lancar_before = 0;

            try {   
              if ($this->cek_token()) {
                $this->mpub->see = "count(*) as jml";
                $polda = $this->input->get('polda');
                $polres = $this->input->get('polres');
                $date = $this->input->get('date');

                if ($polda != '') {
                    $filter['polda'] = $polda;
                    $filter_before['polda'] = $polda;
                }
                
                if ($polres != ''){
                    $filter['polres'] = $polres;
                    $filter_before['polres'] = $polres;
                }
                
                if ($date != ''){
                    
                    $filter['tgl'] = $date;
                    
                    $date_before = custom_date(date('Y-m-d'),'- 1 days'); 
                    $filter_before['tgl'] = $date_before;
                }else{
                    $filter_before['tgl !='] = date('Y-m-d');
                }

                $filter_before['status'] = 'Macet';
                $macet_before = $this->mpub->get('tmc_info_lalin','',$filter_before,'status');

                $filter_before['status'] = 'Padat';
                $padat_before = $this->mpub->get('tmc_info_lalin','',$filter_before,'status');

                $filter_before['status'] = 'Lancar';
                $lancar_before = $this->mpub->get('tmc_info_lalin','',$filter_before,'status'); 
                

                $filter['status'] = 'Macet';
                $macet = $this->mpub->get('tmc_info_lalin','',$filter,'status');

                $filter['status'] = 'Padat';
                $padat = $this->mpub->get('tmc_info_lalin','',$filter,'status');

                $filter['status'] = 'Lancar';
                $lancar = $this->mpub->get('tmc_info_lalin','',$filter,'status');

                // Fix
                $macet = cek_data(@$macet->row()->jml);
                $padat = cek_data(@$padat->row()->jml);
                $lancar = cek_data(@$lancar->row()->jml);

                if(!empty($macet_before)){
                    $persen_macet = persen_nt(cek_data(@$macet_before->row()->jml),$macet);
                }

                if(!empty($padat_before)){
                    $persen_padat = persen_nt(cek_data(@$padat_before->row()->jml),$padat);
                }

                if(!empty($lancar_before)){
                    $persen_lancar = persen_nt(cek_data(@$lancar_before->row()->jml),$lancar);
                }

                $data = [
                    'tmc_lalin' => [
                        'macet' => [$macet,$persen_macet],
                        'padat' => [$padat,$persen_padat],
                        'lancar' => [$lancar,$persen_lancar ],
                    ]
                ];
                     $msg = "Berhasil mengambil data";
                     $status = true; 
              }
            } catch (Exception $error) {
                $statusCode = 417;
                $msg = $error->getMessage();
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    public function get_tmc_penyebab_kemacetan()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mendapatkan data profile petugas";
            $filter = [];
            $filter_before = [];
            $penyebab = [];

            try {   
              if ($this->cek_token()) {

                $this->mpub->see = "sebab,img_frontend";
                $qpenyebab = $this->mpub->get('penyebab_macet');
                foreach ($qpenyebab->result() as $k => $v) {
                    $xx = strtolower(str_replace(' ','_',$v->sebab));
                    $penyebab[$xx] = [
                        'nama' => $v->sebab,
                        'img' => $v->img_frontend,
                        'jml' => 0,
                        'persen' => [0,'netral']
                    ];
                }

                $this->mpub->see = "count(*) as jml,penyebab";
                $polda = $this->input->get('polda');
                $polres = $this->input->get('polres');
                $date = $this->input->get('date');

                if ($polda != '') {
                    $filter['polda'] = $polda;
                    $filter_before['polda'] = $polda;
                }
                
                if ($polres != ''){
                    $filter['polres'] = $polres;
                    $filter_before['polres'] = $polres;
                }
                
                if ($date != ''){
                    
                    $filter['tgl'] = $date;
                    
                    $date_before = custom_date(date('Y-m-d'),'- 1 days'); 
                    $filter_before['tgl'] = $date_before;
                }else{
                    $filter_before['tgl !='] = date('Y-m-d');
                }
                
                

                $qpenyebab = $this->mpub->get('tmc_info_lalin','',$filter,'penyebab');
                foreach ($qpenyebab->result() as $k => $v) {
                    if ($v->penyebab != '') {
                        $xx = strtolower(str_replace(' ','_',$v->penyebab));

                        $penyebab[$xx]['jml'] = $v->jml;
                        $filter_before['penyebab'] = $xx;
                        $persen = cek_data(@$this->mpub->get('tmc_info_lalin','',$filter_before,'status')->row()->jml);
                        $penyebab[$xx]['persen'] = persen_nt(cek_data($v->jml),$persen);
                    }
                }

                $data = $penyebab;
                $msg = "Berhasil mengambil data";
                $status = true; 

              }
            } catch (Exception $error) {
                $statusCode = 417;
                $msg = $error->getMessage();
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Grafik TMC Lalin
    public function grafik_tmc_lalin()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal";
            $filter = [];

            $month = [];
            for ($i=1; $i <= 12 ; $i++) { 
                $month[$i] = 0;
            }

            try {   
              if ($this->cek_token()) {
                $this->mpub->see = "count(*) as jml,MONTH(tgl) as bulan";
                $polda = $this->input->get('polda');
                $polres = $this->input->get('polres');

                if ($polda != '') $filter['polda'] = $polda;
                if ($polres != '') $filter['polres'] = $polres;

                $filter['status'] = 'Macet';
                $macet = $this->mpub->get('tmc_info_lalin','',$filter,'MONTH(tgl)');

                $filter['status'] = 'Padat';
                $padat = $this->mpub->get('tmc_info_lalin','',$filter,'MONTH(tgl)');

                $filter['status'] = 'Lancar';
                $lancar = $this->mpub->get('tmc_info_lalin','',$filter,'MONTH(tgl)');

                $data['series'] = [
                    ['name' => 'Macet','data' => array_values(to_jml_array($macet->result(),'jml',$month,'bulan'))],
                    ['name' => 'Padat','data' => array_values(to_jml_array($padat->result(),'jml',$month,'bulan'))],
                    ['name' => 'Lancar','data' => array_values(to_jml_array($lancar->result(),'jml',$month,'bulan'))],
                ];
                
                $msg = "Berhasil mengambil data";
                $status = true; 
              }
            } catch (Exception $error) {
                $statusCode = 417;
                $msg = $error->getMessage();
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // TMC Interaksi
    public function get_tmc_interaksi()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mendapatkan data";
            $filter = [];
            $filter_before = [];
            $penyebab = [];

            try {   
              if ($this->cek_token()) {

                $this->mpub->see = "sebab,img_frontend";
                $qpenyebab = $this->mpub->get('tmc_interaksi');
                foreach ($qpenyebab->result() as $k => $v) {
                    $xx = strtolower(str_replace(' ','_',$v->sebab));
                    $penyebab[$xx] = [
                        'nama' => $v->sebab,
                        'img' => $v->img_frontend,
                        'jml' => 0,
                        'persen' => [0,'netral']
                    ];
                }

                $this->mpub->see = "count(*) as jml,penyebab";
                $polda = $this->input->get('polda');
                $polres = $this->input->get('polres');
                $date = $this->input->get('date');

                if ($polda != '') {
                    $filter['polda'] = $polda;
                    $filter_before['polda'] = $polda;
                }
                
                if ($polres != ''){
                    $filter['polres'] = $polres;
                    $filter_before['polres'] = $polres;
                }
                
                if ($date != ''){
                    
                    $filter['tgl'] = $date;
                    
                    $date_before = custom_date(date('Y-m-d'),'- 1 days'); 
                    $filter_before['tgl'] = $date_before;
                } 

                $qpenyebab = $this->mpub->get('tmc_info_lalin','',$filter,'penyebab');
                foreach ($qpenyebab->result() as $k => $v) {
                    if ($v->penyebab != '') {
                        $xx = strtolower(str_replace(' ','_',$v->penyebab));

                        $penyebab[$xx]['jml'] = $v->jml;
                        $filter_before['penyebab'] = $xx;
                        $persen = cek_data(@$this->mpub->get('tmc_info_lalin','',$filter_before,'status')->row()->jml);
                        $penyebab[$xx]['persen'] = persen_nt(cek_data($v->jml),$persen);
                    }
                }

                $data = $penyebab;
                $msg = "Berhasil mengambil data";
                $status = true; 

              }
            } catch (Exception $error) {
                $statusCode = 417;
                $msg = $error->getMessage();
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Set Activity Petugas
    public function set_activity_petugas()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengubah activity petugas";

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                     $q = $this->mp->set_activity($this->input->post('petugas_id'), $this->input->post('activity'));
                     if($q){
                         $msg = "Berhasil mengubah activity petugas";
                         $status = true; 
                     }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Set Activity Petugas
    public function set_lokasi_petugas()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengubah lokasi petugas";

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                     $q = $this->mp->set_lokasi($this->input->post('petugas_id'), $this->input->post('lat'),$this->input->post('lng'));
                     if($q){
                         $msg = "Berhasil mengubah lokasi petugas";
                         $status = true; 
                     }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Mengambil data task petugas
    public function task_petugas($petugas_id='')
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengambil data task petugas";

            if (empty($petugas_id)) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                    $q = $this->mt->task_assign([
                        'ta.id,ta.task_id,ta.pengaduan_id,ta.petugas_id,p.lat,p.lng,p.judul,p.alamat,p.ctddate,p.ctdtime,ta.pengaduan_id,ta.status',
                        ['ta.petugas_id' => $petugas_id]
                    ]);
                    if($q->num_rows() > 0){
                        foreach ($q->result() as $k => $v) {
                            $data[$k] = $v;
                            $data[$k]->tanggal = tgl_indo($v->ctddate);
                            $data[$k]->lat = (float)$v->lat;
                            $data[$k]->lng = (float)$v->lng;
                            $data[$k]->status_name = setStatusPengaduan($v->status);
                            $data[$k]->img = $this->mpeng->peng_img_peng_id('id,img',$pengaduan_id=$v->pengaduan_id)->result();
                        }
                        $msg = "Berhasil mengambil data task petugas";
                        $status = true; 
                    }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Mengambil detail task petugas
    public function detail_task_petugas($petugas_id='',$task_id='')
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengambil detail task";

            if (empty($petugas_id)) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                    $q = $this->mt->task_assign([
                        'ta.id as task_assign_id,ta.task_id,ta.task_kategori_id,p.lat,p.lng,p.judul,p.alamat,p.ctddate,p.ctdtime,ta.pengaduan_id,ta.status',
                        ['ta.petugas_id' => $petugas_id,'ta.id' => $task_id]
                    ]);
                    if($q->num_rows() > 0){
                        $data = $q->row();
                        $data->task_kategori = $this->mt->task_kategori('task_kategori',$data->task_kategori_id,true);
                        $data->tanggal = tgl_indo($data->ctddate);
                        $data->lat = (float)$data->lat;
                        $data->lng = (float)$data->lng;
                        $data->status = setStatusPengaduan($data->status);
                        $data->img = $this->mpeng->peng_img_peng_id('id,img',$pengaduan_id=$data->pengaduan_id)->result();

                        $msg = "Berhasil mengambil detail task";
                        $status = true; 
                    }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Set Status Task
    public function set_status_task()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengubah status task";

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                     $q = $this->mt->set_status_task_assign($this->input->post('task_assign_id'), $this->input->post('status'),$this->input->post('lat'),$this->input->post('lng'));
                     if($q){
                         $msg = "Berhasil mengubah status task";
                         $status = true; 
                     }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Form Task Done
    public function form_task_done()
    {      
        $this->header();
        $data = [];
        $q = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $status = false;
            $statusCode = 200;
            $msg = "Gagal update task";
            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                    $task_done = $this->mt->task_done([
                        'td.id',
                        ['td.id' => $this->input->post('task_assign_id'),'td.petugas_id' => $this->input->post('petugas_id')]
                    ]);
                    if($task_done->num_rows() == 0){
                        $q = $this->mt->form_task_done([
                            'petugas_id' => $this->input->post('petugas_id'),
                            'lat' => $this->input->post('lat'),
                            'lng' => $this->input->post('lng'),
                            'penyebab' => $this->input->post('penyebab'),
                            'tindakan' => $this->input->post('tindakan'),
                            'keterangan' => $this->input->post('keterangan'),
                            'task_assign_id' => $this->input->post('task_assign_id')
                         ]);
                        $task_done_id = $this->db->insert_id();
                    }else{
                        $task_done_id = $task_done->row()->id;
                    }
                     
                        $arr = [];
                        $msg = "Berhasil update task";
                        $status = true; 
                        
                        $file = $this->upload('./my/img_done/',$_FILES['img']);
                        $this->mt->set_status_task_assign($this->input->post('task_assign_id'), 4,$this->input->post('lat'),$this->input->post('lng'));

                        // Insert gambar 
                        if ($file) {
                            foreach ($file as $v) {
                                $obj = [
                                    'task_done_id' => $task_done_id,
                                    'img' => $v,
                                    'petugas_id' => $this->input->post('petugas_id'),
                                    'path' => 'my/img_done/',
                                    'full_file' => 'my/img_done/'.$v,
                                    'ctddate' => date('Y-m-d'),
                                    'ctdtime' => date('H:i:s')
                                ];
                                array_push($arr,$obj);
                            }
                            
                            $this->mt->in_batch_task_img($obj);
                        }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Mengambil data task berdasarkan status
    public function task_petugas_by_status()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengambil data task petugas by status";

            if (empty($this->input->post('petugas_id'))) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                    $q = $this->mt->task_assign([
                        'ta.id,ta.task_id,ta.pengaduan_id,ta.petugas_id,p.lat,p.lng,p.judul,p.alamat,p.ctddate,p.ctdtime,ta.pengaduan_id,ta.status',
                        ['ta.petugas_id' => $this->input->post('petugas_id'),'ta.status !=' => '4'],
                        ['ta.status',['1','2','3']]
                    ]);
                    if($q->num_rows() > 0){
                        foreach ($q->result() as $k => $v) {
                            $data[$k] = $v;
                            $data[$k]->tanggal = tgl_indo($v->ctddate);
                            $data[$k]->lat = (float)$v->lat;
                            $data[$k]->lng = (float)$v->lng;
                            $data[$k]->status_name = setStatusPengaduan($v->status);
                            $data[$k]->img = $this->mpeng->peng_img_peng_id('id,img',$pengaduan_id=$v->pengaduan_id)->result();
                        }
                        $msg = "Berhasil mengambil data task petugas by status";
                        $status = true; 
                    }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Mengambil data task history petugas
    public function task_history_petugas()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengambil data task history petugas";

            if (empty($this->input->post('petugas_id'))) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                    $q = $this->mt->task_assign([
                        'ta.id,ta.task_id,ta.pengaduan_id,ta.petugas_id,p.lat,p.lng,p.judul,p.alamat,p.ctddate,p.ctdtime,ta.pengaduan_id,ta.status',
                        ['ta.petugas_id' => $this->input->post('petugas_id')],
                        ['ta.status' => ['4','5']]
                    ]);
                    if($q->num_rows() > 0){
                        foreach ($q->result() as $k => $v) {
                            $data[$k] = $v;
                            $data[$k]->tanggal = tgl_indo($v->ctddate);
                            $data[$k]->lat = (float)$v->lat;
                            $data[$k]->lng = (float)$v->lng;
                            $data[$k]->status_name = setStatusPengaduan($v->status);
                            $data[$k]->img = $this->mpeng->peng_img_peng_id('id,img',$pengaduan_id=$v->pengaduan_id)->result();
                        }
                        $msg = "Berhasil mengambil data task petugas by status";
                        $status = true; 
                    }
                  }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Mengambil data task history petugas
    public function detail_task_history_petugas()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengambil detail task history petugas";

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                        $q = $this->mt->task_assign([
                            'ta.id,ta.task_id,ta.pengaduan_id,ta.petugas_id,p.lat,p.lng,p.judul,p.nama_pelapor,p.telp,p.mail,p.alamat,p.ctddate,p.ctdtime,ta.pengaduan_id,ta.status',
                            ['ta.id' => $this->input->post('task_assign_id'),'ta.petugas_id' => $this->input->post('petugas_id')],
                            ['ta.status' => ['4','5']]
                        ]);
                        if($q->num_rows() > 0){
                                $data = $q->row();
                                $data->tanggal = tgl_indo($data->ctddate);

                                $data->status_name = setStatusPengaduan($data->status);
                                $data->lat = (float)$data->lat;
                                $data->lng = (float)$data->lng;
                                $data->img_pengaduan = $this->mpeng->peng_img_peng_id('id,img',$pengaduan_id=$data->pengaduan_id)->result();
                                $data->img_task_done = !empty($this->mt->task_img_task_assign_id('id,full_file',$data->id)) ? $this->mt->task_img_task_assign_id('id,full_file',$data->id)->result() : [];
                                foreach (@$data->img_task_done as $k => $v) {
                                    @$data->img_task_done[$k]->full_file = link_http().@$v->full_file;
                                }

                                $data->penanganan = $this->mt->lama_penanganan($this->input->post('task_assign_id'));
                                $data->task_done = $this->mt->task_done([
                                    'id as task_done_id,penyebab,tindakan,keterangan',
                                    ['td.id' => $this->input->post('task_assign_id'),'petugas_id' => $this->input->post('petugas_id')]
                                ])->row();

                                $msg = "Berhasil mengambil detail task history petugas";
                                $status = true; 
                        }else{
                            $msg = "Detail task history tidak ditemukan, harap cek kembali task_assign_id atau petugas_id";
                        }
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Kirim data panic button
    public function send_data_panic_button()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengirimkan data";

            // POST
            $nama_pelapor = $this->input->post('nama_pelapor');
            $telp = $this->input->post('telp');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                        if($nama_pelapor == ''){
                            $msg = "Nama Pelapor tidak boleh kosong";
                        }else if($telp == ''){
                            $msg = "Nomor telepon tidak boleh kosong";
                        }else if($lat == ''){
                            $msg = "Lat tidak boleh kosong";
                        }else if($lng == ''){
                            $msg = "Lng tidak boleh kosong";
                        }else{
                            $ctddate = date('Y-m-d');
                            $ctdtime = date('H:i:s');

                            $seleksi_date = $this->db->get_where('panic_data', ['nama_pelapor'=> $nama_pelapor,'telp' => $telp,'ctddate' => $ctddate,'ctdtime' => $ctdtime]);
                            if ($seleksi_date->num_rows() ==  0) {
                                $q = $this->db->insert('panic_data',[
                                    'nama_pelapor' => $nama_pelapor,
                                    'telp' => $telp,
                                    'lat' => $lat,
                                    'lng' => $lng,
                                    'type_pb' => 1,
                                    'ctddate' => $ctddate,
                                    'ctdtime' => $ctdtime,
                                    'status' => 0
                                ]);
                                $xx =  $this->db->affected_rows();
                                if ($xx > 0) {
                                    $msg = "Berhasil menambahkan data";
                                    $status = true;  
                                }
                            }else{
                                $msg = "Data ini sudah terinput sebelumnya";
                            }
                        }
                    }else{
                        $msg = "Token tidak valid";
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Notifikasi

    // Mengambil data task history petugas
    public function notifikasi_petugas()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $jml= 0;
            $msg = "Gagal mengambil notifikasi petugas";

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                        
                        $this->load->model('MNotif','mn');
                       
                
                        $q = $this->mn->get('id,info,msg,read,to_user as petugas_id,data_id as task_assign_id','',[
                            'to_app' => 'APP_PETUGAS',
                            'to_user' => $this->input->post('petugas_id'),
                            'read' => $this->input->post('read')
                        ]);
                
                        $data = $q->result();
                        $jml = $q->num_rows();
                        
                        if ($q->num_rows() > 0 ) {
                            $msg = "Berhasil mengambil data notifikasi petugas";
                            $status = true; 
                        }else{
                            $msg = "Gagal mengambil data notifikasi petugas";
                            $status = false;
                        }
                        
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'data' => $data,
                'jml_data' => $jml,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

    // Baca notifikasi
    public function read_notif()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mengirimkan data";

            // POST
            $id = $this->input->post('id');

            if (empty($this->input->post())) {
                $msg = "Tidak ada data yang dikirim";
                $statusCode = 410;
            }else{
                try {   
                  if ($this->cek_token()) {
                        if($id == ''){
                            $msg = "ID tidak boleh kosong";
                        }else{
                                $this->load->model('MNotif','mn');
                                
                                $this->mn->up([
                                    'read' => 1
                                ],['id' => $id]);
                        
                                $x = $this->db->affected_rows();
                                if ($x > 0) {
                                    $msg = "Notifikasi telah dibaca";
                                    $status = true;
                                }else{
                                    $msg = "Gagal membaca notifikasi atau notifikasi sudah dibaca sebelumnya";
                                }
                       }
                    }else{
                        $msg = "Token tidak valid";
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }
            }

            $arr = [
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];
            
            echo json_encode($arr);
        }
       
    }

}
