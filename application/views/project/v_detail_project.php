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
                        <h3 class="page-title">Projects</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Projects / Detail Project</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">
                    Project Pertama
                  </li> -->
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 grid-margin stretch-card">
                        <?php
                            if($detail_project){
                                $nama_project = $detail_project->NAMA_PROJECT;
                                $deskripsi_project = $detail_project->DESKRIPSI_PROJECT;
                                $status_project = $detail_project->STATUS_PROJECT;
                                $deadline_project = $detail_project->DEADLINE;
                                $idpj = $detail_project->ID_PROJECTS;
                            }else{
                                $nama_project = '-';
                                $deskripsi_project = '-';
                                $status_project = '-';
                                $deadline_project = '-';
                                $idpj = '-';
                            }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?= $nama_project;?></h4>
                                <p class="card-description"> Your Task </p>
                                <hr style="border: 1px solid white;">
                                <div class="row">
                                    <div class="col-md-6">
                                        Nama Project : <?= $nama_project;?>
                                    </div>
                                    <div class="col-md-6">
                                        Status : <?= $status_project;?>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        Deskripsi Project : <?= $deskripsi_project;?>
                                    </div>
                                    <div class="col-md-6">
                                        Deadline : <?= $deadline_project;?>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary btn-icon-text btn-lg"
                                            onclick="edit_project()"> Edit Project</button>
                                    </div>
                                </div>
                                <!-- <hr style="color: white;"> -->
                                <hr style="border: 1px solid white;">
                                <p class="card-description"> Task List </p>
                                <div class="row">
                                    <div class="col-md-8">
                                        Task 1 (Status)
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-warning btn-rounded btn-fw">Edit</button>
                                        <button type="button" class="btn btn-danger btn-rounded btn-fw">Hapus</button>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-md-8">
                                        Task 2 (Status)
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-warning btn-rounded btn-fw">Edit</button>
                                        <button type="button" class="btn btn-danger btn-rounded btn-fw">Hapus</button>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-md-8">
                                        Task 3 (Status)
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-warning btn-rounded btn-fw">Edit</button>
                                        <button type="button" class="btn btn-danger btn-rounded btn-fw">Hapus</button>
                                    </div>
                                </div> <br>
                                <button type="button" class="btn btn-success btn-icon-text btn-lg">
                                    <i class="mdi mdi-library-plus"></i>Tambah Taask Baru </button>
                                <hr style="border: 1px solid white;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger btn-icon-text btn-lg">
                                            Hapus Project </button>
                                        <button type="button" class="btn btn-primary btn-icon-text btn-lg">
                                            Kembali </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="test" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><?= $nama_project;?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Project</label>
                                        <input type="text" class="form-control" id="edit_namapj"
                                            value="<?= $nama_project;?>" placeholder="Nama Project">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Deskripsi Project</label>
                                            <textarea class="form-control" id="edit_deskripsipj"
                                                rows="4"><?= $deskripsi_project;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Status Project</label>
                                            <select class="form-control" id="edit_statuspj">
                                                <!-- <option value="SELESAI">SELESAI</option>
                                                <option value="BATAL">BATAL</option>
                                                <option value="PROSES">PROSES</option>
                                                <option value="TUNDA">TUNDA</option> -->
                                                <option value="SELESAI"
                                                    <?= ($status_project == "SELESAI") ? "selected" : "" ?>>SELESAI
                                                </option>
                                                <option value="BATAL"
                                                    <?= ($status_project == "BATAL") ? "selected" : "" ?>>BATAL</option>
                                                <option value="PROSES"
                                                    <?= ($status_project == "PROSES") ? "selected" : "" ?>>PROSES
                                                </option>
                                                <option value="TUNDA"
                                                    <?= ($status_project == "TUNDA") ? "selected" : "" ?>>TUNDA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputCity1">Deadline</label>
                                            <input type="date" class="form-control" id="edit_deadlinepj"
                                                placeholder="Dealine Project" value="<?= $deadline_project;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="simpan_pj()">Simpan</button>
                            </div>
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
                <?php $this->load->view('main_footer');?>
            </div>
        </div>
    </div>


    <?php $this->load->view('footer');?>
    <script>
    function edit_project() {
        idpj = '<?php echo $idpj; ?>';

        // Ambil elemen modal
        var myModal = new bootstrap.Modal(document.getElementById('test'));

        // Tampilkan modal
        myModal.show();
    }

    function simpan_pj() {
        // console.log('hallo')
        idpj = '<?php echo $idpj; ?>';
        var data = {
            idpj: idpj,
            edit_namapj: $('#edit_namapj').val(),
            edit_deskripsipj: $('#edit_deskripsipj').val(),
            edit_statuspj: $('#edit_statuspj').val(),
            edit_deadlinepj: $('#edit_deadlinepj').val()
        }
        // console.log(data);
        $.ajax({
            type: 'POST',
            url: "<?php
          echo base_url('project/simpan_pj/');
          ?>",
            data: data,
            success: function(response) {

                if (response == 'berhasil') {
                    $("#sukses").html("Data berhasil diubah");
                    var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));
                    var myModal = new bootstrap.Modal(document.getElementById('test'));
                    sukses.show();
                    // $('#modalSukses').modal('show');
                    setTimeout(function() {
                        sukses.hide();
                        myModal.hide();
                        window.location.reload();
                    }, 1000);

                    // Tampilkan modal

                }
                // $("#list_project").html(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    }
    </script>

</body>

</html>