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
		$grpby="gangguan,DATE_FORMAT(dtm,'%b %Y')";
        return $this->db->select($select)->where($where)->group_by($grpby)->order_by("gangguan,ym")->get("ssc_status_gangguan")->result();
    }
}



/* End of file MDares.php */
