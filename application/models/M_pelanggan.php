<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
    }

    public function registertoken($data)
    {
        $this->db->insert('tbl_token', $data);
    }

    public function registerotp($data)
    {
        $this->db->insert('tbl_otp', $data);
    }

    public function get_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        return $this->db->get()->result();
    }
}

/* End of file M_pelanggan.php */
