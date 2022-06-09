<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_all extends CI_Model {


    public function data()
    {
        
        return $this->db->get('transaksi')->result();
    }
    

    public function detail($id)
    {
        $this->db->where('id_transaksi', $id);
        return $this->db->get('transaksi')->row();
    
    }


    public function input($data)
    {
        $this->db->insert('transaksi',$data);
    }



    public function update($id,$data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }

	function all_search($sts,$cari)
	{
		$query=$this->db->query("SELECT * FROM list_transaksi 
				LEFT JOIN material ON list_transaksi.id_material  = material.id_material 
				LEFT JOIN transaksi ON list_transaksi.kode_transaksi  = transaksi.kode_transaksi
				WHERE list_transaksi.status_transaksi='$sts' AND material.item LIKE '%$cari%' OR 
				list_transaksi.kode LIKE '%$cari%' OR list_transaksi.kode_divisi LIKE '%$cari%'");
        return $query->result();
	}


    public function hapus($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }




    public function material()
    {
        return $this->db->get('material')->result();
    }

    public function detail_material($id_material)
    {
        $this->db->where('id_material', $id_material);
        return $this->db->get('material')->row();
    
    }


    public function input_list_material($data)
    {
        $this->db->insert('list_transaksi',$data);
    }

    public function set_list_transaksi($kode_transaksi,$data1)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('list_transaksi', $data1);
    }



    public function set_qty($id_material, $data)
    {
        $this->db->where('id_material', $id_material);
        $this->db->update('material', $data);
    }


    public function hapus_list_material($id)
    {
        $this->db->where('id_list_transaksi', $id);
        $this->db->delete('list_transaksi');
    }


    public function kode_transaksi()

    {
        $this->db->where('status_transaksi', 'OUT');
        $this->db->select_max('kode_transaksi', 'kode');
        return $this->db->get('transaksi')->row();
    }


    public function cek_kode()

    {
        $this->db->where('status_transaksi', 'OUT');
        $query =  $this->db->get('transaksi');
        return $query->num_rows();

    }


    public function list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('list_transaksi')->result();
    
    }


    public function cek_id_material($id_material, $kode_transaksi)
    {
        $this->db->where('id_material', $id_material);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query =  $this->db->get('list_transaksi');
        return $query->num_rows();

    }


    public function cek_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query =  $this->db->get('list_transaksi');
        return $query->num_rows();

    }


    public function input_list_transaksi($data)
    {
        $this->db->insert('list_transaksi',$data);
    }



    public function jumlah_harga_list_transaksi($kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(sub_total) as jml_harga,
                                ')
                        ->from ('list_transaksi')
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }



    public function get_id_material($kode_transaksi)
    {
        return $this->db->select('                                  
                                    id_material
                                ')
                        ->from ('list_transaksi')
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->result();
    }





    

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
