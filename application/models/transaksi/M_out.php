<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_out extends CI_Model {


    public function data()
    {
        $this->db->where('status_transaksi', 'OUT');
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

	function out_search($sts,$cari)
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


    
    public function data_material()
    {
        return $this->db->query("
                            SELECT 
                                    list_transaksi.kode,   
                                    list_transaksi.tanggal,   
                                    list_transaksi.no_bc,   

                                    stok_material.id_material,   
                                    stok_material.item,   
                                    stok_material.kode,
                                    stok_material.kode_divisi,
                                    (select sum(qty) from list_transaksi where status_transaksi = 'IN' AND list_transaksi.id_material = stok_material.id_material ) as jml_in,

                                    (select sum(qty) from list_transaksi where status_transaksi = 'OUT' AND list_transaksi.id_material = stok_material.id_material ) as jml_out,

                                    (select sum(qty) from list_transaksi where status_transaksi = 'IN' AND list_transaksi.id_material = stok_material.id_material ) - 
                                    (select sum(qty) from list_transaksi where status_transaksi = 'OUT' AND list_transaksi.id_material = stok_material.id_material )
                                    as sisa
                            FROM
                                    list_transaksi
                            LEFT JOIN  stok_material using(id_material)
                            where status_transaksi = 'IN' 
                            group by list_transaksi.id_material 


                            ")->result();
    }


    public function detail_item($id_material)
    {
        $this->db->where('list_transaksi.id_material', $id_material);
        $this->db->join('stok_material', 'stok_material.id_material = list_transaksi.id_material');
        return $this->db->get('list_transaksi')->row();
    
    }

    public function hapus_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('list_transaksi');
    }

    public function hapus_temp_no_bc($id)
    {
        $this->db->where('id_temp_no_bc', $id);
        $this->db->delete('temp_no_bc');
    }


    public function hapus_no_bc($id)
    {
        $this->db->where('id_no_bc', $id);
        $this->db->delete('no_bc');
    }



    public function cek_kode_material($kode)

    {
        $this->db->where('kode', $kode);
        $query =  $this->db->get('list_transaksi');
        return $query->num_rows();

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

   

    public function jumlah_qty_in($id_material, $no_bc)
    {
       
        $this->db->select('sum(qty) as jml_qty');
        $this->db->where('id_material', $id_material);
        $this->db->where('no_bc', $no_bc);
        $this->db->where('status_transaksi', 'IN');
        $this->db->from('list_transaksi');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }

    public function jumlah_qty_out($id_material, $no_bc)
    {
       
        $this->db->select('sum(qty) as jml_qty');
        $this->db->where('id_material', $id_material);
        $this->db->where('no_bc', $no_bc);
        $this->db->where('status_transaksi', 'OUT');
        $this->db->from('list_transaksi');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }

    public function jumlah_in($no_bc)
    {
       
        $this->db->select('sum(qty) as jml_qty');
        $this->db->where('no_bc', $no_bc);
        $this->db->where('status_transaksi', 'IN');
        $this->db->from('list_transaksi');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }

    public function jumlah_out($no_bc)
    {
       
        $this->db->select('sum(qty) as jml_qty');
        $this->db->where('no_bc', $no_bc);
        $this->db->where('status_transaksi', 'OUT');
        $this->db->from('list_transaksi');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }

    public function jml_qty_temp_no_bc($id_material, $kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(qty) as jml_qty,
                                ')
                        ->from ('temp_no_bc')
                        ->where ('id_material', $id_material)
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }

    public function jml_qty_no_bc($id_material, $kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(qty) as jml_qty,
                                ')
                        ->from ('no_bc')
                        ->where ('id_material', $id_material)
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }

    public function jml_qty_no_bc_edit($id_material, $kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(qty) as jml_qty,
                                ')
                        ->from ('no_bc')
                        ->where ('id_material', $id_material)
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }



    public function qty_temp_no_bc($id_material)
    {
        $this->db->where('id_material', $id_material);
        return $this->db->get('temp_list_transaksi')->row();
    
    }

    public function detail_kode_material($kode)
    {
        $this->db->where('kode', $kode);

        return $this->db->get('material')->row();
    
    }

    public function detail_material($id_material)
    {
        $this->db->where('id_material', $id_material);
        return $this->db->get('material')->row();
    
    }


    public function detail_qty_material($id_material, $no_bc)
    {
        return $this->db->query("
                            SELECT 
                                    tanggal,   
                                    id_list_transaksi,   
                                    no_bc,   
                                    status_transaksi,   
                                    id_material,   
                                    qty,   
                                    kode
                            FROM
                                    list_transaksi
                            WHERE
                                    status_transaksi = 'IN'
                            AND
                                    id_material = '$id_material'
                            
                            group by no_bc 


                            ")->result();
    }

    public function jml_qty_in($no_bc)
    {
        return $this->db->query("
                            SELECT 
                                    sum(qty) as jml_qty

                            FROM
                                    list_transaksi
                            
                            WHERE 
                                    no_bc = '$no_bc' 
                            
                            AND 
                                    status_transaksi = 'IN' 


                            ")->row();
    }

    public function jml_qty_out($no_bc)
    {
        return $this->db->query("
                            SELECT 
                                    sum(qty) as jml_qty

                            FROM
                                    list_transaksi
                            
                            WHERE 
                                    no_bc = '$no_bc' 
                            
                            AND 
                                    status_transaksi = 'OUT' 


                            ")->row();
    }

    public function qty_material($id_material, $no_bc)
    {
        return $this->db->query("
                            SELECT 
                                    sum(qty) as jml
                            FROM
                                    list_transaksi

                            where id_material = '$id_material'
                            
                            group by no_bc 


                            ")->result();
    }

    public function detail_stok($id_material)
    {
        $this->db->where('id_material', $id_material);
        return $this->db->get('stok_material')->row();
    }

    public function cek_out($no_bc)
    {
        $this->db->where('no_bc', $no_bc);
        $query =  $this->db->get('list_transaksi');
        return $query->num_rows();

    }

    public function cek_no_bc($id_list_transaksi)
    {
        $this->db->where('id_list_transaksi', $id_list_transaksi);
        $query =  $this->db->get('temp_list_transaksi');
        return $query->num_rows();

    }

    public function cek_data_temp_no_bc($no_bc, $id_material)
    {
        $this->db->where('no_bc', $no_bc);
        $this->db->where('id_material', $id_material);
        $query =  $this->db->get('temp_no_bc');
        return $query->num_rows();

    }

    public function cek_no_bc_edit($kode_transaksi, $id_material)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->where('id_material', $id_material);
        $query =  $this->db->get('no_bc');
        return $query->num_rows();

    }

    public function cek_temp_no_bc($id_material, $kode_transaksi)
    {
        $this->db->where('id_material', $id_material);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query =  $this->db->get('temp_list_transaksi');
        return $query->num_rows();

    }

    public function data_no_bc($id_material)
    {
        return $this->db->query("
                            SELECT 
                                    id_material,
                                    id_list_transaksi,
                                    item,
                                    tanggal,
                                    qty,
                                    no_bc,
                                    (select sum(qty) from list_transaksi where status_transaksi = 'IN' AND id_material = '$id_material' ) as jml_in,

                                    (select sum(qty) from list_transaksi where status_transaksi = 'OUT' AND id_material = '$id_material' ) as jml_out
                            FROM
                                    list_transaksi
                            where status_transaksi = 'IN' 
                            and id_material = '$id_material' 
                            group by no_bc 

                            ")->result();
    }

    public function list_no_bc($id_material, $kode_transaksi)
    {
        $this->db->where('id_material', $id_material);
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('temp_no_bc')->result();
    }

    public function get_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('list_transaksi')->result();
    }

    public function list_no_bc_edit($id_material, $kode_transaksi)
    {
        $this->db->where('id_material', $id_material);
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('no_bc')->result();
    }


    public function input_temp_no_bc($data)
    {
        $this->db->insert('temp_no_bc',$data);
    }

    public function input_no_bc($data)
    {
        $this->db->insert('no_bc',$data);
    }

    public function input_temp_list_transaksi($data)
    {
        $this->db->insert('temp_list_transaksi',$data);
    }

    public function set_temp_list_transaksi($kode_transaksi,$data1)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('temp_list_transaksi', $data1);
    }

    public function set_no_bc($kode_transaksi,$data2)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('no_bc', $data2);
    }



    public function set_qty($id_material, $data)
    {
        $this->db->where('id_material', $id_material);
        $this->db->update('material', $data);
    }

    public function update_qty_list_temp($id_temp_list_transaksi, $data1)
    {
        $this->db->where('id_temp_list_transaksi', $id_temp_list_transaksi);
        $this->db->update('temp_list_transaksi', $data1);
    }


    public function hapus_temp_list_transaksi($id)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        $this->db->delete('temp_list_transaksi');
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
        return $this->db->get('temp_list_transaksi')->result();
    
    }

    public function detail_list_transaksi($id)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        return $this->db->get('temp_list_transaksi')->row();
    
    }

    public function detail_temp_list_transaksi($id)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        return $this->db->get('temp_list_transaksi')->row();
    
    }
    
    public function update_list_transaksi($id, $data)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        $this->db->update('temp_list_transaksi', $data);
    }

    public function cek_temp_list_transaksi($id_material, $kode_transaksi)
    {
        $this->db->where('id_material', $id_material);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->where('status_transaksi', 'OUT');
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


    public function list_temp_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('temp_list_transaksi')->result();
    
    }



    public function ls_no_bc($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('no_bc')->result();
    
    }



    public function stok_lama($id_material)
    {
        $this->db->where('id_material', $id_material);
        return $this->db->get('stok_material')->row();
    
    }
    

    public function update_stok($id_material, $data2)
    {
        $this->db->where('id_material', $id_material);
        $this->db->update('stok_material', $data2);
    }


    public function update_stok_edit($id_material, $data3)
    {
        $this->db->where('id_material', $id_material);
        $this->db->update('stok_material', $data3);
    }




    public function move_to_no_bc($id_material, $kode_transaksi)
    {
        $this->db->query("
                            INSERT INTO no_bc (                                                
                                                    id_material,
                                                    no_bc,
                                                    item,
                                                    kode,
                                                    status,
                                                    unit,
                                                    kode_divisi,
                                                    status_transaksi,
                                                    kode_transaksi, 
                                                    tanggal,
                                                    qty,
                                                    id_user,
                                                    nama_user
                                                )
                            SELECT  
                                    id_material,
                                    no_bc,
                                    item,
                                    kode,
                                    status,
                                    unit,
                                    kode_divisi,
                                    status_transaksi,
                                    kode_transaksi, 
                                    tanggal,
                                    qty,
                                    id_user,
                                    nama_user
                            FROM   temp_no_bc
                            where kode_transaksi = '$kode_transaksi'
                            AND   id_material = '$id_material'
                            ");
    }


    public function move_list_transaksi($kode_transaksi)
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
                                    qty,
                                    status_transaksi,
                                    id_user
                            FROM   temp_list_transaksi
                            where kode_transaksi = '$kode_transaksi'

                            ");
    }



    public function move_to_list_transaksi($kode_transaksi)
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
                                    qty,
                                    status_transaksi,
                                    id_user
                            FROM   no_bc
                            where kode_transaksi = '$kode_transaksi'

                            ");
    }


    public function hapus_table_no_bc($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('no_bc');
    }

    public function hapus_table_temp_no_bc($id_material, $kode_transaksi)
    {
        $this->db->where('id_material', $id_material);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('temp_no_bc');
    }

    public function hapus_table_temp_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('temp_list_transaksi');
    }


    public function get_table_list_transaksi($kode_transaksi)
    {
        $this->db->query("
                            INSERT INTO temp_list_transaksi (
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
                                    qty,
                                    status_transaksi,
                                    id_user
                            FROM   list_transaksi
                            where   kode_transaksi = '$kode_transaksi'
                            AND status_transaksi = 'OUT'
                            group by id_material
                            ");
    }


    public function get_table_no_bc($kode_transaksi)
    {
        $this->db->query("
                            INSERT INTO no_bc (
                                                                id_material,
                                                                no_bc,
                                                                item,
                                                                kode,
                                                                status,
                                                                unit,
                                                                kode_divisi,
                                                                status_transaksi,
                                                                kode_transaksi, 
                                                                tanggal,
                                                                qty,
                                                                id_user,
                                                                nama_user
                                                        )
                            SELECT  
                                    id_material,
                                    no_bc,
                                    item,
                                    kode,
                                    status,
                                    unit,
                                    kode_divisi,
                                    status_transaksi,
                                    kode_transaksi, 
                                    tanggal,
                                    qty,
                                    id_user,
                                    nama_user
                            FROM   list_transaksi
                            where   kode_transaksi = '$kode_transaksi'
                            ");
    }



    

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
