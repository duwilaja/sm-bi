<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function index()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			if($user['das']=='Y'){
				$data['session'] = $user;				
				$this->template->load("home",$data);
			}else{
				$retval=array("403","Failed","Invalid Authorization","error");
				$data['retval']=$retval;
				$this->load->view('login',$data);
			}
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}
	}
	
	public function home_data(){
		
		$today=date('Y-m-d');
		
		// 
		
		$data['kemacetan']=$this->db->select("penyebab as label,count(*) as value")->where(array("status"=>"Macet","tgl"=>$today))->group_by("label")->get("tmc_info_lalin")->result();
		$data['kepadatan']=$this->db->select("penyebab as label,count(*) as value")->where(array("status"=>"Padat","tgl"=>$today))->group_by("label")->get("tmc_info_lalin")->result();
		$data['gangguan']=$this->db->select("giat as label,count(*) as value")->where(array("tgl"=>$today))->group_by("label")->get("tmc_koordinasi")->result();
		$data['kecelakaan']=$this->db->select("kasus as label,count(*) as value")->where(array("kasus"=>"Kecelakaan","tgl"=>$today))->group_by("label")->get("intan_analytic")->result();
		
		$qmacet=$this->db->select("lat,lng,'orange' as color,concat(status,'/',penyebab,'/',penyebabd) as txt,'exclamation-triangle' as icon")->where(array("status"=>"Macet","tgl"=>$today))->get_compiled_select("tmc_info_lalin");
		$qpadat=$this->db->select("lat,lng,'blue' as color,concat(status,'/',penyebab,'/',penyebabd) as txt,'exclamation-circle' as icon")->where(array("status"=>"Padat","tgl"=>$today))->get_compiled_select("tmc_info_lalin");
		$qganggu=$this->db->select("lat,lng,'green' as color,giat as txt, 'exclamation' as icon")->where(array("tgl"=>$today))->get_compiled_select("tmc_koordinasi");
		$qcelaka=$this->db->select("lat,lng,'red' as color,kasus as txt, 'fire' as icon")->where(array("kasus"=>"Kecelakaan","tgl"=>$today))->get_compiled_select("intan_analytic");
		$data['maps']=$this->db->query("$qmacet UNION $qpadat UNION $qganggu UNION $qcelaka")->result();
		
		$out=array("code"=>"200","msgs"=>$data);
		echo json_encode($out);
	}
	
	public function dash_eri()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['js_local'] = 'chart/eri.js';
			$data['session'] = $user;
			$this->template->load("dash_eri",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}
	}
	
}