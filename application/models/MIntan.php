<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MIntan extends CI_Model {

    private $t = 'ttr_operator';
    public $see = '*';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id='',$where='',$groupby='')
    {
        $this->db->select('ttr.id as id,p.kasus,p.lokasi,ttr.time_call,ttr.response_time,ttr.durasi,ttr.ctd_date,ttr.ctd_time,ttr.status');
        $this->db->join('pelapor p', 'p.id = ttr.pelapor_id', 'left');

        if ($groupby != '') {
            $this->db->group_by($groupby);
        }

        if($id != ''){
            $q = $this->db->get_where($this->db->get('ttr_operator ttr'),['id' => $id]);
        }else if($where != ''){
            $this->db->where($where);
            $q = $this->db->get('ttr_operator ttr');;
        }else{
            $q = $this->db->get('ttr_operator ttr');;
        }
        return $q;
    }

    public function status($status="")
    {
        if ($status=="0") {
            return "Pending";
        } else if ($status=="1") {
            return "Progress";
        } else if ($status=="2") {
            return "Done";
        } else if($status=="3"){
            return "Reject";
        }
    }

    public function set_color($status="")
    {
        if ($status=="0") {
            return "info";
        } else if ($status=="1") {
            return "warning";
        } else if ($status=="2") {
            return "success";
        } else if($status=="3"){
            return "danger";
        }
    }

    public function set_color_case($kasus="")
    {
        if ($kasus=="Demo") {
            return "success";
        } else if ($kasus=="Bencana Alam") {
            return "info";
        } else if ($kasus=="Kecelakaan") {
            return "danger";
        } else if ($kasus=="Pencurian Mobil") {
            return "default";
        } else if ($kasus=="Pelanggaran Prokes") {
            return "primary";
        } else if ($kasus=="Pohon Tumbang") {
            return "warning";
        } else if ($kasus=="Gepeng & PSK") {
            return "default";
        } else if ($kasus=="Pencurian Mobil") {
            return "default";
        } else if ($kasus=="Fasilitas Umum Rusak") {
            return "dannger";
        }
    }

    public function dt_ttr_operator()
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t. ' as pk';
         // Set orderable column fields
         $CI->dt->column_order = ['pk.pelapor_id','pk.time_call','pk.response_time','pk.durasi','pk.ctd_date','pk.ctd_time','pk.status',null];
         // Set searchable column fields
         $CI->dt->column_search = ['pk.pelapor_id','pk.time_call','pk.response_time','p.lokasi','p.kasus','pk.status'];
         // Set select column fields
         $CI->dt->select = 'pk.id as id,pk.pelapor_id,p.kasus,p.lokasi,pk.time_call,pk.response_time,pk.durasi,pk.ctd_date,pk.ctd_time,pk.status';
         // Set default order
         $CI->dt->order = ['pk.id' => 'desc'];
         
           $cons = ['join','pelapor as p','p.id = pk.pelapor_id','left'];
           array_push($condition,$cons);
           
        //    $cons = ['join','polres as ps','ps.res_id = pk.polres','inner'];
        //    array_push($condition,$cons);
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 '<span class="badge badge-pill badge-'.$this->set_color_case($dt->kasus).'">'.$dt->kasus.'</span>',
                 $dt->lokasi,
                 date("h:i:s",strtotime($dt->time_call)),
                 date("h:i:s",strtotime($dt->response_time)),
                //  gmdate("H:i:s", $dt->durasi),
                 secondsToTime($dt->durasi),
                 tgl_indo($dt->ctd_date),
                 '<span class="badge badge-pill badge-'.$this->set_color($dt->status).'">'.$this->status($dt->status).'</span>',
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

