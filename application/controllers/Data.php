<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        // Your own constructor code
    }
    
    public function cybercop()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/cybercop/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/cybercop/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function eri()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/eri/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/eri/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function sdc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/sdc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/sdc/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function ssc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ssc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/ssc/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function tmc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/tmc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/tmc/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function intan()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/intan/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/intan/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function ais()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ais/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/ais/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function taa()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/taa/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/taa/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function tarc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/tarc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/tarc/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	
}