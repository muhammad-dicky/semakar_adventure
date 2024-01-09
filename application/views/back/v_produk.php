<main id="main" class="main">

    <div class="pagetitle">
        <h1 style="font-family: monsterrat;"><?= $title ?></h1>
    </div><!-- End Page Title -->


    <div class="col-md-8">
        <div>
            <a href="<?= base_url('barang/addproduk') ?>" class="btn btn-primary my-2" style="font-family: monsterrat;"><i class="bi bi-database-add"></i> Add Product</a>

        </div>
    </div>
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
                                    <th>Type</th>
                                    <th>Merek</th>
                                    <th>Nama Produk</th>
                                    <th>Slug</th>
                                    <th>No Produk</th>
                                    <th>Warna</th>
                                    <th>description</th>
                                    <th>stok</th>
                                    <th>Status Sewa</th>
                                    <th>Harga Sewa</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($produk as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td>
                                            <?= $value->nama_type ?>
                                        </td>
                                        <td class="text-center"><?= $value->nama_merek ?></td>
                                        <td class="text-center"><?= $value->nama_produk ?></td>
                                        <td class="text-center"><?= $value->slug ?></td>
                                        <td class="text-center"><?= $value->no_produk ?></td>
                                        <td class="text-center"><?= $value->warna ?></td>
                                        <td class="text-center"><?= $value->description ?></td>
                                        <td class="text-center"><?= $value->stok ?></td>
                                        <td class="text-center"><?php if ($value->status == 0) {
                                                                    echo '<span class="badge bg-danger">Tidak Tersedia</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-primary">Tersedia</span>';
                                                                } ?></td>
                                        <td class="text-center">Rp. <?= number_format($value->harga, 0) ?></td>
                                        <td class="text-center"><a href="<?= base_url('back/uploads/' . $value->gambar) ?>" target="_blank"><img src="<?= base_url('back/uploads/' . $value->gambar) ?>" width="150px"></a></td>
                                        <td>
                                            <a href="<?= base_url('barang/editproduk/' . $value->slug) ?>" class="btn btn-warning btn-sm text-white my-2" style="font-family: monsterrat;"><i class="bi bi-pencil"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm my-2" data-toggle="modal" data-target="#hapus<?= $value->id_produk ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>

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

    <!-- Modal hapus -->
    <?php foreach ($produk as $key => $value) { ?>
        <div class="modal fade" id="hapus<?= $value->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Product <?= $value->nama_produk ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('barang/delete_produk/' . $value->id_produk) ?>
                    <div class="modal-body">
                        <h4>Apakah Anda Yakin ? Ingin menghapus Product <span class="badge bg-danger"><?= $value->nama_produk ?></span></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                    <?php form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>
</main>