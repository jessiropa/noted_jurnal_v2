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
                                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Form elements
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Link forms</h4>
                                    <form class="form-inline">
                                        <label class="sr-only" for="inlineFormInputName2">Judul Referensi</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                            placeholder="Judul Referensi" />
                                        <label class="sr-only" for="inlineFormInputName2">Link Referensi</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                            placeholder="Link Referensi" />
                                        <button type="submit" class="btn btn-primary mb-2">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Bordered table</h4> -->
                                    <!-- <p class="card-description">
                      Add class <code>.table-bordered</code>
                    </p> -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul Referensi</th>
                                                    <th>Project</th>
                                                    <th>Tanggal Buat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Herman Beck</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>May 15, 2015</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary mb-2">
                                                            Edit
                                                        </button>
                                                        <button type="submit" class="btn btn-primary mb-2">
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Messsy Adam</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>July 1, 2015</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary mb-2">
                                                            Edit
                                                        </button>
                                                        <button type="submit" class="btn btn-primary mb-2">
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>John Richards</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>Apr 12, 2015</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary mb-2">
                                                            Edit
                                                        </button>
                                                        <button type="submit" class="btn btn-primary mb-2">
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

</body>

</html>