<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
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
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('back/img/user/' . $this->session->userdata('photo_user')) ?>" width="150px" height="150px" style="border-radius: 50%;" class="img-fluid rounded-start" alt="...">
                            <div class="card-footer my-1">
                                <p style="font-family: monsterrat;"><b><?= $this->session->userdata('nama_user') ?></b></p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: monsterrat;"><?= $this->session->userdata('email') ?></h5>
                                <p class="card-text" style="font-family: monsterrat;">Status Anda : <?php if ($this->session->userdata('status_user') == 0) {
                                                                                                        echo '<span class="badge bg-danger">Tidak Aktif</span>';
                                                                                                    } else {
                                                                                                        echo '<span class="badge bg-primary">Aktif</span>';
                                                                                                    } ?></p>
                                <p class="card-text" style="font-family: monsterrat;">Level Anda : <?php if ($this->session->userdata('level_user') == 1) {
                                                                                                    echo '<span class="badge bg-primary">Admin</span>';
                                                                                                } else {
                                                                                                    echo '<span class="badge bg-danger sm">User</span>';
                                                                                                } ?></p>

                                <div class="d-grid gap-2 mt-3">
                                    <button type="button" class="btn btn-primary" style="font-family: monsterrat;" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                                        Edit Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card with an image on left -->

            </div>
        </div>
    </section>

    <!-- Edit Modal -->
    <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family: monsterrat;">Edit <?= $title ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php echo form_open_multipart('user/profile') ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-envelope-open-heart"></i></span>
                        <input type="hidden" name="id_user" readonly class="form-control" placeholder="id_user Anda" value="<?= $this->session->userdata('id_user') ?>">
                        <input type="email" name="email" readonly class="form-control" placeholder="Email Anda" value="<?= $this->session->userdata('email') ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-person-vcard-fill"></i></span>
                        <input type="text" name="nama_user" class="form-control" placeholder="Nama Anda" value="<?= $this->session->userdata('nama_user') ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="bi bi-person-bounding-box"></i></span>
                        <input type="file" name="photo_user" class="form-control" id="preview_gambar" placeholder="Pilih Foto Profile Anda">
                    </div>
                    <div class="col-md-4">
                        <img src="<?= base_url('back/img/user/' . $this->session->userdata('photo_user')) ?>" width="150px" height="150px" style="border-radius: 50%;" class="img-fluid rounded-start" alt="...">
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

</main><!-- End #main -->