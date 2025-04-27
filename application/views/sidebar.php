<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="<?=base_url('beranda')?>"><img
                src="<?=base_url()?>assets/images/transparent.svg" alt="logo" style="width: 150%; " /></a>
        <a class="sidebar-brand brand-logo-mini" href="<?=base_url()?>index.php"><img
                src="<?=base_url()?>assets/images/nj_logo.svg" alt="logo" style="width: 100%;" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <!-- <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="<?=base_url()?>assets/images/faces/face15.jpg" alt="" />
                        <span class="count bg-success"></span>
                    </div> -->
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal"><?php echo $nama; ?></h5>
                        <span>Online</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="<?=base_url('setting');?>" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">
                                Account settings
                            </p>
                        </div>
                    </a>
                    <!-- <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">
                                Change Password
                            </p>
                        </div>
                    </a> -->
                    <div class="dropdown-divider"></div>
                    <a href="<?=base_url('task');?>" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">
                                Task
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?=base_url('beranda');?>">
                <span class="menu-icon">
                    <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?=base_url('task');?>">
                <span class="menu-icon">
                    <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                </span>
                <span class="menu-title">My Task</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?=base_url('project');?>">
                <span class="menu-icon">
                    <i class="mdi mdi-library-books"></i>
                </span>
                <span class="menu-title">Project</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?=base_url('link');?>">
                <span class="menu-icon">
                    <i class="mdi mdi-link-variant"></i>
                </span>
                <span class="menu-title">Link Referensi</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?=base_url('setting');?>">
                <span class="menu-icon">
                    <i class="mdi mdi-settings"></i>
                </span>
                <span class="menu-title">Setting</span>
            </a>
        </li>

        <?php 
                // print_r($this->session->userdata());
                if ($level == '1'): ?>
        <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="<?=base_url()?>pages/forms/basic_elements.html">
                <span class="menu-icon">
                    <i class="mdi mdi-account-multiple-plus"></i>
                </span>
                <span class="menu-title">Add Users</span>
            </a>
        </li> -->
        <?php endif; ?>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">
                <span class="menu-icon">
                    <i class="mdi mdi-logout"></i>
                </span>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>