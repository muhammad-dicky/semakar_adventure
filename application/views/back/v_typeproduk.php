<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->


    <div class="col-md-8">
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#tambah">
            <i class="bi bi-plus-square"></i> Tambah
        </button>
        <?php
        echo validation_errors('<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        <h5><i class="bi bi-sign-stop"></i> Upss!!</h5>', '</div>');

        if ($this->session->flashdata('pesan')) {
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
        <div class="table-responsive-sm">
            <table class="table table-bordered table-responsive">
                <thead class="text-center" style="color: white; background-color: dodgerblue;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Type</th>
                        <th scope="col">Nama Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($type_produk as $key => $value) { ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $value->kode_type ?></td>
                            <td><?= $value->nama_type ?></td>
                            <td>
                                <!-- Button edit -->
                                <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#ubah<?= $value->id_type ?>">
                                    <!-- edit -->
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value->id_type ?>">
                                    <!-- delete -->
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal add-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('barang/tambah') ?>
                    <div class="input-group mb-3">
                        <input type="hidden" name="id_type">
                        <label class="col-sm-3 col-form-label">Kode Type</label>
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-code"></i></span>
                        <input type="text" name="kode_type" class="form-control" placeholder="Masukan Kode Type" onkeyup="this.value = this.value.toUpperCase()" maxlength="3">
                    </div>

                    <div class="input-group mb-3">
                        <label class="col-sm-3 col-form-label">Nama Type</label>
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-fonts"></i></span>
                        <input type="text" name="nama_type" class="form-control" placeholder="Nama Type">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style="font-family: monsterrat;" class="btn btn-primary">Tambah</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- end add -->

    <!-- Modal rubah-->
    <?php foreach ($type_produk as $key => $value) { ?>
        <div class="modal fade" id="ubah<?= $value->id_type ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $title ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('barang/ubah/' . $value->id_type) ?>
                        <div class="input-group mb-3">
                            <input type="hidden" name="id_type" value="<?= $value->id_type ?>">
                            <label class="col-sm-3 col-form-label">Kode Type</label>
                            <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-code"></i></span>
                            <input type="text" name="kode_type" class="form-control" value="<?= $value->kode_type ?>" placeholder="Masukan Kode Type" onkeyup="this.value = this.value.toUpperCase()" maxlength="3">
                        </div>

                        <div class="input-group mb-3">
                            <label class="col-sm-3 col-form-label">Nama Type</label>
                            <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-fonts"></i></span>
                            <input type="text" name="nama_type" value="<?= $value->nama_type ?>" class="form-control" placeholder="Nama Type">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="font-family: monsterrat;" class="btn btn-primary">Ubah</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- end rubah -->


    <!-- Modal hapus-->
    <?php foreach ($type_produk as $key => $value) { ?>
        <div class="modal fade" id="hapus<?= $value->id_type ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $title ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo form_open('barang/hapus/' . $value->id_type) ?>
                    <div class="modal-body">
                        <h4>Apakah Data <span><?= $value->nama_type ?></span> ini ingin kamu Hapus ?</h4>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- end hapus -->

</main><!-- End #main -->