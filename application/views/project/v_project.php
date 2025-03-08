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
                        <h3 class="page-title">Project</h3>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Project</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    My Project
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">New Project</h4>
                                    <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success" style="font-size: 0.8em; padding: 5px;">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php elseif ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger" style="font-size: 0.8em; padding: 5px;">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <form class="forms-sample">
                                        <div class="form-group">
                                            <!-- <label for="exampleInputUsername1">Nama Project</label> -->
                                            <input type="text" class="form-control" id="nameproject" name="nameproject"
                                                placeholder="Nama Project" />
                                        </div>
                                        <button type="button" class="btn btn-primary" onclick="pilih_data()"
                                            style="margin-right: 10px;">+ Create Project</button>
                                        <!-- <button class="btn btn-dark">Batal</button> -->
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Project</h4>
                                        <p class="text-muted mb-1">Your data status</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list" id="list_project">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('main_footer');?>
            </div>
        </div>
    </div>


    <?php $this->load->view('footer');?>
    <script>
    $(document).ready(function() {
        view_list_project();
    });
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 3000);

    function pilih_data() {
        var data = {
            namaproject: $('#nameproject').val()
        }
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('project/create_project/') ?>",
            data: data,
            success: function(response) {

                if (response === 'success') {
                    $('#nameproject').val('');
                    view_list_project();
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    }

    function view_list_project() {
        iduser = '<?php echo $id_user; ?>';

        var data = {
            iduser: iduser
        };

        $.ajax({
            type: 'POST',
            url: "<?php
      echo base_url('project/view_list_project/');
      ?>",
            data: data,
            success: function(data) {
                $("#list_project").html(data);
            }
        });
    }
    </script>

</body>

</html>