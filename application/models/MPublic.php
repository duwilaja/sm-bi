
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MPublic extends CI_Model {

    private $t = '';
    public $see = '*';

    public function __construct()
    {
        parent::__construct();
    }

    public function get($t='',$id='',$where='',$groupby='')
    {
        $this->db->select($this->see);
        
        if ($groupby != '') {
            $this->db->group_by($groupby);
        }

        if($id != ''){
            $q = $this->db->get_where($t,['rowid' => $id]);
        }else if($where != ''){
            $this->db->where($where);
            $q = $this->db->get($t);
        }else{
            $q = $this->db->get($t);
        }
        return $q;
    }
    
}