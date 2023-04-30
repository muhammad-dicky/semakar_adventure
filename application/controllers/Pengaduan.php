<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
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
        $this->load->model('m_pesan', 'pesan');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $data = $this->pesan->searchPengaduan($keyword);
        $data = array(
            'title'          => 'Pengaduan Email',
            'isi'            => 'back/v_pengaduan',
            'pengaduan'      => $this->pesan->tampilKontak(),
            'keyword'        => $keyword,
            'data'           => $data,
        );
        $this->load->view('back/v_wrapper', $data);
    }
}
