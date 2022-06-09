<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tambah extends CI_Model {

public function data_material()
    {
        return $this->db->query("
                            SELECT 
                                    
                                    item,   
                                    kode,
                                    kode_divisi
                            FROM
                                    list_transaksi
                            where status_transaksi = 'PO' 
                            group by id_material 


                            ")->result();
    }

public function jumlah_material_in($kode)
    {
        return $this->db->query("
                            SELECT 
                                    (SELECT SUM(qty) FROM list_transaksi WHERE status_transaksi = 'PO' AND kode = '$kode') as qty
                            FROM
                                    list_transaksi
                            WHERE kode = '$kode' 
                            ")->row();
    }

public function jumlah_material_out($kode)
    {
        return $this->db->query("
                            SELECT 
                                    (SELECT SUM(qty) FROM list_transaksi WHERE status_transaksi = 'IN' AND kode = '$kode') as qty
                            FROM
                                    list_transaksi
                            WHERE kode = '$kode' 
                            ")->row();
    }

    public function cek_temp_list_transaksi($kode, $kode_transaksi)
    {
        $this->db->where('kode', $kode);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->where('status_transaksi', 'IN');
        $query =  $this->db->get('temp_list_transaksi');
        return $query->num_rows();

    }


    public function cek_kode()

    {
        $this->db->where('status_transaksi', 'IN');
        $query =  $this->db->get('transaksi');
        return $query->num_rows();
    }


    public function kode_transaksi()

    {
        $this->db->where('status_transaksi', 'IN');
        $this->db->select_max('kode_transaksi', 'kode');
        return $this->db->get('transaksi')->row();
    }


    public function list_no_bc($kode, $kode_transaksi)
    {
        $this->db->where('kode', $kode);
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('temp_no_bc')->result();
    }

    public function jml_qty_temp_no_bc($kode, $kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(qty) as jml_qty,
                                ')
                        ->from ('temp_no_bc')
                        ->where ('kode', $kode)
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }

    public function detail_item($kode)
    {
        $this->db->where('list_transaksi.kode', $kode);
        $this->db->join('stok_material', 'stok_material.kode = list_transaksi.kode', 'RIGHT');
        return $this->db->get('list_transaksi')->row();
    
    }

    public function data_no_bc($kode)
    {
        return $this->db->query("
                            SELECT 
                                    tanggal,   
                                    id_list_transaksi,   
                                    item,   
                                    kode,   
                                    no_bc,   
                                    status_transaksi,   
                                    qty,   
                                    kode
                            FROM
                                    list_transaksi
                            WHERE
                                    status_transaksi = 'PO'
                            AND
                                    kode = '$kode'
                            
                            group by no_bc 


                            ")->result();
    }    


    public function qty_no_bc($kode, $no_bc)
    {
        return $this->db->query("
                            SELECT 
                                    SUM(qty) as jml_qty_no_bc
                            FROM
                                    no_bc
                            WHERE
                                    no_bc = '$no_bc'
                            AND
                                    kode = '$kode'
                            
                            ")->row();
    }    

    public function jumlah_qty_in($kode, $no_bc)
    {
       
        $this->db->select('sum(qty) as jml_qty');
        $this->db->where('kode', $kode);
        $this->db->where('no_bc', $no_bc);
        $this->db->where('status_transaksi', 'PO');
        $this->db->from('list_transaksi');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }

    public function jumlah_qty_out($kode, $no_bc)
    {
       
        $this->db->select('sum(qty) as jml_qty');
        $this->db->where('kode', $kode);
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

    public function cek_data_temp_no_bc($kode, $no_bc)
    {
        $this->db->where('no_bc', $no_bc);
        $this->db->where('kode', $kode);
        $query =  $this->db->get('temp_no_bc');
        return $query->num_rows();

    }

    public function detail_kode_material($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->get('material')->row();    
    }

    public function input_temp_no_bc($data)
    {
        $this->db->insert('temp_no_bc',$data);
    }

    public function hapus_temp_no_bc($id)
    {
        $this->db->where('id_temp_no_bc', $id);
        $this->db->delete('temp_no_bc');
    }
    
    public function detail_material($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->get('material')->row();
    
    }

    public function input_temp_list_transaksi($data)
    {
        $this->db->insert('temp_list_transaksi',$data);
    }

    public function move_to_no_bc($kode, $kode_transaksi)
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
                                    round(qty,4),
                                    id_user,
                                    nama_user
                            FROM   temp_no_bc
                            where kode_transaksi = '$kode_transaksi'
                            AND   kode = '$kode'
                            ");
    }

    public function hapus_table_temp_no_bc($kode, $kode_transaksi)
    {
        $this->db->where('kode', $kode);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('temp_no_bc');
    }

    public function list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('temp_list_transaksi')->result();
    
    }

    public function cek_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query =  $this->db->get('temp_list_transaksi');
        return $query->num_rows();

    }

    public function jml_qty_no_bc($kode, $kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(qty) as jml_qty,
                                ')
                        ->from ('no_bc')
                        ->where ('kode', $kode)
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }

    public function hapus_temp_list_transaksi($id)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        $this->db->delete('temp_list_transaksi');
    }

    public function detail_list_transaksi($id)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        return $this->db->get('temp_list_transaksi')->row();
    
    }

    public function list_no_bc_edit($kode, $kode_transaksi)
    {
        $this->db->where('kode', $kode);
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get('no_bc')->result();
    }


    public function jml_qty_no_bc_edit($kode, $kode_transaksi)
    {
        return $this->db->select('                                  
                                    sum(qty) as jml_qty,
                                ')
                        ->from ('no_bc')
                        ->where ('kode', $kode)
                        ->where ('kode_transaksi', $kode_transaksi)
                        ->get()->row();
    }

    public function hapus_no_bc($id)
    {
        $this->db->where('id_no_bc', $id);
        $this->db->delete('no_bc');
    }

    public function input_no_bc($data)
    {
        $this->db->insert('no_bc',$data);
    }

    public function cek_data_no_bc($kode, $no_bc)
    {
        $this->db->where('no_bc', $no_bc);
        $this->db->where('kode', $kode);
        $query =  $this->db->get('no_bc');
        return $query->num_rows();

    }

    public function update_list_transaksi($id, $data)
    {
        $this->db->where('id_temp_list_transaksi', $id);
        $this->db->update('temp_list_transaksi', $data);
    }


    public function set_no_bc($kode_transaksi,$data2)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('no_bc', $data2);
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
                                    round(qty,4),
                                    status_transaksi,
                                    id_user
                            FROM   no_bc
                            where kode_transaksi = '$kode_transaksi'

                            ");
    }

    public function hapus_table_temp_list_transaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('temp_list_transaksi');
    }
    

    public function hapus_table_no_bc($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('no_bc');
    }

    
    public function input($data)
    {
        $this->db->insert('transaksi',$data);
    }

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
