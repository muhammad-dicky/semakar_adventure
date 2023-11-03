<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_user($email, $password);
        if ($cek) {
            $id_user = $cek->id_user;
            $nama_user = $cek->nama_user;
            $email = $cek->email;
            $level_user = $cek->level_user;
            $status_user = $cek->status_user;
            $photo_user = $cek->photo_user;

            $where = array(
                'email' => $email,
                'password' => $password,
                'status_user' => 1,
                'photo_user'  => $photo_user,
            );

            if ($status_user == 0) {
                $this->ci->session->set_flashdata('error', '<p>' . $cek->nama_user . ' Akun Anda Sedang Kami Tahan..<br>Karna Melanggar Kode Etik.<br><br> <a href="https://api.whatsapp.com/send?phone=6281325511785&text=Hallo%20Kenapa%20Akun%20Saya%20Di%20Tahan%20Ya??" target="_blank" class="btn btn-success btn-md"><i class="bi bi-whatsapp"></i> Silahkan Hubungi Admin..</a></p>');
                redirect('auth/login');
            }
            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('level_user', $level_user);
            $this->ci->session->set_userdata('status_user', $status_user);
            $this->ci->session->set_userdata('photo_user', $photo_user);
            redirect('dashboard');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Email Atau Password Salah');
            redirect('auth/login');
        }
    }


    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !!!!');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
        redirect('auth/login');
    }
}

/* End of file User_login.php */
