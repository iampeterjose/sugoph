<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<script src="<?php echo base_url('js/jquery-3.3.1.min.js'); ?>"></script>
	
	<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('myassets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('myassets/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('myassets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('myassets/vendor/morrisjs/morris.css'); ?>" rel="stylesheet">
	
	<!-- Custom Fonts -->
    <link href="<?php echo base_url('myassets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet'); ?>" type="text/css">
	
	
    <style>
		@font-face{ 
			font-family: "Champagne & Limousines Bold"; 
			src: url('<?php echo base_url('assets/fonts/Champagne & Limousines Bold.ttf') ?>'); 
		}
		body{
			font-family: "Champagne & Limousines Bold";
			font-size: 16px;
		}
		.navbar{
			background: ;	
		}
		.navbar-brand, .dropdown-toggle, .nav-link{
			color: #000;
		}
		.navbar-brand:hover{
			color: #ffffff;
		}
		.h4D{
			color: #369369;
			padding: 5px 15px;
			font-size: 20px;
		}
		.nav-link1{
			color: #000000;
		}
		.btnLogin{
			background: #369369;
			color: #ffffff;
		}	
		.modal-header{
			background: #369369;
			color: #ffffff;
		}
		thead{
			background: #f5f5f5;
			font-size: 17px;
		}
		.panel-heading h4{
			font-size: 22px;
		}
    </style>
</head>
<body>
<div class="wrapper">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		
            <div class="navbar-header" style="padding: 10px;">
                <button style="background: #ffffff;" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebarNavbar" aria-expanded="false">
                    <!--<span class="sr-only">Toggle navigation</span>-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color: #369369; font-weight: 900; font-size: 30px;" class="navbar-brand" href="<?php if(!isset($_SESSION['username'])) echo ""; else echo "home"; ?>">SUGOPH</a>
            </div>
            <!-- /.navbar-header -->

            <ul style="display: <?php if(!isset($_SESSION['username'])) echo "none"; ?>" class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a style="color: #369369; " class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a style="margin: 5%; auto" href="<?php echo base_url('index.php/sugoph/logout'); ?>" class="text-dark"><span class="fa fa-sign-out-alt"></span> Log out</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
		
	

			<br><br>
            <div style="margin-top: 0%; display: <?php if(!isset($_SESSION['username'])) echo "none"; ?>" class="sidebar border" role="navigation">
                <div id="sidebarNavbar" class="sidebar-nav navbar-collapse collapse">
					<br>
					<ul class="nav">
						<li class="nav-link">
							<h4 class="h4D">
							  <span><i class="fa fa-edit" data-toggle="collapse" data-target=".nav-collapse"></i> Management</span>
							</h4>
						</li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/monitoringErunnerApplication'); ?>" id="monitoringErunnerApplication" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  ERunner Application
						</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/errandCategory'); ?>" id="errandCategory" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  Errand Category
						</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/monitoringUser'); ?>" id="monitoringUser" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  Users
						</a>
					  </li>
					</ul>
					<ul class="nav">
						<li class="nav-link">
							<h4 class="h4D">
							  <span><i class="fa fa-desktop" data-toggle="collapse" data-target=".nav-collapse"></i> Monitoring</span>
							</h4>
						</li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/monitoringUserErrandLog'); ?>" id="monitoringUserErrandLog" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  User Errand Activity Log
						</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/monitoringUserAccountLog'); ?>" id="monitoringUserAccountLog" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  User Account Activity Log
						</a>
					  </li>
					</ul>
					<ul class="nav">
						<li class="nav-link">
							<h4 class="h4D">
							  <span><i class="fa fa-envelope" data-toggle="collapse" data-target=".nav-collapse.in"></i> Reports</span>
							</h4>
						</li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/reportsErunnerApplication'); ?>" id="reportsErunnerApplication" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  ERunner Application
						</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/reportsUser'); ?>" id="reportsUser" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  User
						</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/reportsMyWallet'); ?>" id="reportsMyWallet" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  <span data-feather="file-text"></span>
						  My Wallet
						</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/sugoph/reportsDisbursement'); ?>" id="reportsDisbursement" data-toggle="collapse" data-target=".nav-collapse">&nbsp;
						  <span data-feather="file-text"></span>
						  Disbursement
						</a>
					  </li>
					  <br><br><br><br>
					</ul>
                </div>
				<br>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
</nav>

    
