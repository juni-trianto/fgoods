<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_material extends CI_Model {


    public function data()
    {
        return $this->db->get('material')->result();
    }
    


    public function total_rows($q = NULL) 
    {
        $this->db->like('item', $q);
        $this->db->or_like('kode', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('unit', $q);
        $this->db->or_like('kode_divisi', $q);
        $this->db->from('material');
        return $this->db->count_all_results();
    }

    
    public function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->like('item', $q);
        $this->db->or_like('kode', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('unit', $q);
        $this->db->or_like('kode_divisi', $q);
        $this->db->limit($limit,$start);
        return $this->db->get('material')->result();  
    }

    public function divisi()
    {
        return $this->db->get('divisi')->result();
    }
    

    public function detail($id)
    {
        $this->db->where('id_material', $id);
        return $this->db->get('material')->row();
    
    }

    public function detail_stok($id)
    {
        $this->db->where('id_material', $id);
        return $this->db->get('stok_material')->row();
    }


    public function input($data)
    {
        $this->db->insert('material',$data);
    }



    public function update($id,$data)
    {
        $this->db->where('id_material', $id);
        $this->db->update('material', $data);
    }



    public function hapus($id)
    {
        $this->db->where('id_material', $id);
        $this->db->delete('material');
    }

    public function empty()
    {
        $this->db->truncate('material');
    }


     function upload($data = array())
    {
        $jumlah = count($data);
 
        if ($jumlah > 0)
        {
            $this->db->insert_batch('material', $data);
        }
    }


    

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
