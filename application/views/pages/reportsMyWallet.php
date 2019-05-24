<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<br>
	<br>
	<br>
    <div class="panel panel-default">
	<div class="panel-heading">
			<h4>Reports - My Wallet</h4>
		</div>
	<div class="panel-body">
	<center>
	<div class="jumbotron bg-default" style="max-width:350px; border-radius:5px;border-style:groove;">
		<div class="container">
			<p><b>SUGOPH Wallet</b></p>
			<?php if(!empty($data)){ ?>
			<?php $myWallet = 0; foreach($data as $d){
			$myWallet += ($d['total_fee'] - ($d['total_fee'] - $d['bf_rate']));
			} echo "<h3 style='text-decoration:underline;'>Php ".number_format($myWallet, 2)."</h3>"; ?>
			<?php } else echo "<h4>Php 0.00</h4>"; ?>
		</div>
	</div>
	</center>
	</div>
	</div>
</div>

<script>
    document.getElementById("reportsMyWallet").style.color = "white";
    document.getElementById("reportsMyWallet").style.backgroundColor = "#369369";
    //document.getElementById("reportsMyWallet").style.borderRadius = "5px";
</script>