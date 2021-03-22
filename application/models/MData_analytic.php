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
            if ($arr['filter'] == 'hari') {
                $this->db->where('ctddate', $arr['ctddate']);
            }else if ($arr['filter'] == 'minggu'){
                $this->db->where('WEEK(ctddate) = WEEK("'.$arr['ctddate'].'")');
            }else if ($arr['filter'] == 'bulan'){
                $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
            }else if ($arr['filter'] == 'tahun'){
                $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            }else{
                $this->db->where('ctddate', $arr['ctddate']);
            }
        }

        if (!empty($arr['kendaraan']) && $arr['kendaraan'] != '') {
            $this->db->where('kendaraan', $arr['kendaraan']);
        }

        $this->db->group_by($group);
       
        $q = $this->db->get('analytic_kend');
        return $q;
    }

    public function detail_analytic_cctv($arr=[])
    {
        $data = [
            'jml' => 0
        ];

        if (empty($arr)) return $data;

        $cctv = $this->db->get_where('cctv', ['id' => $arr['id']]);
        $cctv1 = $cctv->row();
        if ($cctv->num_rows() == 0 || $cctv1->channel_id == '') return $data;

        // Kendaraan berdasarkan filter hari ini
        if (!empty($arr['filter'])) {
            $data['jml'] = (float)$this->get_kendaraan_group('count(*) as jml',['ctddate' => $arr['ctddate'],'channel_id' => $cctv1->channel_id,'filter' => $arr['filter']],'channel_id')->row_array()['jml'];
        }else{
            $data['jml'] = (float)$this->get_kendaraan_group('count(*) as jml',['channel_id' => $cctv1->channel_id],'channel_id')->row_array()['jml'];
        }

        return $data;
    }

    public function total_kendaraan($channel_id='')
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
