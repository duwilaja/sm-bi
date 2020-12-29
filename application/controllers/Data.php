<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        // Your own constructor code
    }
    
    public function sdc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'sdc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/sdc/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	
}