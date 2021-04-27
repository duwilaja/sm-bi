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

    public function get_kendaraan_group($select='*',$arr=[],$group='',$limit='')
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
                $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
                $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            }else if ($arr['filter'] == 'bulan'){
                $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
                $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            }else if ($arr['filter'] == 'tahun'){
                $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            }else{
                $this->db->where('ctddate', $arr['ctddate']);
            }
        }

        if (!empty($arr['kendaraan']) && $arr['kendaraan'] != '') {
            $this->db->where('kendaraan', $arr['kendaraan']);
        }

        if ($limit != '') {
            $this->db->limit($limit);
        }
        
        $this->db->order_by($group, 'desc');
        if (!empty($arr['filter_grp'])) {
            if ($arr['filter_grp'] == 'hari') {
                $this->db->group_by('DATE('.$group.')');
            }else if ($arr['filter_grp'] == 'minggu') {
                $this->db->group_by('WEEK('.$group.')');
            }else if ($arr['filter_grp'] == 'minggu') {
                $this->db->group_by('WEEK('.$group.')');
            }else if ($arr['filter_grp'] == 'bulan') {
                $this->db->group_by('MONTH('.$group.')');
            }else if ($arr['filter_grp'] == 'tahun') {
                $this->db->group_by('YEAR('.$group.')');
            }
        }else{
             $this->db->group_by($group);
        }
       
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

    public function total_kendaraan($channel_id='',$filter="")
    {
        if ($channel_id == '') {
            return ['jml' => "0"];
        }
        $date = '';
        if($filter != '') $date = date('Y-m-d');

        $mda = $this->get_kendaraan_group('count(*) as jml',[
            'channel_id' => $channel_id,
            'filter' => $filter,
            'ctddate' => $date
        ],'channel_id');
        
        $data = [];
        $data = $mda->row_array();
        if ($mda->num_rows() == 0 && $mda->row() == null) {
            $data = ['jml' => "0"];
        }

        return $data;
    }

    public function analitik_bar_counting()
    {
        $jml = [];
        
        $q = $this->get_kendaraan_group('count(*) as jml,date(ctddate) as tgl','','ctddate');

        foreach ($q->result() as $k => $v) {
            $jml[$k] = (float)$v->jml;
        }

        return $jml;
    }

    public function total_counting($arr=[])
    {
        $jml = [];
        $data = [
            'jml' => $jml
        ];

        if (isset($arr['cctv_id'])) {
            $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
            $arr['channel_id'] = $cctv->row()->channel_id;
        }

        $date = new DateTime($arr['ctddate']);
        $date->modify('-1 day');
        $d = $date->format('Y-m-d');

        $this->db->where('channel_id', $arr['channel_id']);

        if (!empty($arr['filter']) && $arr['filter']  == "today") {
            $this->db->where('date(ctddate) = date("'.$arr['ctddate'].'")');
        }else if (!empty($arr['filter']) && $arr['filter']  == "yesterday") {
            $this->db->where('date(ctddate) = date("'.$d.'")');
        }else if (!empty($arr['filter']) && $arr['filter']  == "total_all_without_today") {
            $this->db->where('date(ctddate) != date("'.$arr['ctddate'].'")');
        }

        $this->db->select('count(*) as jml');
        $q = $this->db->get('analytic_kend');
        return $q;
    }

    public function counting_bar_sparkline($arr=[])
    {
        $jml = [];
        $data = [
            'jml' => $jml
        ];

        if (isset($arr['cctv_id'])) {
            $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
            $arr['channel_id'] = $cctv->row()->channel_id;
         }


        $this->db->where('channel_id', $arr['channel_id']);

        $this->db->select('count(*) as jml');
        $this->db->group_by('ctddate');
        $this->db->order_by('ctddate', 'desc');
        
        $q = $this->db->get('analytic_kend');
        foreach ($q->result() as $k => $v) {
            $jml[$k] = (float)$v->jml;
        }

        $data['jml'] = $jml;

        return $data;
    }
    
    public function counting_bar_year($arr=[])
    {
        for ($i=1; $i <= 12 ; $i++) { 
            $bulan[$i] = 0;
        }
        $bulan_name = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];

        if (isset($arr['cctv_id'])) {
            $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
            $arr['channel_id'] = $cctv->row()->channel_id;
         }


        $this->db->where('channel_id', $arr['channel_id']);

        $arr['ctddate'] = !empty($arr['ctddate']) && $arr['ctddate'] != ''  ? $arr['ctddate'] : $arr['ctddate'] = date('Y-m-d');

        // if (isset($arr['ctdby']) && $arr['ctdby'] != '') {
        //     $this->db->where('ctdby', $arr['ctdby']);
        // }

        $this->db->select('count(*) as jml,month(ctddate) as bulan,year(ctddate) as tahun');
        $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
        $this->db->group_by('month(ctddate)');
        $this->db->order_by('month(ctddate)', 'asc');
        $q = $this->db->get('analytic_kend');
        foreach ($q->result() as $v) {
            @$bulan[(int)$v->bulan] = (int) $v->jml;
        }

        $data = [
            'name' => $bulan_name,
            'jml' => array_values($bulan)
        ];
        
        return $data;
    }

    public function counting_bar_bulan($arr=[])
    {
        $week_name = [];
        $week = [];
        if (isset($arr['cctv_id'])) {
            $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
            $arr['channel_id'] = $cctv->row()->channel_id;
         }


        $this->db->where('channel_id', $arr['channel_id']);
        $arr['ctddate'] = !empty($arr['ctddate']) && $arr['ctddate'] != ''  ? $arr['ctddate'] : $arr['ctddate'] = date('Y-m-d');

        // if (isset($arr['lokasi']) && $arr['lokasi'] != '') {
        //     $this->db->where('lokasi_id', $arr['lokasi']);
        // }

        // if (isset($arr['ctdby']) && $arr['ctdby'] != '') {
        //     $this->db->where('ctdby', $arr['ctdby']);
        // }

        $this->db->select('count(*) as jml,week(ctddate) as week,month(ctddate) as bulan,year(ctddate) as tahun');
        $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
        $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
        $this->db->group_by('week(ctddate)');
        $this->db->order_by('week(ctddate)', 'asc');
        $q = $this->db->get('analytic_kend');
        foreach ($q->result() as $v) {
            array_push($week_name,'Minggu ke '.$v->week);
            @$week[(int)$v->week] = (int) $v->jml;
        }

        $data = [
            'name' => $week_name,
            'jml' => array_values($week)
        ];
        return $data;
    }

    public function counting_bar_week($arr=[])
    {
        $day_name = [];
        $day = [];
        $hari = [
            0 => 'Senin',
            1 => 'Selasa',
            2 => 'Rabu',
            3 => 'Kamis',
            4 => "Jum'at",
            5 => 'Sabtu',
            6 => 'Minggu'
        ];

        if (isset($arr['cctv_id'])) {
            $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
            $arr['channel_id'] = $cctv->row()->channel_id;
         }


        $this->db->where('channel_id', $arr['channel_id']);

        $arr['ctddate'] = !empty($arr['ctddate']) && $arr['ctddate'] != ''  ? $arr['ctddate'] : $arr['ctddate'] = date('Y-m-d');

        // if (isset($arr['lokasi']) && $arr['lokasi'] != '') {
        //     $this->db->where('lokasi_id', $arr['lokasi']);
        // }

        // if (isset($arr['ctdby']) && $arr['ctdby'] != '') {
        //     $this->db->where('ctdby', $arr['ctdby']);
        // }

        $this->db->select('count(*) as jml,weekday(ctddate) as weekday,month(ctddate) as bulan,year(ctddate) as tahun');
        $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
        $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
        $this->db->where('WEEK(ctddate) = WEEK("'.$arr['ctddate'].'")');
        $this->db->group_by('weekday(ctddate)');
        $this->db->order_by('weekday(ctddate)', 'asc');
        $q = $this->db->get('analytic_kend');
        foreach ($q->result() as $v) {
            array_push($day_name,$hari[$v->weekday]);
            @$day[(int)$v->weekday] = (int) $v->jml;
        }

        $data = [
            'name' => $day_name,
            'jml' => array_values($day)
        ];
        
        return $data;
    }

    public function counting_bar_day($arr=[])
    {
        $time = [];
       
        if (isset($arr['cctv_id'])) {
            $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
            $arr['channel_id'] = $cctv->row()->channel_id;
         }


        $this->db->where('channel_id', $arr['channel_id']);

        $arr['ctddate'] = !empty($arr['ctddate']) && $arr['ctddate'] != ''  ? $arr['ctddate'] : $arr['ctddate'] = date('Y-m-d');

        // if (isset($arr['lokasi']) && $arr['lokasi'] != '') {
        //     $this->db->where('lokasi_id', $arr['lokasi']);
        // }

        $this->db->select('count(*) as jml,date(ctddate) as date,ctdtime');
        $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
        $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
        $this->db->where('WEEK(ctddate) = WEEK("'.$arr['ctddate'].'")');
        $this->db->group_by('ctdtime');
        $q = $this->db->get('analytic_kend');
        foreach ($q->result() as $v) {
            array_push($time,[
                $v->date.' '.$v->ctdtime,
                $v->jml
            ]);
        }

        $data = [
            'time' => $time,
        ];
        
        return $data;
    }

    // Traffic Category
    public function get_traffic_category($arr=[])
    {
        if (isset($arr['cctv_id'])) {
           $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
           $arr['channel_id'] = $cctv->row()->channel_id;
        }

        if (isset($arr['filter']) && $arr['filter'] == 'today') {
            $this->db->where('DATE(ctddate)',$arr['ctddate']);
        }else if(isset($arr['filter']) && $arr['filter'] == 'week'){
            $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
            $this->db->where('WEEK(ctddate) = WEEK("'.$arr['ctddate'].'")');
        }else if(isset($arr['filter']) && $arr['filter'] == 'month'){
            $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
        }else if(isset($arr['filter']) && $arr['filter'] == 'year'){
            $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
        }

        $this->db->select('count(*) as jml,type_kend,ctddate');
        $this->db->group_by('type_kend');
        $this->db->order_by('type_kend', 'asc');
        $x = $this->db->get_where('analytic_kend',['channel_id' => $arr['channel_id']]);
        return $x;
    }

    public function analitik_bar_echart_category($arr=[])
    {
        $name = [];
        $jml = [];

        if (isset($arr['cctv_id'])) {
          $cctv =  $this->db->get_where('cctv', ['id' => $arr['cctv_id']]);
          $arr['channel_id'] = $cctv->row()->channel_id;
        }

        $this->db->where('channel_id', $arr['channel_id']);
        $arr['ctddate'] = !empty($arr['ctddate']) && $arr['ctddate'] != ''  ? $arr['ctddate'] : $arr['ctddate'] = date('Y-m-d');

        if (isset($arr['filter']) && $arr['filter'] == 'today') {
            $this->db->where('DATE(ctddate) = DATE("'.$arr['ctddate'].'")');
        }else if(isset($arr['filter']) && $arr['filter'] == 'week'){
            $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
            $this->db->where('WEEK(ctddate) = WEEK("'.$arr['ctddate'].'")');
        }else if(isset($arr['filter']) && $arr['filter'] == 'month'){
            $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
            $this->db->where('MONTH(ctddate) = MONTH("'.$arr['ctddate'].'")');
        }else if(isset($arr['filter']) && $arr['filter'] == 'year'){
            $this->db->where('YEAR(ctddate) = YEAR("'.$arr['ctddate'].'")');
        }

        $this->db->select('count(*) as jml,type_kend,weekday(ctddate) as weekday,month(ctddate) as bulan,year(ctddate) as tahun');
       
        $this->db->group_by('type_kend');
        $this->db->order_by('type_kend', 'asc');
        $q = $this->db->get('analytic_kend');
        
        foreach ($q->result() as $k => $v) {
            @$name[$k] = $v->type_kend;
            @$jml[$k] = (float) $v->jml;
        }

        $data = [
            'name' => $name,
            'jml' => $jml
        ];
        
        return $data;
    }
}
