<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MEtle extends CI_Model {

    private $t = 'etle_sum';
    public $see = '*';

    public function __construct()
    {
        parent::__construct();
    }
    
    // public function get($id='',$where='',$groupby='')
    // {
    //     $this->db->select($this->see);
        
    //     if ($groupby != '') {
    //         $this->db->group_by($groupby);
    //     }

    //     if($id != ''){
    //         $q = $this->db->get_where($this->t,['id' => $id]);
    //     }else if($where != ''){
    //         $this->db->where($where);
    //         $q = $this->db->get($this->t);
    //     }else{
    //         $q = $this->db->get($this->t);
    //     }
    //     return $q;
    // }
    public function cek_polda($polda)
    {
       
        $query = $this->db->get_where('polda', array('da_id' => $polda));
        $row = $query->row();
        return $row->da_nam;
    }
    public function cek_polres($polres)
    {
        $query = $this->db->get_where('polres', array('res_id' => $polres));
        $row = $query->row();
        return $row->res_nam;
    }

    // total keseluruhan tmc
    public function jml_data_etle($start='',$end='',$polda='',$polres='')
    {
        // $total = 0;
        $this->db->select('fk.da_nam as da_nam,fn.res_nam as res_nam,tgl,sum(total) as total , sum(tervalidasi) as tervalidasi, sum(terberkas) as terberkas, sum(terkirim) as terkirim, sum(terkonfirmasi) as terkonfirmasi, sum(terbayar) as terbayar, sum(blokir) as blokir');
        $this->db->from('etle_sum as pk');
        $this->db->join('polda as fk','fk.da_id=pk.polda','left');
        $this->db->join('polres as fn','fn.res_id=pk.polres','left');
        
        if ($start != '') {
            $this->db->where('date(tgl) >=', $start);
            $this->db->where('date(tgl) <=', $end);
        }
        if ($polda != '') {
            $this->db->where('pk.polda', $polda);
        }
        if ($polres != '') {
            $this->db->where('pk.polres', $polres);
        }
    
       return $dt = $this->db->get()->result();

    }
    // end total


    
    
}

