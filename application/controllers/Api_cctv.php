<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_cctv extends CI_Controller {
	
	private $username = "system";
	private $password = "Admin123";
	private $realm = "";
	private $randomKey = "";
	private $rdmkey = "";
	private $publicKey = "";
	private $mac = "";
	private $url = "https://172.16.59.27";
	private $token = "";
	private $signiture = "";
	private $cert = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo $this->signiture();
		
	}

	public function print_st()
	{
		$this->load->view('surat_tilang_p2');
		
		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('surat_tilang_p1', [], TRUE);
		$data2 = $this->load->view('surat_tilang_p2', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->AddPage();
		$mpdf->WriteHTML($data2);
		$mpdf->Output();

		// $mpdf = new \Mpdf\Mpdf();
		// $data = $this->load->view('surat_tilang_p1', [], TRUE);
		// $mpdf->WriteHTML($data);
		// $mpdf->Output();

		// $mpdf = new \Mpdf\Mpdf();
		// $data = $this->load->view('surat_tilang_p2', [], TRUE);
		// $mpdf->WriteHTML($data);
		// $mpdf->Output();
	}

	private function publicKey()
	{
		 $this->publicKey = base64_encode($this->publicKey);
	}

	// Signiture
	private function signiture($password='',$username='',$realm='',$rdmkey='')
	{
		$temp = md5($password);
		$temp = md5($username.$temp);
		$temp = md5($temp);
		$temp = md5($username . ":" . $realm . ":" . $temp);
		$signature = md5($temp . ":" . $rdmkey);

		return $signature;
	}


	public function api_ambil_mobil()
	{
		$curl = curl_init();

		$opt = [
			"userName" => $this->username, 
			"ipAddress" => "",
			'client_type' => "WINPC_V1"
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url."/admin/API/accounts/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($opt),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$r = json_decode($response);
			$realm = $r->realm;
			$randomkey = $r->randomKey;

			// $s = $this->signiture($this->config->item('password_dss'),$this->config->item('username_dss'),$r->realm,$r->randomKey);
			$s = $this->signiture($this->password,$this->username,$realm,$randomkey);

			$this->second_login($s,$randomkey,'mobil');
		}
	}

    public function api_ambil_motor()
	{
		$curl = curl_init();

		$opt = [
			"userName" => $this->username, 
			"ipAddress" => "",
			'client_type' => "WINPC_V1"
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url."/admin/API/accounts/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($opt),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$r = json_decode($response);
			$realm = $r->realm;
			$randomkey = $r->randomKey;

			// $s = $this->signiture($this->config->item('password_dss'),$this->config->item('username_dss'),$r->realm,$r->randomKey);
			$s = $this->signiture($this->password,$this->username,$realm,$randomkey);

			$this->second_login($s,$randomkey,'motor');
		}
	}

	public function api_camera()
	{
		$curl = curl_init();

		$opt = [
			"userName" => $this->username, 
			"ipAddress" => "",
			'client_type' => "WINPC_V1"
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url."/admin/API/accounts/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($opt),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$r = json_decode($response);
			$realm = $r->realm;
			$randomkey = $r->randomKey;

			// $s = $this->signiture($this->config->item('password_dss'),$this->config->item('username_dss'),$r->realm,$r->randomKey);
			$s = $this->signiture($this->password,$this->username,$realm,$randomkey);

			$this->second_login($s,$randomkey,'camera');
		}
	}

	public function second_login($signiture,$rdm,$kend)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url.'/admin/API/accounts/authorize',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"userName": "system", 
			"randomKey": "'.$rdm.'",
			"signature": "'.$signiture.'", 
			"clientType":	"WINPC_V1",
			"encryptType":	"MD5",
			"userType":	"0",
			"manufacturer":"",
			"publicKey":"" 
			
		}',
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json'
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);

		curl_close($curl);
		$x = json_decode($response,true);
		// echo json_encode($x);
		$this->token = $x['token'];
        if ($kend == 'mobil') {
            $this->get_kendaraan();
        }else if ($kend == 'motor') {
            $this->get_kendaraan_motor();
        }else if ($kend == 'camera') {
            $this->cek_camera();
        }
	}

	public function get_kendaraan()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url.'/admin/API/video-analyse/vehicle/record/page',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"pageInfo": {
				"pageSize": "50",
				"pageNo": "1"
			},
			"searchInfo": {
				"plateColor": [],
				"carBrand": [],
				"carType": [],
				"plate": [],
				"channelIds": [
					"1000007$1$0$2",
					"1000002$1$0$0",
					"1000000$1$0$9"
				],
				"carColor": []
			}
		   }',
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'X-Subject-Token: '.$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);

		$test = [];
		curl_close($curl);
		$x = json_decode($response,true);
		
		// Success img
		foreach ($x['data']['pageData'] as $k => $v) {

			$cek = $this->db->get_where('analytic_kend',['capture_time' => $v['captureTime']]);
			
			if ($cek->num_rows() == 0) {
				$send_data = [
					'kode_id' => $v['id'],
					'foto1' => $v['pictureUrl'],
					'foto2' => $v['plateImageUrl'],
					'channel_id' => $v['channelId'],
					'kendaraan' => 1,
					'type_kend_id' => $v['carType'],
					'type_kend' => $v['carTypeName'],
					'color_id' => $v['carColor'],
					'color' => $v['carColorName'],
					'capture_time' => $v['captureTime'],
					'ctddate' => date('Y-m-d'),
					'ctdtime' => date('H:i:s')
				];
				array_push($test, $send_data);
			}
		}

        echo $this->add_analytic_kend($test);
		// echo json_encode($test);
	}

	public function get_kendaraan_motor()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url.'/admin/API/video-analyse/non-vehicle/record/page',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"pageInfo": {
			"pageSize": "50",
			"pageNo": "1"
			},
			"searchInfo": {
				"startTime": "1616605200",
				"endTime": "1616778000",
				"riderNum": "",
				"carType": [],
				"channelIds": [
					"1000007$1$0$2",
					"1000002$1$0$0",
					"1000000$1$0$9"
				],
				"carColor": []
			}
		   }',
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'X-Subject-Token: '.$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);

		$test = [];
		curl_close($curl);
		$x = json_decode($response,true);
		
		// // Success img
		foreach ($x['data']['pageData'] as $k => $v) {
			$cek = $this->db->get_where('analytic_kend',['capture_time' => $v['captureTime']]);
			
			if ($cek->num_rows() == 0) {
				$send_data = [
					'kode_id' => $v['id'],
					'foto1' => $v['pictureUrl'],
					'foto2' => $v['carImageUrl'],
					'channel_id' => $v['channelId'],
					'kendaraan' => 2,
					'type_kend_id' => $v['carType'],
					'type_kend' => $v['carTypeName'],
					'color_id' => $v['carColor'],
					'color' => $v['carColorName'],
					'capture_time' => $v['captureTime'],
					'ctddate' => date('Y-m-d'),
					'ctdtime' => date('H:i:s')
				];
				array_push($test, $send_data);
			}
			
		}

		echo $this->add_analytic_kend($test);
		// echo json_encode($test);
	}
	
    //Untuk memasukan data ke tabel pelang_kend dari sistem lain 
    public function add_analytic_kend($inp=[])
    {

       $rsp = [
           'msg' => 'failed add vehicle violation',
           'status' => false
       ];

       if (@count($inp) > 0) {
            $this->db->insert_batch('analytic_kend', $inp);
            $x = $this->db->affected_rows();
            if ($x > 0) {
                $rsp['status'] = $x;
                $rsp['msg'] = 'Success add vehicle violation';
                $rsp['data'] = $inp;
            }
       }
      
       echo json_encode($rsp);
    }

	//Login pertama
	public function login()
	{
		$curl = curl_init();

		$opt = [
			"userName" => $this->config->item('username_dss'), 
			"ipAddress" => "",
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->config->item('url_api')."admin/API/accounts/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($opt),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$r = json_decode($response);
			$this->realm = $r->realm;
			$this->randomKey = $r->randomKey;
			$this->publicKey = $r->publickey;
			$signiture = $this->signiture();
			$publickey = $this->publicKey();
			$randomkey = $r->randomKey;
		}

		// $this->test2();
	}

	public function test2()
	{
		// $this->second_login();
	}

	//Keep Alive
	public function keep_alive()
	{
		$curl = curl_init();

		$opt = [
			"mac" => $this->mac, 
			"signature" => $this->signiture(), 
			"userName" => $this->config->item('username_dss'), 
			"randomKey" => $this->randomKey, 
			"publicKey" => $this->publicKey(), 
			"encryptType" => "MD5", 
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->config->item('url_api')."admin/API/accounts/keepalive",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "PUT",
		// CURLOPT_POSTFIELDS => json_encode($opt),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"x-subject-token: ".$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}

	//cek jumlah kendaraa
	public function cek_jml_kend()
	{
		$curl = curl_init();

		$opt = [
			'signiture' => $this->signiture().':'.$this->token
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url."/OTMS/API/trafficFlow/getTrafficFlow",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => '{
			"data": {
			"page": 1,
			"rows": 20,
			"autoCount": 0,
			"devChnid": "1000000$1$0$0",
			"laneType": "1",
			"timeType": "1",
			"intervalType": "3",
			"startDate": "2021-03-16",
			"endDate": ""
			}
		   }',
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"X-Subject-Token: ".$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$r = json_decode($response);
			echo json_encode($r);
		}
	}

	//cek_camera
	public function cek_camera()
	{
		$curl = curl_init();

		$opt = [
			'signiture' => $this->signiture().':'.$this->token
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->url."/admin/API/tree/devices",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => '{
			"orgCode": "",
			"deviceCodes": [],
			"categories": []
		   }',
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"X-Subject-Token: ".$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$r = json_decode($response);
			echo json_encode($r);
		}
	}

	//Update Token
	public function update_token()
	{
		$curl = curl_init();

		$opt = [
			'signiture' => $this->signiture().':'.$this->token
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->config->item('url_api')."admin/API/accounts/updateToken",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($opt),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"x-subject-token: ".$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}

	//Update Token
	public function unauthorize()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->config->item('url_api')."admin/API/accounts/unauthorize ",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		// CURLOPT_POSTFIELDS => json_encode($opt),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"x-subject-token: ".$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}

	public function get_pelanggaran_kendaraan()
	{
		$curl = curl_init();
		$opt = [
				"data" => [ 
				  "page" =>  1, 
				  "rows" =>  20, 
				  "autoCount" =>  0, 
				  "areaIds" =>  [ 
					"6", "5", "4", "3", "2", "1" 
				  ],
				 "endTime" =>  "1595087999", 
				  "maxSpeed" =>  220, 
				  "minSpeed" =>  0, 
				  "peccancyTypes" =>  [ 
					"0", "1", "2" 
				  ],
				  "plateColor" =>  [ 
					"0", "1","2","3", "4", "5", "99", "100" 
				  ],
				  "plateNo" =>  "", 
				  "carNumAll" => "", 
				  "carNumColor" => "", 
				  "startTime" =>  "1595077999" 
				]
		];

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->config->item('url_api')."/OTMS/API/picRangeSpeed/getPicRangeSpeed",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "{
			data : {
				'page' :  1, 
				'rows' :  20, 
			}
		}",
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"x-subject-token: ".$this->token
		),
		));

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}

}
