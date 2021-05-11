<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {
	
	private $vendor = "Lenna Chat Bot 06-04-2021";
	private $vendor_id = 19;

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->model('MTmc','tmc');
		$this->load->model('MDares','dares');
		$this->load->model('MStatistik','statistik');
    }
	
    public function trend_data()
    {
		$user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
		$data['js_local'] = 'statistik/trend_data.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("statistik/trend_data",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
		
	}
	
	public function case_fatality_rate()
    {
		$user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
		$data['js_local'] = 'statistik/case_fatality_rate.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("statistik/case_fatality_rate",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	
	public function fatality_index()
    {
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'statistik/fatality_index.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("statistik/fatality_index",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
    }

	public function index_kinerja()
    {
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'statistik/index_kinerja.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("statistik/index_kinerja",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
    }
	public function ketertiban() // index ketertiban
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'data/indeks/ketertiban.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/indeks/ketertiban",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function kecelakaan() // index ketertiban
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'data/indeks/kecelakaan.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/indeks/kecelakaan",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function keamanan() // index keamanan
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'data/indeks/keamanan.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/indeks/keamanan",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function keamanan_datasets(){
		$start=$this->input->post("start");
		$end=$this->input->post("end");
		$polda=$this->input->post("polda");
		$polres=$this->input->post("polres");
		
		$end=$end==''?date('Y-m-d'):$end;
		$start=$start==''?date('Y-m-d',strtotime("$end -12 month")):$start;
		$origin = date_create($start);
		$target = date_create($end);
		$origin = date_create($origin->format('Y').'-'.$origin->format('m').'-1');
		$interval = date_diff($origin, $target);
		$mon=$interval->m + ($interval->y*12);
		$mon=$interval->d > 0 ?$mon+1:$mon;
		$mon=$origin->format("m") != $target->format("m") ?$mon+1:$mon;
		$labels=array(); $bln=$origin->format('Y-m-d');
		for($i=0;$i<$mon;$i++){
			if($bln<=$end) $labels[]=date('M Y',strtotime("$bln"));
			$bln=date('Y-m-d',strtotime("$bln 1 month"));
		}
		
		$datas=$this->statistik->get_ssc_gangguan($start,$end,$polda,$polres);
		$out=array("labels"=>$labels,"datas"=>$datas);
		echo json_encode($out);
	}
	
	public function keselamatan() // index keselamatan
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'data/indeks/keselamatan.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/indeks/keselamatan",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function keselamatan_datasets(){
		$start=$this->input->post("start");
		$end=$this->input->post("end");
		$polda=$this->input->post("polda");
		$polres=$this->input->post("polres");
		
		$end=$end==''?date('Y-m-d'):$end;
		$start=$start==''?date('Y-m-d',strtotime("$end -12 month")):$start;
		$origin = date_create($start);
		$target = date_create($end);
		$origin = date_create($origin->format('Y').'-'.$origin->format('m').'-1');
		$interval = date_diff($origin, $target);
		$mon=$interval->m + ($interval->y*12);
		$mon=$interval->d > 0 ?$mon+1:$mon;
		$mon=$origin->format("m") != $target->format("m") ?$mon+1:$mon;
		$labels=array(); $bln=$origin->format('Y-m-d');
		for($i=0;$i<$mon;$i++){
			if($bln<=$end) $labels[]=date('M Y',strtotime("$bln"));
			$bln=date('Y-m-d',strtotime("$bln 1 month"));
		}
		
		$datas=$this->statistik->get_ais_laka($start,$end,$polda,$polres);
		$out=array("labels"=>$labels,"datas"=>$datas);
		echo json_encode($out);
	}
	
}

/* End of file Statistik.php */
