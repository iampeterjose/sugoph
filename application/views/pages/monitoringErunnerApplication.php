<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<br>
	<br>
	<br>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Management - Erunner Applicant</h4>
		</div>
		<div class="panel-body">
        
          <div class="row">
			<div class="col-lg-8">
				
			</div>
			<div class="col-lg-4">
				<div id="password-group" class="input-group" style="margin-bottom:5px">
					<input id="myInput" class="form-control" placeholder="Search..." />
					<div class="input-group-addon"><span class="fa fa-search"></span></div>
				</div>
		  </div>
          <br>
        
			<div class="panel-body">
          <?php if(empty($applicant)){ 
			echo "<h5>NO ERUNNER APPLICANT!</h5>"; 
			}
			else{ echo "."; ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead class="table-header">
                    <tr>
                        <th width="3%" class="border">#</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>&nbsp</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $counter=0; foreach($applicant as $a){ $counter++; ?>
                <tbody id="myTable">
                    <tr>
                        <td width="3%" class="border"><?php echo $counter; ?></td>
                        <td><?php echo ucwords($a['lastname']); ?></td>
                        <td><?php echo ucwords($a['firstname']); ?></td>
                        <td><a class="open-AddBookDialog111" data-id="<?php echo $a['username']; ?>" href="#applicantDetail" data-toggle="modal">view detail</a></td>
                        <td class="text-danger"><?php echo $a['status']; ?>...</td>
                        <td><a class="btn btn-sm btn-primary text-light open-AddBookDialog11" id="btnAccept" onclick="acceptErunner(event)" data-id="<?php echo $a['username']; ?>" href=""><span class="fa fa-thumbs-up"></span> Accept</a><span class="text-muted open-AddBookDialog1"> </span><button id="<?php echo $a['username']; ?>" onclick="btnDeny(this.id)" class="btn btn-sm btn-danger text-light" href=""><span class="fa fa-thumbs-down"></span> Deny</button></td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
            <div id="data"></div>
          </div>
          <?php } ?>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="applicantDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light">
        <h4 class="modal-title" id="exampleModalLabel">Applicant Detail</h4>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="applicantUsername" id="applicantUsername" value="" class="form-control">
        <div id="details"></div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">OK</button>
      </div> -->
    </div>
  </div>

<script>
    document.getElementById("monitoringErunnerApplication").style.color = "white";
    document.getElementById("monitoringErunnerApplication").style.backgroundColor = "#369369";
    //document.getElementById("monitoringErunnerApplication").style.borderRadius = "5px";
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
	function btnDeny(clicked_id){
	// var txt;
	var erunnerUsername = clicked_id;
	let myUrl = '<?php echo base_url();?>denyErunner/' + erunnerUsername;
	console.log(myUrl);
	
	Swal({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, deny it!'
	}).then((result) => {
	  if (result.value) {
		$.ajax({
			url: myUrl,
			success:function(result){
				result = JSON.parse(result);
				console.log(result);
				swal.fire({
					postion: 'top-end',
					type: 'success',
					title: 'DENIED',
					//html: "<h5>"+result.message+"</h5>",
					showConfirmButton: false
				});
				setTimeout(function(){
				window.location = 'monitoringErunnerApplication';
				},1200);
			},
			error:function(){
				console.log('error!');
			}
		});
	  }
	})
	/* if (confirm("Are you sure you want to deny this applicant?")) {
		// alert("You pressed OK!");
		$(document).on("click", ".open-AddBookDialog1", function (e) {
			e.preventDefault();
			var erunnerUsername = $(this).data('id');
			let myUrl = 'denyErunner/' + erunnerUsername;
			console.log(erunnerUsername);

			$.ajax({
				url: myUrl,
				success:function(result){
					result = JSON.parse(result);
					console.log('reached!');
					window.location = 'home';
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

<script>
  function acceptErunner(){
	$(document).on("click", ".open-AddBookDialog11", function (e) {
			e.preventDefault();
			var erunnerUsername = $(this).data('id');
			let myUrl = 'acceptErunner/' + erunnerUsername;
			console.log(erunnerUsername);

			$.ajax({
				url: myUrl,
				success:function(result){
					result = JSON.parse(result);
					console.log('reached!');
					Swal({
					  position: 'top-end',
					  type: 'success',
					  title: 'Accepted!',
					  showConfirmButton: false,
					  timer: 1500
					});
					setTimeout(function(){
						window.location = 'monitoringErunnerApplication';
					},1500); 
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
  }
</script>