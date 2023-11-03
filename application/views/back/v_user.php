<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body my-3">
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
                        <button type="button" class="btn btn-primary btn-sm text-white my-2" style="font-family: monsterrat;" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-trash"></i>Tambah User</button>
                        <table class="table table-bordered table-responsive" id="example1">
                            <thead class="text-center" style="color: white; background-color: dodgerblue;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Email User</th>
                                    <th>Password</th>
                                    <th>Level User</th>
                                    <th>Status User</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($userall as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td>
                                            <?= substr($value->nama_user, 0, 20) ?>
                                        </td>
                                        <td class="text-center"><?= $value->email ?></td>
                                        <td class="text-center"><?= $value->password ?></td>
                                        <td class="text-center"><?php if ($value->level_user == 1) {
                                                                    echo '<span class="badge bg-primary">Admin</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-danger">User</span>';
                                                                } ?></td>
                                        <td class="text-center"><?php if ($value->status_user == 0) {
                                                                    echo '<span class="badge bg-danger">Tidak Aktif</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-primary">Aktif</span>';
                                                                } ?></td>
                                        <td><img src="<?= base_url() ?>back/img/user/<?= $value->photo_user; ?>" width="100px" height="100px" alt="Profile" class="rounded-circle"></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-sm text-white" style="font-family: monsterrat;" data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_user ?>"><i class="fas fa-trash"></i>Edit</button>
                                            <a href="<?= base_url('user/hapus/' . $value->id_user) ?>" class="btn btn-danger btn-sm text-white" onclick="alert('Apakah Anda Yakin Ingin menghapus Data ini ?')" style="font-family: monsterrat;"><i class="fas fa-trash"></i>Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- tambah User -->
    <div class="modal fade" id="tambah" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family: monsterrat;">Tambah <?= $title ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php echo form_open('user/tambahuser') ?>
                    <div class="input-group mb-3">
                        <label class="col-sm-3 col-form-label">Nama User</label>
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-person-vcard-fill"></i></span>
                        <input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
                    </div>

                    <div class="input-group mb-3">
                        <label class="col-sm-3 col-form-label">Email User</label>
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-envelope-open-heart"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email User">
                    </div>

                    <div class="input-group mb-3">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-file-earmark-lock2"></i></span>
                        <input type="text" name="password" readonly class="form-control" value="12345">
                        <input type="hidden" name="level_user" readonly class="form-control" value="2">
                        <input type="hidden" name="status_user" readonly class="form-control" value="1">
                        <input type="hidden" name="photo_user" readonly class="form-control" value="default.jpg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="font-family: monsterrat;" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="font-family: monsterrat;" class="btn btn-primary">Tambah</button>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
    </div><!-- End Disabled Backdrop Modal-->

    <!-- Edit User Status User -->
    <?php foreach ($userall as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" style="font-family: monsterrat;">Edit <?= $title ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <?php echo form_open_multipart('user/edit') ?>
                        <div class="input-group mb-3">

                            <input type="hidden" name="id_user" class="form-control" placeholder="Nama Anda" value="<?= $value->id_user ?>">
                            <input type="hidden" name="nama_user" class="form-control" placeholder="Nama Anda" value="<?= $value->nama_user ?>">
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Status User</label>
                            <div class="col-sm-8">
                                <select name="status_user" class="form-select" aria-label="Default select example">
                                    <option selected value="<?php if ($value->status_user == 0) {
                                                                echo 'Tidak Aktif';
                                                            } else {
                                                                echo 'Aktif';
                                                            } ?>"><?php if ($value->status_user == 0) {
                                                                        echo 'Tidak Aktif';
                                                                    } else {
                                                                        echo 'Aktif';
                                                                    } ?></option>
                                    <option>-- Pilih --</option>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="font-family: monsterrat;" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" style="font-family: monsterrat;" class="btn btn-primary">Edit</button>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div><!-- End Disabled Backdrop Modal-->
    <?php } ?>
</main>