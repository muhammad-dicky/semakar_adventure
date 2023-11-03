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
    <link href="<?= base_url() ?>back/assets/img/apple-touch-logo-semakar.jpeg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>back/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>back/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>back/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="<?= base_url() ?>" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url() ?>front/img-sewa/logo-semakar.jpeg" alt="">
                                    <span class="d-none d-lg-block">Semakar Adventure Admin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Silahkan Login</h5>
                                        
                                    </div>


                                    <?php
                                    if ($this->session->flashdata('error')) {
                                        echo '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <h5><i class="bi bi-sign-stop"></i> Alert!</h5>';
                                        echo $this->session->flashdata('error');
                                        echo '</div>';
                                    }

                                    if ($this->session->flashdata('pesan')) {
                                        echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <h5><i class="bi bi-check-lg"></i> Sukses!</h5>';
                                        echo $this->session->flashdata('pesan');
                                        echo '</div>';
                                    }



                                    echo form_open('auth/login') ?>

                                    <div class="col-12 my-3">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope-check"></i></span>
                                            <input type="text" name="email" class="form-control" id="yourUsername" placeholder="Masukan Email Anda." required>
                                            <div class="invalid-feedback">Please enter your Email.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 my-3">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-file-earmark-lock2"></i></span>
                                            <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Masukan Password Anda" required>
                                            <div class="invalid-feedback">Please enter your Password.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>

                                    <?php echo form_close() ?>

                                </div>
                            </div>

                         

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>back/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>back/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>back/assets/js/main.js"></script>

</body>

</html>