<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_pelanggan($email, $password);
        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email_pelanggan;
            $is_active = $cek->is_active;
            $status = $cek->status;
            if ($status == 0) {
                $this->ci->session->set_flashdata('error', 'Akun Anda Kami Tahan, Karna Melanggar Kode Etik');
                redirect();
            }
            if ($is_active == 0) {
                $this->ci->session->set_flashdata('error', 'Akun Anda Belum TerAktivasi Melalui Email!');
                redirect();
            }
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('email_pelanggan', $email);
            $this->ci->session->set_userdata('status', $status);
            $this->ci->session->set_flashdata('pesan', 'Welcome To ' .  $nama_pelanggan . '');

            $emailLogin = $this->ci->session->set_userdata('email_pelanggan', $email);
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'satutumbal021@gmail.com',
                'smtp_pass' => 'boyxtrjljeviihqj',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];

            $this->ci->load->library('email', $config);
            $this->ci->email->from('satutumbal021@gmail.com', 'Semakar Adventure - TERHUBUNG');
            $this->ci->email->to($this->ci->input->post('email_pelanggan', $emailLogin));
            $this->ci->email->subject('Anda Telah Login');
            $this->ci->email->message('Jika Anda Tidak Merasa Login Silahkan Hubungi Kami Ya Bapak/Ibu ' . $nama_pelanggan);

            $this->ci->email->send();


            redirect(base_url());
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Email Atau Password Salah');
            redirect();
        }
    }



    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email_pelanggan') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !!!!');
            redirect('anda-belum-login-silahkan-Login-terlebih-dahulu-ya');
        }
    }
    public function proteksi_halaman1()
    {
        if ($this->ci->session->userdata('email_pelanggan') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !!!!');
            redirect('');
        }
    }

    public function logout()
    {
        // Bisa Pakai ini
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('nama_pelanggan');
        $this->ci->session->unset_userdata('email_pelanggan');
        $this->ci->session->unset_userdata('foto');


        // // Bisa Juga Pakai Ini
        // $this->ci->session->sess_destroy();
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout..');
        redirect(base_url(''));
    }
}

/* End of file User_login.php */
