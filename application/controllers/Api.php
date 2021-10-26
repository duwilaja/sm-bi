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

    // SSC Jenis Pos
    public function get_ssc_jenis_pos()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mendapatkan data jenis pos";
            $filter = [];
            $filter_before = [];
            $polisi_before = 0;
            $pjr_before = 0;
            $gatur_before = 0;
            $total_before = 0;

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
                    
                    $date_before = custom_date($filter['tgl'],'- 1 days'); 
                    $filter_before['tgl'] = $date_before;
                }else{
                    $filter_before['tgl !='] = date('Y-m-d');
                }
                
                $total_before = $this->db->get_where('ssc_jalan',$filter_before)->num_rows();
                
                $filter_before['pos'] = 'Pos Polisi';
                $polisi_before = $this->mpub->get('ssc_jalan','',$filter_before,'pos');
                
                $filter_before['pos'] = 'Pos PJR';
                $pjr_before = $this->mpub->get('ssc_jalan','',$filter_before,'pos');
                
                $filter_before['pos'] = 'Pos Gatur';
                $gatur_before = $this->mpub->get('ssc_jalan','',$filter_before,'pos'); 
                
                $total = $this->db->get_where('ssc_jalan',$filter)->num_rows();

                $filter['pos'] = 'Pos Polisi';
                $polisi = $this->mpub->get('ssc_jalan','',$filter,'pos');

                $filter['pos'] = 'Pos PJR';
                $pjr = $this->mpub->get('ssc_jalan','',$filter,'pos');

                $filter['pos'] = 'Pos Gatur';
                $gatur = $this->mpub->get('ssc_jalan','',$filter,'pos');

                // Fix
                $polisi = cek_data(@$polisi->row()->jml);
                $pjr = cek_data(@$pjr->row()->jml);
                $gatur = cek_data(@$gatur->row()->jml);
                $total = cek_data(@$total);

                $persen_total = persen_nt(cek_data(@$total_before),$total);

                if(!empty($polisi_before)){
                    $persen_polisi = persen_nt(cek_data(@$polisi_before->row()->jml),$polisi);
                }

                if(!empty($pjr_before)){
                    $persen_pjr = persen_nt(cek_data(@$pjr_before->row()->jml),$pjr);
                }

                if(!empty($gatur_before)){
                    $persen_gatur = persen_nt(cek_data(@$gatur_before->row()->jml),$gatur);
                }

                $data = [
                    'ssc_jenis_pos' => [
                        'total' => [$total,$persen_total],
                        'polisi' => [$polisi,$persen_polisi],
                        'pjr' => [$pjr,$persen_pjr],
                        'gatur' => [$gatur,$persen_gatur ],
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

    // SSC Jenis Gangguan
    public function get_ssc_jenis_gangguan()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mendapatkan data jenis gangguan";
            $filter = [];
            $filter_before = [];
            $black_spot_before = 0;
            $trouble_spot_before = 0;
            $tindak_pidana_before = 0;

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
                    
                    $date_before = custom_date($filter['tgl'],'- 1 days'); 
                    $filter_before['tgl'] = $date_before;
                }else{
                    $filter_before['tgl !='] = date('Y-m-d');
                }

                $total_before = $this->db->get_where('ssc_status_gangguan',$filter_before)->num_rows();

                $filter_before['gangguan'] = 'Black Spot';
                $black_spot_before = $this->mpub->get('ssc_status_gangguan','',$filter_before,'gangguan');

                $filter_before['gangguan'] = 'Trouble Spot';
                $trouble_spot_before = $this->mpub->get('ssc_status_gangguan','',$filter_before,'gangguan');

                $filter_before['gangguan'] = 'Ambang Gangguan';
                $ambang_gangguan_before = $this->mpub->get('ssc_status_gangguan','',$filter_before,'gangguan');

                $filter_before['gangguan'] = 'Tindak Pidana';
                $tindak_pidana_before = $this->mpub->get('ssc_status_gangguan','',$filter_before,'gangguan');

                $total = $this->db->get_where('ssc_status_gangguan',$filter)->num_rows();

                $filter['gangguan'] = 'Black Spot';
                $black_spot = $this->mpub->get('ssc_status_gangguan','',$filter,'gangguan');

                $filter['gangguan'] = 'Trouble Spot';
                $trouble_spot = $this->mpub->get('ssc_status_gangguan','',$filter,'gangguan');

                $filter['gangguan'] = 'Ambang Gangguan';
                $ambang_gangguan = $this->mpub->get('ssc_status_gangguan','',$filter,'gangguan');

                $filter['gangguan'] = 'Tindak Pidana';
                $tindak_pidana = $this->mpub->get('ssc_status_gangguan','',$filter,'gangguan');

                // Fix
                $black_spot = cek_data(@$black_spot->row()->jml);
                $trouble_spot = cek_data(@$trouble_spot->row()->jml);
                $tindak_pidana = cek_data(@$tindak_pidana->row()->jml);
                $ambang_gangguan = cek_data(@$ambang_gangguan->row()->jml);
                $total = cek_data(@$total);

                $persen_total = persen_nt(cek_data(@$total_before),$total);

                if(!empty($black_spot_before)){
                    $persen_black_spot = persen_nt(cek_data(@$black_spot_before->row()->jml),$black_spot);
                }

                if(!empty($trouble_spot_before)){
                    $persen_trouble_spot = persen_nt(cek_data(@$trouble_spot_before->row()->jml),$trouble_spot);
                }

                if(!empty($ambang_gangguan_before)){
                    $persen_ambang_gangguan = persen_nt(cek_data(@$ambang_gangguan_before->row()->jml),$ambang_gangguan);
                }

                if(!empty($tindak_pidana_before)){
                    $persen_tindak_pidana = persen_nt(cek_data(@$tindak_pidana_before->row()->jml),$tindak_pidana);
                }

                $data = [
                    'ssc_jenis_gangguan' => [
                        'total' => [$total,$persen_total],
                        'black_spot' => [$black_spot,$persen_black_spot],
                        'trouble_spot' => [$trouble_spot,$persen_trouble_spot],
                        'ambang_gangguan' => [$ambang_gangguan,$persen_ambang_gangguan],
                        'tindak_pidana' => [$tindak_pidana,$persen_tindak_pidana ],
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

    // SSC Pelayanan Publik
    public function get_ssc_pelayanan_publik()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mendapatkan data pelayanan publik";
            $filter = [];
            $filter_before = [];
            $faskes_before = 0;
            $rest_area_before = 0;
            $spbu_before = 0;
            $total_before = 0;

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
                    
                    $date_before = custom_date($filter['tgl'],'- 1 days'); 
                    $filter_before['tgl'] = $date_before;
                }else{
                    $filter_before['tgl !='] = date('Y-m-d');
                }
                
                $total_before = $this->db->get_where('ssc_yan_publik',$filter_before)->num_rows();
                
                $filter_before['yan'] = 'Faskes';
                $faskes_before = $this->mpub->get('ssc_yan_publik','',$filter_before,'yan');
                
                $filter_before['yan'] = 'Rest Area';
                $rest_area_before = $this->mpub->get('ssc_yan_publik','',$filter_before,'yan');
                
                $filter_before['yan'] = 'SPBU';
                $spbu_before = $this->mpub->get('ssc_yan_publik','',$filter_before,'yan'); 
                
                $total = $this->db->get_where('ssc_yan_publik',$filter)->num_rows();

                $filter['yan'] = 'Faskes';
                $faskes = $this->mpub->get('ssc_yan_publik','',$filter,'yan');

                $filter['yan'] = 'Rest Area';
                $rest_area = $this->mpub->get('ssc_yan_publik','',$filter,'yan');

                $filter['yan'] = 'SPBU';
                $spbu = $this->mpub->get('ssc_yan_publik','',$filter,'yan');

                // Fix
                $faskes = cek_data(@$faskes->row()->jml);
                $rest_area = cek_data(@$rest_area->row()->jml);
                $spbu = cek_data(@$spbu->row()->jml);
                $total = cek_data(@$total);

                $persen_total = persen_nt(cek_data(@$total_before),$total);

                if(!empty($faskes_before)){
                    $persen_faskes = persen_nt(cek_data(@$faskes_before->row()->jml),$faskes);
                }

                if(!empty($rest_area_before)){
                    $persen_rest_area = persen_nt(cek_data(@$rest_area_before->row()->jml),$rest_area);
                }

                if(!empty($spbu_before)){
                    $persen_spbu = persen_nt(cek_data(@$spbu_before->row()->jml),$spbu);
                }

                $data = [
                    'ssc_pelayanan_publik' => [
                        'total' => [$total,$persen_total],
                        'faskes' => [$faskes,$persen_faskes],
                        'rest_area' => [$rest_area,$persen_rest_area],
                        'spbu' => [$spbu,$persen_spbu ],
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

    // SSC Pelayanan Darurat
    public function get_ssc_pelayanan_darurat()
    {        
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $data = [];
            $status = false;
            $statusCode = 200;
            $msg = "Gagal mendapatkan data pelayanan darurat";
            $filter = [];
            $filter_before = [];
            $ambulance_before = 0;
            $mobil_derek_before = 0;
            $bengkel_derek_before = 0;
            $total_before = 0;

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
                    
                    $date_before = custom_date($filter['tgl'],'- 1 days'); 
                    $filter_before['tgl'] = $date_before;
                }else{
                    $filter_before['tgl !='] = date('Y-m-d');
                }
                
                $total_before = $this->db->get_where('ssc_yan_darurat',$filter_before)->num_rows();
                
                $filter_before['yan'] = 'Ambulance';
                $ambulance_before = $this->mpub->get('ssc_yan_darurat','',$filter_before,'yan');
                
                $filter_before['yan'] = 'Mobil Derek';
                $mobil_derek_before = $this->mpub->get('ssc_yan_darurat','',$filter_before,'yan');
                
                $filter_before['yan'] = 'Bengkel Keliling';
                $bengkel_derek_before = $this->mpub->get('ssc_yan_darurat','',$filter_before,'yan'); 
                
                $total = $this->db->get_where('ssc_yan_darurat',$filter)->num_rows();

                $filter['yan'] = 'Ambulance';
                $ambulance = $this->mpub->get('ssc_yan_darurat','',$filter,'yan');

                $filter['yan'] = 'Mobil Derek';
                $mobil_derek = $this->mpub->get('ssc_yan_darurat','',$filter,'yan');

                $filter['yan'] = 'Bengkel Keliling';
                $bengkel_keliling = $this->mpub->get('ssc_yan_darurat','',$filter,'yan');

                // Fix
                $ambulance = cek_data(@$ambulance->row()->jml);
                $mobil_derek = cek_data(@$mobil_derek->row()->jml);
                $bengkel_keliling = cek_data(@$bengkel_keliling->row()->jml);
                $total = cek_data(@$total);

                $persen_total = persen_nt(cek_data(@$total_before),$total);

                if(!empty($ambulance_before)){
                    $persen_ambulance = persen_nt(cek_data(@$ambulance_before->row()->jml),$ambulance);
                }

                if(!empty($mobil_derek_before)){
                    $persen_mobil_derek = persen_nt(cek_data(@$mobil_derek_before->row()->jml),$mobil_derek);
                }

                if(!empty($bengkel_derek_before)){
                    $persen_bengkel_keliling = persen_nt(cek_data(@$bengkel_derek_before->row()->jml),$bengkel_keliling);
                }

                $data = [
                    'ssc_pelayanan_darurat' => [
                        'total' => [$total,$persen_total],
                        'ambulance' => [$ambulance,$persen_ambulance],
                        'mobil_derek' => [$mobil_derek,$persen_mobil_derek],
                        'bengkel_keliling' => [$bengkel_keliling,$persen_bengkel_keliling ],
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

    // Grafik SSC Jenis Pos
    public function grafik_ssc_jenis_pos()
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

                $filter['pos'] = 'Pos Polisi';
                $polisi = $this->mpub->get('ssc_jalan','',$filter,'MONTH(tgl)');

                $filter['pos'] = 'Pos PJR';
                $pjr = $this->mpub->get('ssc_jalan','',$filter,'MONTH(tgl)');

                $filter['pos'] = 'Pos Gatur';
                $gatur = $this->mpub->get('ssc_jalan','',$filter,'MONTH(tgl)');

                $data['series'] = [
                    ['name' => 'Pos Polisi','data' => array_values(to_jml_array($polisi->result(),'jml',$month,'bulan'))],
                    ['name' => 'Pos PJR','data' => array_values(to_jml_array($pjr->result(),'jml',$month,'bulan'))],
                    ['name' => 'Pos Gatur','data' => array_values(to_jml_array($gatur->result(),'jml',$month,'bulan'))],
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

    // Grafik SCC Jenis Gangguan
    public function grafik_ssc_jenis_gangguan()
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

                $filter['gangguan'] = 'Black spot';
                $black_spot = $this->mpub->get('ssc_status_gangguan','',$filter,'MONTH(tgl)');

                $filter['gangguan'] = 'Trouble Spot';
                $trouble_spot = $this->mpub->get('ssc_status_gangguan','',$filter,'MONTH(tgl)');

                $filter['gangguan'] = 'Ambang Gangguan';
                $ambang_gangguan = $this->mpub->get('ssc_status_gangguan','',$filter,'MONTH(tgl)');

                $filter['gangguan'] = 'Tindak Pidana';
                $tindak_pidana = $this->mpub->get('ssc_status_gangguan','',$filter,'MONTH(tgl)');

                $data['series'] = [
                    ['name' => 'Black Spot','data' => array_values(to_jml_array($black_spot->result(),'jml',$month,'bulan'))],
                    ['name' => 'Trouble Spot','data' => array_values(to_jml_array($trouble_spot->result(),'jml',$month,'bulan'))],
                    ['name' => 'Tindak Pidana','data' => array_values(to_jml_array($tindak_pidana->result(),'jml',$month,'bulan'))],
                    ['name' => 'Ambang Gangguan','data' => array_values(to_jml_array($ambang_gangguan->result(),'jml',$month,'bulan'))],
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
    
    // Grafik SCC Pelayanan Publik
    public function grafik_ssc_pelayanan_publik()
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

                $filter['yan'] = 'Faskes';
                $faskes = $this->mpub->get('ssc_yan_publik','',$filter,'MONTH(tgl)');

                $filter['yan'] = 'Rest Area';
                $rest_area = $this->mpub->get('ssc_yan_publik','',$filter,'MONTH(tgl)');

                $filter['yan'] = 'SPBU';
                $spbu = $this->mpub->get('ssc_yan_publik','',$filter,'MONTH(tgl)');

                $data['series'] = [
                    ['name' => 'Faskes','data' => array_values(to_jml_array($faskes->result(),'jml',$month,'bulan'))],
                    ['name' => 'Rest Area','data' => array_values(to_jml_array($rest_area->result(),'jml',$month,'bulan'))],
                    ['name' => 'SPBU','data' => array_values(to_jml_array($spbu->result(),'jml',$month,'bulan'))],
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

    // Grafik SCC Pelayanan Darurat
    public function grafik_ssc_pelayanan_darurat()
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

                $filter['yan'] = 'Ambulance';
                $ambulance = $this->mpub->get('ssc_yan_darurat','',$filter,'MONTH(tgl)');

                $filter['yan'] = 'Mobil Derek';
                $mobil_derek = $this->mpub->get('ssc_yan_darurat','',$filter,'MONTH(tgl)');

                $filter['yan'] = 'Bengkel Keliling';
                $bengkel_keliling = $this->mpub->get('ssc_yan_darurat','',$filter,'MONTH(tgl)');

                $data['series'] = [
                    ['name' => 'Ambulance','data' => array_values(to_jml_array($ambulance->result(),'jml',$month,'bulan'))],
                    ['name' => 'Mobil Derek','data' => array_values(to_jml_array($mobil_derek->result(),'jml',$month,'bulan'))],
                    ['name' => 'Bengkel Keliling','data' => array_values(to_jml_array($bengkel_keliling->result(),'jml',$month,'bulan'))],
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

    public function polda()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $this->db->select('rowid as value, da_nam as label');
            $dt = $this->db->get('polda')->result();
            $arr = [
                'data' => ['options'=>$dt],
                'msg' => 'Berhasil Mengambil Data',
                'statusCode' => 200,
                'status' => true
            ];
            echo json_encode($arr);
        }
    }

    public function polres()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $poldaid = $this->input->get('poldaid');
            for ($i=1; $i < 9; $i++) { 
                if ($poldaid == $i) {
                $poldaid = "0".$i;
                }
            }
            $this->db->select('rowid as value, res_nam as label, polda');
            $dt = $this->db->get_where('polres',array('polda'=> (int)$poldaid))->result();
            $arr = [
                'data' => ['options'=>$dt],
                'msg' => 'Berhasil Mengambil Data',
                'statusCode' => 200,
                'status' => true
            ];
            echo json_encode($arr);
        }
    }

}
