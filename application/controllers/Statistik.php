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
			$data['title']= "Trend Data";
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
			$data['title']= "Case Fatality Rate";
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
			$data['title']= "Fatality Index";
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
			$data['title']= "Index Kinerja Cybercop";
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("statistik/index_kinerja",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
    }
	public function kinerja_datasets(){
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
		
		$datas=$this->statistik->get_kinerja($start,$end,$polda,$polres);
		$cops=$this->statistik->get_cops($start,$end,$polda,$polres);
		$axis=$this->one_dimension($cops,'nrp');
		$label=$this->one_dimension($cops,'nama');
		
		$out=array("axis"=>$axis,"datas"=>$datas,"label"=>$label);
		echo json_encode($out);
	}
	
	public function ketertiban() // index ketertiban
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'data/indeks/ketertiban.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['title'] = "Index Ketertiban";
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/indeks/ketertiban",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function ketertiban_datasets(){
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
		
		$datas=$this->statistik->get_tar_sim($start,$end,$polda,$polres);
		$datas2=$this->statistik->get_tar_pelanggaran($start,$end,$polda,$polres);
		
		$out=array("labels"=>$labels,"datasim"=>$datas,"datapelanggaran"=>$datas2);
		echo json_encode($out);
	}
	
	public function kecelakaan() // index ketertiban
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'data/indeks/kecelakaan.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['title']= "Index Kecelakaan";
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/indeks/kecelakaan",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function kecelakaan_datasets(){
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
		//chart1
		$axis1=array();$y=date('Y'); $ymd=date('Y-m-d'); $ymd1=date('Y-m-').'01';
		for($i=$y-5;$i<=$y;$i++){
			$axis1[]=$i;
		}
		$data_target=$this->statistik->get_target_laka($y-5,$y,$polda,$polres);
		$data_jml=$this->statistik->get_jml_laka(date('Y-m-d',strtotime("$ymd1 -5 year")),$ymd,$polda,$polres);
		$datas1=array_merge($data_target,$data_jml);
		$label1=array("Target","Kejadian");
		
		//chart2
		$axis2=$this->one_dimension($this->statistik->get_laka_axis($start,$end,$polda,$polres),'lokasi');
		$data_korban=$this->statistik->get_laka_kor($start,$end,$polda,$polres);
		$data_die=$this->statistik->get_laka_die($start,$end,$polda,$polres);
		$datas2=array_merge($data_korban,$data_die);
		$label2=array("Korban","Meninggal");
		
		//chart3
		$axis3=$axis2;
		$data_jml=$this->statistik->get_jml_laka($start,$end,$polda,$polres,"lokasi");
		$datas3=array_merge($data_korban,$data_jml);
		$label3=array("Korban","Kejadian");
		
		//chart4
		$axis4=$this->one_dimension($this->statistik->get_laka_axis($start,$end,$polda,$polres,'kendaraan'),'kendaraan');
		$data_korban=$this->statistik->get_laka_kor($start,$end,$polda,$polres,'kendaraan');
		$data_jml=$this->statistik->get_jml_laka($start,$end,$polda,$polres,'kendaraan');
		$datas4=array_merge($data_korban,$data_jml);
		$label4=array("Korban","Kejadian");
		
		//chart5
		$data_korban=$this->statistik->get_laka_die($start,$end,$polda,$polres,'penyebab');
		$axis5=$this->one_dimension($data_korban,'x');
		$datas5=$this->one_dimension($data_korban,'y');
		
		$out=array("axis1"=>$axis1,"label1"=>$label1,"datas1"=>$datas1,
					"axis2"=>$axis2,"label2"=>$label2,"datas2"=>$datas2,
					"axis3"=>$axis3,"label3"=>$label3,"datas3"=>$datas3,
					"axis4"=>$axis4,"label4"=>$label4,"datas4"=>$datas4,
					"axis5"=>$axis5,"datas5"=>$datas5);
		echo json_encode($out);
	}
	
	private function one_dimension($arr,$idx){
		$ret=array();
		for($i=0;$i<count($arr);$i++){
			$ret[]=$arr[$i][$idx];
		}
		return $ret;
	}
	
	public function keamanan() // index keamanan
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
        $data['js_local'] = 'data/indeks/keamanan.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['title'] =  "Index Keamanan";
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
			$data['title'] =  "Index Keselamatan";
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
