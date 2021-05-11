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
		$grpby="DATE_FORMAT(dtm,'%b %Y')";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("ym")->get("ais_laka")->result();
    }
}



/* End of file MDares.php */
