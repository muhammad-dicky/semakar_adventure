<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
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
        $this->load->model('m_bank', 'bank');
    }

    public function index()
    {
        $this->user_login->proteksi_halaman();
        $data = array(
            'title' => 'Bank Rental',
            'isi'  => 'back/v_all_bank',
            'allbank' => $this->bank->getAllBank(),
        );
        $this->load->view('back/v_wrapper', $data);
    }

    public function tambahBank()
    {
        $data = array(
            'nama_bank'      => $this->input->post('nama_bank'),
            'nomor_rekening' => $this->input->post('nomor_rekening'),
            'nama_nasabah'   => $this->input->post('nama_nasabah'),
        );

        $this->bank->addBank($data);
        $this->session->set_flashdata('pesan', 'Bank Berhasil ditambahkan ..');
        redirect('bank');
    }

    public function editBank($id_bank)
    {
        $data = array(
            'id_bank'        => $id_bank,
            'nama_bank'      => $this->input->post('nama_bank'),
            'nomor_rekening' => $this->input->post('nomor_rekening'),
            'nama_nasabah'   => $this->input->post('nama_nasabah'),
        );

        $this->bank->updateBank($id_bank, $data);
        $this->session->set_flashdata('pesan', 'Bank <span class="badge badge-danger">' . $data['nama_bank'] . ' </span>berhasil di edit..');
        redirect('bank');
    }

    public function deleteBank($id_bank)
    {
        $this->db->where('id_bank', $id_bank);
        $this->db->delete('tbl_bank');

        $this->session->set_flashdata('pesan', 'Data Bank berhasil di Hapus..');
        redirect('bank');
    }
}
