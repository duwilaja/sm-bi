<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MEri extends CI_Model {

    private $t = 'eri_kendaraan';
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

    public function get_jml_bulan($tgl=false,$kategori=false,$polda=false,$polres=false)
    {
        if(!$tgl) return false;  
        $this->db->select('(sum(pnp)+sum(bus)+sum(brg)+sum(motor)+sum(khusus)) as jml,month(tgl) as bulan,year(tgl) as tahun');
        if($kategori) $this->db->select('(sum('.$kategori.')) as jml,month(tgl) as bulan,year(tgl) as tahun');
        $this->db->where('YEAR(tgl) = YEAR("'.$tgl.'")');
        
        if ($polda) {
            $this->db->where('da', $polda);
        }

        if ($polres) {
            $this->db->where('res', $polres);
        }
        
        $this->db->group_by('month(tgl)');
        $this->db->order_by('month(tgl)', 'asc');
        $q = $this->db->get($this->t);
        return $q;
    }

    public function dt_eri_polda()
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t.' e';
         // Set orderable column fields
         $CI->dt->column_order = ['da_nam','pnp','bus','brg','motor','khusus',null];
         // Set searchable column fields
         $CI->dt->column_search = ['da_nam','pnp','bus','brg','motor','khusus'];
         // Set select column fields
         $CI->dt->select = 'da_nam,sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,(sum(pnp) + sum(bus) + sum(brg) + sum(motor) + sum(khusus))  as total';
         // Set default order
         $CI->dt->order = ['e.dtm' => 'desc'];
        $this->db->group_by('e.da');
        
        //  if ($status != '') {
        //    $con1 = ['where','status',$status];
        //    array_push($condition,$con1);
        //   }
          
        //  if ($tgl_pelang != '') {
        //    $con1t = ['where','date(tgl_pelang)',$tgl_pelang];
        //    array_push($condition,$con1t);
        //   }

         $cons = ['join','polda p','p.rowid = e.da','inner'];
         array_push($condition,$cons);
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $dt->da_nam,
                 $dt->pnp,
                 $dt->bus,
                 $dt->brg,
                 $dt->motor,
                 $dt->khusus,
                 $dt->total
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

