<main id="main" class="main">

    <div class="pagetitle">
        <h1 style="font-family: monsterrat;"><?= $title ?></h1>
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
                        <table class="table table-bordered table-responsive" id="example1">
                            <thead class="text-center" style="color: white; background-color: dodgerblue;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Produk</th>
                                    <th>Tanggal Rental</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Harga/Day</th>
                                    <th>Berapa Hari</th>
                                    <th>Sub Total</th>
                                    <th>Status Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Detail</th>
                                    <th>Action Monitor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($alltransaksi == true) { ?>
                                    <?php
                                    $no = 1;
                                    foreach ($alltransaksi as $key => $value) { ?>
                                        <tr class="text-center">
                                            <td style="vertical-align: middle;"><?= $no++ ?></td>
                                            <td style="vertical-align: middle;"><?= $value->nama_pelanggan ?></td>
                                            <td style="vertical-align: middle;"><?= $value->nama_produk ?></td>
                                            <td style="vertical-align: middle;"><?= $value->tanggal_rental ?></td>
                                            <td style="vertical-align: middle;"><?= $value->tanggal_kembali ?></td>
                                            <td style="vertical-align: middle;">Rp. <?= number_format($value->harga, 0, '', '.') ?></td>
                                            <td style="vertical-align: middle;"><?= $value->berapa_hari ?> Hari</td>
                                            <td style="vertical-align: middle;">Rp. <?= number_format($value->sub_total, 0, '', '.') ?></td>
                                            <td style="vertical-align: middle;"><?php if ($value->status_pembayaran == 0) {
                                                                                    echo '<span class="badge badge-danger">Belum Bayar</span>';
                                                                                } elseif ($value->status_pembayaran == 1) {
                                                                                    echo '<span class="badge badge-warning">Pending</span>';
                                                                                } elseif ($value->status_pembayaran == 2) {
                                                                                    echo '<span class="badge badge-primary">Lunas</span>';
                                                                                } else {
                                                                                    echo '<span class="badge badge-success">Sewa Selesai</span>';
                                                                                }  ?></td>
                                            <?php if ($value->bukti_pembayaran == true) { ?>
                                                <td style="vertical-align: middle;">
                                                    <a href="<?= base_url('front/pelanggan/bukti-pembayaran/' . $value->bukti_pembayaran) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $value->nama_produk ?>" target="_blank"><img src="<?= base_url('front/pelanggan/bukti-pembayaran/' . $value->bukti_pembayaran) ?>" class="img-fluid" width="100px" height="100px" alt=""></a>
                                                </td>
                                            <?php } else { ?>
                                                <td style="vertical-align: middle;">Belum Transfer</td>
                                            <?php } ?>
                                            <td style="vertical-align: middle;"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#detail<?= $value->id_transaksi ?>"><i class="bi bi-eye-fill"></i></button>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_transaksi ?>"><i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }  ?>
                                <?php } else { ?>
                                    <div class="alert alert-success alert-massage">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4>Anda Belum Ada Pesanan, Silahkan Pesan Produk Anda ...</h4>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Detail All Data  -->
    <?php foreach ($alltransaksi as $key => $value) { ?>
        <div class="modal fade bd-example-modal-lg" id="detail<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: dodgerblue; color: white; text-shadow: black;">
                        <h4>Detail transaksi <?= $value->nama_produk ?></h4>
                    </div>
                    <div class="modal-body">
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
                                        <table class="table table-bordered table-responsive" id="example1">
                                            <thead class="text-center" style="color: white; background-color: dodgerblue;">
                                                <tr>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Nama Produk</th>
                                                    <th>Tanggal Rental</th>
                                                    <th>Tanggal Kembali</th>
                                                    <th>Harga/Day</th>
                                                    <th>Berapa Hari</th>
                                                    <th>Sub Total</th>
                                                    <th>Status Pembayaran</th>
                                                    <?php if ($value->status_pembayaran >= 1) { ?>
                                                        <th>Total Bayar</th>
                                                        <th>Atas Nama Pelanggan</th>
                                                        <th>Nama Bank Pelanggan</th>
                                                        <th>Nomor Rekening Pelanggan</th>
                                                        <th>Bukti Pembayaran</th>
                                                        <th>Tanggal Pengembalian</th>
                                                        <th>Status Pengembalian</th>
                                                        <th>Total Denda</th>
                                                        <th>Status Rental</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td style="vertical-align: middle;"><?= $value->nama_pelanggan ?></td>
                                                    <td style="vertical-align: middle;"><?= $value->nama_produk ?></td>
                                                    <td style="vertical-align: middle;"><?= $value->tanggal_rental ?></td>
                                                    <td style="vertical-align: middle;"><?= $value->tanggal_kembali ?></td>
                                                    <td style="vertical-align: middle;">Rp. <?= number_format($value->harga, 0, '', '.') ?></td>
                                                    <td style="vertical-align: middle;"><?= $value->berapa_hari ?> Hari</td>
                                                    <td style="vertical-align: middle;">Rp. <?= number_format($value->sub_total, 0, '', '.') ?></td>
                                                    <td style="vertical-align: middle;"><?php if ($value->status_pembayaran == 0) {
                                                                                            echo '<span class="badge badge-danger">Belum Bayar</span>';
                                                                                        } elseif ($value->status_pembayaran == 1) {
                                                                                            echo '<span class="badge badge-warning">Pending</span>';
                                                                                        } elseif ($value->status_pembayaran == 2) {
                                                                                            echo '<span class="badge badge-primary">Lunas</span>';
                                                                                        } else {
                                                                                            echo '<span class="badge badge-success">Sewa Selesai</span>';
                                                                                        }  ?></td>
                                                    <?php if ($value->status_pembayaran >= 1) { ?>
                                                        <td style="vertical-align: middle;">Rp. <?= number_format($value->total_bayar, 0, '', '.') ?></td>
                                                        <td style="vertical-align: middle;"><?= $value->atas_nama_pelanggan ?></td>
                                                        <td style="vertical-align: middle;"><?= $value->nama_bank_pelanggan ?></td>
                                                        <td style="vertical-align: middle;"><?= $value->nomor_rekening_pelanggan ?></td>
                                                        <?php if ($value->bukti_pembayaran == true) { ?>
                                                            <td style="vertical-align: middle;">
                                                                <a href="<?= base_url('front/pelanggan/bukti-pembayaran/' . $value->bukti_pembayaran) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $value->nama_produk ?>" target="_blank"><img src="<?= base_url('front/pelanggan/bukti-pembayaran/' . $value->bukti_pembayaran) ?>" class="img-fluid" width="100px" height="100px" alt=""></a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td style="vertical-align: middle;">Belum Transfer</td>
                                                        <?php } ?>
                                                        <td style="vertical-align: middle;"><?= $value->tanggal_pengembalian ?></td>
                                                        <td style="vertical-align: middle;"><?= $value->status_pengembalian ?></td>
                                                        <?php if ($value->total_denda == 0) { ?>
                                                            <td style="vertical-align: middle;">Rp. 0,-</td>
                                                        <?php } else { ?>
                                                            <td style="vertical-align: middle;">Rp. <?= number_format($value->total_denda, 0, '', '.') ?></td>
                                                        <?php } ?>
                                                        <td style="vertical-align: middle;"><?= $value->status_rental ?></td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal Edit -->
    <?php foreach ($alltransaksi as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: dodgerblue; color: white;">
                        <h5 class="modal-title" id="exampleModalLongTitle">Transaksi a/n <?= $value->nama_pelanggan ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php if ($value->status_pembayaran >= 2) { ?>
                        <?= form_open('transaksi/prosesEditPesananLunas/' . $value->id_transaksi) ?>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_transaksi" class="form-control" value="<?= $value->id_transaksi ?>">
                                    <label for="exampleFormControlSelect1">Status Pembayaran</label>
                                    <select name="status_pembayaran" class="form-control" id="exampleFormControlSelect1">
                                        <option value="<?= $value->status_pembayaran ?>">
                                            <?php if ($value->status_pembayaran == 0) {
                                                echo '<span class="badge badge-danger">Belum Bayar</span>';
                                            } elseif ($value->status_pembayaran == 1) {
                                                echo '<span class="badge badge-warning">Pending</span>';
                                            } elseif ($value->status_pembayaran == 2) {
                                                echo '<span class="badge badge-primary">Lunas</span>';
                                            } else {
                                                echo '<span class="badge badge-success">Sewa Selesai</span>';
                                            } ?>
                                        </option>
                                        <option value="2">Lunas</option>
                                        <option value="3">Sewa Selesai</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Kembali</label>
                                    <input type="text" class="form-control" placeholder="<?= $value->tanggal_kembali ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                                    <input type="date" name="tanggal_pengembalian" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Denda</label>
                                    <input type="text" name="total_denda" class="form-control" placeholder="Rp. 0,-" value="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status Rental</label>
                                    <select name="status_rental" class="form-control" id="exampleFormControlSelect1" required>
                                        <option>-- Pilih Status Rental --</option>
                                        <option value="0">Rental Belum Selesai</option>
                                        <option value="1">Rental Sudah Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status Pengembalian</label>
                                    <select name="status_pengembalian" class="form-control" id="exampleFormControlSelect1" required>
                                        <option>-- Pilih Status Pengembalian --</option>
                                        <option value="0">Belum Kembali</option>
                                        <option value="1">Sudah Kembali</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Edit</button>
                        </div>
                        <?= form_close() ?>
                    <?php } else { ?>
                        <?= form_open('transaksi/prosesEditPesanan/' . $value->id_transaksi) ?>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_transaksi" class="form-control" value="<?= $value->id_transaksi ?>">
                                    <label for="exampleFormControlSelect1">Status Pembayaran</label>
                                    <select name="status_pembayaran" class="form-control" id="exampleFormControlSelect1">
                                        <option value="<?= $value->status_pembayaran ?>">
                                            <?php if ($value->status_pembayaran == 0) {
                                                echo '<span class="badge badge-danger">Belum Bayar</span>';
                                            } elseif ($value->status_pembayaran == 1) {
                                                echo '<span class="badge badge-warning">Pending</span>';
                                            } elseif ($value->status_pembayaran == 2) {
                                                echo '<span class="badge badge-primary">Lunas</span>';
                                            } else {
                                                echo '<span class="badge badge-success">Sewa Selesai</span>';
                                            } ?>
                                        </option>
                                        <option value="2">Lunas</option>
                                        <option value="3">Sewa Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Edit</button>
                        </div>
                        <?= form_close() ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</main>