<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MSsc extends CI_Model {

    private $t = 'v_ssc';
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


	public function sum($f_date_start,$f_date_end,$f_polda,$f_polres){
		$where=array();
		if($f_date_start!='') $where["tgl>="]=$f_date_start;
		if($f_date_end!='') $where["tgl<="]=$f_date_end;
		if($f_polda!='') $where['polda']=$f_polda;
		if($f_polres!='') $where['polres']=$f_polres;
		
		$qsscjln=$this->db->select("'pos_polisi' as txt, count(*) as jml")->where($where)->group_by("txt")->get_compiled_select("ssc_jalan");
		$qsscgan=$this->db->select("'gangguan' as txt, count(*) as jml")->where($where)->group_by("txt")->get_compiled_select("ssc_status_gangguan");
		$qsscpub=$this->db->select("'yan_publik' as txt, count(*) as jml")->where($where)->group_by("txt")->get_compiled_select("ssc_yan_publik");
		$qsscdar=$this->db->select("'yan_darurat' as txt, count(*) as jml")->where($where)->group_by("txt")->get_compiled_select("ssc_yan_darurat");
		//echo "$qsscjln UNION $qsscgan UNION $qsscpub UNION $qsscdar";
		return $this->db->query("$qsscjln UNION $qsscgan UNION $qsscpub UNION $qsscdar")->result();
	}
    
	public function dt_ssc()
    {
         // Definisi
         $condition = [];
         $data = [];
		 
		$f_date_start = $this->input->post("f_date_start");
		$f_date_end = $this->input->post("f_date_end");
		if($f_date_start!='') array_push($condition,array('where','pk.tgl>=',$f_date_start));
        if($f_date_end!='') array_push($condition,array('where','pk.tgl<=',$f_date_end));
        $f_polda = $this->input->post("f_polda");
		$f_polres = $this->input->post("f_polres");
		if($f_polda!='') array_push($condition,array('where','pk.polda=',$f_polda));
        if($f_polres!='') array_push($condition,array('where','pk.polres=',$f_polres));
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t. ' as pk';
         // Set orderable column fields
         $CI->dt->column_order = ['pk.tbl','pk.jns','pk.jenis','pk.nama','pk.tgl','p.da_nam','p2.res_nam'];
         // Set searchable column fields
         $CI->dt->column_search = ['pk.tbl','pk.jns','pk.jenis','pk.nama','p.da_nam','p2.res_nam'];
         // Set select column fields
         $CI->dt->select = 'pk.tbl,pk.jns,pk.jenis,pk.nama,pk.tgl,p.da_nam,p2.res_nam';
         // Set default order
         $CI->dt->order = ['pk.tbl' => 'desc'];
         
           $cons = ['join','polda as p','p.da_id = pk.polda','left'];
           array_push($condition,$cons);
		   $cons = ['join','polres as p2','p2.res_id = pk.polres','left'];
           array_push($condition,$cons);
           
        //    $cons = ['join','polres as ps','ps.res_id = pk.polres','inner'];
        //    array_push($condition,$cons);
         
         // Fetch member's records
         $dataTabel = $this->dt->getRows($_POST, $condition);
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $dt->tbl,
                 $dt->jns,
                 $dt->jenis,
                 $dt->nama,
                 tgl_indo($dt->tgl),
                 $dt->da_nam,
                 $dt->res_nam
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $this->dt->countAll($condition),
             "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    }
    
	public function sets(){
		return $this->db->select("jns")->distinct()->get("v_ssc")->result_array();
	}
    public function datasets($start,$end,$polda,$polres){
		$select="jns as z,DATE_FORMAT(tgl,'%b %Y') as x,COUNT(tgl) as y";
        $where=array("tgl>="=>$start,"tgl<="=>$end);
		//$join=array("pelapor","ttr_operator.pelapor_id=pelapor.id");
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("x")->get("v_ssc")->result_array();
	}
}

