<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>front/img-sewa/logo-semakar.jpeg" rel="icon">
    <link href="<?= base_url() ?>front/img-sewa/logo-semakar.jpeg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Vendor CSS Files -->

    <!-- <link rel="stylesheet" href="<?= base_url() ?>front/assets/dist/sweetalert2.min.css"> -->
    <link href="<?= base_url() ?>front/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>front/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">



    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>front/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url() ?>front/img-sewa/logo-semakar.jpeg" alt="">
                <span>Semakar Adventure</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= base_url() ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('#about') ?>">About</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('#services') ?>">Product</a></li>
                    <!-- <li><a class="nav-link scrollto" href="<?= base_url('#portfolio') ?>">Portfolio</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="<?= base_url('#team') ?>">Team</a></li> -->
                    <li><a class="nav-link scrollto" href="<?= base_url('#contact') ?>">Contact </a></li>
                    <li style="margin-left: 5%;">

                        <!-- Basic Modal -->
                        <?php if ($this->session->userdata('email_pelanggan') == "") { ?>
                            <div class="d-grid gap-2 mt-3 my-3">
                                <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#basicModal">
                                    Login/Register
                                </button>
                            </div>
                    </li>
                <?php } else { ?>


                    <li class="dropdown"><a>Welcome,<b> <?= $this->session->userdata('nama_pelanggan') ?></b> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('profile') ?>">Edit Profile</a></li>
                            <li><a href="<?= base_url('booking-pelanggan') ?>">Riwayat Booking</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="<?= base_url('home/logout') ?>"><i class="bi bi-arrow-right"></i> Keluar</a></li>
                        </ul>
                    </li>

                <?php } ?>
                <!-- End Basic Modal-->


                </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->



    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs bg-primary">
            <div class="container">

                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Kategori</li>
                    <li><?= $kategoridetail->nama_merek ?></li>
                </ol>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">
                        <div class="row">
                            <?php foreach ($produk_kategori as $key => $value) { ?>
                                <div class="col-4">
                                    <div class="card-group">
                                        <div class="card">
                                            <img class="card-img-top" src="<?= base_url('back/uploads/' . $value->gambar) ?>" width="170px" height="150px" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $value->nama_produk ?></h4>
                                                <p class="card-text">description Produk : <?= $value->description ?></p>
                                                <p class="card-text">Nomor Produk : <?= $value->no_produk ?></p>
                                                <p class="card-text">Warna Produk : <?= $value->warna ?></p>
                                                <p class="card-text">Sewa/hari : Rp. <?= number_format($value->harga, 0) ?></p>
                                                <a href="<?= base_url('produk/' . $value->slug) ?>" class="btn btn-primary"><span>Detail</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">
                            <h5 data-text="Kategori" data-aos="fade-up">
                                Kategori
                            </h5>
                            <div class="sidebar-item tags">
                                <ul>
                                    <?php foreach ($type_produk as $key => $value) { ?>
                                        <li><a href="<?= base_url('kategori/' . strtolower($value->kode_merek)) ?>" class="btn btn-primary text-white"><?= $value->nama_merek ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div><!-- End sidebar categories-->
                            <br>
                            <h5 data-text="Produkkami" data-aos="fade-up">
                                Produkkami
                            </h5>
                            <div class="sidebar-item recent-posts">
                                <?php foreach ($produk as $key => $value) { ?>
                                    <div class="post-item clearfix">
                                        <img src="<?= base_url('back/uploads/' . $value->gambar) ?>" alt="">
                                        <h4><a href="<?= base_url('produk/' . $value->slug) ?>"><?= $value->nama_produk ?></a></h4>
                                        <time datetime="2020-01-01"><?= $value->nama_type ?></time>
                                    </div>
                                <?php } ?>
                            </div><!-- End sidebar recent posts-->



                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->


    <?php $this->load->view('front/footer') ?>

        <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <div class="text-center my-3">
                                        <img src="<?= base_url() ?>front/img-sewa/logo-semakar.jpeg" style="width: 150px; height: 100;">
                                    </div>
                                    <h4 class="card-title text-center pb-0 fs-4">Login Ke Akun Anda</h4>
                                </div>


                                <?php echo form_open('home'); ?>


                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="email" name="email_pelanggan" class="form-control" id="yourUsername" placeholder="Masukan Email Anda" required>
                                        <div class="invalid-feedback">Please enter your Email.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Masukan Password Anda" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                                <br>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>

                                <?php echo form_close(); ?>
                                <br>
                                <div class="col-12">
                                    <p class="small mb-0">Belum punya akun ? <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahpelanggan">
                                            Daftar Akun Anda
                                        </button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Registered -->
        <div class="modal fade" id="tambahpelanggan" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <div class="text-center my-3">
                                        <img src="<?= base_url() ?>front/img-sewa/logo-semakar.jpeg" style="width: 150px; height: 100;">
                                    </div>
                                    <h4 class="card-title text-center pb-0 fs-4">Daftar Akun Anda</h4>
                                </div>


                                <?php echo form_open('home/register'); ?>

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Nama</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="nama_pelanggan" class="form-control" id="yourUsername" placeholder="Masukan Nama Anda" required>
                                        <div class="invalid-feedback">Please enter your Name.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="email" name="email_pelanggan" class="form-control" id="yourUsername" placeholder="Masukan Email Anda" required>
                                        <div class="invalid-feedback">Please enter your Email.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Masukan Password Anda" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Ulangi Password</label>
                                    <input type="password" name="ulangi_password" class="form-control" id="yourPassword" placeholder="Masukan Password yang sama" required>
                                    <div class="invalid-feedback">Please enter your password matches</div>
                                </div>

                                <br>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Register</button>
                                </div>

                                <?php echo form_close(); ?>
                                <br>
                                <div class="col-12">
                                    <p class="small mb-0">Sudah punya akun ? <a href="<?= base_url() ?>" class="btn btn-primary">Silahkan Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Registered -->




    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- <script src="<?= base_url() ?>front/assets/dist/sweetalert2.all.min.js"></script> -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url() ?>front/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>front/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>front/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>front/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>front/assets/js/main.js"></script>

    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

</body>

</html>