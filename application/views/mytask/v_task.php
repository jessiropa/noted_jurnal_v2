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
                                    <div class="form-group">
                                        <input type="date" name="birthday" />
                                        <button class="file-upload-browse btn btn-primary" type="button">
                                            Refresh Data
                                        </button>
                                    </div>
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
                                        <input type="text" class="form-control" placeholder="Ketik taskmu hari ini" />
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="button">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name Task</th>
                                                    <th>Project</th>
                                                    <th>Start Date</th>
                                                    <th>Task Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="pl-2">Henry Klein</span>
                                                    </td>
                                                    <td>Dashboard</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-success">
                                                            Approved
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="pl-2">Estella Bryan</span>
                                                    </td>
                                                    <td>Website</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-warning">
                                                            Pending
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="pl-2">Lucy Abbott</span>
                                                    </td>
                                                    <td>App design</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-danger">
                                                            Rejected
                                                        </div>
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