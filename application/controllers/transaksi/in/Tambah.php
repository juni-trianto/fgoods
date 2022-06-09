<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('transaksi/in/M_tambah');   
 
		 

	}

	public function index()
	{
        $cek = $this->M_tambah->cek_kode() ;
        
        if ($cek > 0)
        {
            $row = $this->M_tambah->kode_transaksi();
            $data = $row->kode ;
            $kode=preg_replace("/IN-/","", $data);

        }
        else
        {
            $kode = '0000000000';
        };


        $noUrut = (int) substr($kode, 0, 10);
        $noUrut++;
        $char = "IN-";
        $kode_transaksi = $char . sprintf("%010s", $noUrut);
        $data = array (
                        'title' => 'Creating a New Transaction',
                        'action' => base_url('transaksi/in/tambah/input'),
                        'kode_transaksi' => $kode_transaksi,
                        'id_transaksi' => '',
                        'tanggal' => set_value('tanggal'),
                        'no_bc' => set_value('no_bc'),
                        'css' => 'content/transaksi/in/tambah/css',
                        'content' => 'content/transaksi/in/tambah/form',
                        'script' => 'content/transaksi/in/tambah/script'

                        ) ;
        $this->load->view('template', $data);
	}

    public function data_material($kode_transaksi)
    {
        $hasil = $this->M_tambah->data_material() ;
        $data = array ( 
                        'kode_transaksi' => $kode_transaksi,
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/in/tambah/data_material', $data);        
    }

     public function list_no_bc($kode,  $kode_transaksi)
    {        
        $hasil = $this->M_tambah->list_no_bc($kode, $kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/in/tambah/list_no_bc', $data);
    }

    public function jml_qty_temp_no_bc($kode, $kode_transaksi)
    {
        $c = $this->M_tambah->jml_qty_temp_no_bc($kode, $kode_transaksi) ;
        echo $c->jml_qty ;

    }    

    public function data_no_bc($kode)
    {
         
        $row = $this->M_tambah->detail_item($kode) ;
        
        $kode = $row->kode ;
        $hasil = $this->M_tambah->data_no_bc($kode) ;
        $data = array (
                        'hasil' => $hasil,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'qty' => $row->qty,
                        'kode_transaksi' => $row->kode_transaksi,
                        'id_material' => $row->id_material,
                        'title' => 'Customize PO NO',
                        ) ;
        
        $this->load->view('content/transaksi/in/tambah/data_no_bc', $data);
    }

    public function input_no_bc ()
    {
        
        $qty_pick = $this->input->post('qty_pick');
        $no_bc = $this->input->post('no_bc_form');
        $qty = $this->input->post('qty_no_bc');
        $kode = $this->input->post('kode_no_bc');
        $kode_transaksi = $this->input->post('kode_transaksi_no_bc');

        if ($qty == '') {
            $data['error']['qty_no_bc'] = 'Sesuaikan Jumlah qty';
        }

        if ($qty > $qty_pick) {
            $data['error']['qty_no_bc'] = 'Jumlah Qty tidak boleh melebihi Jumlah stok';
        }      
    


        if (empty($data['error'])) {


            $row = $this->M_tambah->detail_kode_material($kode) ;
            $data = array(
                
                'id_material' => $row->id_material,
                'kode' => $kode,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'kode_divisi' => $row->kode_divisi,
                'no_bc' => $no_bc,
                'kode_transaksi' => $kode_transaksi,
                'qty' => $qty,
                'status_transaksi' => 'IN',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama'),
        
            );
            
            $this->M_tambah->input_temp_no_bc($data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }


    public function hapus_temp_no_bc()
    {
        $id = $_POST['id'] ;
         $this->M_tambah->hapus_temp_no_bc($id); 
        
    }


    public function detail_qty()
    {
        $item = $_POST['item'] ;
        $kode = $_POST['kode'] ;
        $qty = $_POST['qty'] ;
        $hasil = $this->M_tambah->data_no_bc($kode) ;
        $data = array (
                        'hasil' => $hasil,
                        'item' => $item,
                        'kode' => $kode,
                        'qty' => $qty,
                        'title' => 'Sesuaikan No BC',
                        ) ;
        
        $this->load->view('content/transaksi/in/tambah/detail_qty', $data);
    }
    public function input_material ()
    {
        
        $kode = $this->input->post('kode');
        $kode_transaksi = $this->input->post('kode_transaksi');
        $qty = $this->input->post('qty');
        
 
        if ($kode == '') {
            $data['error']['kode'] = 'Pilih produk';
        }

        if ($qty == '') {
            $data['error']['qty'] = 'Masukkan QTY';
        }      
    

        /* section */
        /* end section */

        if (empty($data['error'])) {


            $row = $this->M_tambah->detail_material($kode) ;
            $data = array(
                
                'id_material' => $row->id_material,
                'kode' => $row->kode,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'kode_divisi' => $row->kode_divisi,
                'kode_transaksi' => $kode_transaksi,
                'qty' => round($qty,4),
                'status_transaksi' => 'IN',
                'id_user' => $this->session->userdata('id_user'),
        
            );
            
            $this->M_tambah->input_temp_list_transaksi($data);
            $this->M_tambah->move_to_no_bc($kode, $kode_transaksi) ;
            $this->M_tambah->hapus_table_temp_no_bc($kode, $kode_transaksi) ;
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }

    public function list_transaksi($kode_transaksi)
    {
        $hasil = $this->M_tambah->list_transaksi($kode_transaksi) ;
        $cek = $this->M_tambah->cek_list_transaksi($kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        'cek' => $cek,
                        ) ;
        $this->load->view('content/transaksi/in/tambah/list_transaksi', $data);
        
    }

    public function hapus_list_material()
    {
        $id = $_POST['id'] ;
         $this->M_tambah->hapus_temp_list_transaksi($id); 
        
    }

    public function edit_list_material()
    {
        $id = $_POST['id'] ;
        $row = $this->M_tambah->detail_list_transaksi($id) ;
        $data = [
                    'title' => 'Edit Qty',
                    'id_list_transaksi' => $row->id_list_transaksi,
                    'id_temp_list_transaksi' => $row->id_temp_list_transaksi,
                    'kode' => $row->kode,
                    'kode_transaksi' => $row->kode_transaksi,
                    'item' => $row->item,
                    'qty' => $row->qty,
                    'id_material' => $row->id_material,
                ] ;
         $this->load->View('content/transaksi/in/tambah/edit_list', $data) ;
        
        
    }

    public function list_no_bc_edit($kode, $kode_transaksi)
    {
        
        $hasil = $this->M_tambah->list_no_bc_edit($kode, $kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/in/tambah/list_no_bc_edit_list', $data);
    }

    public function jml_qty_no_bc_edit($kode, $kode_transaksi)
    {
        $c = $this->M_tambah->jml_qty_no_bc_edit($kode, $kode_transaksi) ;
        echo $c->jml_qty ;

    }

    public function hapus_no_bc_edit()
    {
        $id = $_POST['id'] ;        
        $this->M_tambah->hapus_no_bc($id);         
    }

    public function data_no_bc_edit_list($kode, $kode_transaksi)
    {
         
        $row = $this->M_tambah->detail_item($kode) ;
        
        $id_material = $row->id_material ;
        $hasil = $this->M_tambah->data_no_bc($kode) ;
        $data = array (
                        'hasil' => $hasil,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'qty' => $row->stok,
                        'kode_transaksi' => $row->kode_transaksi,
                        'id_material' => $row->id_material,
                        'title' => 'Sesuaikan No BC',
                        ) ;
        $this->load->view('content/transaksi/in/tambah/data_no_bc_edit_list', $data);
    }

    public function input_no_bc_edit ()
    {
        
        $id_list_transaksi = $this->input->post('id_list_transaksi');
        $qty_pick = $this->input->post('qty_pick');
        $no_bc = $this->input->post('no_bc_form');
        $qty = $this->input->post('qty_no_bc');
        $kode = $this->input->post('kode_no_bc');
        $kode_transaksi = $this->input->post('kode_transaksi_no_bc');
 
        if ($qty == '') {
            $data['error']['qty_no_bc'] = 'Sesuaikan Jumlah qty';
        }

        if ($qty > $qty_pick) {
            $data['error']['qty_no_bc'] = 'Jumlah Qty tidak boleh melebihi Jumlah stok';
        }      
    

        /* section */
        /* end section */

        if (empty($data['error'])) {


            $row = $this->M_tambah->detail_kode_material($kode) ;
            $data = array(
                
                'id_list_transaksi' => $id_list_transaksi,
                'id_material' => $row->id_material,
                'kode' => $kode,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'kode_divisi' => $row->kode_divisi,
                'no_bc' => $no_bc,
                'kode_transaksi' => $kode_transaksi,
                'qty' => $qty,
                'status_transaksi' => 'IN',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama'),
        
            );
            
            $this->M_tambah->input_no_bc($data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }

    public function update_list()
    {

        
        $id = $this->input->post('id_temp_list_transaksi');
        $kode = $this->input->post('kode');
        $item = $this->input->post('item');
        $qty = $this->input->post('qty');
 

        if ($qty == '') {
            $data['error']['qty'] = 'Masukkan QTY';
        }      
    

        /* section */
        /* end section */

        if (empty($data['error'])) {


            $data = array(
                
                'qty' => reset_rupiah($qty),
        
            );
            
            $this->M_tambah->update_list_transaksi($id, $data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }

        echo json_encode($data);
    }



    public function input ()
    {
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
        
            $this->index(); 

        }
        else
        {


            $data = array( 
                'kode_transaksi' => $this->input->post('kode_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'no_bc' => $this->input->post('no_bc'),
                'status_transaksi' => 'IN',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => ''
            );        
            $this->M_tambah->input($data);


            $data2 = array(
                'tanggal' => $this->input->post('tanggal')
            );
            $this->M_tambah->set_no_bc($kode_transaksi, $data2);



            // pindahkan no bc ke list transaksi
            $this->M_tambah->move_to_list_transaksi($kode_transaksi) ;
            //bersihkan temp list transaksi
            $this->M_tambah->hapus_table_temp_list_transaksi($kode_transaksi) ;
            //bersihkan no bc
            $this->M_tambah->hapus_table_no_bc($kode_transaksi) ;

            

            
            redirect(base_url('transaksi/in'));
        }
    }
	
	public function view_transaksi($kode_transaksi)
    {
        $hasil = $this->M_tambah->list_transaksi($kode_transaksi) ;
        $cek = $this->M_tambah->cek_list_transaksi($kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        'cek' => $cek,
                        ) ;
        $this->load->view('content/transaksi/in/tambah/view_transaksi', $data);
        
    }

}
