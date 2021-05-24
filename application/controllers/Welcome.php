<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $p_name = '';
	private $num = '';

	public function __construct()
	{
		parent::__construct();
		
	}

	// public function contoh()
	// {
	// 	$d = [];

	// 	$arr = [[
	// 		'product' => 'Fashion 3542',
	// 		'warna' => 'Black',
	// 		'qty' => 7 
	// 	],[
	// 		'product' => 'Fashion 3542',
	// 		'warna' => 'White',
	// 		'qty' => 2 
	// 	],[
	// 		'product' => 'Fashion 3542',
	// 		'warna' => 'Pink',
	// 		'qty' => 2 
	// 	],
	// 	[
	// 		'product' => 'Fashion Goks',
	// 		'warna' => 'Pink',
	// 		'qty' => 2 
	// 	],
	// 	[
	// 		'product' => 'Fashion Goks',
	// 		'warna' => 'Merah',
	// 		'qty' => 4
	// 	],
	// 	[
	// 		'product' => 'Fashion Kill',
	// 		'warna' => 'Merah',
	// 		'qty' => 4
	// 	],
	// 	[
	// 		'product' => 'Fashion Kill',
	// 		'warna' => 'Merah',
	// 		'qty' => 4
	// 	],
	// 	[
	// 		'product' => 'Fashion Kills',
	// 		'warna' => 'Merah',
	// 		'qty' => 4
	// 	]
	// 	];

	// 	$p_name = '';
	// 	$num = 0;
	// 	$num_final = "";

	// 	foreach ($arr as $k => $v) {
	// 		if ($this->p_name == '' || $this->p_name != $v['product']) {
	// 			if($this->p_name != $v['product']) $num = $this->count($arr, $v['product']);
	// 			$this->p_name = $v['product'];
	// 			$p_name = $v['product'];
	// 		}else{
	// 			$p_name = '';
	// 			$num = '';
	// 		}

	// 		array_push($d, [
	// 			'product' => $p_name,
	// 			'num' => $num, 
	// 			'warna' => $v['warna'],
	// 			'qty' => $v['qty']
	// 		]);
			
	// 	}

	// 	// echo json_encode($d);
	// 	// die;
	// 	$data['data'] = $d;
	// 	$this->load->view('welcome_message', $data, FALSE);
		
	// }

	// public function count($arr,$p_name)
	// {
	// 	$n = 0; 
	// 	foreach ($arr as $v) {
	// 		if($v['product'] == $p_name){
	// 			$n++;
	// 		};
	// 	}

	// 	return $n;
	// }

	public function simulasi()
	{
        $data['js_local'] = 'simulasi/simulasi.js';
		$this->load->view('simulasi/simulasi',$data);
	}

	public function simulasi2()
	{
        $data['js_local'] = 'simulasi/simulasi2.js';
		$this->load->view('simulasi/simulasi2',$data);
	}

	public function get_api_cctv()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://202.134.4.215/mw/index.php/Api/get_cctv",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$response  = json_decode($response);
			echo json_encode($response);
		}
	}

	public function index()
	{
		$data="aa";
		//$data['pangkat'] = comboopts($this->db->select('pang_id as v,pang_nam as t')->get('pangkat')->result());
		$this->load->view('login',$data);
	}
	
	public function blank()
	{
		$data['title'] = "Blank Page";
		$this->template->load('blank', $data);
	}

	public function get_jalur()
	{
		$id = $this->input->get('id');
		
		$jalur = [];
		$sub_jalur = [];
		
		$j = $this->db->get_where('jalur j',['j.id' => $id])->row();
		$jalur = [
			'id' => $j->id,
			'nama' => $j->nama_jalur,
			'start' => kordinat($j->start),
			'destination' => kordinat($j->destination),
		];
		
		$js = $this->db->get_where('jalur_sub js',['js.jalur_id' => $id]);
		foreach ($js->result() as $v) {
			$sub_jalur[] = kordinat($v->kordinat);
		}
	
		$data = [
			'jalur' => $jalur,
			'sub_jalur' => $sub_jalur
		];

		echo json_encode($data);
	}

	public function get_titik()
	{
		$s = $this->input->get('s');
		if ($s == 'Black Spot' || $s == 'Trouble Spot') {
			$this->db->where('statuspenggaljalan', $s);
		}else if($s == 'Ambang Gangguan'){
			$this->db->where('status', 'Macet');
		}else if($s == 'Kegiatan Masyarakat'){
			$this->db->where('status', 'Macet');
			$this->db->where('penyebab', $s);
		}

		$data = [];

		$q = $this->db->get('tmc_info_lalin til');
		foreach ($q->result() as $k => $v) {
			array_push($data,[
				'rowid' => $v->rowid,
				'dtm' => tgl_indo($v->dtm),
				'lat' => (float)$v->lat,
				'lng' => (float)$v->lng,
				'namajalan' => $v->namajalan,
				'status' => $v->status,
				'jammulai' => $v->jammulai,
				'jamsampai' => $v->jamsampai,
				'penyebab' => $v->penyebab,
				'penyebabd' => $v->penyebabd,
				'lainnya' => $v->lainnya,
				'sumber' => $v->sumber,
				'petugas' => $v->petugas,
			]);
		}
		echo json_encode($data);
	}
	

	public function get_cctv()
	{
		$data = [];
		$kategori = [];
		$total = '';
		$kategori = [];

		$this->load->model('MData_analytic','mda');
		$a = $this->input->post('a');
		
		$q = $this->db->get('cctv c');
		foreach ($q->result() as $k => $v) {
			
			if ($a != '') $total = $this->mda->total_kendaraan($v->channel_id,'hari')['jml'];
			if ($a == 'traffic_category') $kategori = $this->mda->get_traffic_category([
					'channel_id' => $v->channel_id,
					'ctddate' => date('Y-m-d'),
					'filter' => 'today'
				])->result();

			array_push($data,[
				'id' =>  $v->id,
				'nama' =>  $v->nama_cctv,
				'rtsp' =>  $v->rtsp_cctv,
				'total' => $total,
				'kategori' =>  $kategori,
				'kordinat' => kordinat($v->kordinat),
			]);
		}
		echo json_encode($data);
	}
	
	public function test()
	{
		$data['title'] = "Blank Page";
		$this->load->view('test');
	}
	
	public function test2()
	{
		$data['title'] = "Blank Page";
		$this->load->view('test2');
		
	}

	public function share_lokasi()
	{
		$q1 = $this->db->get_where('lokasi_online', ['kode_online' => $this->input->post('x')]);
		if ($q1->num_rows() > 0) {
			$this->db->update('lokasi_online', [
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng')
			],['kode_online' => $this->input->post('x')]);
		}else{
			$this->db->insert('lokasi_online', [
				'kode_online' => $this->input->post('x'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'show' => 1
			]);
		}

		echo "sukses aja lah";
		
	}

	public function share_all_lokasi_online()
	{
		$test = [];
		$q = $this->db->get_where('lokasi_online',['show' => 1]);
		foreach ($q->result() as $key => $value) {
			$value->lat = (float) $value->lat;
			$value->lng = (float) $value->lng;

			$test[$key] = $value;
		}

		echo json_encode($test);
	}

	public function get_lokasi()
	{
		$t = '';
		$for = $this->input->post('for');
		$data = [
			'name' => $for,
		];
		if ($for == 'polisi') {
			$t = 'md_pos_polisi';
		}else if ($for == 'damkar') {
			$t = 'md_damkar';
		}else if ($for == 'rumah_sakit') {
			$t = 'md_rumah_sakit';
		}else if ($for == 'dishub') {
			$t = 'md_dishub';
		}

		if ($t != '') {
			$q = $this->db->get($t);
			$data['data'] = $q->result();
		}

		foreach ($data['data'] as $key => $value) {
			$value->lat = (float) $value->lat;
			$value->lng = (float) $value->lng;

			$data['data'][$key] = $value;
		}

		echo json_encode($data);
	}
}
