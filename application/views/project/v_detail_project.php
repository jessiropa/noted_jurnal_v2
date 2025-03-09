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
                                        🔹 Nama Project : <?= $nama_project;?>
                                    </div>
                                    <div class="col-md-6">
                                        ⏳ Status : <?= $status_project;?>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        🔹 Deskripsi Project : <?= $deskripsi_project;?>
                                    </div>
                                    <div class="col-md-6">
                                        🔹 Deadline : <?= $deadline_project;?>
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
                                <div id="list_task">

                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success btn-icon-text btn-lg"
                                            onclick="tambah_task()">
                                            <i class="mdi mdi-library-plus"></i>Tambah Taask Baru </button>
                                    </div>
                                </div>

                                <hr style="border: 1px solid white;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger btn-icon-text btn-lg"
                                            onclick="konfirmas_hapus_project('<?= $nama_project;?>')">
                                            Hapus Project </button>
                                        <a class="btn btn-primary btn-icon-text btn-lg"
                                            href="<?=base_url('project');?>">
                                            Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit_project" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                <div class="modal fade" id="modaltambah_task" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Task Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> 📌 Judul Task :
                                        </label>
                                        <input type="text" class="form-control" id="judul_task"
                                            placeholder="Judul Task">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleTextarea1">📝 Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi_task" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputCity1">📅 Deadline</label>
                                            <input type="date" class="form-control" id="deadline_task">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> 📂 Kategori:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="kategori_task" id="kategori_penulis"
                                                            value="Penulisan">
                                                        Penulisan </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="kategori_task" id="kategori_penelitian"
                                                            value="Penelitian"> Penelitian </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="kategori_task" id="kategori_revisi" value="Revisi">
                                                        Revisi </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> ⚡ Prioritas:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="prioritas"
                                                            id="prioritas_tinggi" value="Tinggi"> Tinggi </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="prioritas"
                                                            id="prioritas_sedang" value="Sedang"> Sedang </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="prioritas"
                                                            id="prioritas_rendah" value="Rendah"> Rendah</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> 📊 Progress:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="progres"
                                                            id="progres_belum" value="Belum Dikerjakan"> Belum
                                                        Dikerjakan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="progres"
                                                            id="progres_Sedang" value="Sedang Dikerjakan"> Sedang
                                                        Dikerjakan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="progres"
                                                            id="progres_selesai" value="Selesai"> Selesai</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="simpan_task()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modaledit_task" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> 📌 Judul Task :
                                        </label>
                                        <input type="text" class="form-control" id="edit_judul"
                                            placeholder="Judul Task">
                                        <input type="hidden" class="form-control" id="idtask_edit"
                                            placeholder="Judul Task">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleTextarea1">📝 Deskripsi</label>
                                            <textarea class="form-control" id="edit_deskripsi" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputCity1">📅 Deadline</label>
                                            <input type="date" class="form-control" id="edit_deadline">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> 📂 Kategori:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="edit_kategori" id="edit_penulis" value="Penulisan">
                                                        Penulisan </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="edit_kategori" id="edit_penelitian"
                                                            value="Penelitian"> Penelitian </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="edit_kategori" id="edit_revisi" value="Revisi">
                                                        Revisi </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> ⚡ Prioritas:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="edit_prioritas" id="edit_tinggi" value="Tinggi">
                                                        Tinggi </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="edit_prioritas" id="edit_sedang" value="Sedang">
                                                        Sedang </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="edit_prioritas" id="edit_rendah" value="Rendah">
                                                        Rendah</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> 📊 Progress:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="edit_progres"
                                                            id="edit_belum" value="Belum Dikerjakan"> Belum
                                                        Dikerjakan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="edit_progres"
                                                            id="edit_psedang" value="Sedang Dikerjakan"> Sedang
                                                        Dikerjakan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="edit_progres"
                                                            id="edit_Selesai" value="Selesai"> Selesai</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="simpan_edit_task()">Simpan</button>
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

                <div class="modal fade" id="modalKonfirmasiHapus" data-backdrop="static" data-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="mt-2" id="hapus"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-danger" id="btnKonfirmasiHapus">Hapus</button>
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
        view_list_task();
    });

    function edit_project() {
        idpj = '<?php echo $idpj; ?>';

        // Ambil elemen modal
        var myModal = new bootstrap.Modal(document.getElementById('edit_project'));

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
                    var myModal = new bootstrap.Modal(document.getElementById('edit_project'));
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

    function tambah_task() {
        idpj = '<?php echo $idpj; ?>';

        // Ambil elemen modal
        var addtask = new bootstrap.Modal(document.getElementById('modaltambah_task'));

        // Tampilkan modal
        addtask.show();
    }

    function simpan_task() {
        idpj = '<?php echo $idpj; ?>';
        kategori = $("input[name ='kategori_task']:checked").val();
        prioritas = $("input[name ='prioritas']:checked").val();
        progres = $("input[name ='progres']:checked").val();

        var data = {
            idpj: idpj,
            kategori: kategori,
            prioritas: prioritas,
            progres: progres,
            task: $('#judul_task').val(),
            deskripsi: $('#deskripsi_task').val(),
            deadline: $('#deadline_task').val()
        }

        // console.log(data);
        $.ajax({
            type: 'POST',
            url: "<?php
            echo base_url('task/simpan_task/');
            ?>",
            data: data,
            success: function(response) {

                if (response == 'berhasil') {
                    $("#sukses").html("Data berhasil disimpan");
                    var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

                    sukses.show();
                    setTimeout(function() {
                        sukses.hide();
                        view_list_task();
                        // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
                        $('#modaltambah_task').removeClass('show').hide();
                        $('.modal-backdrop').remove();
                    }, 1000);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    }

    function view_list_task() {
        idpj = '<?php echo $idpj; ?>';
        var data = {
            idpj: idpj
        };

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('task/view_list_task/');?>",
            data: data,
            success: function(data) {
                // console.log(data);
                $("#list_task").html(data);
            }
        });
    }

    function konfirmasi_hapus(idtask, judultask) {
        $("#hapus").html("Apakah Anda yakin ingin menghapus task  <b> <u>" + judultask + " </b> </u>?");
        var hapus = new bootstrap.Modal(document.getElementById('modalKonfirmasiHapus'));
        hapus.show();
        // Tambahkan event listener hanya saat tombol "Hapus" ditekan
        document.getElementById("btnKonfirmasiHapus").onclick = function() {
            hapus_task(idtask); // Panggil fungsi hapus dengan idtask
            hapus.hide(); // Tutup modal setelah konfirmasi
        };
    }

    function hapus_task(idtask) {
        var data = {
            idtask: idtask
        }

        $.ajax({
            type: 'POST',
            url: "<?php
            echo base_url('task/hapus_task/');
            ?>",
            data: data,
            success: function(response) {

                if (response == 'berhasil') {
                    $("#sukses").html("Data berhasil dihapus");
                    var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));
                    sukses.show();
                    // $('#modalSukses').modal('show');
                    setTimeout(function() {
                        sukses.hide();
                        // window.location.reload();
                        view_list_task();
                    }, 1000);


                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    }

    function edit_task(idtask) {
        var data = {
            idtask: idtask
        };

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('task/edit_task/');?>",
            data: data,
            dataType: 'json',
            success: function(data) {
                if (data.status == 1) {
                    $("#idtask_edit").val(data.id_task);
                    $("#edit_judul").val(data.judul);
                    $("#edit_deskripsi").val(data.deskripsi);
                    $("#edit_deadline").val(data.deadline);
                    $("input[name='edit_kategori'][value='" + data.kategori + "']").prop("checked",
                        true);
                    $("input[name='edit_prioritas'][value='" + data.prioritas + "']").prop("checked",
                        true);
                    $("input[name='edit_progres'][value='" + data.progres + "']").prop("checked",
                        true);
                    var myModal = new bootstrap.Modal(document.getElementById('modaledit_task'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    myModal.show();
                } else {
                    alert("Task tidak ditemukan!");
                }
            }
        });
    }

    function simpan_edit_task() {
        // console.log('simpan edit task');
        idpj = '<?php echo $idpj; ?>';
        kategori = $("input[name ='edit_kategori']:checked").val();
        prioritas = $("input[name ='edit_prioritas']:checked").val();
        progres = $("input[name ='edit_progres']:checked").val();

        var data = {
            idpj: idpj,
            kategori: kategori,
            prioritas: prioritas,
            progres: progres,
            task: $('#edit_judul').val(),
            deskripsi: $('#edit_deskripsi').val(),
            deadline: $('#edit_deadline').val(),
            idtask: $('#idtask_edit').val()
        }

        // console.log(data);
        $.ajax({
            type: 'POST',
            url: "<?php
            echo base_url('task/simpan_edit_task/');
            ?>",
            data: data,
            success: function(response) {

                if (response == 'berhasil') {
                    $("#sukses").html("Data berhasil disimpan");
                    var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

                    sukses.show();
                    setTimeout(function() {
                        sukses.hide();
                        view_list_task();
                        // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
                        $('#modaledit_task').removeClass('show').hide();
                        $('.modal-backdrop').remove();
                    }, 1000);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    }

    function konfirmas_hapus_project(namaproject) {
        idpj = '<?php echo $idpj; ?>';
        $("#hapus").html("Apakah Anda yakin ingin menghapus project <b> <u>" + namaproject + " </b> </u>?");
        var hapus = new bootstrap.Modal(document.getElementById('modalKonfirmasiHapus'));
        hapus.show();
        // Tambahkan event listener hanya saat tombol "Hapus" ditekan
        document.getElementById("btnKonfirmasiHapus").onclick = function() {
            hapus_project(idpj); // Panggil fungsi hapus dengan idtask
            hapus.hide(); // Tutup modal setelah konfirmasi
        };
    }

    function hapus_project(idpj) {
        var data = {
            idpj: idpj
        }

        $.ajax({
            type: 'POST',
            url: "<?php
            echo base_url('project/hapus_project/');
            ?>",
            data: data,
            success: function(response) {

                if (response == 'berhasil') {
                    $("#sukses").html("Data berhasil dihapus");
                    var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));
                    sukses.show();
                    // $('#modalSukses').modal('show');
                    setTimeout(function() {
                        sukses.hide();
                        // window.location.reload();
                        // view_list_task();
                        window.location.href = "<?php echo base_url('project'); ?>";
                    }, 1000);


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