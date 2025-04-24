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
                                            <i class="mdi mdi-library-plus"></i>Tambah Task Baru </button>
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
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <h4 class="card-title">To do list</h4>
                                        <div class="add-items d-flex">
                                            <input type="text" class="form-control todo-list-input" id="inputTodo"
                                                placeholder="Masukkan to do list ..." />
                                            <button class="add btn btn-primary todo-list-add-btn" type="button"
                                                onclick="addTodoItem()">Add</button>
                                        </div>
                                        <div class="list-wrapper">
                                            <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom"
                                                id="todoList">
                                            </ul>
                                        </div>
                                    </div>
                                </div><br><br>

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
                    <style>
                    /* Gaya khusus untuk checkbox di dalam modal edit todolist */
                    #modaledit_task .list-wrapper ul#todolist_edit li .form-check .checkbox {
                        display: block !important;
                        width: auto !important;
                        height: auto !important;
                        opacity: 1 !important;
                        visibility: visible !important;
                        margin-right: 5px;
                    }

                    /* Gaya untuk label todolist yang sudah selesai (dicoret dan warna) di modal edit */
                    #modaledit_task .list-wrapper ul#todolist_edit li.completed .form-check .form-check-label {
                        text-decoration: line-through;
                        text-decoration-color: #007bff;
                        color: #888;
                    }

                    /* Gaya untuk ikon remove todolist yang sudah selesai (warna biru) di modal edit */
                    #modaledit_task .list-wrapper ul#todolist_edit li.completed .remove {
                        color: #007bff !important;
                        cursor: pointer;
                    }

                    /* Gaya untuk ikon remove todolist secara umum di modal edit */
                    #modaledit_task .list-wrapper ul#todolist_edit li .remove {
                        color: #6c757d;
                        cursor: pointer;
                    }

                    /* Gaya untuk label todolist yang sudah selesai (dicoret dan warna) di fitur tambah baru */
                    #todoList li.completed .form-check .form-check-label {
                        text-decoration: line-through;
                        text-decoration-color: #007bff;
                        color: #888;
                    }

                    input[type="checkbox"]:not(:checked) {
                        border-color: #007bff;
                    }
                    </style>
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
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit To-do List</h4>
                                        <div class="add-items d-flex">
                                            <input type="text" class="form-control todo-list-input"
                                                id="todolist_input_edit" placeholder="enter task.." />
                                            <button type="button" class="add btn btn-primary todo-list-add-btn"
                                                onclick="addTodoItemEdit()">Add</button>
                                        </div>
                                        <div class="list-wrapper mt-2">
                                            <ul id="todolist_edit"
                                                class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                                            </ul>
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

    function addTodoItem() {
        var input = $('#inputTodo').val().trim();
        if (input !== '') {
            var itemHtml = `
            <li>
                <div class='form-check form-check-primary'>
                    <label class='form-check-label'>
                        <input class='checkbox' type='checkbox' />
                        ${input}
                        <i class='input-helper'></i>
                    </label>
                </div>
                <i class='remove mdi mdi-close-box' onclick='removeTodoItem(this)'></i>
            </li>
        `;
            $('#todoList').prepend(itemHtml);
            $('#inputTodo').val('');
        }
    }

    function removeTodoItem(element) {
        $(element).closest('li').remove();
    }

    // Event listener untuk menandai todo sebagai selesai/belum selesai
    $('#todoList').on('change', '.checkbox', function() {
        var listItem = $(this).closest('li');
        var label = listItem.find('.form-check-label');
        var removeIcon = listItem.find('.remove');
        var isChecked = $(this).prop('checked');
        var blueColor = '#007bff'; // Warna biru
        var defaultTextColor = '';

        if (isChecked) {
            label.css('text-decoration', 'line-through');
            label.css('text-decoration-color', blueColor); // Warna garis coretan menjadi biru
            label.css('color', defaultTextColor); // Warna teks kembali ke default
            removeIcon.css('color', blueColor);
            $(this).attr('checked', 'checked');
        } else {
            label.css('text-decoration', 'none');
            label.css('text-decoration-color', ''); // Hapus warna garis coretan
            label.css('color', defaultTextColor); // Warna teks kembali ke default
            removeIcon.css('color', ''); // Kembalikan ke warna default
            $(this).removeAttr('checked');
        }
    });

    function simpan_task() {
        idpj = '<?php echo $idpj; ?>';
        kategori = $("input[name ='kategori_task']:checked").val();
        prioritas = $("input[name ='prioritas']:checked").val();
        progres = $("input[name ='progres']:checked").val();

        var todos = [];
        $('#todoList li').each(function() {
            var text = $(this).find('label').text().trim();
            var isChecked = $(this).find('input[type="checkbox"]').is(':checked');
            todos.push({
                item: text,
                done: isChecked
            });
        });

        // Ubah array objek menjadi 2 array sederhana
        var todo_items = [];
        var todo_status = [];

        todos.forEach(function(todo) {
            todo_items.push(todo.item);
            todo_status.push(todo.done ? 1 : 0);
        });

        var data = {
            kategori: kategori,
            prioritas: prioritas,
            progres: progres,
            task: $('#judul_task').val(),
            deskripsi: $('#deskripsi_task').val(),
            deadline: $('#deadline_task').val(),
            idpj: $('#project').val(),
            'todos[]': todo_items, // array item
            'todos_status[]': todo_status
        }

        console.log(data);
        // $.ajax({
        //     type: 'POST',
        //     url: "<?php
        //     echo base_url('task/simpan_task/');
        //     ?>",
        //     data: data,
        //     success: function(response) {

        //         if (response == 'berhasil') {
        //             $("#sukses").html("Data berhasil disimpan");
        //             var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

        //             sukses.show();
        //             setTimeout(function() {
        //                 sukses.hide();
        //                 view_list_task();
        //                 window.location.reload();
        //                 // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
        //                 $('#modaltambah_task').removeClass('show').hide();
        //                 $('.modal-backdrop').remove();
        //             }, 1000);
        //         }
        //     },
        //     error: function(xhr, status, error) {
        //         console.log(error);
        //     },
        // });
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
                    $("#idpj").val(data.idpj);
                    $("input[name='edit_kategori'][value='" + data.kategori + "']").prop("checked", true);
                    $("input[name='edit_prioritas'][value='" + data.prioritas + "']").prop("checked", true);
                    $("input[name='edit_progres'][value='" + data.progres + "']").prop("checked", true);
                    let todosHtml = '';
                    data.todolist.forEach(function(todo) {
                        const isChecked = todo.IS_DONE == 1 ? 'checked' : '';
                        const completedClass = todo.IS_DONE == 1 ? 'completed' :
                            ''; // Tambahkan class completed

                        todosHtml += `
                    <li class="${completedClass}">
                        <div class='form-check form-check-primary'>
                            <label class='form-check-label'>
                                <input class='checkbox' type='checkbox' ${isChecked} />
                                ${todo.NAMA_TODO}
                            </label>
                        </div>
                        <i class='remove mdi mdi-close-box' onclick='removeTodo(this)'></i>
                    </li>`;
                    });
                    $('#todolist_edit').html(todosHtml);
                    var myModal = new bootstrap.Modal(document.getElementById('modaledit_task'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    myModal.show();

                    // Event listener untuk menandai todo sebagai selesai/belum selesai (fitur edit)
                    $('#modaledit_task').off('shown.bs.modal').on('shown.bs.modal', function() {
                        $('#todolist_edit').off('change', '.checkbox').on('change', '.checkbox',
                            function() {
                                var listItem = $(this).closest('li');
                                listItem.toggleClass('completed', this.checked);
                            });
                    });
                } else {
                    alert("Task tidak ditemukan!");
                }
            }
        });
    }

    function addTodoItemEdit() {
        var input = $('#todolist_input_edit').val();
        if (input.trim() !== '') {
            var listItem = `
            <li>
                <div class="form-check form-check-primary">
                    <label class="form-check-label">
                        <input class="checkbox" type="checkbox" />
                        ${input}
                    </label>
                </div>
                <i class="remove mdi mdi-close-box" onclick="removeTodo(this)"></i>
            </li>`;
            $('#todolist_edit').prepend(listItem);
            $('#todolist_input_edit').val('');
        }
    }

    function removeTodo(el) {
        $(el).closest('li').remove();
    }

    // function simpan_edit_task() {
    //     // console.log('simpan edit task');
    //     idpj = '<?php echo $idpj; ?>';
    //     kategori = $("input[name ='edit_kategori']:checked").val();
    //     prioritas = $("input[name ='edit_prioritas']:checked").val();
    //     progres = $("input[name ='edit_progres']:checked").val();

    //     var data = {
    //         idpj: idpj,
    //         kategori: kategori,
    //         prioritas: prioritas,
    //         progres: progres,
    //         task: $('#edit_judul').val(),
    //         deskripsi: $('#edit_deskripsi').val(),
    //         deadline: $('#edit_deadline').val(),
    //         idtask: $('#idtask_edit').val()
    //     }

    //     // console.log(data);
    //     $.ajax({
    //         type: 'POST',
    //         url: "<?php
    //         echo base_url('task/simpan_edit_task/');
    //         ?>",
    //         data: data,
    //         success: function(response) {

    //             if (response == 'berhasil') {
    //                 $("#sukses").html("Data berhasil disimpan");
    //                 var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

    //                 sukses.show();
    //                 setTimeout(function() {
    //                     sukses.hide();
    //                     view_list_task();
    //                     // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
    //                     $('#modaledit_task').removeClass('show').hide();
    //                     $('.modal-backdrop').remove();
    //                 }, 1000);
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.log(error);
    //         },
    //     });
    // }

    function simpan_edit_task() {
        var todos = [];
        $('#todolist_edit li').each(function() {
            var text = $(this).find('label').text().trim();
            var isChecked = $(this).find('input[type="checkbox"]').is(':checked');
            todos.push({
                item: text,
                done: isChecked
            });
        });

        var todo_items = [];
        var todo_status = [];

        todos.forEach(function(todo) {
            todo_items.push(todo.item);
            todo_status.push(todo.done ? 1 : 0);
        });

        kategori = $("input[name ='edit_kategori']:checked").val();
        prioritas = $("input[name ='edit_prioritas']:checked").val();
        progres = $("input[name ='edit_progres']:checked").val();

        var data = {
            // idpj: idpj,
            kategori: kategori,
            prioritas: prioritas,
            progres: progres,
            task: $('#edit_judul').val(),
            idpj: $('#idpj').val(),
            deskripsi: $('#edit_deskripsi').val(),
            deadline: $('#edit_deadline').val(),
            idtask: $('#idtask_edit').val(),
            'todos[]': todo_items,
            'todos_status[]': todo_status
        }

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
                        window.location.reload();
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