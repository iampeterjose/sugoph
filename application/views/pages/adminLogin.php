<br><br><br>

<div class="container">
<br>
<br>

	<div class="container">
	<div class="row">
	<!-- 3 GRIDS -->
	<div class="col-md-4">
		
	</div>

            <div style="display:none;" class="alert alert-success mb-4" id="successmsgLoginAdmin" role="alert">
            </div>
            <div style="display:none;" class="alert alert-danger mb-4" id="errormsgLoginAdmin" role="alert">
            </div>

            <div class="col-md-4" style="margin: 30px auto;">
				<div class="panel panel-default" style="max-width:400px; margin:0 auto" >
					<div class="panel-heading navbar">
						<h4>Administrator</h4>
					</div>
					<div class="panel-body">
						<form id="frmLoginAdmin" action="<?php //echo base_url('index.php/sugoph/login'); ?>">
							<div id="username-group" class="input-group" style="margin-bottom:5px">
								<div class="input-group-addon"><span class="fa fa-user"></span></div>
								<input class="form-control" type="text" name="username" id="username" placeholder="Username" autofocus / >
							</div>
							<div id="password-group" class="input-group" style="margin-bottom:5px">
								<div class="input-group-addon"><span class="fa fa-lock"></span></div>
								<input class="form-control" type="password" name="password" id="password" placeholder="Password" / >
							</div><br>
							<button class="form-control btn btnLogin border" id="btnLogin" type="submit">Login</button>
						</form>
					</div>
                </div>
            </div>

        <div class="col-md-4">
		
	</div>
            
        </div>
    </div>
</div>
