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
                        <h3 class="page-title">Link Referensi</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Referensi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Link Referensi
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <style>
                    .dropdown-toggle::after {
                        display: none;
                    }

                    .dropdown-menu {
                        font-size: 0.9rem;
                        min-width: 100px;
                    }

                    .nav-item .btn {
                        margin-left: 5px;
                    }

                    .menu-title {
                        font-weight: 500;
                    }
                    </style>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">

                                <!-- <div class="card-body">
                                    <h4 class="card-title">All My Link</h4>
                                    <p class="card-description"> Your Link </p>
                                    <hr style="border: 1px solid white;">
                                    <ul class="nav flex-column">
                                        <?php
                                        $link_before = null;

                                        foreach ($referensi->result_array() as $rf) :
                                            if ($link_before !== $rf['ID_KATEGORI'] && $link_before !== null) :
                                                echo "</ul></div></li>";
                                            endif;
                                            if ($link_before !== $rf['ID_KATEGORI']) :
                                        ?>
                                        <li class="nav-item menu-items">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="nav-link" data-toggle="collapse"
                                                    href="#refKategori<?= $rf['ID_KATEGORI']; ?>" aria-expanded="false"
                                                    aria-controls="refKategori<?= $rf['ID_KATEGORI']; ?>">
                                                    <span class="menu-title">📂
                                                        <?= strtoupper($rf['NAMA_KATEGORI']); ?></span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-link text-light dropdown-toggle"
                                                        type="button" id="dropdownMenuButton<?= $rf['ID_KATEGORI']; ?>"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" style="text-decoration: none;">
                                                        ⋮
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenuButton<?= $rf['ID_KATEGORI']; ?>">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="edit_kategori('<?= $rf['ID_KATEGORI']; ?>', '<?= $rf['NAMA_KATEGORI']; ?>')">✏️
                                                            Edit</a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                            onclick="konfirmasi_hapus_kategori('<?= $rf['ID_KATEGORI']; ?>', '<?= $rf['NAMA_KATEGORI']; ?>')">❌
                                                            Hapus</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="collapse" id="refKategori<?= $rf['ID_KATEGORI']; ?>">
                                                <ul class="nav flex-column sub-menu">
                                                    <?php endif; ?>

                                                    <li
                                                        class="nav-item d-flex justify-content-between align-items-center">
                                                        <a class="nav-link" href="<?= $rf['URL']; ?>" target="_blank">
                                                            📌 <?= ucwords(strtolower($rf['JUDUL_LINK'])); ?>
                                                        </a>
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                onclick="edit_link('<?= $rf['ID_LINK']; ?>')">✏️</button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="konfirmasi_hapus_link('<?= $rf['ID_LINK']; ?>', '<?= $rf['JUDUL_LINK']; ?>')">❌</button>
                                                        </div>
                                                    </li>

                                                    <?php
                                                        $link_before = $rf['ID_KATEGORI'];
                                                    endforeach;

                                                    if ($link_before !== null) :
                                                        echo "</ul></div></li>";
                                                    endif;
                                                    ?>
                                                </ul>

                                                <hr style="border: 1px solid white;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="button"
                                                            class="btn btn-primary btn-icon-text btn-lg"
                                                            onclick="tambah_kategori()">
                                                            + Tambah Kategori
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-icon-text btn-lg"
                                                            onclick="tambah_link()">
                                                            + Tambah Link
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>



                                </div> -->
                                <div class="card-body">
                                    <h4 class="card-title">All My Link</h4>
                                    <p class="card-description"> Your Link </p>
                                    <hr style="border: 1px solid white;">
                                    <ul class="nav flex-column">
                                        <?php foreach ($kategori->result_array() as $ktg): ?>
                                        <li class="nav-item menu-items">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="nav-link" data-toggle="collapse"
                                                    href="#refKategori<?= $ktg['ID_KATEGORI']; ?>" aria-expanded="false"
                                                    aria-controls="refKategori<?= $ktg['ID_KATEGORI']; ?>">
                                                    <span class="menu-title">📂
                                                        <?= strtoupper($ktg['NAMA_KATEGORI']); ?></span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-link text-light dropdown-toggle"
                                                        type="button" id="dropdownMenuButton<?= $ktg['ID_KATEGORI']; ?>"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" style="text-decoration: none;">
                                                        ⋮
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenuButton<?= $ktg['ID_KATEGORI']; ?>">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="edit_kategori('<?= $ktg['ID_KATEGORI']; ?>', '<?= $ktg['NAMA_KATEGORI']; ?>')">✏️
                                                            Edit</a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                            onclick="konfirmasi_hapus_kategori('<?= $ktg['ID_KATEGORI']; ?>', '<?= $ktg['NAMA_KATEGORI']; ?>')">❌
                                                            Hapus</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="collapse" id="refKategori<?= $ktg['ID_KATEGORI']; ?>">
                                                <ul class="nav flex-column sub-menu">
                                                    <?php
                                                        $hasLink = false;
                                                        foreach ($referensi->result_array() as $rf) {
                                                            if ($rf['ID_KATEGORI'] === $ktg['ID_KATEGORI']) {
                                                                $hasLink = true;
                                                    ?>
                                                    <li
                                                        class="nav-item d-flex justify-content-between align-items-center">
                                                        <a class="nav-link" href="<?= $rf['URL']; ?>" target="_blank">
                                                            📌 <?= ucwords(strtolower($rf['JUDUL_LINK'])); ?>
                                                        </a>
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                onclick="edit_link('<?= $rf['ID_LINK']; ?>')">✏️</button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="konfirmasi_hapus_link('<?= $rf['ID_LINK']; ?>', '<?= $rf['JUDUL_LINK']; ?>')">❌</button>
                                                        </div>
                                                    </li>
                                                    <?php
                                                            }
                                                        }
                                                        if (!$hasLink) {
                                                            echo '<li class="nav-item"><span class="text-muted px-3">📭 Tidak ada link</span></li>';
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <hr style="border: 1px solid white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-icon-text btn-lg"
                                                onclick="tambah_kategori()">
                                                + Tambah Kategori
                                            </button>
                                            <button type="button" class="btn btn-info btn-icon-text btn-lg"
                                                onclick="tambah_link()">
                                                + Tambah Link
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal fade" id="modalkategori" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori Link</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleFormControlInput1" class="form-label"> 📂 Nama
                                                    Kategori
                                                </label>
                                                <input type="text" class="form-control" id="kategori"
                                                    placeholder="Nama Kategori ...">
                                            </div>
                                        </div><br>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="simpan_kategori()">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editmodalkategori" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Kategori Link</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleFormControlInput1" class="form-label"> 📂 Nama
                                                    Kategori
                                                </label>
                                                <input type="text" class="form-control" id="editkategori"
                                                    placeholder="Nama Kategori ...">
                                                <input type="hidden" class="form-control" id="editidkategori">
                                            </div>
                                        </div><br>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="simpan_kategoriedit()">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modallink" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Link</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleFormControlInput1" class="form-label"> 📌 Judul Link
                                                </label>
                                                <input type="text" class="form-control" id="judul_link"
                                                    placeholder="Judul Link ...">
                                            </div>
                                        </div><br>
                                        <?php
                                    if($kategori->num_rows() > 0){
                                        $data = $kategori->result();
                                }else{
                                echo 'ini error si';
                                }
                                ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">📂 Kategori</label>
                                                    <select class="form-control" id="pilihkategori">
                                                        <?php foreach ($data as $p): ?>
                                                        <option value="<?= $p->ID_KATEGORI; ?>">
                                                            <?= $p->NAMA_KATEGORI; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleFormControlInput1" class="form-label"> 🌐 Link
                                                </label>
                                                <input type="text" class="form-control" id="link"
                                                    placeholder="Judul Link ...">
                                            </div>
                                        </div><br>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="simpan_link()">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modaleditlink" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Link</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleFormControlInput1" class="form-label"> 📌 Judul Link
                                                </label>
                                                <input type="text" class="form-control" id="judul_link_edit"
                                                    placeholder="Judul Link ...">
                                                <input type="hidden" class="form-control" id="id_link_edit">
                                            </div>
                                        </div><br>
                                        <?php
                                    if($kategori->num_rows() > 0){
                                        $data = $kategori->result();
                                }else{
                                echo 'ini error si';
                                }
                                ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">📂 Kategori</label>
                                                    <select class="form-control" id="pilihkategoriedit">
                                                        <?php foreach ($data as $p): ?>
                                                        <option value="<?= $p->ID_KATEGORI; ?>">
                                                            <?= $p->NAMA_KATEGORI; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleFormControlInput1" class="form-label"> 🌐 Link
                                                </label>
                                                <input type="text" class="form-control" id="link_edit">
                                            </div>
                                        </div><br>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="simpan_link_edit()">Simpan</button>
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
                                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="mt-2" id="hapus"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger"
                                            id="btnKonfirmasiHapus">Hapus</button>
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
            function tambah_kategori() {
                // Ambil elemen modal
                var kategori = new bootstrap.Modal(document.getElementById('modalkategori'));

                // Tampilkan modal
                kategori.show();
            }

            function simpan_kategori() {
                var data = {
                    kategori: $('#kategori').val()
                }
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/simpan_kategori/'); ?>",
                    data: data,
                    success: function(response) {

                        if (response == 'berhasil') {
                            $("#sukses").html("Data berhasil disimpan");
                            var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

                            sukses.show();
                            setTimeout(function() {
                                sukses.hide();
                                // view_list_task();
                                // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
                                $('#modalkategori').removeClass('show').hide();
                                $('.modal-backdrop').remove();
                                $('#kategori').val('');
                                window.location.reload();

                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                });
            }

            function tambah_link() {
                // Ambil elemen modal
                var link = new bootstrap.Modal(document.getElementById('modallink'));

                // Tampilkan modal
                link.show();
            }

            function simpan_link() {
                var data = {
                    kategori: $('#pilihkategori').val(),
                    judul_link: $('#judul_link').val(),
                    link: $('#link').val()
                }
                // console.log(data)
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/simpan_link/'); ?>",
                    data: data,
                    success: function(response) {

                        if (response == 'berhasil') {
                            $("#sukses").html("Data berhasil disimpan");
                            var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

                            sukses.show();
                            setTimeout(function() {
                                sukses.hide();
                                // view_list_task();
                                // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
                                $('#modallink').removeClass('show').hide();
                                $('.modal-backdrop').remove();
                                $('#judul_link').val('');
                                $('#link').val('');
                                window.location.reload();

                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                });
            }

            function konfirmasi_hapus_kategori(idkategori, judulkategori) {
                $("#hapus").html("Apakah Anda yakin ingin menghapus kategori  <b> <u>" + judulkategori + " </b> </u>?");
                var hapus = new bootstrap.Modal(document.getElementById('modalKonfirmasiHapus'));
                hapus.show();
                // Tambahkan event listener hanya saat tombol "Hapus" ditekan
                document.getElementById("btnKonfirmasiHapus").onclick = function() {
                    hapus_kategori(idkategori); // Panggil fungsi hapus dengan idkategori
                    hapus.hide(); // Tutup modal setelah konfirmasi
                };
            }

            function hapus_kategori(idkategori) {
                var data = {
                    idkategori: idkategori
                }

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/hapus_kategori/'); ?>",
                    data: data,
                    success: function(response) {

                        if (response == 'berhasil') {
                            $("#sukses").html("Data berhasil dihapus");
                            var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));
                            sukses.show();
                            // $('#modalSukses').modal('show');
                            setTimeout(function() {
                                sukses.hide();
                                window.location.reload();
                                // view_list_task();
                            }, 1000);


                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                });
            }

            function edit_kategori(idkategori) {
                var data = {
                    idkategori: idkategori
                };

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/edit_kategori/');?>",
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 1) {
                            $("#editidkategori").val(data.idkategori);
                            $("#editkategori").val(data.judul);
                            var myModal = new bootstrap.Modal(document.getElementById(
                                'editmodalkategori'), {
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

            function simpan_kategoriedit() {
                var data = {
                    kategori: $('#editkategori').val(),
                    idkategori: $('#editidkategori').val()
                }
                // console.log(data);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/simpan_kategori/'); ?>",
                    data: data,
                    success: function(response) {

                        if (response == 'berhasil') {
                            $("#sukses").html("Data berhasil disimpan");
                            var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

                            sukses.show();
                            setTimeout(function() {
                                sukses.hide();
                                // view_list_task();
                                // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
                                $('#editmodalkategori').removeClass('show').hide();
                                $('.modal-backdrop').remove();
                                $('#editkategori').val('');
                                window.location.reload();

                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                });
            }

            function konfirmasi_hapus_link(idlink, judullink) {
                $("#hapus").html("Apakah Anda yakin ingin menghapus link  <b> <u>" + judullink + " </b> </u>?");
                var hapus = new bootstrap.Modal(document.getElementById('modalKonfirmasiHapus'));
                hapus.show();
                // Tambahkan event listener hanya saat tombol "Hapus" ditekan
                document.getElementById("btnKonfirmasiHapus").onclick = function() {
                    hapus_link(idlink); // Panggil fungsi hapus dengan idlink
                    hapus.hide(); // Tutup modal setelah konfirmasi
                };
            }

            function hapus_link(idlink) {
                var data = {
                    idlink: idlink
                }

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/hapus_link/'); ?>",
                    data: data,
                    success: function(response) {

                        if (response == 'berhasil') {
                            $("#sukses").html("Data berhasil dihapus");
                            var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));
                            sukses.show();
                            // $('#modalSukses').modal('show');
                            setTimeout(function() {
                                sukses.hide();
                                window.location.reload();
                                // view_list_task();
                            }, 1000);


                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                });
            }

            function simpan_linkedit() {
                var data = {
                    kategori: $('#pilihkategori').val(),
                    judul_link: $('#judul_link').val(),
                    link: $('#link').val()
                }
                // console.log(data)
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/simpan_link/'); ?>",
                    data: data,
                    success: function(response) {

                        if (response == 'berhasil') {
                            $("#sukses").html("Data berhasil disimpan");
                            var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

                            sukses.show();
                            setTimeout(function() {
                                sukses.hide();
                                // view_list_task();
                                // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
                                $('#modallink').removeClass('show').hide();
                                $('.modal-backdrop').remove();
                                $('#judul_link').val('');
                                $('#link').val('');
                                window.location.reload();

                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                });
            }

            function edit_link(idlink) {
                var data = {
                    idlink: idlink
                };

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/edit_link/');?>",
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 1) {
                            $("#judul_link_edit").val(data.judul_link);
                            $("#id_link_edit").val(data.idlink);
                            $("#link_edit").val(data.link);

                            $("#pilihkategoriedit option").each(function() {
                                if ($(this).val() == data.idkategori) {
                                    $(this).prop("selected", true);
                                } else {
                                    $(this).prop("selected", false);
                                }
                            });
                            var myModal = new bootstrap.Modal(document.getElementById(
                                'modaleditlink'), {
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

            function simpan_link_edit() {
                var data = {
                    kategori: $('#pilihkategoriedit').val(),
                    judul_link: $('#judul_link_edit').val(),
                    id_link: $('#id_link_edit').val(),
                    link: $('#link_edit').val()
                }
                // console.log(data)
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('link/simpan_link/'); ?>",
                    data: data,
                    success: function(response) {

                        if (response == 'berhasil') {
                            $("#sukses").html("Data berhasil disimpan");
                            var sukses = new bootstrap.Modal(document.getElementById('modalSukses'));

                            sukses.show();
                            setTimeout(function() {
                                sukses.hide();
                                // view_list_task();
                                // menggunakan ini untuk modal task yang sudah ditampilkan tapi tidak bisa tertutup
                                $('#modallink').removeClass('show').hide();
                                $('.modal-backdrop').remove();
                                $('#judul_link').val('');
                                $('#link').val('');
                                window.location.reload();

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