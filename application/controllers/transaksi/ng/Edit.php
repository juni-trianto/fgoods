<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('transaksi/ng/M_edit');   
 
		 

	}

	public function transaksi($id)
	{
        $row = $this->M_edit->detail($id) ;
        $kode_transaksi = $row->kode_transaksi ;
        // bersihkan temp list transaksi
        $this->M_edit->hapus_table_temp_list_transaksi($kode_transaksi) ;
        // ambil list transaksi ke temp list transaksi
        $this->M_edit->get_table_list_transaksi($kode_transaksi) ;

        // bersihkan no bc dengan kode transaksi
        $this->M_edit->hapus_table_no_bc($kode_transaksi) ;
        // ambil list transaksi ke no bc
        $this->M_edit->get_table_no_bc($kode_transaksi) ;

        $data = array (
                        'title' => 'Edit Data Transaksi',
                        'action' => base_url('transaksi/ng/edit/update'),
                        'id_transaksi' => $row->id_transaksi,
                        'kode_transaksi' => $row->kode_transaksi,
                        'tanggal' => $row->tanggal,
                        'no_bc' => $row->no_bc,
                        'css' => 'content/transaksi/ng/edit/css',
                        'content' => 'content/transaksi/ng/edit/form',
                        'script' => 'content/transaksi/ng/edit/script'
                        ) ;
        $this->load->view('template', $data) ;
	}

    public function update()
    {

        $id = $this->input->post('id_transaksi') ;
        $kode_transaksi = $this->input->post('kode_transaksi') ;
        $config_validasi = array(
        
            array(
                    'field' => 'tanggal',
                    'label' => 'Tanggal',
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
                'kode_transaksi' => $this->input->post('kode_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'status_transaksi' => 'NG',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => ''
            );        
            $this->M_edit->update($id, $data);

            // update no bc sebelum masuk ke list transaksi
            $data1 = array(
                'tanggal' => $this->input->post('tanggal')
            );
            $this->M_edit->set_no_bc($kode_transaksi, $data1);

            // hapus list transaksi lama by kode transaksi
                $this->M_edit->hapus_list_transaksi($kode_transaksi) ;
            // masukkan list transaksi yang baru
                $this->M_edit->move_to_list_transaksi($kode_transaksi) ;
            // hapus temp list transaksi by kode transaksi
                $this->M_edit->hapus_table_no_bc($kode_transaksi) ;
                redirect(base_url('transaksi/ng'));
           
        }
    }

	
}
