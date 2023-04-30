<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
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
                        <table class="table table-responsive" id="example1">
                            <thead class="text-center" style="color: white; background-color: dodgerblue;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Email Pelanggan</th>
                                    <th>Password</th>
                                    <th>Is Active</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pelanggan as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td>
                                            <?= substr($value->nama_pelanggan, 0, 20) ?>
                                        </td>
                                        <td class="text-center"><?= $value->email_pelanggan ?></td>
                                        <td class="text-center"><?= $value->password ?></td>
                                        <td class="text-center"><?php if ($value->is_active == 0) {
                                                                    echo '<span class="badge bg-danger">Tidak Aktif</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-primary">Aktif</span>';
                                                                } ?></td>
                                        <td class="text-center"><?php if ($value->status == 0) {
                                                                    echo '<span class="badge bg-danger">No</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-primary">Yes</span>';
                                                                } ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-sm text-white" style="font-family: monsterrat;" data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_pelanggan ?>"><i class="fas fa-trash"></i>Edit</button>
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
    <!-- Edit Modal -->
    <?php foreach ($pelanggan as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id_pelanggan ?>" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" style="font-family: monsterrat;">Edit <?= $title ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <?php echo form_open_multipart('pelanggan/edit') ?>
                        <div class="input-group mb-3">

                            <input type="hidden" name="id_pelanggan" class="form-control" placeholder="Nama Anda" value="<?= $value->id_pelanggan ?>">
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Status Pelanggan</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option selected value="<?php if ($value->status == 0) {
                                                                echo 'No';
                                                            } else {
                                                                echo 'Yes';
                                                            } ?>"><?php if ($value->status == 0) {
                                                                        echo 'No';
                                                                    } else {
                                                                        echo 'Yes';
                                                                    } ?></option>
                                    <option>-- Pilih --</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
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