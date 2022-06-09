<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php'; 
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
class Material extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('M_material');   

		

	}

    public function index()
    {
        
        $start = $this->input->get('start');
        $q = urldecode($this->input->get('q'));

        if ($q<>'') {
            $config['base_url'] = base_url().'material/index?q='.urlencode($q);
            $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        } else {
            $config['base_url'] = base_url().'material';
            $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        }

        // total row ambil dari model
        $config['total_rows'] = $this->M_material->total_rows($q);
        // kita buat 10 baris untuk satu halaman
        $config['per_page'] = 50;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'start';
        $config['first_link'] = '« First';
        $config['next_link'] = 'Next →';
        $config['last_link'] = 'Last »';
         $config['prev_link'] = '← Previous';

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        // untuk link paginasinya
        $pagination =  $this->pagination->create_links();
        // ambil datanya dengan limit
        $hasil = $this->M_material->get_limit_data($config['per_page'], $start, $q);
        // echo $this->db->last_query(); die();
        $data = array(
            'hasil' => $hasil,
            'pagination' => $pagination,
            'start' => $start,
            'total_rows' => $config['total_rows'],
            'q' => $q,
            'url' => $url,
            'title' => 'Material Data',
            'css' => 'content/material/css',
            'content' => 'content/material/index',
            'script' => 'content/material/script'
        );
        $this->load->view('template',$data);
    }
    public function export()
    {
        /*memanggil file xlsxwriter*/
        include_once APPPATH.'/third_party/PHP_XLSXWriter/xlsxwriter.class.php';

        /* agar menghilangkan peringatan eror*/
        ini_set('display_errors', 0);
        ini_set('log_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);
        /*---*/
        $filename = "export_material.xlsx";

        header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $writer         = new XLSXWriter();
        /*untuk lebar kolom*/
        $widths         = array(8.9,46.45,14.36,14.36,14.36,14.36);
        /*memanggildata*/
        $nomor=1;
        $header = array('No' => 'string', 'Item' => 'string', 'Kode' => 'string' , 'Status' => 'string'
        , 'Kode Divisi' => 'string' , 'Stok' => '##0.0###'  );

        /*untuk border*/
        $styles0        = array( 'border'=>'left,right,top,bottom');
        
        $col_options    = array('widths'=>$widths,'fill'=>'#FFFF00','font-style'=>'bold', 'halign'=>'center');

        $writer->setAuthor('PT ...');
        /*membuat sheet*/
        $writer->writeSheetHeader('Stok Material', $header, $col_options);

        $no=1;
        $item="";
        $kode="";
        $status="";
        $unit="";
        $kode_divisi = "";
        $stok="";
        $data_material = $this->M_material->data();
        foreach($data_material as $row_material)
        {
            $id_material = $row_material->id_material ;
            $dt = $this->M_material->detail_stok($id_material) ;

            $item=$row_material->item;
            $kode=$row_material->kode;
            $status = $row_material->status;
            $unit=$row_material->unit;
            $kode_divisi=$row_material->kode_divisi;
            $stok = $dt->stok;
            /*poses menulis isi sheet*/
          
           if($stok > 0)
           {
                $writer->writeSheetRow('Stok Material',array($no,$item,$kode,$status,$kode_divisi,$stok));
                $no++;
           }
            
        } 

        $writer->writeToStdOut();
        exit(0);       

    }
	public function hal()
	{
        $start = $this->input->get('start');
        $q = urldecode($this->input->get('q'));

        if ($q<>'') {
            $config['base_url'] = base_url().'material/index?q='.urlencode($q);
        } else {
            $config['base_url'] = base_url().'material';
        }

        

        // total row ambil dari model
        $config['total_rows'] = $this->M_material->total_rows($q);
        // kita buat 10 baris untuk satu halaman
        $config['per_page'] = 50;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'start';

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        // untuk link paginasinya
        $pagination =  $this->pagination->create_links();
        // ambil datanya dengan limit
        $hasil = $this->M_material->get_limit_data($config['per_page'], $start, $q);
        // echo $this->db->last_query(); die();
        $data = array(
            'hasil' => $hasil,
            'pagination' => $pagination,
            'start' => $start,
            'total_rows' => $config['total_rows'],
            'q' => $q,
            'url' => ''
        );
        $this->load->view('content/material/hal',$data);
	}

	public function tambah()
	{
        $hasil = $this->M_material->divisi();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Add Materials',
                        'action' => base_url('material/input'),
                        'id_material' => '',
                        'item' => set_value('item'),
                        'kode' => set_value('kode'),
                        'status' => set_value('status'),
                        'unit' => set_value('unit'),
                        'kode_divisi' => set_value('kode_divisi'),
						'css' => 'content/material/css',
						'content' => 'content/material/form',
						'script' => 'content/material/script'

						) ;
		$this->load->view('template', $data);
	}

	public function input ()
	{
		$config_validasi = array(
    	
            array(
                    'field' => 'item',
                    'label' => 'Item',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'kode',
                    'label' => 'Kode',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'status',
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'unit',
                    'label' => 'Unit',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'kode_divisi',
                    'label' => 'Kode Divisi',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

	    );

	    $this->form_validation->set_rules($config_validasi);
	 if ($this->form_validation->run() == FALSE) {
	    
	        $this->tambah(); 

	    }
	    else
	    {


	    	$data = array( 
                'item' => $this->input->post('item'),
                'kode' => $this->input->post('kode'),
                'unit' => $this->input->post('unit'),
                'status' => $this->input->post('status'),
                'kode_divisi' => $this->input->post('kode_divisi'),
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama')
            );
            $this->M_material->input($data);
    		$this->session->set_flashdata('pesan','Disimpan');
            redirect(base_url('material'));
	    }
	}


    public function data()
    {
        $hasil = $this->M_material->data();
        $data = array (
                        'hasil' => $hasil
                        ) ;
        $this->load->view('content/material/data', $data) ;
    }
    public function konfirmasi()
    {
        $id = $_POST['id'] ;
        $row = $this->M_material->detail($id) ;
        $data = array (
                        'title' => 'Action Warning',
                        'id_material' => $row->id_material,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'status' => $row->status,
                        'unit' => $row->unit,
                        'kode_divisi' => $row->kode_divisi,
                        'css' => 'content/material/css',
                        'content' => 'content/material/detail',
                        'script' => 'content/material/script'
                        ) ;
        $this->load->view('content/material/konfirmasi', $data) ;
    }

    public function edit()
    {
        $id = $_POST['id'] ;
        $url = $_POST['url'] ;
        $row = $this->M_material->detail($id) ;
        $hasil = $this->M_material->divisi();
        $data = array (
                        'hasil' => $hasil,
                        'title' => 'Edit Material Data',
                        'action' => base_url('material/update'),
                        'url' => $url,
                        'id_material' => $row->id_material,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'status' => $row->status,
                        'unit' => $row->unit,
                        'kode_divisi' => $row->kode_divisi,
                        'css' => 'content/material/css',
                        'content' => 'content/material/form',
                        'script' => 'content/material/script'
                        ) ;
        $this->load->view('content/material/form_edit', $data) ;
    }


    
    public function update()
    {
        $url = $this->input->post('url') ;
        $id = $this->input->post('id_material') ;
        $item = $this->input->post('item') ;
        $kode = $this->input->post('kode') ;
        $status = $this->input->post('status') ;
        $unit = $this->input->post('unit') ;
        $kode_divisi = $this->input->post('kode_divisi') ;


           
                $data = array(
                                'item' => $this->input->post('item'),
                                'kode' => $this->input->post('kode'),
                                'status' => $this->input->post('status'),
                                'unit' => $this->input->post('unit'),
                                'kode_divisi' => $this->input->post('kode_divisi'),
                                'id_user' => $this->session->userdata('id_user'),
                                'nama_user' => $this->session->userdata('nama')
                            );
                $this->M_material->update($id, $data);
        redirect($url);

    }



    public function tes($id)
    {
        $url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

        $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

        echo $escaped_url ;
    }

    public function hapus()
    {
        $id = $_POST['id'] ;
        $this->M_material->hapus($id);   
        
        redirect(base_url('material'));             
        
        
    }
    
    public function empty()
    {
        $this->M_material->empty();   
        redirect(base_url('material'));  
    }
    
    public function form_upload()
    {
        
        $data = array (
                        'title' => 'Upload Material Data',
                        'action' => base_url('material/upload'),
                        'css' => 'content/material/css',
                        'content' => 'content/material/form_upload',
                        'script' => 'content/material/script'
                        ) ;
        $this->load->view('template', $data) ;
        
    }

    public function download(){             
        $this->load->helper('download');
        force_download('file/Material.xlsx',NULL);
    }   


    public function upload ()
    {

        $foto = $_FILES['excel']['name'];
        $ekstensi_diperbolehkan = array('xlsx','xls');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['excel']['size'];
        $file_tmp = $_FILES['excel']['tmp_name'];    
        $acak           = rand(1,9999);
        $nama_file_unik = $acak.$foto; 


                $config_validasi = array(

                    array(
                            'field' => 'excel',
                            'label' => 'File',
                            'rules' => 'callback_cek_file'
                            ),

                );

                $this->form_validation->set_rules($config_validasi);
             if ($this->form_validation->run() == FALSE) {
                
                    $this->form_upload(); 
            
                }
                else
                { 

                        $config['upload_path']      = './temp_doc/';
                        $config['allowed_types']    = 'xlsx';
                        $config['file_name']        = 'doc' . time();
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('excel')) {
                                
                                $file   = $this->upload->data();
                 
                                $reader = ReaderEntityFactory::createXLSXReader(); 
                                $reader->open('temp_doc/' . $file['file_name']); 
                 
                                foreach ($reader->getSheetIterator() as $sheet) {
                                    $numRow = 1;
                 
                                    $save   = array();
                 
                                    foreach ($sheet->getRowIterator() as $row) {
                 
                                        if ($numRow > 2) {
                                            
                                            $cells = $row->getCells();
                 
                                            $data = array(
                                                'item'       => $cells[0],
                                                'kode'       => $cells[1],
                                                'status'       => $cells[2],
                                                'unit'    => $cells[3],
                                                'kode_divisi'    => $cells[4],
                                                'id_user' => $this->session->userdata('id_user'),
                                                'nama_user' => $this->session->userdata('nama'),
                                            );
                 
                                            array_push($save, $data);
                                        }
                 
                                        $numRow++;
                                    }
                                    
                                    $this->M_material->upload($save);
                 
                                    $reader->close();
                 
                                    unlink('temp_doc/' . $file['file_name']);
                                    $this->session->set_flashdata('pesan','Di Upload');
                                    redirect(base_url('material'));
                                }
                            } else {
                                echo "Error :" . $this->upload->display_errors(); 
                            }
                }


    }


        function cek_file($str){
        
            $foto = $_FILES['excel']['name'];
            $ekstensi_diperbolehkan = array('xlsx','xls');
            $x = explode('.', $foto);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['excel']['size'];

            if($_FILES['excel']['name']=="") {
                        $this->form_validation->set_message('cek_file', 'Please select a file to upload.');
                        return false;
                    }
                else {
                     
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)
                        {
                            if($ukuran > 1000000)
                            {

                                $this->form_validation->set_message('cek_file', 'File size is too large');
                                return false;
                            }
                            else
                            {

                                return true;
                            }

                        }
                        else
                            {
                            $this->form_validation->set_message('cek_file', 'File Extension not allowed');
                            return false;
                            }
                }
            
        }   


    


	
}
