<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-12 col-md-8">
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

                <?php echo form_open_multipart('barang/addprodukaksi') ?>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type Product</label>
                    <select class="form-control" name="id_type" required>
                        <option value="">-- Pilih Type --</option>
                        <?php foreach ($type as $key => $value) { ?>
                            <option value="<?= $value->id_type ?>"><?= $value->nama_type ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Merek Product</label>
                    <select class="form-control" name="id_merek" required>
                        <option>-- Pilih Merek --</option>
                        <?php foreach ($merek as $key => $value) { ?>
                            <option value="<?= $value->id_merek ?>"><?= $value->nama_merek ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                </div>
                <!-- Untuk Slug  -->
                <!-- end Slug -->
                <div class="form-group">
                    <label for="exampleInputEmail1">No Produk</label>
                    <input type="text" name="no_produk" class="form-control" placeholder="Nomor Produk" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Warna</label>
                    <input type="text" name="warna" class="form-control" placeholder="Warna" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">description Produk</label>
                    <input type="text" name="description" class="form-control" placeholder="description Produk" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">stok Produk</label>
                    <input type="number" name="stok" class="form-control" placeholder="stok Produk" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status Sewa</label>
                    <select class="form-control" name="status" required>
                        <option>-- Pilih Status --</option>
                        <option value="0">Tidak Tersedia</option>
                        <option value="1">Tersedia</option>
                    </select>
                </div>
                <label for="exampleInputEmail1">Harga Sewa</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp. </div>
                    </div>
                    <input type="text" class="form-control" name="harga" placeholder="Harga Sewa">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Gambar Product</label>
                    <input type="file" class="form-control-file" name="gambar">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </section>
</main>