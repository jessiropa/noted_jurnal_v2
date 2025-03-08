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
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?= $detail_project->NAMA_PROJECT; ?></h4>
                                <p class="card-description"> Your Task </p>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name Project</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Name" value="<?= $detail_project->NAMA_PROJECT; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Deskripsi Project</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Name" value="<?= $detail_project->DESKRIPSI_PROJECT; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">STATUS PROJECT</label>
                                        <select class="form-control" id="exampleSelectGender">
                                            <option>SELESAI</option>
                                            <option>LAGI DALAM PROSES</option>
                                            <option>TUNDA</option>
                                            <option>BATAL</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Catatan</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-dark">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('main_footer');?>
            </div>
        </div>
    </div>

    <?php $this->load->view('footer');?>

</body>

</html>