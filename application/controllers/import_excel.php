<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Author : Ismo Broto : git @ismo1106
 */

class Import_excel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->library('PHPExcel');
    }
    
    function upload() {
		$this->db->truncate("tbl_material");
        $fileName = time() . $_FILES['fileImport']['name'];                     // Sesuai dengan nama Tag Input/Upload

        $config['upload_path'] = './fileExcel/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('fileImport'))
            $this->upload->display_errors();

        $media = $this->upload->data('fileImport');
        $inputFileName = './fileExcel/' . $media['file_name'];

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
		
		//$row is row of data the first time to taken
        for ($row = 2; $row <= $highestRow; $row++) {                           // Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            
			/*
            $data = array(                                                      // Sesuaikan sama nama kolom tabel di database
                "no_kode_lengkap" => $rowData[0][0],
                "klp" => $rowData[0][1],
                "tipe_jenis" => $rowData[0][2],
				"item_uraian" => $rowData[0][3],
                "spesifikasi" => $rowData[0][4],
                "satuan" => $rowData[0][5],
				"no_kode"=>$rowData[0][6]
            );
            //$this->db->truncate("tbl_material");
            $insert = $this->db->insert("tbl_material", $data);
			*/
			
			$data = array(                                                      // Sesuaikan sama nama kolom tabel di database
                "web" => $rowData[0][0],
                "man_id" => $rowData[0][1],
                "id_key" => $rowData[0][2],
				"name" => $rowData[0][3],
                "description" => $rowData[0][4],
                "qty" => $rowData[0][5],
				"price"=>$rowData[0][6],
				"type_id"=>$rowData[0][7],
				"image_name"=>$rowData[0][8],
				"email_address"=>$rowData[0][9],
				"status"=>$rowData[0][10],
            );
            //$this->db->truncate("tbl_material");
            $insert = $this->db->insert("property", $data);
			
			/*
			$data = array(                                                      // Sesuaikan sama nama kolom tabel di database
                "no_kode_lengkap" => $rowData[0][1],
                "klp" => $rowData[0][2],
                "tipe_jenis" => $rowData[0][3],
				"item_uraian" => $rowData[0][4],
                "spesifikasi" => $rowData[0][5],
                "satuan" => $rowData[0][6],
				"no_kode"=>$rowData[0][7]
            );
            
            $insert = $this->db->insert("tbl_material", $data);
			*/
			// Sesuaikan nama dengan nama tabel untuk melakukan insert data
            delete_files($media['file_path']);                                  // menghapus semua file .xls yang diupload
        }
        
        //redirect(base_url('import/index/success'));
		redirect(base_url('Excel/'));
		
    }

}
