<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scaner extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			    
        $this->load->model('transaksi/out/M_scaner');   
		 

	}

	
    public function index()
    {
        $cek = $this->M_scaner->cek_kode() ;
        
        if ($cek > 0)
        {
            $row = $this->M_scaner->kode_transaksi();
            $data = $row->kode ;
            $kode=preg_replace("/OUT-/","", $data);

        }
        else
        {
            $kode = '0000000000';
        };


        $noUrut = (int) substr($kode, 0, 10);
        $noUrut++;
        $char = "OUT-";
        $kode_transaksi = $char . sprintf("%010s", $noUrut);
        $data = array (
                        'title' => 'Membuat Transaksi Baru',
                        'action' => base_url('transaksi/out/scaner/input'),
                        'kode_transaksi' => $kode_transaksi,
                        'id_transaksi' => '',
                        'tanggal' => set_value('tanggal'),
                        'no_bc' => set_value('no_bc'),
                        'css' => 'content/transaksi/out/scaner/css',
                        'content' => 'content/transaksi/out/scaner/form',
                        'script' => 'content/transaksi/out/scaner/script'

                        ) ;
        $this->load->view('template', $data);
    }

    public function data_material($kode_transaksi)
    {
        $hasil = $this->M_scaner->data_material() ;
        $data = array ( 
                        'kode_transaksi' => $kode_transaksi,
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/out/scaner/data_material', $data);        
    }

     public function list_no_bc($id_material,  $kode_transaksi)
    {        
        $hasil = $this->M_scaner->list_no_bc($id_material, $kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/out/scaner/list_no_bc', $data);
    }

    public function jml_qty_temp_no_bc($id_material, $kode_transaksi)
    {
        $c = $this->M_scaner->jml_qty_temp_no_bc($id_material, $kode_transaksi) ;
        echo $c->jml_qty ;

    }    

    public function data_no_bc($id_material)
    {
         
        $row = $this->M_scaner->detail_item($id_material) ;
        
        $id_material = $row->id_material ;
        $hasil = $this->M_scaner->data_no_bc($id_material) ;
        $data = array (
                        'hasil' => $hasil,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'qty' => $row->stok,
                        'kode_transaksi' => $row->kode_transaksi,
                        'id_material' => $row->id_material,
                        'title' => 'Customize PO No',
                        ) ;
        
        $this->load->view('content/transaksi/out/scaner/data_no_bc', $data);
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


            $row = $this->M_scaner->detail_kode_material($kode) ;
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
                'status_transaksi' => 'OUT',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama'),
        
            );
            
            $this->M_scaner->input_temp_no_bc($data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }


    public function hapus_temp_no_bc()
    {
        $id = $_POST['id'] ;
         $this->M_scaner->hapus_temp_no_bc($id); 
        
    }


    public function detail_qty()
    {
        $id_material = $_POST['id_material'] ;
        $row = $this->M_scaner->detail_item($id_material) ;
        
        $id_material = $row->id_material ;
        $hasil = $this->M_scaner->data_no_bc($id_material) ;
        $data = array (
                        'hasil' => $hasil,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'qty' => $row->stok,
                        'kode_transaksi' => $row->kode_transaksi,
                        'id_material' => $row->id_material,
                        'title' => 'Customize PO No',
                        ) ;
        
        $this->load->view('content/transaksi/out/scaner/detail_qty', $data);
    }
    public function input_material ()
    {
        
        $id_material = $this->input->post('id_material');
        $kode_transaksi = $this->input->post('kode_transaksi');
        $qty = $this->input->post('qty');
        
 
        if ($id_material == '') {
            $data['error']['id_material'] = 'Pilih produk';
        }

        if ($qty == '') {
            $data['error']['qty'] = 'Masukkan QTY';
        }      
    

        /* section */
        /* end section */

        if (empty($data['error'])) {


            $row = $this->M_scaner->detail_material($id_material) ;
            $data = array(
                
                'id_material' => $row->id_material,
                'kode' => $row->kode,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'kode_divisi' => $row->kode_divisi,
                'kode_transaksi' => $kode_transaksi,
                'qty' => $qty,
                'status_transaksi' => 'OUT',
                'id_user' => $this->session->userdata('id_user'),
        
            );
            
            $this->M_scaner->input_temp_list_transaksi($data);
            $this->M_scaner->move_to_no_bc($id_material, $kode_transaksi) ;
            $this->M_scaner->hapus_table_temp_no_bc($id_material, $kode_transaksi) ;
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }

    public function list_transaksi($kode_transaksi)
    {
        $hasil = $this->M_scaner->list_transaksi($kode_transaksi) ;
        $cek = $this->M_scaner->cek_list_transaksi($kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        'cek' => $cek,
                        ) ;
        $this->load->view('content/transaksi/out/scaner/list_transaksi', $data);
        
    }

    public function hapus_list_material()
    {
        $id = $_POST['id'] ;
         $this->M_scaner->hapus_temp_list_transaksi($id); 
        
    }

    public function edit_list_material()
    {
        $id = $_POST['id'] ;
        $row = $this->M_scaner->detail_list_transaksi($id) ;
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
         $this->load->View('content/transaksi/out/scaner/edit_list', $data) ;
        
        
    }

    public function list_no_bc_edit($id_material, $kode_transaksi)
    {
        
        $hasil = $this->M_scaner->list_no_bc_edit($id_material, $kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/out/scaner/list_no_bc_edit_list', $data);
    }

    public function jml_qty_no_bc_edit($id_material, $kode_transaksi)
    {
        $c = $this->M_scaner->jml_qty_no_bc_edit($id_material, $kode_transaksi) ;
        echo $c->jml_qty ;

    }

    public function hapus_no_bc_edit()
    {
        $id = $_POST['id'] ;        
        $this->M_scaner->hapus_no_bc($id);         
    }

    public function data_no_bc_edit_list($id_material, $kode_transaksi)
    {
         
        $row = $this->M_scaner->detail_item($id_material) ;
        
        $id_material = $row->id_material ;
        $hasil = $this->M_scaner->data_no_bc($id_material) ;
        $data = array (
                        'hasil' => $hasil,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'qty' => $row->stok,
                        'kode_transaksi' => $row->kode_transaksi,
                        'id_material' => $row->id_material,
                        'title' => 'Customize PO No',
                        ) ;
        $this->load->view('content/transaksi/out/scaner/data_no_bc_edit_list', $data);
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


            $row = $this->M_scaner->detail_kode_material($kode) ;
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
                'status_transaksi' => 'OUT',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama'),
        
            );
            
            $this->M_scaner->input_no_bc($data);
            
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
            
            $this->M_scaner->update_list_transaksi($id, $data);
            
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
                'status_transaksi' => 'OUT',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => ''
            );        
            $this->M_scaner->input($data);


            $data2 = array(
                'tanggal' => $this->input->post('tanggal')
            );
            $this->M_scaner->set_no_bc($kode_transaksi, $data2);



            // pindahkan no bc ke list transaksi
            $this->M_scaner->move_to_list_transaksi($kode_transaksi) ;
            //bersihkan temp list transaksi
            $this->M_scaner->hapus_table_temp_list_transaksi($kode_transaksi) ;
            //bersihkan no bc
            $this->M_scaner->hapus_table_no_bc($kode_transaksi) ;

            

            
            redirect(base_url('transaksi/out'));
        }
    }

    public function input_scaner ()
    {
        
        $teks = $this->input->post('kode');
        $kode_transaksi = $this->input->post('kode_transaksi');
         $pecah = explode(",", $teks);
         $kode = $pecah[0];
         $qty = $pecah[1];
         $row = $this->M_scaner->detail_kode_material($kode) ;
         $pick = $this->M_scaner->pilih_no_bc($kode) ;
         $no_bc = $pick[0]->no_bc ;
         
        if (empty($data['error'])) {


            $data = array(
                'kode' => $kode,
                'qty' => $qty,
                'id_material' => $row->id_material,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'no_bc' => $no_bc,
                'kode_divisi' => $row->kode_divisi,
                'status_transaksi' => 'OUT',
                'kode_transaksi' => $kode_transaksi,
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama')
        
            );
            
            $this->M_scaner->input_temp_list_transaksi($data);
            $this->M_scaner->input_no_bc($data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }
	
}
