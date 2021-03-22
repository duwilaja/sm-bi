<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_analytic extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MData_analytic','mda');
    }
    
    public function api_total_kendaraan()
    {
        $channel_id  = $this->input->get('channel_id');
        $data = $this->mda->total_kendaraan($channel_id);
        echo json_encode($data);
    }
    
    public function api_detail_analytic_cctv()
    {
        $id  = $this->input->get('id');
        $f  = $this->input->get('f');
        
        $filter = $this->mda->detail_analytic_cctv([
            'id' => $id,
            'filter' => $f,
            'ctddate' => date('Y-m-d')
        ]);
      
        $total = $this->mda->detail_analytic_cctv([
            'id' => $id,
        ]);

        $data = [
            'filter' => [
                'by' => $f,
                'data' => $filter['jml']
            ],
            'total' => $total['jml']
        ];

        echo json_encode($data);
    }

    public function detail_analytic_cctv($id='')
	{
		$this->load->model('MData_analytic','mda');
        $user=$this->session->userdata('user_data');
        $q = $this->input->get('q');
        $data['js_local'] = 'data/ssc/detail.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['q'] = $this->input->get('q');
			$this->template->load("data/ssc/detail",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	
}