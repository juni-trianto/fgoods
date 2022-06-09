<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {


    public function data()
    {            
        return $this->db->get('user')->result();
    }
    

    public function detail($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    
    }


    public function input($data)
    {
        $this->db->insert('user',$data);
    }



    public function update($id,$data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }


    public function hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function cek_nip($nip)
    {
        $this->db->where('nip', $nip);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    public function cek_edit_nip($lama, $baru)
    {
        $this->db->where_not_in('nip', $lama);
        $this->db->where_in('nip', $baru);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    public function cek_username($username)
    {
        $this->db->where('username', $username);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    public function cek_edit_username($lama, $baru)
    {
        $this->db->where_not_in('username', $lama);
        $this->db->where_in('username', $baru);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    public function cek_email($email)
    {
        $this->db->where('email', $email);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }


    public function cek_edit_email($lama, $baru)
    {
        $this->db->where_not_in('email', $lama);
        $this->db->where_in('email', $baru);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    public function cek_id_nip($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->get('user')->row();
    
    }

/*akses menu*/
  public function view_menu($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_aksesmenu')->row();
    
    }

    public function insert_akses($data)
    {
        $this->db->insert('tb_aksesmenu',$data);
    }
	
	public function hapus_akses($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_aksesmenu');
    }   

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
