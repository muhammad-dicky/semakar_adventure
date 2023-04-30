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
                    <li><a class="nav-link scrollto active" href="<?= base_url('#hero') ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('#about') ?>">About</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('#services') ?>">Product</a></li>
                    <!-- <li><a class="nav-link scrollto" href="<?= base_url('#portfolio') ?>">Portfolio</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
                    <li><a class="nav-link scrollto" href="<?= base_url('#contact') ?>">Contact </a></li>
                    <li style="margin-left: 2%;">

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

    <section>
        <div class="container" data-aos="fade-down">
            <div class="row mt-5">
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <?php
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');

                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-massage">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }

                        if ($this->session->flashdata('error')) {
                            echo '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo $this->session->flashdata('error');
                            echo '</div>';
                        } ?>
                        <div class="text-center">
                            <img class="card-img-top" src="<?= base_url() ?>front/pelanggan/img/<?= $pelanggan->gambar_pelanggan ?>" style="border-radius: 50%; width: 150px; height: 150px;">
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('edit-profile/' . $pelanggan->id_pelanggan) ?>
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nama Pelanggan :</div>
                                    </div>
                                    <input type="text" name="nama_pelanggan" class="form-control" required value="<?= $pelanggan->nama_pelanggan ?>">
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Email Pelanggan :</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" readonly placeholder="<?= $this->session->userdata('email_pelanggan') ?>">
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="bi bi-person-bounding-box"></i></div>
                                    </div>
                                    <input type="file" name="gambar_pelanggan" class="form-control">
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">NIK KTP :</div>
                                    </div>
                                    <input type="text" name="nik_ktp" class="form-control" value="<?php if ($pelanggan->nik_ktp == '') {
                                                                                                        echo '';
                                                                                                    } else {
                                                                                                        echo $pelanggan->nik_ktp;
                                                                                                    } ?>" required>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Upload KTP</i></div>
                                    </div>
                                    <input type="file" name="upload_ktp" class="form-control">
                                </div>
                            </div>



                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">NO Kartu Tanda Pengenal:</div>
                                    </div>
                                    <input type="text" name="no_sim" class="form-control" id="inlineFormInputGroup" value="<?php if ($pelanggan->nik_ktp == '') {
                                                                                                                                echo '';
                                                                                                                            } else {
                                                                                                                                echo $pelanggan->no_sim;
                                                                                                                            } ?>" >
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Upload Kartu Tanda Pengenal Lain (opsional)</div>
                                    </div>
                                    <input type="file" name="upload_sim" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-2">Simpan Perubahan</button>
                            <!-- <a href="<?= base_url('edit-profile/' . $this->session->userdata('id_pelanggan')) ?>" class="btn btn-primary btn-block">Edit Profile</a> -->
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <?php if ($pelanggan->upload_ktp == true) { ?>
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>Foto KTP Anda..</h4>
                                <figure class="figure">
                                    <a href="<?= base_url() ?>front/pelanggan/img-identitas/<?= $pelanggan->upload_ktp ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="NIK : <b><?= $pelanggan->nik_ktp ?></b>"><img src="<?= base_url() ?>front/pelanggan/img-identitas/<?= $pelanggan->upload_ktp ?>" class="figure-img img-fluid rounded" alt="" style="width: 300px; height: 200px;"></a>
                                    <figcaption class="figure-caption">NIK : <?= $pelanggan->nik_ktp ?></figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
                <?php if ($pelanggan->upload_sim == true) { ?>
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>Foto Kartu Identitas Anda..</h4>
                                <figure class="figure">
                                    <a href="<?= base_url() ?>front/pelanggan/img-identitas/<?= $pelanggan->upload_sim ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="No SIM : <b><?= $pelanggan->no_sim ?></b>"><img src="<?= base_url() ?>front/pelanggan/img-identitas/<?= $pelanggan->upload_sim ?>" class="figure-img img-fluid rounded" alt="" style="width: 300px; height: 200px;"></a>
                                    <figcaption class="figure-caption">No Sim : <?= $pelanggan->no_sim ?></figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </section>
    <!-- End About Section -->



 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

<div class="footer-newsletter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h4>Our Newsletter</h4>
                <p>Ready to take your outdoor adventure to the next level? Don't miss out on exclusive deals and insider tips - subscribe to our newsletter and stay up-to-date on the latest in outdoor tent rental!</p>
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
            </div>
        </div>
    </div>
</div>
        </footer>
<!-- End Footer -->

<?php $this->load->view('front/footer') ?>
   


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