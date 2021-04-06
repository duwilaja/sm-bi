<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	
	private $vendor = "Lenna Chat Bot 06-04-2021";
	private $vendor_id = 19;
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->model('MTmc','tmc');
		$this->load->model('MDares','dares');
    }
    
    public function cybercop()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/cybercop/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/cybercop/dashboard",$data);
			// 404 page 
			// $this->load->view("error/404",$data);
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
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/ssc/dashboard",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function ssc2()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ssc/dashboard2.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['ssc'] = true;
			$this->template->load("data/ssc/dashboard2",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function detail($id='')
	{
		$this->load->model('MData_analytic','mda');
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ssc/detail.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/ssc/detail",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function tmc()
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
		
        $data['js_local'] = 'data/tmc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/tmc/dashboard",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
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

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function ais()
	{
		$this->load->model('MAis','ais');
		
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ais/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['md'] = $this->ais->get_jml('md');
			$data['lb'] = $this->ais->get_jml('lb');
			$data['lr'] = $this->ais->get_jml('lr');
			$data['rumat'] = $this->ais->get_jml('rumat');
			$this->template->load("data/ais/dashboard",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
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
			// $this->template->load("data/taa/dashboard",$data);

			// 404 page 
			$this->load->view("error/404",$data);
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
			// $this->template->load("data/tarc/dashboard",$data);

			// 404 page 
			$this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}

	public function etle()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/etle/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/etle/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
}