<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Data_excel extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('excel_model');
        $this->isLoggedIn();   
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
	
	function export()
    {
        if($this->isAdmin() == TRUE && $this->isBendahara() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            //$this->load->model('artikel_depan_model');
			
			//$category = $this->uri->segment(2);
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
			
            $this->load->library('pagination');
            
            $count = $this->excel_model->excelListingCount($searchText);

			$returns = $this->paginationCompress ( "Excel/", $count, 20 );
            
            $data['userRecords'] = $this->excel_model->excelListing($searchText, $returns["page"], $returns["segment"]);
            //$data['kategori'] = $this->db->query('select tipe_jenis from tbl_material group by tipe_jenis')->result();
            $this->global['pageTitle'] = 'Administrator : Listing Artikel';
            
            $this->loadViews("admin/excel/export-excel", $this->global, $data, NULL);
        }
    }
	
	function download()
    {
        if($this->isAdmin() == TRUE && $this->isBendahara() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            //$this->load->model('artikel_depan_model');
			
			//$category = $this->uri->segment(2);
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
			
            $this->load->library('pagination');
            
            $count = $this->excel_model->excelListingCount($searchText);

			$returns = $this->paginationCompress ( "Download/", $count, 20 );
            
            $data['userRecords'] = $this->excel_model->excelListing($searchText, $returns["page"], $returns["segment"]);
            $data['kategori'] = $this->db->query('select tipe_jenis from tbl_material group by tipe_jenis')->result();
            $this->global['pageTitle'] = 'Administrator : Listing Artikel';
            
            $this->loadViews("admin/excel/import-excel", $this->global, $data, NULL);
        }
    }

}