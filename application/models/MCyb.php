<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// 
class MCyb extends CI_Model {

    private $t = 'persons';
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

    public function dt_user_cybercops()
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t.' a';
         // Set orderable column fields
         $CI->dt->column_order = ['a.nrp','a.nama','a.pangkat','b.da_nam','c.res_nam'];
         // Set searchable column fields
         $CI->dt->column_search = ['a.nrp','a.pangkat','b.da_nam','c.res_nam'];
         // Set select column fields
         $CI->dt->select = 'a.nrp as nrp ,a.nama as nama ,b.da_nam as polda ,c.res_nam as polres ,a.pangkat as pangkat';
         // Set default order
         $CI->dt->order = ['a.registered' => 'desc'];
         
        //  $this->db->group_by('e.polda');
        //  $this->db->order_by('b.da_nam','DESC');
        
         $cons = ['join','polda b','b.da_id = a.polda','inner'];
         array_push($condition,$cons);
         $cons = ['join','polres c','c.res_id = a.polres','inner'];
         array_push($condition,$cons);
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $dt->nrp,
                 $dt->nama,
                 $dt->polda,
                 $dt->polres,
                 $dt->pangkat
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

