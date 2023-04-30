<main id="main" class="main">

    <div class="pagetitle">
        <h1 style="font-family: monsterrat;"><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-4 col-sm-6 mb-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBank">
                    <i class="bi bi-plus-circle"></i> Tambah Bank
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body my-3">
                        <?php if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <h5><i class="bi bi-check-lg"></i> Sukses!</h5>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }

                        if ($this->session->flashdata('error')) {
                            echo '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <h5><i class="bi bi-sign-stop"></i> Salah!</h5>';
                            echo $this->session->flashdata('error');
                            echo '</div>';
                        } ?>
                        <table class="table table-bordered table-responsive" id="example1">
                            <thead class="text-center" style="color: white; background-color: dodgerblue;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nama Nasabah</th>
                                    <th>Action Monitor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($allbank as $key => $value) { ?>
                                    <tr class="text-center">
                                        <td style="vertical-align: middle;"><?= $no++ ?></td>
                                        <td style="vertical-align: middle;"><?= $value->nama_bank ?></td>
                                        <td style="vertical-align: middle;"><?= $value->nomor_rekening ?></td>
                                        <td style="vertical-align: middle;"><?= $value->nama_nasabah ?></td>
                                        <td style="vertical-align: middle;">
                                            <button type="button" class="btn btn-primary btn-sm my-2" data-toggle="modal" data-target="#edit<?= $value->id_bank ?>"><i class="bi bi-pencil"></i>
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm my-2" data-toggle="modal" data-target="#hapus<?= $value->id_bank ?>"><i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Bank -->
    <!-- Modal -->
    <div class="modal fade" id="tambahBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: dodgerblue; color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('bank/tambahBank') ?>
                <div class="modal-body">
                    <div class="col-12">
                        <label class="form-label">Nama Bank</label>
                        <div class="input-group has-validation">
                            <input type="text" name="nama_bank" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Nomor Rekening</label>
                        <div class="input-group has-validation">
                            <input type="text" name="nomor_rekening" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Nama Nasabah Pemilik Rental</label>
                        <div class="input-group has-validation">
                            <input type="text" name="nama_nasabah" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Bank</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- End -->


    <!-- Modal Edit Bank -->
    <?php foreach ($allbank as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id_bank ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: dodgerblue; color: white;">
                        <h4 class="modal-title" id="exampleModalLongTitle">Edit Bank <span class="badge badge-danger"><?= $value->nama_bank ?></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('bank/editBank/' . $value->id_bank) ?>
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label">Nama Bank</label>
                            <div class="input-group has-validation">
                                <input type="text" name="nama_bank" class="form-control" value="<?= $value->nama_bank ?>" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nomor Rekening</label>
                            <div class="input-group has-validation">
                                <input type="text" name="nomor_rekening" class="form-control" value="<?= $value->nomor_rekening ?>" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Nasabah Pemilik Rental</label>
                            <div class="input-group has-validation">
                                <input type="text" name="nama_nasabah" class="form-control" value="<?= $value->nama_nasabah ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit Bank</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal Hapus Bank -->
    <?php foreach ($allbank as $key => $value) { ?>
        <div class="modal fade" id="hapus<?= $value->id_bank ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: dodgerblue; color: white;">
                        <h4 class="modal-title" id="exampleModalLongTitle">Hapus Bank <span class="badge badge-danger"><?= $value->nama_bank ?></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('bank/deleteBank/' . $value->id_bank) ?>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="alert alert-success alert-massage">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>Apakah Anda Yakin Ingin Menghapus Bank <span class="badge badge-danger"><?= $value->nama_bank ?></span> Ini..?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hapus Bank</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>
</main>