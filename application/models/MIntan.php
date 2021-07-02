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
		 
		$f_date_start = $this->input->post("f_date_start");
		$f_date_end = $this->input->post("f_date_end");
		if($f_date_start!='') array_push($condition,array('where','date(ctd_date)>=',$f_date_start));
        if($f_date_end!='') array_push($condition,array('where','date(ctd_date)<=',$f_date_end));
         
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
    
	public function polda(){
		return $this->db->get("polda")->result();
	}
	public function polres($id){
		return $this->db->select("res_id as v,res_nam as t")->where("polda",$id)->get("polres")->result();
	}
	public function sum($f_date_start,$f_date_end,$f_polda,$f_polres){
		$where=array();
		if($f_polda!='') $where['polda']=$f_polda;
		if($f_polres!='') $where['polres']=$f_polres;
		
		$qsscjln=$this->db->select("pos as txt, count(*) as jml")->where($where)->group_by("pos")->get_compiled_select("ssc_jalan");
		$qsscpub=$this->db->select("yan as txt, count(*) as jml")->where($where)->group_by("yan")->get_compiled_select("ssc_yan_publik");
		$qsscdar=$this->db->select("yan as txt, count(*) as jml")->where($where)->group_by("yan")->get_compiled_select("ssc_yan_darurat");
		//echo "$qsscjln UNION $qsscpub UNION $qsscdar";
		return $this->db->query("$qsscjln UNION $qsscpub UNION $qsscdar")->result();
	}
	public function sets(){
		return $this->db->select("kasus")->distinct()->get("pelapor")->result_array();
	}
	public function datasets($start,$end,$polda,$polres){
		$select="kasus as z,DATE_FORMAT(time_call,'%b %Y') as x,COUNT(pelapor_id) as y";
        $where=array("DATE(time_call)>="=>$start,"DATE(time_call)<="=>$end);
		$join=array("pelapor","ttr_operator.pelapor_id=pelapor.id");
		if($polda!=''){
			//$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			//$where+=array("polres"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->from("ttr_operator")->join($join[0],$join[1])->where($where)->group_by($grpby)->order_by("x")->get()->result_array();
	}
}

