<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('head');?>
</head>

<body>
    <div class="container-scroller">
        <?php $this->load->view('sidebar', $this);?>
        <div class="container-fluid page-body-wrapper">
            <?php $this->load->view('section');?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Setting</h3>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Setting</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Setting Account
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Default form</h4> -->
                                    <!-- <p class="card-description"> Basic form layout </p> -->
                                    <?php
                                        if($user->num_rows() > 0){
                                            $nama = $user->row()->NAMA;
                                            $username = $user->row()->USERNAME;
                                            $id_user = $user->row()->ID_USER;
                                        }else{
                                            $nama = '';
                                            $username = '';
                                            $id_user = '';
                                        }
                                     ?>
                                    <form class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Nama</label>
                                            <input type="text" class="form-control" id="nama_user" name="nama_user"
                                                value="<?= $nama ?>">
                                            <input type="hidden" class="form-control" id="id_user" name="id_user"
                                                value="<?= $id_user ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Username</label>
                                            <input type="text" class="form-control" id="username_user"
                                                name="username_user" value="<?= $username?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" id="repassword"
                                                name="repassword" placeholder="Password">
                                        </div>
                                        <button type="button" class="btn btn-primary mr-2"
                                            onclick="update_acc()">Simpan</button>
                                        <button class="btn btn-dark">Batal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('main_footer');?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSukses" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2" id="sukses"></p>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('footer');?>
    <script>
    // $(document).ready(function() {
    //     view_list_project();
    // });
    // setTimeout(function() {
    //     $('.alert').fadeOut('slow');
    // }, 3000);

    function update_acc() {
        var data = {
            nama_user: $('#nama_user').val(),
            id_user: $('#id_user').val(),
            username: $('#username_user').val(),
            password: $('#password').val(),
            repassword: $('#repassword').val()
        }
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('setting/update_acc/') ?>",
            data: data,
            dataType: 'json',
            success: function(response) {

                if (response.status === 'success') {
                    $("#sukses").html("Data berhasil diperbarui");
                    var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));
                    sukses.show();
                    // $('#modalSukses').modal('show');
                    setTimeout(function() {
                        sukses.hide();
                        window.location.reload();
                    }, 1000);
                } else {
                    alert(response.message); // Pesan error spesifik
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    }
    </script>

</body>

</html>