<?php 
$key = "";
if(isset($_POST['keyword']))
$key = $_POST['keyword'];
?>

<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
		<br>
		<br>
		<br>
        <div class="panel panel-default">
			<div class="panel-heading">
				<h4>Reports - Erunners</h4>
			</div>
			<div class="panel-body">
          <!--<form id="frmSearch" class="input-group" style="margin: 15px 0px" action="<?php echo base_url('index.php/sugoph/getApplicantByKeyword'); ?>" method="POST">
              <input class="form-control" type="text" name="keyword" id="keyword" value="<?php echo $key; ?>" placeholder="Search..." autofocus  onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" / >
              <button type="submit" class="input-group-addon"><span class="fa fa-search"></span> Search</button>
          </form>-->
        
          <?php if(empty($report)) echo "<h5>NO REPORTS!</h5>"; else{ ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead class="table-header">
                </thead>
                <?php $counter=0; foreach($report as $a): $counter++; 
					if($a['action'] == 'activated'){
						$status = "activated";
						$status_color = "text-success";
					}
					else if($a['action'] == "denied"){
						$status = "denied";
						$status_color = "text-danger";
					}
				?>
                <tbody>
                    <tr>
                        <td width="3%" class="border"><?php echo $counter; ?></td>
                        <td class="border"><?php echo ucwords($a['firstname'])." ".ucwords($a['lastname'])."'s account <strong>[{$a['to']}]</strong> has been <strong><span class='$status_color'>".strtoupper($a['action'])."</span></strong> by the ".$a['from']." on ".date('F d, Y', strtotime($a['date'])); ?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
            </table>
            <div id="data"></div>
          </div>
		  <?php } ?>


        </div>
        </div>
        </div>

<script>
    document.getElementById("reportsErunnerApplication").style.color = "white";
    document.getElementById("reportsErunnerApplication").style.backgroundColor = "#369369";
    //document.getElementById("reportsErunnerApplication").style.borderRadius = "5px";
</script>