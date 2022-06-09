<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	
    
    function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }
 
    function login1($username) {
        $this->db->where('username', $username);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }
    
    function data_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user')->row();
    }
	
    function data_login1($username) {
        $this->db->where('username', $username);
        return $this->db->get('user')->row();
    }
	
	function akses_menu($id) {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_aksesmenu')->row();
    }
	
    function cek_user_login($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->where('login', 'On');
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    public function set_login($id_user,$data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }

    public function reset_login($data)
    {
        $this->db->where('login', 'On');
        $this->db->update('user', $data);
    }


    public function input_log($data2)
    {
        $this->db->insert('log_user', $data2);
    }

	
}
