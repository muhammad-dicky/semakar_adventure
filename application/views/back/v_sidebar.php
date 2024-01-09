    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-user" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-universal-access"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= base_url('user/profile') ?>">
                            <i class="bi bi-circle"></i><span>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('user/gantipassword') ?>">
                            <i class="bi bi-circle"></i><span>Ganti Password</span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <li>
                            <a href="<?= base_url('user/userDataAll') ?>">
                                <i class="bi bi-circle"></i><span>All Data User</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-produk" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-tree-fill"></i><span>Master Produk</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-produk" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= base_url('barang/typeproduk') ?>">
                            <i class="bi bi-circle"></i><span>Type Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('barang/typemerek') ?>">
                            <i class="bi bi-circle"></i><span>Type Merek</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('barang/allproduk') ?>">
                            <i class="bi bi-circle"></i><span>Data Produk</span>
                        </a>
                    </li>
                    <!-- <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <li>
                            <a href="<?= base_url('user/userDataAll') ?>">
                                <i class="bi bi-circle"></i><span>All Data User</span>
                            </a>
                        </li>
                    <?php } ?> -->
                </ul>
            </li><!-- End Components Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-trx" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cash-coin"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-trx" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= base_url('transaksi') ?>">
                            <i class="bi bi-circle"></i><span>All Transaksi</span>
                        </a>
                    </li>
                    <!-- <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <li>
                            <a href="<?= base_url('user/userDataAll') ?>">
                                <i class="bi bi-circle"></i><span>All Data User</span>
                            </a>
                        </li>
                    <?php } ?> -->
                </ul>
            </li><!-- End Components Nav -->

            <?php if ($this->session->userdata('level_user') == 1) { ?>
                <li class="nav-item">
                    <!-- <a class="nav-link collapsed" data-bs-target="#components-bank" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-bank"></i><span>BANK</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a> -->
                    <ul id="components-bank" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="<?= base_url('bank') ?>">
                                <i class="bi bi-circle"></i><span>All BANK</span>
                            </a>
                        </li>
                        <!-- <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <li>
                            <a href="<?= base_url('user/userDataAll') ?>">
                                <i class="bi bi-circle"></i><span>All Data User</span>
                            </a>
                        </li>
                    <?php } ?> -->
                    </ul>
                </li>



                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-pelanggan" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-people-fill"></i><span>Pelanggan</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-pelanggan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="<?= base_url('pelanggan') ?>">
                                <i class="bi bi-circle"></i><span>Data Pelanggan</span>
                            </a>
                        </li>
                        <!-- <li>
                        <a href="<?= base_url('user/gantipassword') ?>">
                            <i class="bi bi-circle"></i><span>Ganti Password</span>
                        </a>
                    </li> -->
                    </ul>
                </li>

            <?php } ?>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-pengaduan" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bell-fill"></i><span>PENGADUAN</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-pengaduan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= base_url('pengaduan') ?>">
                            <i class="bi bi-circle"></i><span>EMAIL PENGADUAN</span>
                        </a>
                    </li>
                    <!-- <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <li>
                            <a href="<?= base_url('user/userDataAll') ?>">
                                <i class="bi bi-circle"></i><span>All Data User</span>
                            </a>
                        </li>
                    <?php } ?> -->
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('auth/logout') ?>">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign-Out</span>
                </a>
            </li><!-- End Blank Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->