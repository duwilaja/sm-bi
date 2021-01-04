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

    public function dt_tmc_info_lalin()
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t;
         // Set orderable column fields
         $CI->dt->column_order = ['nomor','dasar','namajalan','lat','lng','dtm','jammulai','jamsampai','status','sumber',null];
         // Set searchable column fields
         $CI->dt->column_search = ['dasar','status','sumber'];
         // Set select column fields
         $CI->dt->select = 'nomor,dasar,namajalan,lat,lng,dtm,jammulai,jamsampai,status,sumber';
         // Set default order
         $CI->dt->order = ['dtm' => 'desc'];
        //  $this->db->group_by('e.da');
        
        //  if ($status != '') {
        //    $con1 = ['where','status',$status];
        //    array_push($condition,$con1);
        //   }
          
        //  if ($tgl_pelang != '') {
        //    $con1t = ['where','date(tgl_pelang)',$tgl_pelang];
        //    array_push($condition,$con1t);
        //   }

        //  $cons = ['join','polda p','p.rowid = e.da','inner'];
        //  array_push($condition,$cons);
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                //  $dt->nomor,
                 $dt->dasar,
                 $dt->namajalan,
                 $dt->lat,
                 $dt->lng,
                 tgl_indo($dt->dtm),
                 $dt->jammulai,
                 $dt->jamsampai,
                 $dt->status,
                 $dt->sumber
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


    public function dt_tmc_interaksi()
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
        
        //  if ($status != '') {
        //    $con1 = ['where','status',$status];
        //    array_push($condition,$con1);
        //   }
          
        //  if ($tgl_pelang != '') {
        //    $con1t = ['where','date(tgl_pelang)',$tgl_pelang];
        //    array_push($condition,$con1t);
        //   }

        //  $cons = ['join','polda p','p.rowid = e.da','inner'];
        //  array_push($condition,$cons);
         
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

    public function dt_tmc_publikasi()
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
        
        //  if ($status != '') {
        //    $con1 = ['where','status',$status];
        //    array_push($condition,$con1);
        //   }
          
        //  if ($tgl_pelang != '') {
        //    $con1t = ['where','date(tgl_pelang)',$tgl_pelang];
        //    array_push($condition,$con1t);
        //   }

        //  $cons = ['join','polda p','p.rowid = e.da','inner'];
        //  array_push($condition,$cons);
         
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
    
}

