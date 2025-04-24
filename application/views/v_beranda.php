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
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-sm-4 grid-margin"></div>
                        <div class="col-sm-4 grid-margin">
                            <h4>
                                <center><?php echo $tanggal; ?></center>
                            </h4>
                        </div>
                        <div class="col-sm-4 grid-margin"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 grid-margin"></div>
                        <div class="col-sm-8 grid-margin">
                            <h1>
                                <center><?php echo $ucapan; ?>, <?php echo $nama; ?></center>
                            </h1>
                        </div>
                        <div class="col-sm-2 grid-margin"></div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h2 class="mb-0"><?php echo $project ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">
                                        Jumlah Project
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h2 class="mb-0"><?php echo $task?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Semua Task</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h2 class="mb-0"><?php echo $done ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Task Selesai</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h2 class="mb-0"><?php echo $progres ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">
                                        Task In-progress
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Task Selesai</h4>
                                    <div class="preview-item-content flex-grow d-flex flex-column" id="list_task_done">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Project Anda</h4>
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
        view_list_task_done();
    });

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

    function view_list_task_done() {
        iduser = '<?php echo $id_user; ?>';

        var data = {
            iduser: iduser
        };

        $.ajax({
            type: 'POST',
            url: "<?php
      echo base_url('beranda/list_task_done/');
      ?>",
            data: data,
            success: function(data) {
                $("#list_task_done").html(data);
            }
        });
    }
    </script>

</body>

</html>