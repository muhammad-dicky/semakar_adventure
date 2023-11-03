<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_bank extends CI_Model
{
    public function getAllBank()
    {
        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->order_by('id_bank', 'asc');
        return $this->db->get()->result();
    }

    public function addBank($data)
    {
        $this->db->insert('tbl_bank', $data);
    }

    public function updateBank($id_bank, $data)
    {
        $this->db->where('id_bank', $id_bank);
        $this->db->update('tbl_bank', $data);
    }
}
