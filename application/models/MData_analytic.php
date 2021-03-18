<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MData_analytic extends CI_Model {

    public function get_kendaraan($select='*',$arr=[])
    {
        $this->db->select($select);
        
        if (!empty($arr['channel_id']) && $arr['channel_id'] != '') {
            $this->db->where('channel_id', $arr['channel_id']);
        }

        if (!empty($arr['type_kend_id']) && $arr['type_kend_id'] != '') {
            $this->db->where('type_kend_id', $arr['type_kend_id']);
        }

        if (!empty($arr['capture_time']) && $arr['capture_time'] != '') {
            $this->db->where('capture_time', $arr['capture_time']);
        }

        if (!empty($arr['ctddate']) && $arr['ctddate'] != '') {
            $this->db->where('ctddate', $arr['ctddate']);
        }

        if (!empty($arr['kendaraan']) && $arr['kendaraan'] != '') {
            $this->db->where('kendaraan', $arr['kendaraan']);
        }

       $q = $this->db->get('analytic_kend');
       return $q;
    }

    public function get_kendaraan_group($select='*',$arr=[],$group='')
    {
        $this->db->select($select);

        if (!empty($arr['channel_id']) && $arr['channel_id'] != '') {
            $this->db->where('channel_id', $arr['channel_id']);
        }

        if (!empty($arr['type_kend_id']) && $arr['type_kend_id'] != '') {
            $this->db->where('type_kend_id', $arr['type_kend_id']);
        }

        if (!empty($arr['capture_time']) && $arr['capture_time'] != '') {
            $this->db->where('capture_time', $arr['capture_time']);
        }

        if (!empty($arr['ctddate']) && $arr['ctddate'] != '') {
            $this->db->where('ctddate', $arr['ctddate']);
        }

        if (!empty($arr['kendaraan']) && $arr['kendaraan'] != '') {
            $this->db->where('kendaraan', $arr['kendaraan']);
        }

        $this->db->group_by($group);

       
       $q = $this->db->get('analytic_kend');
       return $q;
    }

    public function api_total_kendaraan($channel_id='')
    {
        if ($channel_id == '') {
            return ['jml' => "0"];
        }

        $mda = $this->get_kendaraan_group('count(*) as jml',[
            'channel_id' => $channel_id
        ],'channel_id');
        
        $data = [];
        $data = $mda->row_array();
        if ($mda->num_rows() == 0 && $mda->row() == null) {
            $data = ['jml' => "0"];
        }

        return $data;
    }
}
