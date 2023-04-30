<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
        $this->load->model('m_produk', 'produk');
    }

    public function typeproduk()
    {
        $data = array(
            'title' => 'Type Produk',
            'isi'   => 'back/v_typeproduk',
            'type_produk'  => $this->produk->get_all_type(),
        );
        $this->load->view('back/v_wrapper', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode_type', 'Kode Type', 'required|is_unique[tbl_type.kode_type]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Kode Type Lain..'
        ));

        $this->form_validation->set_rules('nama_type', 'Nama Type', 'required|is_unique[tbl_type.nama_type]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Nama Type Lain..'
        ));

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Type Produk',
                'isi'   => 'back/v_type_produk',
                'type_produk'  => $this->produk->get_all_type(),
            );
            $this->load->view('back/v_wrapper', $data);
        } else {
            $kode_type = $this->input->post('kode_type');
            $nama_type = $this->input->post('nama_type');

            $data = array(
                'kode_type' => $kode_type,
                'nama_type' => $nama_type,
            );

            $this->produk->tambah_type($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan..');
            redirect('barang/typeproduk');
        }
    }

    public function ubah($id_type)
    {
        $this->form_validation->set_rules('kode_type', 'Kode Type', 'required|is_unique[tbl_type.kode_type]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Kode Type Lain..'
        ));

        $this->form_validation->set_rules('nama_type', 'Nama Type', 'required|is_unique[tbl_type.nama_type]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Nama Type Lain..'
        ));

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Type Produk',
                'isi'   => 'back/v_type_produk',
                'type_produk'  => $this->produk->get_all_type(),
            );
            $this->load->view('back/v_wrapper', $data);
        } else {
            // $id_type = $this->input->post('id_type');
            $kode_type = $this->input->post('kode_type');
            $nama_type = $this->input->post('nama_type');

            $data = array(
                'id_type'  => $id_type,
                'kode_type' => $kode_type,
                'nama_type' => $nama_type,
            );

            $this->produk->ubah_type($id_type, $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan..');
            redirect('barang/typeproduk');
        }
    }

    public function hapus($id_type)
    {

        $data = array(
            'id_type'   => $id_type,
        );

        $this->produk->hapus_type($id_type, $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus..');
        redirect('barang/typeproduk');
    }

    public function typemerek()
    {
        $data = array(
            'title' => 'Type Merek',
            'isi'   => 'back/v_type_merek',
            'type_merek'  => $this->produk->get_all_type_merek(),
        );
        $this->load->view('back/v_wrapper', $data);
    }

    public function tambahmerek()
    {
        $this->form_validation->set_rules('kode_merek', 'Kode Merek', 'required|is_unique[tbl_merek.kode_merek]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Kode Type Lain..'
        ));

        $this->form_validation->set_rules('nama_merek', 'Nama Merek', 'required|is_unique[tbl_merek.nama_merek]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Nama Type Lain..'
        ));
        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Type Produk',
                'isi'   => 'back/v_type_merek',
                'type_merek'  => $this->produk->get_all_type_merek(),
            );
            $this->load->view('back/v_wrapper', $data);
        } else {
            $kode_merek = $this->input->post('kode_merek');
            $nama_merek = $this->input->post('nama_merek');

            $upload_image = $_FILES['gambar_merek']['name'];
            if ($upload_image) {
                $config['upload_path'] = './back/img/img_merek/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                $config['max_size']     = '5048';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('gambar_merek');

                if ($upload) {
                    $gambar_baru = $this->upload->data('file_name', $upload);
                    $data = array(
                        'kode_merek' => $kode_merek,
                        'nama_merek' => $nama_merek,
                        'gambar_merek' => $gambar_baru,
                    );
                    $this->produk->tambah_merek($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan..');
                    redirect('barang/typemerek');
                } else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                    redirect('barang/typemerek');
                }
                $data = array(
                    'kode_type' => $this->kode_type,
                    'nama_type' => $this->nama_type,
                );

                $this->produk->tambah_merek($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan..');
                redirect('barang/typemerek');
            }
        }
    }

    public function ubahmerek($id_merek)
    {
        $this->form_validation->set_rules('kode_merek', 'Kode Merek', 'required|is_unique[tbl_merek.kode_merek]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Kode Type Lain..'
        ));

        $this->form_validation->set_rules('nama_merek', 'Nama Merek', 'required|is_unique[tbl_merek.nama_merek]', array(
            'required' => '%s Harus Diisi !!!',
            'is_unique' => '%s Ini Sudah Terdaftar di System Kami, Silahkan Masukan Nama Type Lain..'
        ));
        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Type Produk',
                'isi'   => 'back/v_type_merek',
                'type_merek'  => $this->produk->get_all_type_merek(),
            );
            $this->load->view('back/v_wrapper', $data);
        } else {
            $upload_image = $_FILES['gambar_merek']['name'];
            if ($upload_image) {
                $config['upload_path'] = './back/img/img_merek/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                $config['max_size']     = '5048';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('gambar_merek');
                $data['gambar'] = $this->produk->get_all_type_merek();

                if ($upload) {

                    $gambar_baru = $this->upload->data('file_name', $upload);
                    $data = array(
                        'id_merek'   => $id_merek,
                        'gambar_merek' => $gambar_baru,
                    );
                    $this->produk->ubah_merek($id_merek, $data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit..');
                    redirect('barang/typemerek');
                } else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                    redirect('barang/typemerek');
                }
            }
            $kode_merek = $this->input->post('kode_merek');
            $nama_merek = $this->input->post('nama_merek');
            $data = array(
                'id_merek'  => $id_merek,
                'kode_merek' => $kode_merek,
                'nama_merek' => $nama_merek,
            );

            $this->produk->ubah_merek($id_merek, $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit..');
            redirect('barang/typemerek');
        }
    }

    public function hapusmerek($id_merek)
    {

        $data = array(
            'id_merek'   => $id_merek,
        );

        $this->produk->hapus_merek($id_merek, $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus..');
        redirect('barang/typemerek');
    }

    public function allproduk()
    {

        $data = array(
            'title' => 'Data Product',
            'isi'   => 'back/v_produk',
            'produk'  => $this->produk->get_all_produk(),
        );
        $this->load->view('back/v_wrapper', $data);
    }

    public function addproduk()
    {
        $data = array(
            'title' => 'Tambah Data Product',
            'isi'   => 'back/v_add_produk',
            'type'  => $this->produk->get_all_type(),
            'merek'  => $this->produk->get_all_type_merek(),
            'produk'  => $this->produk->get_all_produk(),
        );

        $this->load->view('back/v_wrapper', $data);
    }

    public function addprodukaksi()
    {

        $this->form_validation->set_rules('id_type', 'Nama Type', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_merek', 'Nama Merek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('no_produk', 'Nomor Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('warna', 'Warna Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kapasitas', 'kapasitas Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('status', 'Status Sewa', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('harga', 'Harga Sewa', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Tambah Data Product',
                'isi'   => 'back/v_add_produk',
                'type'  => $this->produk->get_all_type(),
                'merek'  => $this->produk->get_all_type_merek(),
                'produk'  => $this->produk->get_all_produk(),
            );

            $this->load->view('back/v_wrapper', $data);
        } else {
            $id_type = $this->input->post('id_type');
            $id_merek = $this->input->post('id_merek');
            $nama_produk = $this->input->post('nama_produk');
            $no_produk = $this->input->post('no_produk');
            $warna = $this->input->post('warna');
            $kapasitas = $this->input->post('kapasitas');
            $status = $this->input->post('status');
            $harga = $this->input->post('harga');

            $gambar = $_FILES['gambar']['name'];

            if ($gambar) {
                $config['upload_path'] = './back/uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                $config['max_size']     = '5048';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('gambar');

                if ($upload) {
                    $gambar_baru = $this->upload->data('file_name', $upload);
                    $data = array(
                        'id_type' => $id_type,
                        'id_merek' => $id_merek,
                        'nama_produk' => $nama_produk,
                        'slug' => strtolower(url_title($nama_produk)),
                        'no_produk' => $no_produk,
                        'warna' => $warna,
                        'kapasitas' => $kapasitas,
                        'status' => $status,
                        'harga' => $harga,
                        'gambar' => $gambar_baru,
                    );
                    $this->produk->tambah_product($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan..');
                    redirect('barang/allproduk');
                } else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                    redirect('barang/allproduk');
                }
                $data = array(
                    'id_type' => $id_type,
                    'id_merek' => $id_merek,
                    'nama_produk' => $nama_produk,
                    'slug' => strtolower(url_title($nama_produk)),
                    'no_produk' => $no_produk,
                    'warna' => $warna,
                    'kapasitas' => $kapasitas,
                    'status' => $status,
                    'harga' => $harga,
                );

                $this->produk->tambah_product($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan..');
                redirect('barang/allproduk');
            }
        }
    }

    public function editproduk($slug)
    {
        $data = array(
            'title' => 'Edit Data Product',
            'isi'   => 'back/v_edit_produk',
            'type'  => $this->produk->get_all_type(),
            'merek'  => $this->produk->get_all_type_merek(),
            'detail'  => $this->produk->detail_produk($slug),
        );

        $this->load->view('back/v_wrapper', $data);
    }


    public function editprodukaksi($slug)
    {

        $this->form_validation->set_rules('id_type', 'Nama Type', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_merek', 'Nama Merek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('no_produk', 'Nomor Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('warna', 'Warna Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kapasitas', 'kapasitas Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('status', 'Status Sewa', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('harga', 'Harga Sewa', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Edit Data Product',
                'isi'   => 'back/v_edit_produk',
                'type'  => $this->produk->get_all_type(),
                'merek'  => $this->produk->get_all_type_merek(),
                'detail'  => $this->produk->detail_produk($slug),
            );

            $this->load->view('back/v_wrapper', $data);
        } else {
            $slug = $slug;
            $id_produk = $this->input->post('id_produk');
            $id_type = $this->input->post('id_type');
            $id_merek = $this->input->post('id_merek');
            $nama_produk = $this->input->post('nama_produk');
            $no_produk = $this->input->post('no_produk');
            $warna = $this->input->post('warna');
            $kapasitas = $this->input->post('kapasitas');
            $status = $this->input->post('status');
            $harga = $this->input->post('harga');

            $gambar = $_FILES['gambar']['name'];


            if ($gambar) {
                $config['upload_path'] = './back/uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                $config['max_size']     = '5048';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('gambar');

                if ($upload) {
                    $gambar_baru = $this->upload->data('file_name', $upload);
                    $data = array(
                        'id_produk' => $id_produk,
                        'id_type' => $id_type,
                        'id_merek' => $id_merek,
                        'nama_produk' => $nama_produk,
                        'slug' => strtolower(url_title($nama_produk)),
                        'no_produk' => $no_produk,
                        'warna' => $warna,
                        'kapasitas' => $kapasitas,
                        'status' => $status,
                        'harga' => $harga,
                        'gambar' => $gambar_baru,
                    );
                    $this->produk->edit_product($slug, $data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit..');
                    redirect('barang/allproduk');
                } else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h5><i class="bi bi-sign-stop"></i> Alert!</h5>' . $this->upload->display_errors() . '</div>');
                    redirect('barang/allproduk');
                }
                $data = array(
                    'id_produk' => $id_produk,
                    'id_type' => $id_type,
                    'id_merek' => $id_merek,
                    'nama_produk' => $nama_produk,
                    'slug' => strtolower(url_title($nama_produk)),
                    'no_produk' => $no_produk,
                    'warna' => $warna,
                    'kapasitas' => $kapasitas,
                    'status' => $status,
                    'harga' => $harga,
                );

                $this->produk->edit_product($slug, $data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit..');
                redirect('barang/allproduk');
            }
            $data = array(
                'id_produk' => $id_produk,
                'id_type' => $id_type,
                'id_merek' => $id_merek,
                'nama_produk' => $nama_produk,
                'slug' => strtolower(url_title($nama_produk)),
                'no_produk' => $no_produk,
                'warna' => $warna,
                'kapasitas' => $kapasitas,
                'status' => $status,
                'harga' => $harga,
            );

            $this->produk->edit_product($slug, $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit..');
            redirect('barang/allproduk');
        }
    }

    public function delete_produk($id_produk)
    {
        $data = array('id_produk' => $id_produk,);

        $this->produk->deleteproduk($id_produk, $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus..');
        redirect('barang/allproduk');
    }
}
