<?php
class Products_model extends CI_Model {
 
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
	
	function menusListing($searchText = '', $per_page, $segment)
	{
        $this->db->select('*');
		$this->db->from('tbl_menu');
		
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  article_key  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
		
        //$this->db->where('category', 'kegiatan');
        $this->db->where('isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function menusCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_menu');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  article_key  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('category', 'front_page');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	
    function userListing($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'front_page');
        $this->db->where('isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function userListingCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'front_page');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	// Database for kegiatan management system
	function kegiatan($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'kegiatan');
        $this->db->where('isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function kegiatanCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'kegiatan');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	function arsip($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'arsip');
        $this->db->where('isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function arsipCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'arsip');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	function unggulan($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'unggulan');
        $this->db->where('isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function unggulanCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'unggulan');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	//Database for pemerintahan management system
	function pemerintahan($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'pemerintahan');
        $this->db->where('isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function pemerintahanCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'pemerintahan');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	//Database for dokumentasi management system
	function dokumentasi($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'dokumentasi');
        $this->db->where('isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function dokumentasiCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_artikel');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
                            OR  content_article  LIKE '%".$searchText."%'
                            OR  category  LIKE '%".$searchText."%'
							OR  position  LIKE '%".$searchText."%'
							OR  author  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        $this->db->where('category', 'dokumentasi');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	function commentListing($searchText = '', $per_page, $segment)
	{
        $this->db->select('A.article_title as title, C.id as id, C.name as name, C.email as email, C.comment as comment');
        $this->db->from('tbl_artikel as A');
        $this->db->join('tbl_comments as C', 'C.id_post = A.id','left');
		
        if(!empty($searchText)) {
            $likeCriteria = "(C.name  LIKE '%".$searchText."%'
                            OR  C.email  LIKE '%".$searchText."%'
                            OR  C.article_key  LIKE '%".$searchText."%'
							OR  C.comment  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
		
        //$this->db->where('category', 'kegiatan');
        $this->db->where('C.isDeleted !=', 1);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function commentCount($searchText = '')
    {
        $this->db->select('A.article_title as title, C.id as id, C.name as name, C.email as email, C.comment as comment');
        $this->db->from('tbl_artikel as A');
        $this->db->join('tbl_comments as C', 'C.id_post = A.id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(C.name  LIKE '%".$searchText."%'
                            OR  C.email  LIKE '%".$searchText."%'
                            OR  C.article_key  LIKE '%".$searchText."%'
							OR  C.comment  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('category', 'front_page');
        $this->db->where('C.isDeleted !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	function pemerintahansCount(){
		//$this->db->select_sum('article_title');
		//$this->db->from('tbl_artikel');
		$this->db->where('isDeleted !=', 1);
		$this->db->where('category', 'pemerintahan');
		$query = $this->db->get('tbl_artikel');
		return ($query->num_rows());
	}
	function kegiatansCount(){
		//$this->db->select_sum('article_title');
		//$this->db->from('tbl_artikel');
		$this->db->where('isDeleted !=', 1);
		$this->db->where('category', 'kegiatan');
		$query = $this->db->get('tbl_artikel');
		return ($query->num_rows());
	}
	function dokumentasisCount(){
		//$this->db->select_sum('article_title');
		//$this->db->from('tbl_artikel');
		$this->db->where('isDeleted !=', 1);
		$this->db->where('category', 'dokumentasi');
		$query = $this->db->get('tbl_artikel');
		return ($query->num_rows());
	}
	function footersCount(){
		//$this->db->select_sum('article_title');
		//$this->db->from('tbl_artikel');
		$this->db->where('isDeleted !=', 1);
		$this->db->where('category', 'footer');
		$query = $this->db->get('tbl_artikel');
		return ($query->num_rows());
	}
	function frontpagesCount(){
		//$this->db->select_sum('article_title');
		//$this->db->from('tbl_artikel');
		$this->db->where('isDeleted !=', 1);
		$this->db->where('category', 'front_page');
		$query = $this->db->get('tbl_artikel');
		return ($query->num_rows());
	}
	function commentCounts(){
		//$this->db->select_sum('article_title');
		//$this->db->from('tbl_artikel');
		$this->db->where('isDeleted !=', 1);
		//$this->db->where('category', 'front_page');
		$query = $this->db->get('tbl_comments');
		return ($query->num_rows());
	}
	
	function totalCount(){
		//$this->db->select_sum('article_title');
		//$this->db->from('tbl_artikel');
		//$this->db->where('category', 'dokumentasi');
		$this->db->where('isDeleted !=', 1);
		$query = $this->db->get('tbl_artikel');
		return ($query->num_rows());
	}
	
	function addNewArtikel($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_artikel', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	public function get_menu_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_menu');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    } 
	
	
	function addNewMenu($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_menu', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	
	function store_artikel($data)
    {
		$insert = $this->db->insert('tbl_artikel', $data);
	    return $insert;
	}
	
	public function get_artikel_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    } 
	function update_artikel($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('tbl_artikel', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	function getArtikelRoles()
    {
        $this->db->select('*');
        $this->db->from('tbl_artikel');
        $this->db->where('isDeleted !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	function deleteArtikel($artikelId, $userInfo)
    {
        $this->db->where('id', $artikelId);
        $this->db->update('tbl_artikel', $userInfo);
        
        return $this->db->affected_rows();
    }
	
	function deleteMenu($menuId, $menuInfo)
    {
        $this->db->where('id', $menuId);
        $this->db->update('tbl_menu', $menuInfo);
        
        return $this->db->affected_rows();
    }
	function deleteArtikelMenu($menuId, $menuInfo)
    {
        $this->db->where('image', $menuId);
        $this->db->update('tbl_artikel', $menuInfo);
        
        return $this->db->affected_rows();
    }
	
	function deleteComment($commentId, $commentInfo)
    {
        $this->db->where('id', $commentId);
        $this->db->update('tbl_comments', $commentInfo);
        
        return $this->db->affected_rows();
    }
	
	function menuDetail($key){
		$this->db->select('*');
		$this->db->from('tbl_menu');
		$this->db->where('article_key', $key);
		$query = $this->db->get();
		return $query->result_array(); 
	}
}
