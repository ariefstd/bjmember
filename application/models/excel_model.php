<?php
class Excel_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
	
	function excelListing($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('property');
        if(!empty($searchText)) {
            $likeCriteria = "(web  LIKE '%".$searchText."%'
                            OR  id_key  LIKE '%".$searchText."%'
                            OR  name   LIKE '%".$searchText."%'
							OR  price  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('isDeleted', 0);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function excelListingCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('property');
        if(!empty($searchText)) {
            $likeCriteria = "(web  LIKE '%".$searchText."%'
                            OR  id_key  LIKE '%".$searchText."%'
                            OR  name   LIKE '%".$searchText."%'
							OR  price  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
    function old_excelListing($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_material');
        if(!empty($searchText)) {
            $likeCriteria = "(no_kode_lengkap  LIKE '%".$searchText."%'
                            OR  klp  LIKE '%".$searchText."%'
                            OR  tipe_jenis   LIKE '%".$searchText."%'
							OR  spesifikasi  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('isDeleted', 0);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function old_excelListingCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_material');
        if(!empty($searchText)) {
            $likeCriteria = "(no_kode_lengkap  LIKE '%".$searchText."%'
                            OR  klp  LIKE '%".$searchText."%'
                            OR  tipe_jenis   LIKE '%".$searchText."%'
							OR  spesifikasi  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	
}
?>	
