<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Management</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
          <h4>Errand Category</h4>
          <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Errand</button><br><br>
		  <?php if(empty($allErrand)) echo "<h5>No errand</h5>"; else{ ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead class="table-header">
                    <tr>
                        <th width="3%" class="border">#</th>
                        <th>Errand</th>
                        <th>Booking fee</th>
                        <th>Rate per hour</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter=0; foreach($allErrand as $ae): $counter++;?>
                    <tr>
                        <td width="3%" class="border"><?php echo $counter; ?></td>
                        <td><?php echo ucwords($ae['errand_name']); ?></td>
                        <td><?php echo "PHP ".ucwords($ae['booking_fee']).".00"; ?></td>
                        <td><?php echo "PHP ".ucwords($ae['rate_per_hour']).".00"; ?></td>
                        <td><button id="<?php echo $ae['errand_category_id']; ?>" onclick="btnRemove(this.id)" class="btn btn-sm btn-danger text-light" href=""><span class="fa fa-trash"></span> Remove</button>
						<button id="<?php echo $ae['errand_category_id']; ?>" class="btn btn-sm btn-default" data-toggle="modal" onclick="btnViewOption(this.id)" data-target="#exampleModal2"> view options</a></button>
						<button id="<?php echo $ae['errand_category_id']; ?>" class="btn btn-sm btn-primary" data-toggle="modal" onclick="btnOption(this.id)" data-target="#exampleModal3"><span class="fa fa-plus"></span> Add options</a></button>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
          </div>
		  <?php }?>
		  </div>
        </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light">
        <h5 class="modal-title" id="exampleModalLabel">Errand Description</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div style="display:none; max-width: 95%; margin: 5px 15px;" class="alert alert-primary" id="successmsgErrandCategory" role="alert">
        </div>
        <div style="display:none; max-width: 95%; margin: 5px 15px;" class="alert alert-danger" id="errormsgErrandCategory" role="alert">
        </div>

      <div class="modal-body">
        <form id="frmAddErrandCategory" action="<?php echo base_url('index.php/sugoph/addErrandCategory'); ?>">
            <div class="form-group">
                <label for="errandName">Errand name</label>
                <input class="form-control" type="text" name="errandName" autofocus / >
            </div>
            <div class="form-group">
                <label for="errandName">Description</label>
                <textarea class="form-control" name="errandDescription" id="errandDescription" cols="75" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="errandFee">Booking fee</label>
                <input class="form-control" type="number" name="errandFee" / >
            </div>
			<div class="form-group">
                <label for="errandRate">Rate per hour</label>
                <input class="form-control" type="number" name="errandRate" / >
            </div>
            <div class="form-group">
                <button class="btn btn-md btn-primary" style="margin-left: 80%; width: 20%;">Save</button>
            </div>
        </form>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">OK</button>
      </div> -->
    </div>
  </div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light">
        <h4 class="modal-title" id="exampleModalLabel">Document</h4>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="table-responsive">
		<div id="table"></div>
		</div>
       </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">OK</button>
      </div> -->
    </div>
  </div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light">
        <h4 class="modal-title" id="exampleModalLabel">Errand options</h4>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form id="frmAddErrandOption" action="<?php echo base_url('index.php/sugoph/addErrandOption'); ?>">
            <div class="form-group">
                <label for="errandName">Errand Name</label>
                <input class="form-control" type="text" name="errandName" autofocus / >
            </div>
            <div class="form-group">
                <label for="errandDescription">Description</label>
                <textarea class="form-control" name="errandDescription" id="errandDescription" cols="75" rows="5"></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary" style="margin-left: 80%; width: 20%;">Save</button>
            </div>
        </form>
       </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">OK</button>
      </div> -->
    </div>
  </div>
  
  

<script>
    document.getElementById("errandCategory").style.color = "white";
    document.getElementById("errandCategory").style.backgroundColor = "#369369";
    //sdocument.getElementById("errandCategory").style.borderRadius = "5px";
</script>
<script>
    function btnRemove(clicked_id){
		var errandCategoryId = clicked_id;
		let myUrl = 'removeErrandCategory/' + errandCategoryId;
		console.log(myUrl);
		
		Swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
			$.ajax({
				url: myUrl,
				success:function(result){
					result = JSON.parse(result);
					console.log(result);
					window.location = 'errandCategory';
				},
				error:function(){
					console.log('error!');
				}
			});
		  }
		})
    /* var txt;
    if (confirm("Are you sure you want to remove this errand category?")) {
        // alert("You pressed OK!");

        $(document).on("click", ".open-AddBookDialog", function (e) {
            e.preventDefault();
            var errandCategoryId = $(this).data('id');
            let myUrl = 'removeErrandCategory/' + errandCategoryId;
            console.log(errandCategoryId);

            $.ajax({
                url: myUrl,
                success:function(result){
                    result = JSON.parse(result);
                    console.log('reached!');
                    window.location = 'errandCategory';
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
    function btnOption(clicked_id){
		$('#frmAddErrandOption').submit(function(e){
        e.preventDefault();
        console.log('form was submitted!');
		var errandCategoryId = clicked_id;
		let myUrl = $(this).attr('action')+'/'+errandCategoryId;
        let formdata = $(this).serialize();
        console.log(myUrl);
        console.log(formdata);
        $.ajax({
            url: myUrl,
            type: 'POST',
            data: formdata,
            success:function(result){
                result = JSON.parse(result);
                console.log(result);
                if(result.code === 1){
                    console.log(result.message);
                    // $('#successmsgErrandCategory').html(result.message).fadeIn(500).delay(2000).fadeOut('slow');
					Swal({
						  position: 'top',
						  type: 'success',
						  html: result.message,
						  showConfirmButton: false,
						  timer: 2000
						});
                    setTimeout(function(){
                        window.location = 'errandCategory';
                    },1500); 
                }
                else{
                    // $('#errormsgErrandCategory').html(result.message).fadeIn(500).delay(3000).fadeOut('slow');
                    // setTimeout(function(){
                    //     window.location = 'index';
                    // },2000); 
                    // alert(result.message);
					Swal({
						  position: 'top',
						  type: 'error',
						  html: result.message,
						  showConfirmButton: false,
						  timer: 1500
						});
                }

            },
            error:function(){
                console.log('error!');
            }
        });
    });
	}
</script>


<script>
    function btnViewOption(clicked_id){
        console.log('form was submitted!');
		var errandCategoryId = clicked_id;
		let myUrl = 'getErrandOptionByErrandCategory/'+errandCategoryId;
        let formdata = $(this).serialize();
        console.log(myUrl);
        console.log(formdata);
        $.ajax({
            url: myUrl,
            success:function(result){
                result = JSON.parse(result);
				description = result.message;
				let html = "";
                if(result.code === 1){
					if(description != ''){
						html += "<table class='table table-hover table-bordered'>";
							html += "<thead>";
								html += "<tr>";
									html += "<th width='25%'>Errand name</th>";
									html += "<th>Description</th>";
								html += "</tr>";
							html += "</thead>";
							html += "<tbody>";
						for(var a = 0; a < (description.length - 0); a++){
							var desc = description[a].errand_description;
							var d = desc.split(",");
							for(var i=0; i<d.length; i++){
								console.log(d[i]);
							}
							html += "<tr>";
								html += "<td>"+description[a].errand_name+"</td>";
								html += "<td>";
								for(var i=0; i<d.length; i++){
									html += "<ul><li>"+d[i]+"</li></ul>";
								}
								html += "</td>";
							html += "</tr>";
						}
							html += "</tbody>";
						html += "</table>";
						document.getElementById("table").innerHTML = html;
					}
					else{
						document.getElementById("table").innerHTML = "<h5>No option found</h5>";
					}
                }
                else{
                    console.log('error');
                }

            },
            error:function(){
                console.log('error!');
            }
        });
	}
</script>