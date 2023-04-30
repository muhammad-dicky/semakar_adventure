<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
        $this->load->model('m_produk', 'produk');
        $this->load->library('User_login');
        $this->load->library('Pelanggan_login');
        $this->load->model('m_transaksi', 'transaksi');
    }

    public function index()
    {
        $this->user_login->proteksi_halaman();
        $data = array(
            'title' => 'Transaksi All Pelanggan',
            'isi'  => 'back/v_transaksi_all',
            'alltransaksi' => $this->transaksi->getTransaksi(),
            'transaksi_belum_bayar' => $this->transaksi->getTransaksi_user(),
            'transaksi_pending' => $this->transaksi->getTransaksi_pending(),
            'transaksi_lunas' => $this->transaksi->getTransaksi_lunas(),
            'transaksi_sewaselesai' => $this->transaksi->getTransaksi_sewaselesai(),
        );
        $this->load->view('back/v_wrapper', $data);
    }

    public function prosesEditPesanan($id_transaksi)
    {
        $status = $this->input->post('status_pembayaran');

        $this->db->set('status_pembayaran', $status);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');

        $this->session->set_flashdata('pesan', 'Data berhasil diedit...');
        redirect('transaksi');
    }

    public function prosesEditPesananLunas($id_transaksi)
    {
        $status = $this->input->post('status_pembayaran');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $total_denda = $this->input->post('total_denda');
        $status_rental = $this->input->post('status_rental');
        $status_pengembalian = $this->input->post('status_pengembalian');

        $data = array(
            'id_transaksi'         => $id_transaksi,
            'status_pembayaran'    => $status,
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'total_denda'          => $total_denda,
            'status_rental'        => $status_rental,
            'status_pengembalian'  => $status_pengembalian,
        );

        $this->transaksi->editTransaksiAdmin($id_transaksi, $data);
        $this->session->set_flashdata('pesan', 'Data berhasil diedit...');
        redirect('transaksi');
    }
}
