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
                                                <h2 class="mb-0">15</h2>
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
                                                <h2 class="mb-0">17</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Task Harian</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h2 class="mb-0">12</h2>
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
                                                <h2 class="mb-0">31</h2>
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
                                    <h4 class="card-title">To do list</h4>
                                    <div class="add-items d-flex">
                                        <input type="text" class="form-control todo-list-input"
                                            placeholder="enter task.." />
                                        <button class="add btn btn-primary todo-list-add-btn">
                                            Add
                                        </button>
                                    </div>
                                    <div class="list-wrapper">
                                        <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" /> Create
                                                        invoice
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" /> Meeting
                                                        with Alita
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" checked />
                                                        Prepare for presentation
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" /> Plan
                                                        weekend outing
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" /> Pick up
                                                        kids from school
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-box"></i>
                                            </li>
                                        </ul>
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
                                            <div class="preview-list">
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">
                                                                Admin dashboard design
                                                            </h6>
                                                            <p class="text-muted mb-0">
                                                                Broadcast web app mockup
                                                            </p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <p class="text-muted">15 minutes ago</p>
                                                            <p class="text-muted mb-0">
                                                                30 tasks, 5 issues
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-success">
                                                            <i class="mdi mdi-cloud-download"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">
                                                                Wordpress Development
                                                            </h6>
                                                            <p class="text-muted mb-0">Upload new design</p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <p class="text-muted">1 hour ago</p>
                                                            <p class="text-muted mb-0">
                                                                23 tasks, 5 issues
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-info">
                                                            <i class="mdi mdi-clock"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">Project meeting</h6>
                                                            <p class="text-muted mb-0">
                                                                New project discussion
                                                            </p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <p class="text-muted">35 minutes ago</p>
                                                            <p class="text-muted mb-0">
                                                                15 tasks, 2 issues
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-danger">
                                                            <i class="mdi mdi-email-open"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">Broadcast Mail</h6>
                                                            <p class="text-muted mb-0">
                                                                Sent release details to team
                                                            </p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <p class="text-muted">55 minutes ago</p>
                                                            <p class="text-muted mb-0">
                                                                35 tasks, 7 issues
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="preview-item">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-warning">
                                                            <i class="mdi mdi-chart-pie"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">UI Design</h6>
                                                            <p class="text-muted mb-0">
                                                                New application planning
                                                            </p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <p class="text-muted">50 minutes ago</p>
                                                            <p class="text-muted mb-0">
                                                                27 tasks, 4 issues
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Order Status</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" />
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th>Client Name</th>
                                                    <th>Order No</th>
                                                    <th>Product Cost</th>
                                                    <th>Project</th>
                                                    <th>Payment Mode</th>
                                                    <th>Start Date</th>
                                                    <th>Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" />
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face1.jpg" alt="image" />
                                                        <span class="pl-2">Henry Klein</span>
                                                    </td>
                                                    <td>02312</td>
                                                    <td>$14,500</td>
                                                    <td>Dashboard</td>
                                                    <td>Credit card</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-success">
                                                            Approved
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" />
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face2.jpg" alt="image" />
                                                        <span class="pl-2">Estella Bryan</span>
                                                    </td>
                                                    <td>02312</td>
                                                    <td>$14,500</td>
                                                    <td>Website</td>
                                                    <td>Cash on delivered</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-warning">
                                                            Pending
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" />
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face5.jpg" alt="image" />
                                                        <span class="pl-2">Lucy Abbott</span>
                                                    </td>
                                                    <td>02312</td>
                                                    <td>$14,500</td>
                                                    <td>App design</td>
                                                    <td>Credit card</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-danger">
                                                            Rejected
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" />
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face3.jpg" alt="image" />
                                                        <span class="pl-2">Peter Gill</span>
                                                    </td>
                                                    <td>02312</td>
                                                    <td>$14,500</td>
                                                    <td>Development</td>
                                                    <td>Online Payment</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-success">
                                                            Approved
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" />
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face4.jpg" alt="image" />
                                                        <span class="pl-2">Sallie Reyes</span>
                                                    </td>
                                                    <td>02312</td>
                                                    <td>$14,500</td>
                                                    <td>Website</td>
                                                    <td>Credit card</td>
                                                    <td>04 Dec 2019</td>
                                                    <td>
                                                        <div class="badge badge-outline-success">
                                                            Approved
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