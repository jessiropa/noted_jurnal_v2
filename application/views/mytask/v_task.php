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
                        <h3 class="page-title">My Task</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">My All Task</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">
                    Project Pertama
                  </li> -->
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-inline">
                                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                            placeholder="Nama Task">
                                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <select class="form-control">
                                                <option>Hallo Project</option>
                                                <option>Rival Project</option>
                                                <option>jessi project</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <select class="form-control">
                                                <option>Penulisan</option>
                                                <option>Penelitian</option>
                                                <option>Revisi</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <select class="form-control">
                                                <option>Tinggi</option>
                                                <option>Sedang</option>
                                                <option>Rendah</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <select class="form-control">
                                                <option>Belum Dikerjakan</option>
                                                <option>Sedang Dikerjakan</option>
                                                <option>Selesai</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info mb-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">My All Task</h4>
                                    <div class="input-group" style="max-width: 350px">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-success" type="button"
                                                onclick="tambah_task()">
                                                + Tambah Task
                                            </button>
                                        </div>
                                    </div>
                                    <br />
                                    <div class=" table-responsive">
                                        <table class="table table-striped" id="taskTable">
                                            <thead>
                                                <tr>
                                                    <th>✅ Nama Task </th>
                                                    <th>📌 Project </th>
                                                    <th>⚡ Prioritas </th>
                                                    <th> 📅 Deadline </th>
                                                    <th> 📊 Progress </th>
                                                    <th> ✏️ Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_task">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                                        <input type="hidden" class="form-control" id="idpj" placeholder="Judul Task">
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
                                        <label for="exampleFormControlInput1" class="form-label"> 📂
                                            Kategori:</label>
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
                                        <label for="exampleFormControlInput1" class="form-label"> ⚡
                                            Prioritas:</label>
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
                                        <label for="exampleFormControlInput1" class="form-label"> 📊
                                            Progress:</label>
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
                                                            id="edit_Selesai" value="Selesai">
                                                        Selesai</label>
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
                                <?php
                                    if($project->num_rows() > 0){
                                        $data = $project->result();
                                }else{
                                echo 'ini error si';
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Project</label>
                                            <select class="form-control" id="project">
                                                <?php foreach ($data as $p): ?>
                                                <option value="<?= $p->ID_PROJECTS; ?>"><?= $p->NAMA_PROJECT; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
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
                                        <label for="exampleFormControlInput1" class="form-label"> 📂
                                            Kategori:</label>
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
                                        <label for="exampleFormControlInput1" class="form-label"> ⚡
                                            Prioritas:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="prioritas"
                                                            id="prioritas_tinggi" value="Tinggi">
                                                        Tinggi </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="prioritas"
                                                            id="prioritas_sedang" value="Sedang">
                                                        Sedang </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="prioritas"
                                                            id="prioritas_rendah" value="Rendah">
                                                        Rendah</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label"> 📊
                                            Progress:</label>
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
                <?php $this->load->view('main_footer');?>
            </div>
        </div>
    </div>

    <?php $this->load->view('footer');?>
    <script>
    $(document).ready(function() {
        view_list_task();

    });

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


    function view_list_task() {
        iduser = '<?php echo $id_user; ?>';

        var data = {
            iduser: iduser
        };

        $.ajax({
            type: 'POST',
            url: "<?php
      echo base_url('task/all_list_task/');
      ?>",
            data: data,
            success: function(data) {
                $("#list_task").html(data);

                if ($.fn.DataTable.isDataTable('#taskTable')) {
                    $('#taskTable').DataTable().destroy();
                }
                $('#taskTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "responsive": true,
                    "autoWidth": false
                });
            }
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
            idtask: $('#idtask_edit').val()
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

    function tambah_task() {

        // Ambil elemen modal
        var addtask = new bootstrap.Modal(document.getElementById('modaltambah_task'));

        // Tampilkan modal
        addtask.show();
    }

    function simpan_task() {
        kategori = $("input[name ='kategori_task']:checked").val();
        prioritas = $("input[name ='prioritas']:checked").val();
        progres = $("input[name ='progres']:checked").val();

        var data = {
            kategori: kategori,
            prioritas: prioritas,
            progres: progres,
            task: $('#judul_task').val(),
            deskripsi: $('#deskripsi_task').val(),
            deadline: $('#deadline_task').val(),
            idpj: $('#project').val()
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
    </script>

</body>

</html>