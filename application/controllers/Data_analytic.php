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
        $data = $this->mda->api_total_kendaraan($channel_id);
        echo json_encode($data);
    }
	
}