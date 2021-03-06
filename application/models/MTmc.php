<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mtmc extends CI_Model {

    private $t = 'tmc_info_lalin';
    public $see = '*';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id='',$where='',$groupby='')
    {
        $this->db->select($this->see);
        
        if ($groupby != '') {
            $this->db->group_by($groupby);
        }

        if($id != ''){
            $q = $this->db->get_where($this->t,['id' => $id]);
        }else if($where != ''){
            $this->db->where($where);
            $q = $this->db->get($this->t);
        }else{
            $q = $this->db->get($this->t);
        }
        return $q;
    }

    public function get_jml_bulan($tgl=false,$status=false,$polda=false,$polres=false)
    {
        if(!$tgl) return false;  
        $this->db->select('count(*) as jml,month(tgl) as bulan,year(tgl) as tahun');
        $this->db->where('YEAR(tgl) = YEAR("'.$tgl.'")');
        if($status) $this->db->where('status', $status);
        if ($polda) {
            $this->db->where('polda', $polda);
        }

        if ($polres) {
            $this->db->where('polres', $polres);
        }
        $this->db->group_by('month(tgl)');
        $this->db->order_by('month(tgl)', 'asc');
        $q = $this->db->get($this->t);
        return $q;
    }

    public function dt_tmc_info_lalin($awal='',$selesai='',$polda='',$polres='')
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t. ' as pk';
         // Set orderable column fields
         $CI->dt->column_order = ['pk.nomor','pa.da_nam','ps.res_nam','pk.tgl','pk.sumber','pk.namajalan','pk.status',null];
         // Set searchable column fields
         $CI->dt->column_search = ['pk.nomor','pa.da_nam','ps.res_nam','pk.tgl','pk.sumber','pk.namajalan','pk.status'];
         // Set select column fields
         $CI->dt->select = 'pk.rowid as rowid ,pk.nomor as nomor,pa.da_nam as da_nam,ps.res_nam as res_nam,pk.tgl as tgl,pk.sumber as sumber,pk.namajalan as namajalan,pk.status as status';
         // Set default order
         $CI->dt->order = ['pk.tgl' => 'desc'];
        //  $this->db->group_by('e.da');
         
        $awal = $this->input->post('awal');
        $selesai = $this->input->post('selesai');
        $polda = $this->input->post('polda');
        $polres = $this->input->post('polres');
       
         
        if ($awal != '') {
            $con1t = ['where','date(pk.tgl) >=',$awal];
            array_push($condition,$con1t);

            $con1t = ['where','date(pk.tgl) <=',$selesai];
            array_push($condition,$con1t);

          }

        if ($polda != '') {
            $con1t = ['where','pk.polda',$polda];
            array_push($condition,$con1t);
           }

        if ($polres != '') {
            $con1t = ['where','pk.polres',$polres];
            array_push($condition,$con1t);
           } 

         
           $cons = ['join','polda as pa','pa.da_id = pk.polda','inner'];
           array_push($condition,$cons);
           
           $cons = ['join','polres as ps','ps.res_id = pk.polres','inner'];
           array_push($condition,$cons);
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $dt->nomor,
                 $dt->da_nam,
                 $dt->res_nam,
                 tgl_indo($dt->tgl),
                 $dt->sumber,
                 $dt->namajalan,
                 $dt->status,
                 '<a data-toggle="tooltip3" title="Detail" class="btn btn-info" href="'.site_url('SCM/detail_peminjaman_mobil/').$dt->rowid.'"><i class="fa fa-info"></i></a>',
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $this->dt->countAll($condition),
             "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    } 
    public function dt_tmc_interaksi($awal='',$selesai='',$polda='',$polres='')
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = 'tmc_interaksi ';
         // Set orderable column fields
         $CI->dt->column_order = ['nomor','dasar','media','jenis','dtm','ket',null];
         // Set searchable column fields
         $CI->dt->column_search = ['dasar','media','jenis'];
         // Set select column fields
         $CI->dt->select = 'nomor,dasar,media,jenis,dtm,ket';
         // Set default order
         $CI->dt->order = ['dtm' => 'desc'];
        //  $this->db->group_by('e.da');

        $awal = $this->input->post('awal');
        $selesai = $this->input->post('selesai');
        $polda = $this->input->post('polda');
        $polres = $this->input->post('polres');
       
         
        if ($awal != '') {
            $con1t = ['where','date(dtm) >=',$awal];
            array_push($condition,$con1t);

            $con1t = ['where','date(dtm) <=',$selesai];
            array_push($condition,$con1t);

          }

        if ($polda != '') {
            $con1t = ['where','polda',$polda];
            array_push($condition,$con1t);
           }

        if ($polres != '') {
            $con1t = ['where','polres',$polres];
            array_push($condition,$con1t);
           } 

        
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                //  $dt->nomor,
                 $dt->dasar,
                 $dt->media,
                 $dt->jenis,
                 tgl_indo($dt->dtm),
                 $dt->ket
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $this->dt->countAll($condition),
             "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    } 

    public function dt_tmc_publikasi($awal='',$selesai='',$polda='',$polres='')
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = 'tmc_publikasi ';
         // Set orderable column fields
         $CI->dt->column_order = ['dasar','media','jenis','dtm','isi',null];
         // Set searchable column fields
         $CI->dt->column_search = ['dasar','media','jenis'];
         // Set select column fields
         $CI->dt->select = 'dasar,media,jenis,dtm,isi';
         // Set default order
         $CI->dt->order = ['dtm' => 'desc'];
        //  $this->db->group_by('e.da');

        $awal = $this->input->post('awal');
        $selesai = $this->input->post('selesai');
        $polda = $this->input->post('polda');
        $polres = $this->input->post('polres');
       
         
        if ($awal != '') {
            $con1t = ['where','date(dtm) >=',$awal];
            array_push($condition,$con1t);

            $con1t = ['where','date(dtm) <=',$selesai];
            array_push($condition,$con1t);

          }

        if ($polda != '') {
            $con1t = ['where','polda',$polda];
            array_push($condition,$con1t);
           }

        if ($polres != '') {
            $con1t = ['where','polres',$polres];
            array_push($condition,$con1t);
           } 

             
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                //  $dt->nomor,
                 $dt->dasar,
                 $dt->media,
                 $dt->jenis,
                 tgl_indo($dt->dtm),
                 $dt->isi
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $this->dt->countAll($condition),
             "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    } 
    public function dt_tmc_kordinasi($awal='',$selesai='',$polda='',$polres='')
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = 'tmc_koordinasi ';
         // Set orderable column fields
         $CI->dt->column_order = ['dasar','jenis','dtm','giat',null];
         // Set searchable column fields
         $CI->dt->column_search = ['dasar','giat','jenis'];
         // Set select column fields
         $CI->dt->select = 'dasar,jenis,dtm,giat';
         // Set default order
         $CI->dt->order = ['dtm' => 'desc'];
        //  $this->db->group_by('e.da');

        $awal = $this->input->post('awal');
        $selesai = $this->input->post('selesai');
        $polda = $this->input->post('polda');
        $polres = $this->input->post('polres');
       
         
        if ($awal != '') {
            $con1t = ['where','date(dtm) >=',$awal];
            array_push($condition,$con1t);

            $con1t = ['where','date(dtm) <=',$selesai];
            array_push($condition,$con1t);

          }

        if ($polda != '') {
            $con1t = ['where','polda',$polda];
            array_push($condition,$con1t);
           }

        if ($polres != '') {
            $con1t = ['where','polres',$polres];
            array_push($condition,$con1t);
           } 
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                //  $dt->nomor,
                 $dt->dasar,
                 $dt->jenis,
                 tgl_indo($dt->dtm),
                 $dt->giat
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $this->dt->countAll($condition),
             "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    }

    public function dt_tmc_prasarana($awal='',$selesai='',$polda='',$polres='')
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = 'tmc_prasarana_publik ';
         // Set orderable column fields
         $CI->dt->column_order = ['prasarana','nama','parkir','dtm',null];
         // Set searchable column fields
         $CI->dt->column_search = ['prasarana','nama','parkir','dtm'];
         // Set select column fields
         $CI->dt->select = 'prasarana,nama,parkir,dtm';
         // Set default order
         $CI->dt->order = ['dtm' => 'desc'];
        //  $this->db->group_by('e.da');

        $awal = $this->input->post('awal');
        $selesai = $this->input->post('selesai');
        $polda = $this->input->post('polda');
        $polres = $this->input->post('polres');
       
         
        if ($awal != '') {
            $con1t = ['where','date(dtm) >=',$awal];
            array_push($condition,$con1t);

            $con1t = ['where','date(dtm) <=',$selesai];
            array_push($condition,$con1t);

          }

        if ($polda != '') {
            $con1t = ['where','polda',$polda];
            array_push($condition,$con1t);
           }

        if ($polres != '') {
            $con1t = ['where','polres',$polres];
            array_push($condition,$con1t);
           } 
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                //  $dt->nomor,
                 $dt->prasarana,
                 $dt->nama,
                 $dt->parkir,
                 tgl_indo($dt->dtm),
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $this->dt->countAll($condition),
             "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    }

    // total keseluruhan tmc
    public function tmc_info_lalin($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_info_lalin');
        
        if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
    
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    public function tmc_interaksi($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_interaksi');
       if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    public function tmc_publikasi($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_publikasi');
       if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    public function tmc_koordinasi($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_koordinasi');
       if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    public function tmc_prasarana_publik($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_prasarana_publik');
       if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    // end total


    
    
}

