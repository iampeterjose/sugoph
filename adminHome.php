<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sugo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />

    <style>
        .input-group{
            padding: 2px 2px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SUGOph</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Users</a></li>
      <li><a href="#">Errands</a></li>
      <li><a href="#">Reports</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
<div class="row">
	<!-- 3 GRIDS -->
	<div class="col-md-4">
		
	</div>
	<!-- 6 GRIDS -->
	<div class="col-md-4">
		<div class="panel panel-default" >
		<div class="panel-heading">
			<h4>Admin</h4>
		</div>
		<div class="panel-body">
			<form action="" method="POST">
            <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
            </div>
			<div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
            </div><br>
			<button class="form-control btn btn-primary">Login</button>
			</form>
		</div>
	</div>
	</div>
	<!-- 3 GRIDS -->
	<div class="col-md-3">
		
	</div>
</div>
</div>
</div>

</body>
</html>