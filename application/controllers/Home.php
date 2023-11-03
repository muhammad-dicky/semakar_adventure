<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->model('m_produk', 'produk');
        $this->load->library('User_login');
        $this->load->library('Pelanggan_login');
        $this->load->model('m_transaksi', 'transaksi');
        $this->load->model('m_bank', 'bank');
        $this->load->model('m_pesan', 'pesan');
<<<<<<< HEAD


        // construct percobaan
        $this->config->load('midtrans', TRUE);
        require_once APPPATH . 'libraries/Mid/Midtrans.php';

        \Midtrans\Config::$serverKey = 'SB-Mid-server-OKBa9QyvCPuRIG7ItfaGaAKS';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
=======
>>>>>>> d7d97e22d69308f7dd9dc1a6d86ecc0872f485e8
        
    }

    public function index()
    {
<<<<<<< HEAD
      
=======

       
>>>>>>> d7d97e22d69308f7dd9dc1a6d86ecc0872f485e8
        $this->form_validation->set_rules('email_pelanggan', 'E-Mail', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email_pelanggan', TRUE);
            $password = $this->input->post('password', TRUE);

            $this->pelanggan_login->login($email, $password);
        }

        $data = array(
            'title' => 'Sewa Perlengkapan Outoor',
            'produk'  => $this->produk->getLimitProduk(),
        );
        $this->load->view('front/index', $data, FALSE);
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required|max_length[7]', array(
            'required' => '%s Harus Diisi !!!',
            'max_length' => '%s Harus 7 Karakter Saja !!'
        ));
        $this->form_validation->set_rules('email_pelanggan', 'E-mail', 'required|is_unique[tbl_pelanggan.email_pelanggan]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Email Ini Sudah Terdaftar ...!'
        ));
        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Haris Diisi !!!'
        ));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', array(
            'required' => '%s Haris Diisi !!!',
            'matches' => '%s Password Tidak Sama ...!'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Sewa Perlengkapan Outdoor - Yogyakarta',
            );

            $this->load->view('front/index', $data, FALSE);
        } else {
            $email = $this->input->post('email_pelanggan');
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email_pelanggan' => $email,
                'password' => $this->input->post('password'),
                'gambar_pelanggan' => 'default.jpg',
                'is_active' => 0,
                'status' => 1,
            );

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];


            $this->m_pelanggan->register($data);
            $this->m_pelanggan->registertoken($user_token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('pesan', 'Hai!, Kami telah menerima pendaftaran akun kamu di Semakar Adventure, silahkan cek email kamu untuk aktivasi akun kamu. Terima Kasih!');
            redirect(base_url());
        }
    }

    protected function _sendEmail($token, $type)
    {
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

        $this->load->library('email', $config);
        $this->email->from('satutumbal021@gmail.com', 'Semakar Adventure - Aktivasi');
        $this->email->to($this->input->post('email_pelanggan'));

        if ($type == 'verify') {
            $this->email->subject('Silahkan Aktivasi Akun Anda');
            $this->email->message('Klik Untuk Aktivasi Akun-mu : <a href="' . base_url() . 'home/verify?email_pelanggan=' . $this->input->post('email_pelanggan') . '&token=' . urlencode($token) . '">Active</a>');
        }

        $this->email->send();

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email_pelanggan');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $email])->row_array();

        if ($user) {
            $tbl_token = $this->db->get_where('tbl_token', ['token' => $token])->row_array();
            if ($tbl_token) {
                if (time() - $tbl_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email_pelanggan', $email);
                    $this->db->update('tbl_pelanggan');

                    $this->db->delete('tbl_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', 'Selamat, Email ' . $email . ' Sudah Berhasil Di Aktivasi, Silahkan Login !!');
                    redirect(base_url());
                } else {
                    $this->db->delete('tbl_pelanggan', ['email_pelanggan' => $email]);
                    $this->db->delete('tbl_token', ['email' => $email]);
                    $this->session->set_flashdata('error', 'Token Sudah Expired/Kadaluarsa !!');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('error', 'Token Tidak Valid !!');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', 'Email ini tidak ada di database');
            redirect(base_url());
        }
    }


    public function detail_produk($slug)
    {
        $email_pelanggan = $this->session->userdata('email_pelanggan');
        $data = array(
            'title' => 'Detail Product',
            'produkdetail'  => $this->produk->detail_produk($slug),
            'produk'  => $this->produk->get_all_produk(),
            'type_produk'  => $this->produk->get_all_type_merek(),
            'transaksiall' => $this->transaksi->getTransaksi(),
            'pelanggan'  => $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $email_pelanggan])->row(),
        );
        $this->load->view('front/v_produk_detail', $data);
    }

    public function kategori($kode_merek)
    {
        $data = array(
            'title' => 'Semua Kategori',
            'kategoridetail'  => $this->produk->detail_kategori($kode_merek),
            'produk'  => $this->produk->get_all_produk(),
            'produk_kategori'  => $this->produk->get_all_produk_kategori($kode_merek),
            'type_produk'  => $this->produk->get_all_type_merek(),
        );
        $this->load->view('front/v_kategori_detail', $data);
    }

    public function edit_pelanggan()
    {
        $this->pelanggan_login->proteksi_halaman();
        $email_pelanggan = $this->session->userdata('email_pelanggan');
        $data = array(
            'title' => 'Edit Profile',
            'pelanggan'  => $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $email_pelanggan])->row(),
        );
        $this->load->view('front/v_edit_profile_pelanggan', $data);

        if ($data['pelanggan']->upload_ktp == false) {
            $this->session->set_flashdata('error', '<b>Anda Harus Isi Lengkap Profile Anda Termasuk KTP Dan SIM.. </b>');
        }
    }

    public function edit_pelanggan_aksi($id_pelanggan)
    {
        $this->pelanggan_login->proteksi_halaman();
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $nik_ktp = $this->input->post('nik_ktp');
        $no_sim = $this->input->post('no_sim');

        //UPLOAD GAMBAR PROFILE
        $upload_image = $_FILES['gambar_pelanggan']['name'];
        if ($upload_image) {
            $config['upload_path'] = './front/pelanggan/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '5048';
            $config['max_width'] = '2024';
            $config['max_height'] = '2024';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('gambar_pelanggan');

            if ($upload) {
                $gambar_lama = $this->session->userdata('gambar_pelanggan');
                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'front/pelanggan/img/' . $gambar_lama);
                }

                $gambar_baru = $this->upload->data('file_name', $upload);
                $this->db->set('gambar_pelanggan', $gambar_baru);
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                redirect('user/profile');
            }
        }

        //UPLOAD KTP
        $upload_ktp = $_FILES['upload_ktp']['name'];
        if ($upload_ktp) {
            $config['upload_path'] = './front/pelanggan/img-identitas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '5048';
            $config['max_width'] = '2024';
            $config['max_height'] = '2024';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('upload_ktp');

            if ($upload) {
                $gambar_lama = $this->session->userdata('upload_ktp');
                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'front/pelanggan/img-identitas/' . $gambar_lama);
                }

                $gambar_baru = $this->upload->data('file_name', $upload);
                $this->db->set('upload_ktp', $gambar_baru);
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                redirect('user/profile');
            }
        }


        //UPLOAD SIM
        $upload_sim = $_FILES['upload_sim']['name'];
        if ($upload_sim) {
            $config['upload_path'] = './front/pelanggan/img-identitas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '5048';
            $config['max_width'] = '2024';
            $config['max_height'] = '2024';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('upload_sim');

            if ($upload) {
                $gambar_lama = $this->session->userdata('upload_sim');
                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'front/pelanggan/img-identitas/' . $gambar_lama);
                }

                $gambar_baru = $this->upload->data('file_name', $upload);
                $this->db->set('upload_sim', $gambar_baru);
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                redirect('user/profile');
            }
        }

        $this->db->set('nama_pelanggan', $nama_pelanggan);
        $this->db->set('nik_ktp', $nik_ktp);
        $this->db->set('no_sim', $no_sim);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('tbl_pelanggan');

        $this->session->set_flashdata('pesan', 'Profile Berhasil Di Edit ..');
        redirect('profile');
    }

<<<<<<< HEAD
   

=======
    public function booking_pelanggan()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Riwayat Booking',
            'transaksi' => $this->transaksi->getTransaksi_user(),
            'transaksi_pending' => $this->transaksi->getTransaksi_pending(),
            'transaksi_lunas' => $this->transaksi->getTransaksi_lunas(),
            'transaksi_sewaselesai' => $this->transaksi->getTransaksi_sewaselesai(),
        );
        $this->load->view('front/v_booking_saya', $data);
    }
>>>>>>> d7d97e22d69308f7dd9dc1a6d86ecc0872f485e8

    public function bayarPesanan()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title'         => 'Bayar Pesanan',
            'transaksi'     => $this->transaksi->getTransaksi_user(),
            'transaksi_row' => $this->transaksi->getTransaksi_user_row(),
            'allbank'       => $this->bank->getAllBank(),
        );
        $this->load->view('front/v_bayar_sekarang', $data);
<<<<<<< HEAD


=======
>>>>>>> d7d97e22d69308f7dd9dc1a6d86ecc0872f485e8
    }

    public function prosesBayarPesanan($id_transaksi)
    {
        $this->form_validation->set_rules('atas_nama_pelanggan', 'Atas Nama Pelanggan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './front/pelanggan/bukti-pembayaran/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '2000';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            $field_name = 'bukti_pembayaran';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Bayar Pesanan',
                    'transaksi' => $this->transaksi->getTransaksi_user(),
                    'transaksi_row' => $this->transaksi->getTransaksi_user_row(),
                );
                $this->load->view('front/v_bayar_sekarang', $data, FALSE);
            } else {
                $upload_data    = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './front/pelanggan/bukti-pembayaran/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_transaksi' => $id_transaksi,
                    'total_bayar' => $this->input->post('total_bayar'),
                    'atas_nama_pelanggan' => $this->input->post('atas_nama_pelanggan'),
                    'nama_bank_pelanggan' => $this->input->post('nama_bank_pelanggan'),
                    'nomor_rekening_pelanggan' => $this->input->post('nomor_rekening_pelanggan'),
                    'bukti_pembayaran' => $upload_data['uploads']['file_name'],
                    'status_pembayaran' => 1,
                );
                $this->transaksi->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Di Upload !!!');
                redirect('booking-pelanggan');
            }
        }

        $data = array(
            'title' => 'Bayar Pesanan',
            'transaksi' => $this->transaksi->getTransaksi_user(),
            'transaksi_row' => $this->transaksi->getTransaksi_user_row(),
        );
        $this->load->view('front/v_bayar_sekarang', $data, FALSE);
    }

    public function pesanPelangganAksi()
    {
        $this->pelanggan_login->proteksi_halaman();

        $data['allbank'] = $this->bank->getAllBank();
        $id_pelanggan = $this->input->post('id_pelanggan');
        $id_produk = $this->input->post('id_produk');
        $tanggal_rental = $this->input->post('tanggal_rental');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $harga = $this->input->post('harga');
        // perhari
        $berapa_hari = $this->input->post('berapa_hari');
        // end
        // sub_total
        $sub_total = $harga * $berapa_hari;
        $status_pembayaran = 0;

        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'id_produk' => $id_produk,
            'tanggal_rental' => $tanggal_rental,
            'tanggal_kembali' => $tanggal_kembali,
            'harga' => $harga,
            'berapa_hari' => $berapa_hari,
            'sub_total' => $sub_total,
            'status_pembayaran' => $status_pembayaran,
        );

<<<<<<< HEAD
       

=======
>>>>>>> d7d97e22d69308f7dd9dc1a6d86ecc0872f485e8
        $this->transaksi->add_transaksi($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil ditambahkan..');
        // Kirim Email Setelah Pesanan Berhasil Di Pesan
        $emailLogin = $this->session->userdata('email_pelanggan');
        $nama_pelanggan = $this->session->userdata('nama_pelanggan');
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

        $this->load->library('email', $config);
        $this->email->from('satutumbal021@gmail.com', 'Sewa Rental');
        $this->email->to($emailLogin);
        $this->email->subject('Silahkan Melanjutkan Pembayaran');
        $this->email->message('
        <h1>Pembayaran Sewa Rental</h1>
    <h4>IDR ' . number_format($sub_total, 0, '', '.') . '</h4>
    <div style="background-color: dodgerblue; color: white; width: auto; height: 20px">
        <p>Menunggu Pembayaran</p>
    </div>
    <br>
    <p>Dear ' . $nama_pelanggan . '</p><br>
    <p>Silahkan Melanjutkan Pembayaran Anda.</p>
    <p>Total yang harus di bayar : <b>Rp. ' . number_format($sub_total, 0, '', '.') . '</b></p>

    <br>
    <p>Terima Kasih</p> 
        ' . $nama_pelanggan);

        $this->email->send();
        // end 
        redirect('booking-pelanggan');
    }

    public function addKontak()
    {
        $nama_kontak = $this->input->post('nama_kontak');
        $email_kontak = $this->input->post('email_kontak');
        $subject_kontak = $this->input->post('subject_kontak');
        $pesan_kontak = $this->input->post('pesan_kontak');
        $data = array(
            'nama_kontak'     => $nama_kontak,
            'email_kontak'    => $email_kontak,
            'subject_kontak'  => $subject_kontak,
            'pesan_kontak'    => $pesan_kontak,
            'tanggal_laporan' => date("l, d-m-Y  H:i:s"),
        );
        $this->pesan->addKontak($data);
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

        $this->load->library('email', $config);
        $this->email->from($email_kontak, 'Email Pengaduan - Semakar Adventure');
        $this->email->to('satutumbal021@gmail.com');
        $this->email->subject($subject_kontak);
        $this->email->message($pesan_kontak);
        $this->email->send();

        $this->session->set_flashdata('pesan', 'Pesan Anda Berhasil Dikirim ke Email Customer Services Kami');
        redirect('');
    }

    public function logout()
    {
        $this->pelanggan_login->proteksi_halaman();
        $this->pelanggan_login->logout();
    }
<<<<<<< HEAD



    public function booking_pelanggan()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Riwayat Booking',
            'transaksi' => $this->transaksi->getTransaksi_user(),
            'transaksi_pending' => $this->transaksi->getTransaksi_pending(),
            'transaksi_lunas' => $this->transaksi->getTransaksi_lunas(),
            'transaksi_sewaselesai' => $this->transaksi->getTransaksi_sewaselesai(),
           
        );


        $transaksi = $this->transaksi->getTransaksi_user();
        // $transaksi = $this->transaksi->getTransaksi_user();
        $sub_total_array = array();
        $id_transaksi_array = array();

        foreach ($transaksi as $transaksi_item) {
            $sub_total_array[] = strval($transaksi_item->sub_total);
            $id_transaksi_array[] = $transaksi_item->id_transaksi;
        }

        $first_sub_total = !empty($sub_total_array) ? $sub_total_array[0] : 0;
        $first_id_transaksi = !empty($id_transaksi_array) ? $id_transaksi_array[0] : 0;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $first_id_transaksi,
                'gross_amount' => $first_sub_total,
            )
        );
        $snapToken = '';
        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (\Throwable $th) {
            
        }

        $data['snapToken'] = $snapToken;

        $this->load->view('front/v_booking_saya', $data);
    }



    public function handlePaymentCallback()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Riwayat Booking',
            'transaksi' => $this->transaksi->getTransaksi_user(),
            'transaksi_pending' => $this->transaksi->getTransaksi_pending(),
            'transaksi_lunas' => $this->transaksi->getTransaksi_lunas(),
            'transaksi_sewaselesai' => $this->transaksi->getTransaksi_sewaselesai(),
           
        );
       
        // Menerima callback dari Midtrans
        $status_code = $this->input->post('status_code');
        $id_transaksi = $this->input->post('order_id');
    
        if ($status_code === '200') {
            // Jika status_code adalah 200, maka pembayaran sukses
            $this->load->model('m_transaksi', 'transaksi');
            $this->transaksi->updateStatusPembayaran($id_transaksi);
        }
    
        $this->load->view('front/v_booking_saya', $data);

    }
    


    public function handlingCallback() {
        $notif = new \Midtrans\Notification();
    
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
    
        if ($transaction == 'capture' && $type == 'credit_card') {
            // Capture dengan payment_type credit_card dan transaksi berhasil
            $this->load->model('M_transaksi');
            $this->M_transaksi->updateStatusPembayaran($order_id, 2);
            echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
        } elseif ($transaction == 'settlement') {
            // Transaksi sukses (settlement)
            $this->load->model('M_transaksi');
            $this->M_transaksi->updateStatusPembayaran($order_id, 2);
            echo "Transaction order_id: " . $order_id . " successfully transferred using " . $type;
        } elseif ($transaction == 'pending') {
            // Transaksi tertunda (pending)
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } elseif ($transaction == 'deny') {
            // Transaksi ditolak (deny)
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } elseif ($transaction == 'expire') {
            // Transaksi kedaluwarsa (expire)
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        } elseif ($transaction == 'cancel') {
            // Transaksi dibatalkan (cancel)
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }


    }
    



=======
>>>>>>> d7d97e22d69308f7dd9dc1a6d86ecc0872f485e8
}
