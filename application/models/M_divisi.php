<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_divisi extends CI_Model {


    public function data()
    {
        return $this->db->get('divisi')->result();
    }
    

    public function detail($id)
    {
        $this->db->where('id_divisi', $id);
        return $this->db->get('divisi')->row();
    
    }


    public function input($data)
    {
        $this->db->insert('divisi',$data);
    }



    public function update($id,$data)
    {
        $this->db->where('id_divisi', $id);
        $this->db->update('divisi', $data);
    }



    public function hapus($id)
    {
        $this->db->where('id_divisi', $id);
        $this->db->delete('divisi');
    }





    

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
