<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mix extends CI_Model {


   
    public function data()
    {
        $this->db->group_by('id_material') ;
        return $this->db->get('list_transaksi')->result();
    }


    public function preview($from, $to)
    {
        
        $this->db->order_by('id_material', 'ASC');
        $this->db->group_by(array("id_material")); 
        $this->db->where('tanggal >=', $from);
        $this->db->where('tanggal <=', $to);
        return $this->db->get('list_transaksi')->result();
    }
    

    public function detail_item($id_material)
    {
        $this->db->where('id_material', $id_material) ;
        return $this->db->get('list_transaksi')->row();
    }
    
    public function current_in($id_material, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->where('id_material', $id_material) ;
        $this->db->where('MONTH(tanggal)',$bulan);
        $this->db->where('YEAR(tanggal)',$tahun);
        $this->db->where('status_transaksi','IN');
        $query = $this->db->get();
        return $query->result();
    }


    public function current_out($id_material, $tgl)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->where('tanggal',$tgl);
        $this->db->where('status_transaksi','OUT');
        $query = $this->db->get();
        return $query->row();
    }


    public function total_current_in($id_material, $tgl)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material) ;
        $this->db->where('tanggal',$tgl);
        $this->db->where('status_transaksi','IN');
        $query = $this->db->get();
        return $query->row();
    }


    public function total_current_out($id_material, $tgl)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material) ;
        $this->db->where('tanggal',$tgl);
        $this->db->where('status_transaksi','OUT');
        $query = $this->db->get();
        return $query->row();
    }

    public function list_in($id_material)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->where('id_material',$id_material);
        $this->db->where('status_transaksi','IN');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
            } else {
            return false;
        }
    }



    public function total_list_in($id_material, $tgl)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material) ;
        $this->db->where('tanggal',$tgl);
        $this->db->where('status_transaksi','IN');
        $query = $this->db->get();
        return $query->row();
    }


    public function total_list_out($id_material, $tgl)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material) ;
        $this->db->where('tanggal',$tgl);
        $this->db->where('status_transaksi','OUT');
        $query = $this->db->get();
        return $query->row();
    }


    public function list_out($id_material)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->where('id_material',$id_material);
        $this->db->where('status_transaksi','OUT');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
            } else {
            return false;
        }
    }


    public function list_ending($id_material)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->group_by('tanggal');
        $this->db->where('id_material',$id_material);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
            } else {
            return false;
        }
    }




    

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
