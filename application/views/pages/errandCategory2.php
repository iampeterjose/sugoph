<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<br>
	<br>
	<br>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Management - Errand Category</h4>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
						<?php $counter = 1; foreach($allErrand as $e): ?>
							<td>
								<h5 style="font-size: 15px;"><strong><?php echo $e['errand_name']; ?></strong></h5>
								<a href="#" id="<?php echo $e['errand_category_id']; ?>" data-toggle="modal" onclick="btnViewOption(this.id)" data-target="#exampleModal2">
									<img style="border-radius:5px;" class="errand-img" src="<?php echo base_url('assets/img/Peter/image'.$counter++.'.jpg'); ?>" width="225px" height="225px">
								</a>
								<br>
								<br>
								<?php if($e['errand_name'] != 'CANVASSING'): ?>
								<button class="btn btn-sm btn-primary open-AddBookDialog0" data-id="<?php echo $e['errand_category_id']; ?>" href="#exampleModal" data-toggle="modal"><span class="fa fa-plus"></span> Add option</button>
								<?php endif; ?>
							</td>
						<?php endforeach; ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light">
        <h5 class="modal-title" id="exampleModalLabel">Title</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div style="display:none; max-width: 95%; margin: 5px 15px;" class="alert alert-primary" id="successmsgErrandCategory" role="alert">
        </div>
        <div style="display:none; max-width: 95%; margin: 5px 15px;" class="alert alert-danger" id="errormsgErrandCategory" role="alert">
        </div>

      <div class="modal-body">
        <form id="frmAddErrandOption" action="<?php echo base_url('index.php/sugoph/addErrandOption'); ?>">
            <div class="form-group">
                <label for="errandName">Errand name</label>
                <input class="form-control" type="text" name="errandName" autofocus / >
            </div>
            <div class="form-group">
                <label for="errandName">Requirement(s) (* if more than one requirement separate it by comma)</label>
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
                <input class="form-control" type="hidden" name="errandCategoryId" id="errandCategoryId" value="" / >
            </div>
            <div class="form-group">
                <button class="btn btn-md btn-primary" style="margin-left: 80%; width: 20%;"><span class="fa fa-save"></span> Save</button>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-light">
        <h4 class="modal-title" id="exampleModalLabel">Errand Option</h4>
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
	$(document).on('click', '.open-AddBookDialog0', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$('.modal-body #errandCategoryId').val(id);
		
		$.ajax({
			url: 'getErrandCategoryById/'+id,
			type: 'GET',
			success:function(res){
				let result = JSON.parse(res);
				//var arr = Object.values(result);
				document.getElementById("exampleModalLabel").innerHTML = result.message+" OPTION";
				
			}
		});
	});
</script>

<script>
		$('#frmAddErrandOption').submit(function(e){
        e.preventDefault();
        console.log('form was submitted!');
		let myUrl = $(this).attr('action');
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
						  html: '<h4 style="text-align:left;margin:0 17.5%;">'+result.message+'</h4>',
						  showConfirmButton: true,
						  //timer: 1500
						});
                }

            },
            error:function(){
                console.log('error!');
            }
        });
    });
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
				//console.log(result);
				description = result.message;
				let html = "";
                if(result.code === 1){
					if(description != ''){
						html += "<table class='table table-hover table-bordered'>";
							html += "<thead>";
								html += "<tr>";
									html += "<th width='25%'>Option name</th>";
									html += "<th>Requirement(s)</th>";
								html += "</tr>";
							html += "</thead>";
							html += "<tbody>";
						for(var a = 0; a < (description.length - 0); a++){
							var desc = description[a].option_description;
							var d = desc.split(",");
							for(var i=0; i<d.length; i++){
								console.log(d[i]);
							}
							html += "<tr>";
								html += "<td class='text-uppercase'>"+description[a].option_name+"</td>";
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