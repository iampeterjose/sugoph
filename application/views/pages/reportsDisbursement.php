<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
		<br>
		<br>
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Reports - Disbursement</h4>
			</div>
			<div class="panel-body">
			<div class="col-lg-8">
				
			</div>
			<div class="col-lg-4">
				<div id="password-group" class="input-group" style="margin-bottom:5px">
					<input id="myInput" class="form-control" placeholder="Search..." />
					<div class="input-group-addon"><span class="fa fa-search"></span></div>
				</div>
			</div>
			<br>
	  <?php if(empty($user)) echo "<br><h5>NO ERUNNERS!</h5>"; else{ echo "."; ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                  <thead class="table-header">
                      <tr class="">
                          <th width="3%" class="border">#</th>
                          <th>Lastname</th>
                          <th>Firstname</th>
                          <th>Date</th>
                          <th>Current earning</th>
						  <th>Action</th>
                      </tr>
                  </thead>
                  <?php $earning = 0; $counter=0; foreach($user as $u): $counter++; ?>
                  <tbody id="myTable">
                      <tr class="<?php if($u['status'] == 'banned') echo "bg-danger"; ?>" style="<?php if($u['status'] == 'banned') echo "pointer-events:none"; ?>" >
                          <td width="3%" class="border"><?php echo $counter; ?></td>
                          <td><?php echo ucwords($u['lastname']); ?></td>
                          <td><?php echo ucwords($u['firstname']); ?></td>
                          <td><?php echo ucwords(date('Y F', strtotime($u['date']))) ?></td>
                          <td>Php <?php echo number_format($u['earning'], 2);
						  ?>
						  </td>
						  <td><button class="btn btn-primary btn-sm form-control" onclick="btnPay(this.id)" id="<?php echo $u['username']; ?>">Pay</button></td>
                      </tr>
                  </tbody>
                  <?php endforeach;?>
              </table>
          </div>
          <?php } ?>
		  </div>
</div>
</div>

<script>
    document.getElementById("reportsDisbursement").style.color = "white";
    document.getElementById("reportsDisbursement").style.backgroundColor = "#369369";
    //document.getElementById("reportsMyWallet").style.borderRadius = "5px";
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
        function btnPay(clicked_id){
			var username = clicked_id;
			let myUrl = 'payUserErunner/' + username;
			console.log(myUrl);
			Swal({
			  title: 'PAYMENT',
			  html: "<h5>Pay "+username+"?</h5>",
			  type: 'question',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes!'
			}).then((result) => {
			  if (result.value) {
				$.ajax({
                    url: myUrl,
                    success:function(result){
                        result = JSON.parse(result);
                        console.log(result);
						if(result.code == 1){
							swal.fire({
								postion: 'top-end',
								type: 'success',
								title: 'PAID',
								//html: "<h5>"+result.message+"</h5>",
								showConfirmButton: false
							});
							setTimeout(function(){
							window.location = 'reportsDisbursement';
							},1200);
						}else{
							swal.fire({
								postion: 'top-end',
								type: 'error',
								title: result.message,
								//html: "<h5>"+result.message+"</h5>",
								showConfirmButton: false
							});
							setTimeout(function(){
							window.location = 'reportsDisbursement';
							},1500);
						}
                    },
                    error:function(){
                        console.log('error!');
                    }
                });
			  }
			})
        // var txt;
        /* if (confirm("Are you sure you want to deny this applicant?")) {
            // alert("You pressed OK!");
            $(document).on("click", ".open-AddBookDialog1", function (e) {
                e.preventDefault();
                var username = $(this).data('id');
                let myUrl = 'banUser/' + username;
                console.log(username);

                $.ajax({
                    url: myUrl,
                    success:function(result){
                        result = JSON.parse(result);
                        console.log('reached!');
                        window.location = 'monitoringUser';
                    },
                    error:function(){
                        console.log('error!');
                    }
                });
                // $(".modal-body #bookId").val( myBookId );
                // As pointed out in comments, 
                // it is superfluous to have to manually call the modal.
                // $('#addBookDialog').modal('show');
            });
        } */
    }
    </script>