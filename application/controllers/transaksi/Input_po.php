<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_po extends MY_Controller {

    function __construct()
    {
        parent::__construct();  
        parent::logon();
            
        $this->load->model('transaksi/M_input_po');   

    }

    public function index()
    {

        $hasil = $this->M_input_po->data();
        
        $data = array (
                        'hasil' => $hasil,
                        'title' => 'Transaction Data',
                        'css' => 'content/transaksi/ip/css',
                        'content' => 'content/transaksi/ip/index',
                        'script' => 'content/transaksi/ip/script'

                        ) ;
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $cek = $this->M_input_po->cek_kode() ;
        
        if ($cek > 0)
        {
            $row = $this->M_input_po->kode_transaksi();
            $data = $row->kode ;
            $kode=preg_replace("/PO-/","", $data);

        }
        else
        {
            $kode = '0000000000';
        };


        $noUrut = (int) substr($kode, 0, 10);
        $noUrut++;
        $char = "PO-";
        $kode_transaksi = $char . sprintf("%010s", $noUrut);
        $data = array (
                        'title' => 'Membuat Transaksi Baru',
                        'action' => base_url('transaksi/input_po/input'),
                        'id_transaksi' => '',
                        'kode_transaksi' => $kode_transaksi,
                        'tanggal' => set_value('tanggal'),
                        'no_bc' => set_value('no_bc'),
                        'css' => 'content/transaksi/ip/css',
                        'content' => 'content/transaksi/ip/form',
                        'script' => 'content/transaksi/ip/script_form'

                        ) ;
        $this->load->view('template', $data);
    }

    public function tambah_scaner()
    {
        $cek = $this->M_input_po->cek_kode() ;
        
        if ($cek > 0)
        {
            $row = $this->M_input_po->kode_transaksi();
            $data = $row->kode ;
            $kode=preg_replace("/PO-/","", $data);

        }
        else
        {
            $kode = '0000000000';
        }


        $noUrut = (int) substr($kode, 0, 10);
        $noUrut++;
        $char = "PO-";
        $kode_transaksi = $char . sprintf("%010s", $noUrut);
        $data = array (
                        'title' => 'Create a New Transaction',
                        'action' => base_url('transaksi/input_po/input'),
                        'kode_transaksi' => $kode_transaksi,
                        'tanggal' => set_value('tanggal'),
                        'no_bc' => set_value('no_bc'),
                        'css' => 'content/transaksi/ip/css',
                        'content' => 'content/transaksi/ip/form_scaner',
                        'script' => 'content/transaksi/ip/script_scaner'

                        ) ;
        $this->load->view('template', $data);
    }

    public function input()
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
        
            array(
                    'field' => 'no_bc',
                    'label' => 'No Bc',
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
                'no_bc' => $this->input->post('no_bc'),
                'status_transaksi' => 'PO',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => ''
            );        
            $this->M_input_po->input($data);


            $data1 = array(
                'no_bc' => $this->input->post('no_bc'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->M_input_po->set_list_transaksi($kode_transaksi, $data1);

            /*===================== Update stok =========================*/
           /* $temp = $this->M_input_po->list_temp_transaksi($kode_transaksi) ;
            for ($i = 0 ; $i < count($temp) ; $i++ ) {
                $id_material = $temp[$i]->id_material ;
                $sl = $this->M_input_po->detail_stok_material($id_material) ;
                $stok = $sl->stok + $temp[$i]->qty ;
                $data2 = [
                          'stok' => $stok
                         ] ;
                $this->M_input_po->update_stok($id_material, $data2) ;
            }*/

            $this->M_input_po->move_table($kode_transaksi) ;
            $this->M_input_po->hapus_temp_list_transaksi($kode_transaksi); 
            $this->session->set_flashdata('pesan','Disimpan');
            redirect(base_url('transaksi/input_po'));

            
        }
    }

    public function detail($id)
    {
        $row = $this->M_input_po->detail($id) ;
        $data = array (
                        'title' => 'Detail Data Material',
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
        $this->load->view('template', $data) ;
    }

    public function edit($id)
    {
        
        $row = $this->M_input_po->detail($id) ;
        $kode_transaksi = $row->kode_transaksi ;
        $this->M_input_po->hapus_temp_list_transaksi($kode_transaksi);   
        $this->M_input_po->get_table($kode_transaksi) ;

        $data = array (
                        'title' => 'Edit Transaction Data',
                        'action' => base_url('transaksi/input_po/update'),
                        'id_transaksi' => $row->id_transaksi,
                        'kode_transaksi' => $row->kode_transaksi,
                        'tanggal' => $row->tanggal,
                        'no_bc' => $row->no_bc,
                        'css' => 'content/transaksi/ip/css',
                        'content' => 'content/transaksi/ip/form',
                        'script' => 'content/transaksi/ip/script_form'
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
        
            array(
                    'field' => 'no_bc',
                    'label' => 'No Bc',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

        );

        $this->form_validation->set_rules($config_validasi);
     if ($this->form_validation->run() == FALSE) {
        
            $this->edit($id); 

        }
        else
        {


            $data = array( 
                'kode_transaksi' => $this->input->post('kode_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'no_bc' => $this->input->post('no_bc'),
                'status_transaksi' => 'PO',
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => ''
            );        
            $this->M_input_po->update($id, $data);


            $data1 = array(
                'no_bc' => $this->input->post('no_bc'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->M_input_po->set_list_transaksi($kode_transaksi, $data1);


            /*===================== Update stok =========================*/
            //$list = $this->M_input_po->list_transaksi($kode_transaksi) ;  // ambil dari tabel list transaksi            

            /*================== Kembalikan Stok =========================*/
            /*for ($i = 0 ; $i < count($list) ; $i++ ) 
            {
                $id_material = $list[$i]->id_material ;
                $id_list_transaksi = $list[$i]->id_list_transaksi ;
                
                $sl = $this->M_input_po->detail_stok_material($id_material) ;

                $stok = $sl->stok - $list[$i]->qty ;

                $data2 = [
                         'stok' => $stok 
                        ] ;
            
                $this->M_input_po->update_stok($id_material, $data2) ;
                
            }*/
            // Update Stok yang baru
           /* $temp = $this->M_input_po->list_temp_transaksi($kode_transaksi) ;  // ambil dari tabel temp list transaksi
            for ($i=0; $i < count($temp) ; $i++) { 
                $id_material = $temp[$i]->id_material ;
                $dm = $this->M_input_po->detail_stok_material($id_material) ;
                $new_stok = $dm_stok + $temp[$i]->qty ;
                $data3 = [
                            'stok' => $new_stok
                         ] ;
                $this->M_input_po->update_stok($id_material, $data3) ;
            }*/
            // Hapus list Transaksi by kode transaksi
                $this->M_input_po->hapus_list_transaksi($kode_transaksi) ;
            //pindahkan tabel temp transaksi ke list transaksi
                $this->M_input_po->move_table($kode_transaksi) ;
            //bersihkan tabel temp transaksi
                $this->M_input_po->hapus_temp_list_transaksi($kode_transaksi); 

            
            $this->session->set_flashdata('pesan','Disimpan');
            redirect(base_url('transaksi/input_po'));
            
            
        }
    }


    
    public function konfirmasi()
    {
        $id = $_POST['id']; 
        $row = $this->M_input_po->detail($id) ;
        $data = array (
                        'title' => 'Action Warning',
                        'id_transaksi' => $row->id_transaksi
                        ) ;
        $this->load->view('content/transaksi/ip/konfirmasi', $data);
        
    }

    public function hapus($id)
    {
        $this->M_input_po->hapus($id);   
        $this->session->set_flashdata('pesan','Dihapus');
        redirect(base_url('transaksi/input_po'));             
        
        
    }

    
    public function list_transaksi($kode_transaksi)
    {
        $hasil = $this->M_input_po->list_temp_transaksi($kode_transaksi) ;
        $cek = $this->M_input_po->cek_list_transaksi($kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        'cek' => $cek,
                        ) ;
        $this->load->view('content/transaksi/ip/list_transaksi', $data);
        
    }


    public function data_material($kode_transaksi)
    {
        $hasil = $this->M_input_po->material() ;
        $data = array ( 
                        'kode_transaksi' => $kode_transaksi,
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/ip/data_material', $data);
        
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
            $round_4digit=round(str_replace(",",".",$qty),4);

            $row = $this->M_input_po->detail_material($id_material) ;
            $data = array(
                
                'id_material' => $row->id_material,
                'kode' => $row->kode,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'kode_divisi' => $row->kode_divisi,
                'kode_transaksi' => $kode_transaksi,
                'qty' => $round_4digit,
                'status_transaksi' => 'PO',
                'id_user' => $this->session->userdata('id_user'),
        
            );
            
            $this->M_input_po->input_list_transaksi($data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }


    public function validasi_scaner ()
    {
        
        $kode = $this->input->post('kode');
        $cek = $this->M_input_po->cek_kode_material($kode) ;


        if ($cek < 1) {
            $data['error']['kode'] = 'Kode Tidak Terdaftar';
        }


        if (empty($data['error'])) {


            $row = $this->M_input_po->detail_kode_material($kode) ;
           

            $data['id_material'] = $row->id_material ;
            $data['kode'] = $row->kode ;
            $data['item'] = $row->item ;
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }




    public function input_scaner ()
    {
        
        $teks = $this->input->post('kode');
        $kode_transaksi = $this->input->post('kode_transaksi');
         $pecah = explode(",", $teks);
         $kode = $pecah[0];
         $qty = $pecah[1];
         $row = $this->M_input_po->detail_kode_material($kode) ;

             

        if (empty($data['error'])) {


            $data = array(
                'kode' => $kode,
                'qty' => $qty,
                'id_material' => $row->id_material,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'kode_divisi' => $row->kode_divisi,
                'status_transaksi' => 'IN',
                'kode_transaksi' => $kode_transaksi,
                'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama')
        
            );
            
            $this->M_input_po->input_list_transaksi($data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }



    public function edit_list_material()
    {
        $id = $_POST['id'] ;
        $row = $this->M_input_po->detail_list_transaksi($id) ;
        $data = [
                    'title' => 'Edit Qty',
                    'id_temp_list_transaksi' => $row->id_temp_list_transaksi,
                    'kode' => $row->kode,
                    'item' => $row->item,
                    'qty' => $row->qty,
                ] ;
         $this->load->View('content/transaksi/ip/edit_list', $data) ;
        
        
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
                
                'qty' => $qty,
        
            );
            
            $this->M_input_po->update_list_transaksi($id, $data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }

        echo json_encode($data);
    }

    public function hapus_list_material()
    {
        $id = $_POST['id'] ;
         $this->M_input_po->hapus_list_material($id); 
        
    }

    public function tes ()
    {
        $this->M_input_po->tes() ;
    }
    
}
