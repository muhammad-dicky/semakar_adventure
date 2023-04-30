<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function getTransaksi_user()
    {
        // Belum Bayar
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = transaksi.id_produk', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pembayaran=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function getTransaksi_user_row()
    {
        // Belum Bayar
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = transaksi.id_produk', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pembayaran=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->row();
    }

    public function getTransaksi_pending()
    {
        // Pending
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = transaksi.id_produk', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pembayaran=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function getTransaksi_lunas()
    {
        // Lunas
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = transaksi.id_produk', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pembayaran=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function getTransaksi_sewaselesai()
    {
        // Sewa Selesai
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = transaksi.id_produk', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pembayaran=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function getTransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = transaksi.id_produk', 'left');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function add_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function editTransaksiAdmin($id_transaksi, $data)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }

    // public function ubah_type($id_type, $data)
    // {
    //     $this->db->where('id_type', $id_type);
    //     $this->db->update('tbl_type', $data);
    // }
    // public function hapus_type($id_type, $data)
    // {
    //     $this->db->where('id_type', $id_type);
    //     $this->db->delete('tbl_type', $data);
    // }

    // public function get_all_type_merek()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_merek');
    //     $this->db->order_by('id_merek', 'desc');
    //     return $this->db->get()->result();
    // }

    // public function tambah_merek($data)
    // {
    //     $this->db->insert('tbl_merek', $data);
    // }

    // public function ubah_merek($id_merek, $data)
    // {
    //     $this->db->where('id_merek', $id_merek);
    //     $this->db->update('tbl_merek', $data);
    // }

    // public function hapus_merek($id_merek, $data)
    // {
    //     $this->db->where('id_merek', $id_merek);
    //     $this->db->delete('tbl_merek', $data);
    // }

    // public function get_all_produk()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_produk');
    //     $this->db->join('tbl_type', 'tbl_type.id_type = tbl_produk.id_type', 'left');
    //     $this->db->join('tbl_merek', 'tbl_merek.id_merek = tbl_produk.id_merek', 'left');
    //     $this->db->order_by('tbl_produk.id_produk', 'desc');
    //     return $this->db->get()->result();
    // }

    // public function detail_produk($slug)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_produk');
    //     $this->db->join('tbl_type', 'tbl_type.id_type = tbl_produk.id_type', 'left');
    //     $this->db->join('tbl_merek', 'tbl_merek.id_merek = tbl_produk.id_merek', 'left');
    //     $this->db->where('slug', $slug);
    //     return $this->db->get()->row();
    // }


    // public function detail_kategori($kode_merek)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_produk');
    //     $this->db->join('tbl_type', 'tbl_type.id_type = tbl_produk.id_type', 'left');
    //     $this->db->join('tbl_merek', 'tbl_merek.id_merek = tbl_produk.id_merek', 'left');
    //     $this->db->where('kode_merek', $kode_merek);
    //     return $this->db->get()->row();
    // }

    // public function get_all_produk_kategori($kode_merek)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_produk');
    //     $this->db->join('tbl_type', 'tbl_type.id_type = tbl_produk.id_type', 'left');
    //     $this->db->join('tbl_merek', 'tbl_merek.id_merek = tbl_produk.id_merek', 'left');
    //     $this->db->where('tbl_merek.kode_merek', $kode_merek);
    //     return $this->db->get()->result();
    // }

    // public function tambah_product($data)
    // {
    //     $this->db->insert('tbl_produk', $data);
    // }
}
