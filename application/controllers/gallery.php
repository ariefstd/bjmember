<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Gallery extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('gallery_model');
        $this->isLoggedIn();   
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
	
	function index()
    {
        if($this->isSekertaris() == TRUE && $this->isAdmin() == TRUE && $this->isBendahara() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            //$this->load->model('artikel_depan_model');
			$data['category'] = $this->uri->segment(1);
			
			$categori = $this->uri->segment(1);
			$cat = strtolower($categori);
			
			$category = $this->uri->segment(2);
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
			if ($this->input->post('upload')) {
				$category = $_POST['category'];
				$imgId = $_POST['imgId'];
				$title=$_POST['judul'];
				$key=$_POST['key'];
				$update=$_POST['update'];
				$publishBy=$this->vendorId;
				$position=$_POST['position'];
				$this->gallery_model->do_upload($category, $imgId, $title, $update, $key, $publishBy, $position);
			}
			
            $this->load->library('pagination');
            
            $count = $this->gallery_model->galleryListingCount($searchText);

			$returns = $this->paginationCompress ( "Gallery/", $count, 10 );
            
            $data['userRecords'] = $this->gallery_model->galleryListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Administrator : List Gallery';
            //$categori
            $this->loadViews("admin/gallery/global", $this->global, $data, NULL);			
        }
    }
	
	public function addGallery()
    {  
		$data['category'] = $this->uri->segment(1);			
		$categori = $this->uri->segment(1);
		$cat = strtolower($categori);
			
		if($this->isSekertaris() == TRUE && $this->isAdmin() == TRUE && $this->isBendahara() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
		//load the view
        $this->global['pageTitle'] = 'Administrator : Dashboard';
		$data['judulnya'] = "test";
		$data= 'admin/gallery/add-gallery';
        //$this->load->view('includes/template', $data, NULL , NULL);
        $this->loadViews($data, $this->global,  NULL);  
		}
    }
	
	public function add()
    {  
		$data['category'] = $this->uri->segment(1);			
		$categori = $this->uri->segment(1);
		$cat = strtolower($categori);
			
		if($this->isSekertaris() == TRUE && $this->isAdmin() == TRUE && $this->isBendahara() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
		//load the view
        $this->global['pageTitle'] = 'Administrator : Dashboard';
		$data['judulnya'] = "test";
		$data= 'admin/gallery/add';
        //$this->load->view('includes/template', $data, NULL , NULL);
        $this->loadViews($data, $this->global,  NULL);  
		}
    }
	
	public function update()
    {
        //product id 
		$data['category'] = $this->uri->segment(2);
		$data['segmen'] = $this->uri->segment(3);
		$data['id_article'] = $this->uri->segment(4);
        $id = $this->uri->segment(4);
		$category = ($this->uri->segment(2));
		$segmen = $this->uri->segment(3);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('judul', 'judul', 'required');
			$this->form_validation->set_rules('key', 'key', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
                    'article_title' => $this->input->post('judul'),
					'article_key' => $this->input->post('key'),
					'author' => $this->input->post('author'),
					'content_article' => $this->input->post('berita'),
                );
                //if the insert has returned true then we show the flash message
                if($this->gallery_model->update_artikel($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }	
				redirect('Gallery/'.$category.'/update/'.$id.'');
                //redirect('admin/kategori/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['artikel'] = $this->gallery_model->get_artikel_by_id($id);
        //load the view
		$this->global['pageTitle'] = 'Administrator : Dashboard';
        //$this->load->view('includes/template', $data, NULL , NULL);
        $this->loadViews("admin/Gallery/edit", $this->global, $data, NULL);

    }//update
	
	
	function deleteGallery()
    {
		
        if($this->isSekertaris() == TRUE && $this->isAdmin() == TRUE && $this->isBendahara() == TRUE )
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $artikelId = $this->input->post('gallId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->gallery_model->delete($artikelId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	
	// this is usless, maybe next time
    public function delete_artikel()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->artikel_model->delete_artikel($id);
        redirect('Artikel');
    }//edit

}