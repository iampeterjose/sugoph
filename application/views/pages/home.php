<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<br>
	<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Dashboard</h4>
	</div>
	<div class="panel-body">
		  <?php 
			date_default_timezone_set('Asia/Manila');
			$allUser = 0;
			$allPending = 0;
			$newUsersToday = 0;
			foreach($user as $u){
				$datetime = strtotime($u['date_registered']);
				$dr = date('Y-m-d', $datetime);
				if($u['status'] == 'pending'){
					$allPending++;
				}
				if($dr == date('Y-m-d')){
					$newUsersToday++;
				}
				if($u['status'] != 'pending'){
					$allUser += count($u['status']);;
				}
			}
			?>
	<div class="jumbotron bg-default" style="border-radius:5px;border-style:groove;">
			<div class="container">
				<h2><strong>Welcome Admin!</strong></h2>
				<a class="btn btn-primary" href="<?php echo base_url('index.php/sugoph/monitoringUser'); ?>">Manage users &raquo;</a>
			</div>
		  </div>		
	<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $allUser ?></div>
                                    <div>Total Users!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('index.php/sugoph/monitoringUser'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $newUsersToday++; ?></div>
                                    <div>New Users Today!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" style="text-decoration: none;">
                            <div class="panel-footer">&nbsp;
                                <!--<span class="pull-left">View</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $allPending ?></div>
                                    <div>Pending Erunners!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('index.php/sugoph/monitoringErunnerApplication'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>-->
            </div>

          
		  
</div>
</div>
</div>