<div class="container-fluid">
<div class="row">

<nav style="width:18%" id="myDashboard" class="d-none d-md-block sidebar">
          <div class="sidebar-sticky bg-dark">
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light">
              <span><i class="fa fa-edit"></i> Management</span>
              <a class="d-flex align-items-center text-muted" href="#"></a>
            </h5>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('sugoph/erunnerApplication'); ?>" id="erunnerApplication">
                  ERunner Application
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('sugoph/errandCategory'); ?>" id="errandCategory">
                  Errand Category
                </a>
              </li>
            </ul>
            <hr>
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-light">
              <span><span class="fa fa-desktop  "></i> Monitoring</i>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h5>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('sugoph/monitoringErunnerApplication'); ?>" id="monitoringErunnerApplication">
                  ERunner Application
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('sugoph/monitoringUser'); ?>" id="monitoringUser">
                  Users
                </a>
              </li>
            </ul>
            <hr>
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-light">
              <span><i class="fa fa-envelope"></i> Reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h5>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('sugoph/reportsErunnerApplication'); ?>" id="reportsErunnerApplication">
                  ERunner Application
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('sugoph/reportsUser'); ?>" id="reportsUser">
                  User
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('sugoph/reportsMyWallet'); ?>" id="reportsMyWallet">
                  <span data-feather="file-text"></span>
                  My Wallet
                </a>
              </li>
            </ul>
          </div>
        </nav>
