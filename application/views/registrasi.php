<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Noted Jurnal</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/nj_logo.svg" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">
                                <center>Register</center>
                            </h3>
                            <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                            <?php endif; ?>
                            <form action="<?= site_url('auth/simpan_regis')?>" method="POST">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="reg_nama" name="reg_nama" />
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="reg_username" name="reg_username" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="reg_password" name="reg_password" />
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="reg_repassword"
                                        name="reg_repassword" />
                                </div> <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">
                                        Daftar
                                    </button>
                                </div>

                                <p class="sign-up text-center">
                                    Sudah memiliki Akun ? <a href="<?php echo site_url('auth'); ?>">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url()?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url()?>assets/js/off-canvas.js"></script>
    <script src="<?=base_url()?>assets/js/hoverable-collapse.js"></script>
    <script src="<?=base_url()?>assets/js/misc.js"></script>
    <script src="<?=base_url()?>assets/js/settings.js"></script>
    <script src="<?=base_url()?>assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>