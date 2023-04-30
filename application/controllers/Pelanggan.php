<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }
    public function index()
    {

        $email = $this->session->userdata('email');
        $data = array(
            'title'     => 'Data Pelanggan',
            'isi'       => 'back/v_pelanggan',
            'pelanggan' => $this->m_pelanggan->get_pelanggan(),
            'user' => $this->db->get_where('tbl_user', ['email' => $email])->row(),
        );

        if ($data['user']->level_user == 2) {
            $this->pelanggan_login->proteksi_halaman();
        }
        $this->load->view('back/v_wrapper', $data);
    }

    public function edit()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $status = $this->input->post('status');
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'status'       => $status,
        );

        $this->db->set('status', $status);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('tbl_pelanggan', $data);

        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit..');
        redirect('pelanggan');
    }
}
