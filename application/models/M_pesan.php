<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pesan extends CI_Model
{
    public function tampilKontak()
    {
        $this->db->select('*');
        $this->db->from('tbl_kontak');
        $this->db->order_by('tbl_kontak.id_kontak', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

    public function addKontak($data)
    {
        return $this->db->insert('tbl_kontak', $data);
    }

    public function searchPengaduan($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_kontak');
        if (!empty($keyword)) {
            $this->db->like('nama_kontak', $keyword);
        }
        return $this->db->get()->result();
    }
}
