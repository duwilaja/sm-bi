<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

    public function trend_data()
    {
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'statistik/trend_data.js';
		if(isset($user)){
			$data['session'] = $user;
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

}

/* End of file Statistik.php */
