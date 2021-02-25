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
			$data['session'] = $user;
			
			$this->template->load("home",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$this->load->view('login',$data);
		}
	}
	
	public function home_data(){
		
		$today=date('Y-m-d');
		
		// 
		
		$data['kemacetan']=$this->db->select("penyebab as label,count(*) as value")->where(array("status"=>"Macet","tgl"=>$today))-> group_by("label")->get("tmc_info_lalin")->result();
		$data['kepadatan']=$this->db->select("penyebab as label,count(*) as value")->where(array("status"=>"Padat","tgl"=>$today))->group_by("label")->get("tmc_info_lalin")->result();
		$data['gangguan']=$this->db->select("giat as label,count(*) as value")->where(array("tgl"=>$today))->group_by("label")->get("tmc_koordinasi")->result_array();
		
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