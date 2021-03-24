<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_analytic extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MData_analytic','mda');
    }

    public function detail_analytic_cctv($id='')
	{
        $rtsp = '';
		$this->load->model('MData_analytic','mda');
        $cctv = $this->db->get_where('cctv',['id' => $id]);
        if ($cctv->num_rows() > 0 ) {
            $rtsp = $cctv->row()->rtsp_cctv;
        }
        $user=$this->session->userdata('user_data');
        $q = $this->input->get('q');
        $data['js_local'] = 'data/ssc/detail.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['rtsp'] = $rtsp;
			$data['q'] = $this->input->get('q');
			$this->template->load("data/ssc/detail",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
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

    public function api_analitik_bar_counting()
    {
        $q = $this->mda->analitik_bar_counting('','tahun');
        echo json_encode($q);
    }


    public function api_total_counting()
    {

		$sekarang_total = $this->mda->total_counting([
			'ctddate' => date('Y-m-d'),
            'cctv_id' =>  $this->input->post('id'),
            'filter' => ''
        ])->row();

        $kemarin_total = $this->mda->total_counting([
			'ctddate' => date('Y-m-d'),
            'cctv_id' =>  $this->input->post('id'),
            'filter' => 'total_all_without_today'
        ])->row();

        $sekarang_hari = $this->mda->total_counting([
			'ctddate' => date('Y-m-d'),
            'cctv_id' =>  $this->input->post('id'),
            'filter' => 'today'
        ])->row();

        $kemarin_hari = $this->mda->total_counting([
			'ctddate' => date('Y-m-d'),
            'cctv_id' =>  $this->input->post('id'),
            'filter' => 'yesterday'
        ])->row();

		$data = [
            'total_all' => [
                'sekarang' => $sekarang_total->jml,
                'kemarin' => $kemarin_total->jml,
                'persen' => persen_nt($sekarang_total->jml,$kemarin_total->jml)
            ],
            'total_hari' => [
                'sekarang' => $sekarang_hari->jml,
                'kemarin' => $kemarin_hari->jml,
                'persen' => persen_nt($sekarang_hari->jml,$kemarin_hari->jml)
            ]
		];

		echo json_encode($data);
    }

    public function api_analitik_bar_sparkline_counting()
    {
        $d = [];
		$filter = [
			'ctdby' => '',
			'ctddate' => $this->input->post('ctddate'),
            'cctv_id' =>  $this->input->post('id')
		];

		$x = $this->input->post('x');
		$d = $this->mda->counting_bar_sparkline($filter);

		$data = [
			'data' => $d
		];

		echo json_encode($data);
    }

    public function api_analitik_bar_echart_counting()
    {
        $d = [];
		$filter = [
			'ctdby' => '',
			'ctddate' => $this->input->post('ctddate'),
            'cctv_id' =>  $this->input->post('id')
		];

		$x = $this->input->post('x');
		if ($x == "week") {
			$d = $this->mda->counting_bar_week($filter);
		}else if($x == "month"){
			$d = $this->mda->counting_bar_bulan($filter);
		}else if($x == "year"){
			$d = $this->mda->counting_bar_year($filter);
		}else if($x == "day"){
			$d = $this->mda->counting_bar_day($filter);
		}

		$data = [
			'data' => $d
		];

		echo json_encode($data);
    }

    public function get_list_traffic_category()
    {
        $filter = [
            'filter' => '',
            'ctddate' => date('Y-m-d'),
            'cctv_id' =>  $this->input->post('id')
        ];

        $x = $this->input->post('x');
		if ($x == "week") {
            $filter['filter'] = "week";
			$d = $this->mda->get_traffic_category($filter);
		}else if($x == "month"){
            $filter['filter'] = "month";
			$d = $this->mda->get_traffic_category($filter);
		}else if($x == "year"){
            $filter['filter'] = "year";
			$d = $this->mda->get_traffic_category($filter);
		}else if($x == "day"){
            $filter['filter'] = "today";
			$d = $this->mda->get_traffic_category($filter);
		}

        $q = $d->result();
        echo json_encode($q);
    }
   
    public function api_analitik_bar_echart_category()
    {
        $d = [];

		$filter = [
			'filter' => '',
			'ctddate' => $this->input->post('ctddate'),
            'cctv_id' =>  $this->input->post('id')
		];

		$x = $this->input->post('x');
		if ($x == "week") {
            $filter['filter'] = "week";
			$d = $this->mda->analitik_bar_echart_category($filter);
		}else if($x == "month"){
            $filter['filter'] = "month";
			$d = $this->mda->analitik_bar_echart_category($filter);
		}else if($x == "year"){
            $filter['filter'] = "year";
			$d = $this->mda->analitik_bar_echart_category($filter);
		}else if($x == "day"){
            $filter['filter'] = "today";
			$d = $this->mda->analitik_bar_echart_category($filter);
		}

		$data = [
			'data' => $d
		];

		echo json_encode($data);
    }
	
}