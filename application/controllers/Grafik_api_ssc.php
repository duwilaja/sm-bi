<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_api_ssc extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MEri','eri');
        $this->load->model('MTmc','tmc');
        $this->load->model('MCyb','cyb');
        $this->load->model('MAis','ais');
        $this->load->model('MDares','dares');
        $this->load->model('MDPend','mdp');
        $this->load->model('MEtle','etle');
        $this->load->model('MSsc','ssc');
    }
    
    public function jml_data_ssc($start='',$end='',$polda='',$polres='')
    {
    
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $polda =$this->input->post('polda');
        $polres =$this->input->post('polres');
        $jml_ambulan = 0;
        $jml_pospol = 0;
        $jml_patrol = 0;
        $jml_fasker = 0;
        $jml_ambulan = $this->ssc->ssc_jml_ambulan($start,$end,$polda,$polres);
        $jml_pospol = $this->ssc->ssc_jml_pospol($start,$end,$polda,$polres);
        $jml_patrol = $this->ssc->ssc_jml_patrol($start,$end,$polda,$polres);
        $jml_fasker = $this->ssc->ssc_koordinasi($start,$end,$polda,$polres);
    
        $series =  [$jml_ambulan,$jml_pospol,$jml_patrol,$jml_fasker];
        echo json_encode($series);
    }

 
    
}