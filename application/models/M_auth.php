<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function login_user($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }

    public function UserRow($id_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function login_pelanggan($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where(array(
            'email_pelanggan' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}

/* End of file M_auth.php */
