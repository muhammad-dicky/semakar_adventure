<main id="main" class="main">

    <div class="pagetitle">
        <h1 style="font-family: monsterrat;"><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-6 col-12">
                <nav class="navbar navbar-light bg-light">
                    <form action="<?= base_url('pengaduan') ?>" method="get" class="form-inline">
                        <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                    </form>

                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php if (!empty($keyword)) { ?>
                        <p style="color:green"><b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b></p>
                    <?php } ?>
                    <div class="card-body my-3">
                        <table class="table table-bordered table-responsive" id="example1">
                            <thead class="text-center" style="color: white; background-color: dodgerblue;">
                                <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama Pelapor</th>
                                    <th style="vertical-align: middle;">Email Pelapor</th>
                                    <th style="vertical-align: middle;">Judul/Subject Pelapor</th>
                                    <th style="vertical-align: middle;">Tanggal</th>
                                    <th style="vertical-align: middle;">Pesan Pelapor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($data == false) { ?>
                                    <tr class="text-center">
                                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <h5>Maaf, Data Yang Anda Cari Tidak Ada</h5>
                                        </div>
                                    </tr>
                                <?php } else { ?>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $key => $value) { ?>
                                        <tr class="text-center">
                                            <td style="vertical-align: middle;"><?= $no++ ?></td>
                                            <td style="vertical-align: middle;"><?= $value->nama_kontak ?></td>
                                            <td style="vertical-align: middle;"><?= $value->email_kontak ?></td>
                                            <td style="vertical-align: middle;"><?= $value->subject_kontak ?></td>
                                            <td style="vertical-align: middle;"><span class="badge badge-danger"><?= $value->tanggal_laporan ?></span></td>
                                            <td style="vertical-align: middle;"><?= $value->pesan_kontak ?></td>
                                        </tr>
                                    <?php }  ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>