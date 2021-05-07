<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_indicar extends CI_Controller {
	
	public function __construct()
	{
        date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
        $this->load->helper('string');
        $this->load->model('Mindicar','mic');
		// Your own constructor code
	}

    function cek_token(){ // cek exp date
        echo json_encode($this->mic->cek_token(1));
    }
    
    function dt_pengaduan()
    {
        echo $this->mic->dt_pengaduan();
    }
    function dt_list_petugas()
    {   
        echo $this->mic->dt_list_petugas();
    }
    function dt_kendaraan()
    {

        // $data = $this->mic->get_http();
        // $result = $data['dataset'];
        // $insert =[];
        // foreach ($result as $rs) {
        //     array_push($insert, array(
        //         'rowid' => md5(random_string('alnum',11)),
        //         'kendaraanid' => $rs['kendaraanid'],
        //         'kendaraannama' => $rs['kendaraannama'],
        //         'kendaraannopol' => $rs['kendaraannopol'],
        //         'latitude' => $rs['latitude'],
        //         'longitude' => $rs['longitude'],
        //         'ctddate' => date('Y-m-d H:i:s'),

        //     ));
        // }
        $this->db->insert_batch('indicar_data_kendaraan', $insert);
    //   echo $this->mic->dt_kendaraan();
    }
    function detail_kendaraan()
    {
        $kendaraanid = $this->input->post('kendaraanid');
        echo $this->mic->detail_kendaraan($kendaraanid);
    }
    function refresh_pengaduan()
    {
        echo $this->mic->refresh_pengaduan();
    }

    function tambah_kendaraan()
    {
        $dt = $this->mic->get_token();
        $rowid = md5(random_string('alnum',11));
        $url = "http://api.solo.indicar.id/kendaraan/tambah";
        $token = $dt['token'];
        $table = "indicar_data_kendaraan";
        $insert_api = array(
            "kendaraannama"=> $this->input->post('t_nama'),
            "kendaraannopol"=> $this->input->post('t_nopol'),
            "latitude"=> $this->input->post('t_latitude'),
            "longitude"=> $this->input->post('t_longitude')
        );
        $insert_db = array(
            "rowid"=> $rowid,
            "kendaraannama"=> '',
            "kendaraannama"=> $this->input->post('t_nama'),
            "kendaraannopol"=> $this->input->post('t_nopol'),
            "latitude"=> $this->input->post('t_latitude'),
            "longitude"=> $this->input->post('t_longitude')
        );
        echo $this->mic->tambah($url,$token,$table,$insert_api,$insert_db);
    }

    function edit_kendaraan()
    {
        $dt = $this->mic->get_token();
        $url = "http://api.solo.indicar.id/kendaraan/update";
        $token = $dt['token'];
        $table = "indicar_data_kendaraan";
        $kendaraanid = $this->input->post('kendaraanid');
        $kendaraannama = $this->input->post('t_nama');
        // 
        $where = array(
            "kendaraanid"=> $kendaraanid
        );
        $update_api = array(
            "kendaraanid"=> $kendaraanid,
            "kendaraannama"=> $kendaraannama,
        );
        $update_db = array(
            "kendaraanid"=> $kendaraanid,
            "kendaraannama"=> $kendaraannama,
        );
        echo $this->mic->tambah($where,$url,$token,$table,$update_api,$update_db);
    }

    function delete_kendaraan()
    {
        $kendaraanid = $this->input->post('kendaraanid');
        echo $this->mic->proses_delete($kendaraanid);
    }
    
    // Realtime Indicar
    public function get_realtime_indicar()
    {
        echo $this->mic->realtime_indicar();
    }

}