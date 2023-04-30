<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <?php


            echo validation_errors('<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            <h5><i class="bi bi-sign-stop"></i> ', '</h5></div>'); ?>
            <div class="col-md-8">
                <?php echo form_open_multipart('user/gantiPassword'); ?>
                <div class="col-md-8 position-relative">
                    <label for="validationTooltipUsername" class="form-label">Password Anda</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text bg-primary text-white" id="validationTooltipUsernamePrepend"><i class="bi bi-key"></i></span>
                        <input type="password" name="password" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend">
                    </div>
                </div>
                <div class="col-md-8 position-relative">
                    <label for="validationTooltipUsername" class="form-label">Password Baru Anda </label>
                    <div class="input-group has-validation">
                        <span class="input-group-text bg-primary text-white" id="validationTooltipUsernamePrepend"><i class="bi bi-key"></i></span>
                        <input type="password" name="password_baru" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend">
                    </div>
                </div>
                <div class="col-md-8 position-relative">
                    <label for="validationTooltipUsername" class="form-label">Konfirmasi Password Baru </label>
                    <div class="input-group has-validation">
                        <span class="input-group-text bg-primary text-white" id="validationTooltipUsernamePrepend"><i class="bi bi-key"></i></span>
                        <input type="password" name="password_sama" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style="font-family: monsterrat;" class="btn btn-primary">Edit</button>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </section>
</main>