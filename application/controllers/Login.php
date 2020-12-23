<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function index()
	{
		$retval=array("404","Failed","Wrong user/password","error");
		$loggedin=false;
		
		$nrp=$this->input->post("user");
		$pwd=$this->input->post("passwd");
		
		$this->db->where('nrp',$nrp);
		$this->db->where('pwd',md5($pwd));
		$acc=$this->db->get("accounts")->result_array();
			
		if(count($acc)>0){
			$this->db->where(array('nrp'=>$nrp,'das'=>'Y'));
			$retval=$this->db->get("persons")->result_array();
			if(count($retval)>0){
				$loggedin=true;
				$this->session->set_userdata('user_data',$retval[0]);
				$data['session']=$retval[0];
				/*if($retval[0]['unit']==''){
					redirect(base_url().'profile');
				}else{
					redirect(base_url().'laporan');
				}*/
				redirect(base_url().'home');
			}
			$retval=array("404","Failed","Person not found, or not enough privilege","error");
		}
		if(!$loggedin){
			$data['retval']=$retval;
			//$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
			$this->load->view('login',$data);
		}
	}
	
	public function out()
	{
		session_destroy();
		$retval=array("200","OK","Logged out","success");
		$data['retval']=$retval;
		$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
		$this->load->view("login",$data);
	}
	
}
