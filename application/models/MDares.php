<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// 
class MDares extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_polda(){
        $query = $this->db->get('polda');
        return $query;  
    }
 
    public function get_polres($polda){
        $query = $this->db->get_where('polres', array('polda' => $polda));
        return $query;
    }
}
/* End of file MDares.php */
