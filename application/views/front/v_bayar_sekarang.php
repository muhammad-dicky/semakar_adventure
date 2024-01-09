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
    <br><br><br>
    <section class="about" id="about" data-aos="fade-down">
        <div class="content" data-aos="fade-down">
            <div class="container-fluid">
                <style type="text/css">
                    .abu {
                        background-color: #e4e4e4;
                    }
                </style>
                <div class="row">
                    <div class="col-12 col-md-6 my-2">
                        <div class="card">
                            <div class="card-header" style="background-color: dodgerblue; color: white;">
                                <h4>Transfer ke no Rekening Rental</h4>
                            </div>
                            <div class="card-body mb-5">
                                <?php foreach ($allbank as $key => $value) { ?>
                                    <div class="accordion accordion-flush" id="faqlist1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                                    Nama Bank : <span class="badge badge-primary"><?= $value->nama_bank ?></span>
                                                </button>
                                            </h2>
                                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                                <div class="accordion-body">
                                                    <p>Nomor Rekening : <?= $value->nomor_rekening ?></p>
                                                    <p>Nama Nasabah : <?= $value->nama_nasabah ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="color: dodgerblue;">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-md-6 my-2">
                        <div class="card">
                            <div class="card-header" style="background-color: dodgerblue; color: white;">
                                <h4>Upload Bukti Pembayaran</h4>
                            </div>
                            <?php echo form_open_multipart('home/prosesBayarPesanan/' . $transaksi_row->id_transaksi) ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub-Total</label>
                                    <input type="text" class="form-control" readonly placeholder="Rp. <?= number_format($transaksi_row->sub_total, 0) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">id transaksi</label>
                                    <input type="text" class="form-control" readonly placeholder="Rp. <?= number_format($transaksi_row->id_transaksi, 0) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Yang Di Bayar</label>
                                    <input type="text" name="total_bayar" class="form-control" placeholder="Rp. 0,-" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Atas Nama</label>
                                    <input type="text" name="atas_nama_pelanggan" class="form-control" placeholder="Atas Nama Pelanggan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Bank</label>
                                    <input type="text" name="nama_bank_pelanggan" class="form-control" placeholder="Nama Bank Pelanggan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Rekening</label>
                                    <input type="text" name="nomor_rekening_pelanggan" class="form-control" placeholder="Nomor Rekening Pelanggan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Bukti Pembayaran</label>
                                    <input type="file" name="bukti_pembayaran" class="form-control-file">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button id="pay-button" type="submit" class="btn btn-primary btn-block">Bayar</button>
                            </div>
                            
                            
                               <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                                                                data-client-key="SB-Mid-client-DmsQrl8JsYHCjlJN"></script>
                                                            <script type="text/javascript">
                                                                document.getElementById('pay-button').onclick = function () {
                                                                    snap.pay('<?= $snapToken ?>', {
                                                                        onSuccess: function (result) {
                                                                            document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                                                                        },
                                                                        onPending: function (result) {
                                                                            document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                                                                        },
                                                                        onError: function (result) {
                                                                            document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                                                                        }
                                                                    });
                                                                };
                                                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


 
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