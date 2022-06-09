<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_input_po extends CI_Model {


    public function data()
    {
        $this->db->where('status_transaksi', 'PO');
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

	function in_search($sts,$cari)
	{
		$query=$this->db->query("SELECT * FROM list_transaksi 
				LEFT JOIN material ON list_transaksi.id_material  = material.id_material 
				LEFT JOIN transaksi ON list_transaksi.kode_transaksi  = transaksi.kode_transaksi
				WHERE list_transaksi.status_transaksi='$sts' AND material.item LIKE '%$cari%' OR 
				list_transaksi.kode LIKE '%$cari%' OR list_transaksi.kode_divisi LIKE '%$cari%'");
        return $query->result();
	}

    public function update($id,$data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
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
        $this->db->insert('temp_list_transaksi',$data);
    }

    public function set_list_transaksi($kode_transaksi,$data1)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('temp_list_transaksi', $data1);
    }


    public function detail_list_transaksi($id)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        return $this->db->get('temp_list_transaksi')->row();
    
    }

    public function detail_stok_material($id_material)
    {
        $this->db->where('id_material', $id_material);
        return $this->db->get('stok_material')->row();
    
    }

    public function update_stok($id_material, $data2)
    {
        $this->db->where('id_material', $id_material);
        $this->db->update('stok_material', $data2);
    }

    public function update_list_transaksi($id, $data)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        $this->db->update('temp_list_transaksi', $data);
    }

    public function set_qty($id_material, $data)
    {
        $this->db->where('id_material', $id_material);
        $this->db->update('material', $data);
    }


    public function hapus_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('list_transaksi');
    }

    public function hapus_temp_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('temp_list_transaksi');
    }

    public function hapus_list_material($id)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        $this->db->delete('temp_list_transaksi');
    }


    public function cek_kode_material($kode)
    {
        $this->db->where('kode', $kode);
        $query =  $this->db->get('material');
        return $query->num_rows();
    }
    public function detail_kode_material($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->get('material')->row();
    
    }

    public function kode_transaksi()

    {
        $this->db->where('status_transaksi', 'PO');
        $this->db->select_max('kode_transaksi', 'kode');
        return $this->db->get('transaksi')->row();
    }


    public function cek_kode()

    {
        $this->db->where('status_transaksi', 'PO');
        $query =  $this->db->get('transaksi');
        return $query->num_rows();

    }


    public function list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('list_transaksi')->result();
    
    }

    public function list_temp_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('temp_list_transaksi')->result();
    
    }


    public function cek_id_material($id_material, $kode_transaksi)
    {
        $this->db->where('id_material', $id_material);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query =  $this->db->get('temp_list_transaksi');
        return $query->num_rows();

    }


    public function cek_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query =  $this->db->get('temp_list_transaksi');
        return $query->num_rows();

    }


    public function input_list_transaksi($data)
    {
        $this->db->insert('temp_list_transaksi',$data);
    }



    public function jumlah_harga_list_transaksi($kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(sub_total) as jml_harga,
                                ')
                        ->from ('temp_list_transaksi')
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }



    public function get_id_material($kode_transaksi)
    {
        return $this->db->select('                                  
                                    id_material
                                ')
                        ->from ('temp_list_transaksi')
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->result();
    }



    public function get_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('list_transaksi')->result();
    
    }

     public function total_order_bykd($kode)
     {
        return $this->db->query("select SUM(`qty`) as ttl_order from `list_transaksi` where `kode_transaksi`='$kode'")->row();
     }

    public function move_table($kode_transaksi)
    {
        $this->db->query("
                            INSERT INTO list_transaksi (
                                                        no_bc,
                                                        kode_transaksi, 
                                                        tanggal,
                                                        id_material,
                                                        kode,
                                                        item,
                                                        status,
                                                        unit,
                                                        kode_divisi,
                                                        qty,
                                                        status_transaksi,
                                                        id_user
                                                        )
                            SELECT                                     
                                    no_bc, 
                                    kode_transaksi, 
                                    tanggal,
                                    id_material,
                                    kode,
                                    item,
                                    status,
                                    unit,
                                    kode_divisi,
                                    round(qty,4),
                                    status_transaksi,
                                    id_user
                            FROM   temp_list_transaksi
                            where kode_transaksi = '$kode_transaksi'
                            ");
    }

    public function get_table($kode_transaksi)
    {
        $this->db->query("
                            INSERT INTO temp_list_transaksi (
                                                        id_list_transaksi,
                                                        no_bc,
                                                        kode_transaksi, 
                                                        tanggal,
                                                        id_material,
                                                        kode,
                                                        item,
                                                        status,
                                                        unit,
                                                        kode_divisi,
                                                        qty,
                                                        status_transaksi,
                                                        id_user
                                                        )
                            SELECT  
                                    id_list_transaksi,                                   
                                    no_bc, 
                                    kode_transaksi, 
                                    tanggal,
                                    id_material,
                                    kode,
                                    item,
                                    status,
                                    unit,
                                    kode_divisi,
                                    qty,
                                    status_transaksi,
                                    id_user
                            FROM   list_transaksi
                            where   kode_transaksi = '$kode_transaksi'
                            ");
    }


    public function tes()
    {
        $this->db->query("INSERT INTO list_transaksi (kode, qty)
                        SELECT kode, qty
        FROM   tes");
    }


}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
