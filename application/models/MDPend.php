<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// 
class MDPend extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_data_pend($tahun=false)
    {
        // $this->db->select('dp.thn,provinsi_id,provinsi,dp.jml,dp.da');
        $this->db->select('dp.thn,p.id as provinsi_id, p.provinsi, dp.jml,dp.da');
        if($tahun) $this->db->where('dp.thn',$tahun);
        $this->db->order_by('dp.thn', 'asc');
        $this->db->join('provinsi p', 'p.id=dp.da', 'inner');
        $q = $this->db->get('data_penduduk dp');
        return $q;
    }
}



/* End of file MDares.php */
