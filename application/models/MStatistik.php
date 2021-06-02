<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// 
class MStatistik extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_ssc_gangguan($start,$end,$polda,$polres)
    {
		$select="gangguan,DATE_FORMAT(dtm,'%b %Y') as ym,COUNT(gangguan) as cnt";
        $where=array("dtm>="=>$start,"dtm<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="gangguan,DATE_FORMAT(dtm,'%b %Y')";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("gangguan,ym")->get("ssc_status_gangguan")->result();
    }
	public function get_ais_laka($start,$end,$polda,$polres)
    {
		$select="DATE_FORMAT(tanggal,'%b %Y') as ym,SUM(md) as md,SUM(lb) as lb,SUM(lr) as lr,SUM(md+lb+lr) as k";
        $where=array("tanggal>="=>$start,"tanggal<="=>$end);
		if($polda!=''){
			$where+=array("da"=>$polda);
		}
		if($polres!=''){
			$where+=array("res"=>$polres);
		}
		$grpby="DATE_FORMAT(tanggal,'%b %Y')";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("ym")->get("ais_laka")->result();
    }
	
	public function get_tar_sim($start,$end,$polda,$polres)
    {
		$select="DATE_FORMAT(tanggal,'%b %Y') as ym,sim,SUM(penindakan) as penindakan,SUM(jml) as jml";
        $where=array("tanggal>="=>$start,"tanggal<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="DATE_FORMAT(tanggal,'%b %Y'),sim";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("ym")->get("tar_data")->result();
    }
	public function get_tar_pelanggaran($start,$end,$polda,$polres)
    {
		$select="pelanggaran,usia,SUM(jml) as jml";
        $where=array("tanggal>="=>$start,"tanggal<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="pelanggaran,usia";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("pelanggaran,usia")->get("tar_data")->result();
    }
	
	public function get_target_laka($start,$end,$polda,$polres)
    {
		$select="'Target' as z,thn as x,SUM(jml) as y";
        $where=array("thn>="=>$start,"thn<="=>$end);
		if($polda!=''){
			$where+=array("da"=>$polda);
		}
		if($polres!=''){
			$where+=array("res"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("x")->get("target_laka")->result();
    }
	public function get_jml_laka($start,$end,$polda,$polres,$axis="thn")
    {
		$select="'Kejadian' as z,$axis as x,SUM(jml) as y";
        $where=array("tanggal>="=>$start,"tanggal<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("x")->get("ais_laka")->result();
    }
	public function get_laka_axis($start,$end,$polda,$polres,$axis="lokasi")
    {
		$this->db->distinct();
		$select=$axis;
        $where=array("tanggal>="=>$start,"tanggal<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->where($where)->get("ais_laka")->result_array();
    }
	public function get_laka_kor($start,$end,$polda,$polres,$axis="lokasi")
    {
		$select="'Korban' as z,$axis as x,SUM(md+lb+lr) as y";
        $where=array("tanggal>="=>$start,"tanggal<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("x")->get("ais_laka")->result();
    }
	public function get_laka_die($start,$end,$polda,$polres,$axis="lokasi")
    {
		$select="'Meninggal' as z,$axis as x,SUM(md) as y";
        $where=array("tanggal>="=>$start,"tanggal<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("x")->get("ais_laka")->result_array();
    }
	
	public function get_cops($start,$end,$polda,$polres){
		$select="nrp,nama";
        $where=array("isactive"=>'Y');
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
        return $this->db->select($select)->where($where)->get("persons")->result_array();
	}
	public function get_kinerja($start,$end,$polda,$polres)
    {
		$select="'Kinerja' as z,nrp as x,COUNT(nrp) as y";
        $where=array("tgl>="=>$start,"tgl<="=>$end);
		if($polda!=''){
			$where+=array("polda"=>$polda);
		}
		if($polres!=''){
			$where+=array("polres"=>$polres);
		}
		$grpby="z,x";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("x")->get("v_kinerja")->result_array();
    }
	
}



/* End of file MStatistik.php */
