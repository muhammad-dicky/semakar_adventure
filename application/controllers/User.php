<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function profile()
    {

        $data = array(
            'title' => 'User Profile',
            'isi'   => 'back/v_user_profile',
            'user'  => $this->m_user->get_userone(),
        );

        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('back/v_wrapper', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $nama_user = $this->input->post('nama_user');
            $email = $this->input->post('email');


            $upload_image = $_FILES['photo_user']['name'];
            if ($upload_image) {
                $config['upload_path'] = './back/img/user/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                $config['max_size']     = '5048';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('photo_user');

                if ($upload) {
                    $gambar_lama = $this->session->userdata('photo_user');
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'back/img/user/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name', $upload);
                    $this->db->set('photo_user', $gambar_baru);
                } else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                    redirect('user/profile');
                }
            }

            $this->db->set('nama_user', $nama_user);
            $this->db->set('email', $email);
            $this->db->where('id_user', $id_user);
            $this->db->update('tbl_user');


            $this->session->set_flashdata('pesan', 'Profile Berhasil Diedit..<br>Silahkan Logout Jika ingin melihat pembaruan profile');
            redirect('user/profile');
        }
    }

    public function gantiPassword()
    {
        $email = $this->session->userdata('email');
        $data = array(
            'title' => 'Ganti Password',
            'isi'   => 'back/v_ganti_password',
            'user'  => $this->db->get_where('tbl_user', ['email' => $email])->row(),
        );

        $this->form_validation->set_rules('password', 'Password Anda', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[5]', array(
            'required' => '%s Harus Diisi !!!',
            'min_length'  => '%s Anda harus 5 karakter..'
        ));
        $this->form_validation->set_rules('password_sama', 'Konfirmasi Password Baru', 'required|matches[password_baru]', array(
            'required' => '%s Harus Diisi !!!',
            'matches'  => '%s Harus Sama..'
        ));

        if ($this->form_validation->run() == FALSE) {
            // Validasi input gagal, tampilkan pesan error
            $this->load->view('back/v_wrapper', $data);
        } else {
            // Ambil data pengguna dari database
            $user = $data['user']->password;
            $password = $this->input->post('password_baru');

            // Cek apakah password lama yang dimasukkan sesuai dengan password di database
            if ($this->input->post('password') == $user) {
                // Password lama benar, simpan password baru ke dalam database
                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('tbl_user');

                // Tampilkan pesan sukses
                $this->session->set_flashdata('pesan', 'Password Berhasil Dirubah ..');
                redirect('user/profile');
            } else {
                // Password lama salah, tampilkan pesan error
                $this->session->set_flashdata('error', 'Password Lama Salah!!');
                redirect('user/profile');
            }
        }
    }

    public function userDataAll()
    {
        $data = array(
            'title'     => 'Data User',
            'isi'       => 'back/v_user',
            'user' => $this->m_user->get_userone(),
            'userall' => $this->m_user->get_user(),
        );

        if ($this->session->userdata('level_user') == 2) {
            $this->pelanggan_login->proteksi_halaman();
        }
        $this->load->view('back/v_wrapper', $data);
    }

    public function edit()
    {
        $nama_user = $this->input->post('nama_user');
        $id_user = $this->input->post('id_user');
        $status_user = $this->input->post('status_user');
        $data = array(
            'id_user'         => $id_user,
            'status_user'     => $status_user,
        );
        if ($id_user == '') {
            $this->pelanggan_login->proteksi_halaman();
        }

        $this->db->set('status_user', $status_user);
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', $data);

        $this->session->set_flashdata('pesan', 'Data ' . $nama_user . ' Berhasil Diedit..');
        redirect('user/userDataAll');
    }

    public function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_user');

        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('user/userDataAll');
    }

    public function tambahuser()
    {
        $this->form_validation->set_rules('email', 'E-Mail', 'required|is_unique[tbl_user.email]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan E-mail Lain..'
        ));

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title'     => 'Data User',
                'isi'       => 'back/v_user',
                'user' => $this->m_user->get_userone(),
                'userall' => $this->m_user->get_user(),
            );
            $this->load->view('back/v_wrapper', $data);
        } else {

            $nama_user = $this->input->post('nama_user');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $level_user = $this->input->post('level_user');
            $status_user = $this->input->post('status_user');
            $photo_user = $this->input->post('photo_user');
            $data = array(
                'nama_user'     => $nama_user,
                'email'     => $email,
                'password'     => $password,
                'level_user'     => $level_user,
                'status_user'     => $status_user,
                'photo_user'     => $photo_user,
            );

            $this->db->set('nama_user', $nama_user);
            $this->db->set('email', $email);
            $this->db->set('password', $password);
            $this->db->set('level_user', $level_user);
            $this->db->set('status_user', $status_user);
            $this->db->set('photo_user', $photo_user);
            $this->db->insert('tbl_user', $data);

            $this->session->set_flashdata('pesan', 'Data ' . $nama_user . ' Berhasil Ditambah..');
            redirect('user/userDataAll');
        }
    }
}
