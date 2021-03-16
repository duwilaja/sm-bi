<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MSsc extends CI_Model {

    private $t = '';
    public $see = '*';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id='',$where='',$groupby='')
    {
        $this->db->select($this->see);
        
        if ($groupby != '') {
            $this->db->group_by($groupby);
        }

        if($id != ''){
            $q = $this->db->get_where($this->t,['id' => $id]);
        }else if($where != ''){
            $this->db->where($where);
            $q = $this->db->get($this->t);
        }else{
            $q = $this->db->get($this->t);
        }
        return $q;
    }


    // total keseluruhan ssc

    public function ssc_jml_ambulan($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('ssc_yan_darurat');
        $this->db->where('yan','Ambulance');
        if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    public function ssc_jml_pospol($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_publikasi');
       if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    public function ssc_jml_patrol($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_koordinasi');
       if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    public function ssc_koordinasi($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('count(*) as total');
        $this->db->from('tmc_prasarana_publik');
       if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('polres', $polres);
        }
        $dt = $this->db->get()->result();
        foreach ($dt as $key) {
            $total = $key->total;
        }

        return $total;


    }
    // end total


    
    
}

