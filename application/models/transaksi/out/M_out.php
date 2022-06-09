<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_out extends CI_Model {


    public function data()
    {
        $this->db->where('status_transaksi', 'OUT');
        return $this->db->get('transaksi')->result();
    }

    public function total_qty_transaksi($kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(qty) as jml_qty,
                                ')
                        ->from ('list_transaksi')
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->where ('status_transaksi', 'OUT')
                        ->get()->row();
    }


    public function detail($id)
    {
        $this->db->where('id_transaksi', $id);
        return $this->db->get('transaksi')->row();
    
    }

    
    public function hapus($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }

    

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
