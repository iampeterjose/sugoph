<?php 
date_default_timezone_set('Asia/Manila');

$key = "";
if(isset($_POST['keyword']))
$key = $_POST['keyword'];
//echo date('h:i a', time() - 3600);
?>

<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
		<br>
		<br>
		<br>
        <div class="panel panel-default">
			<div class="panel-heading">
				<h4>Monitoring - Errand Activity</h4>
			</div>
			<div class="panel-body">
          <!--<form id="frmSearch" class="input-group" style="margin: 15px 0px" action="<?php echo base_url('index.php/sugoph/getApplicantByKeyword'); ?>" method="POST">
              <input class="form-control" type="text" name="keyword" id="keyword" value="<?php echo $key; ?>" placeholder="Search..." autofocus  onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" / >
              <button type="submit" class="input-group-addon"><span class="fa fa-search"></span> Search</button>
          </form>-->
        
          <?php $errand=""; if(empty($logs)) echo "<h5>NO RESULTS!</h5>"; else{ ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead class="table-header">
                </thead>
                <?php $counter=0; foreach($logs as $log): if($log['activity_type'] == 'errand'){ $counter++; ?>
                <tbody>
                    <tr>
                        <td width="3%" class="border"><?php echo $counter; ?></td>
						<td><?php echo $log['description']." on ".date('F d, Y', strtotime($log['date']))." at ".date('h:i a', strtotime($log['date']) - 3600); ?></td>
                    </tr>
                </tbody>
                <?php } else if(empty($log['activity_type']=='errand')){ $errand="<h5>NO ERRAND ACTIVITY!</h5>"; } endforeach;?>
            </table>
            <div id="data"></div>
          </div>
		  <?php } echo $errand; ?>


        </div>
        </div>
        </div>

<script>
    document.getElementById("monitoringUserErrandLog").style.color = "white";
    document.getElementById("monitoringUserErrandLog").style.backgroundColor = "#369369";
    //document.getElementById("reportsErunnerApplication").style.borderRadius = "5px";
</script>