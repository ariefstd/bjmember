<?php
class Gallery_model extends CI_Model {
	
	var $gallery_path;
	var $gallery_path_url;
	
	function Gallery_model() {
		//parent::Model();
		$this->load->database();
		$this->gallery_path = realpath(APPPATH . '../images');
		$this->gallery_path_url = base_url().'images/';
	}
	
	function do_upload($category,$imgId, $title, $update, $key, $publishBy, $position) {
		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->gallery_path . '/thumbs',
			'maintain_ration' => true,
			'width' => 150,
			'height' => 100
		);
		
		$filesnya = explode('/',$image_data['full_path']);
		$file = $filesnya[6];
		$categorys = $category;
		date_default_timezone_set('Asia/Jakarta');
		$mytime = date('Y-m-d H:i:s');
			
		$data=array(
			'image' => $file,
			'dtPublish' => $mytime,
			'isDeleted' => 0,
			'updatedDtm'=>$mytime,
			'updatedBy'=> 1,
			'category' => $category,
			'image_id' => $imgId,
			'article_title' => $title,
			'article_key' => $key,
			'publishedBy' => $publishBy,
			'position' => $position
		);
		
		$this->db->insert('tbl_gallery',$data);
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		//echo '<script type="text/javascript">alert("Image sudah terupload. Anda boleh melanjutkan");</script>';
		echo '<script type="text/javascript">window.location.href="'.base_url().'gallery/index";</script>';
		//redirect('Gallery');
		
	}
	
	function get_images() {
		
		$files = scandir($this->gallery_path);
		$files = array_diff($files, array('.', '..', 'thumbs'));
		
		$images = array();
		
		foreach ($files as $file) {
			$images []= array (
				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
			);
		}
		
		return $images;
	}
	
	function galleryListing($searchText = '', $per_page, $segment)
    {
        $this->db->select('*');
		$this->db->from('tbl_gallery');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
		//$this->db->where('category', 'pemerintahan');
        $this->db->where('isDeleted', 0);
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function galleryListingCount($searchText = '')
    {
        $this->db->select('*');
		$this->db->from('tbl_gallery');
        if(!empty($searchText)) {
            $likeCriteria = "(article_title  LIKE '%".$searchText."%'
							)";
            $this->db->where($likeCriteria);
        }
		//$this->db->where('category', 'pemerintahan');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return count($query->result());
    }
	
	//function galeryListing($searchText = '', $per_page, $segment)
	public function get_artikel_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_gallery');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    } 
	function update_artikel($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('tbl_gallery', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	
	function delete($userId, $userInfo)
    {
        $this->db->where('id', $userId);
        $this->db->update('tbl_gallery', $userInfo);
        
        return $this->db->affected_rows();
    }
	
}



