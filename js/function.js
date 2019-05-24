$(document).ready(function(){
    $('#frmLoginAdmin').submit(function(e){
        e.preventDefault();
        console.log('form was submitted!');

        let formdata = $(this).serialize();
        let url = $(this).attr('action');
        console.log(url);

        $.ajax({
            url: url,
            type: 'post',
            data: formdata,
            success:function(result){
                result = JSON.parse(result);
                //console.log('success!');
                if(result.code === 1){
                    /* //alert(result.message);
                    $('#successmsgLoginAdmin').html(result.message).fadeIn(500).delay(2000).fadeOut('slow');
                    setTimeout(function(){
                        window.location = 'home';
                    },2000);  */
					Swal({
						  position: 'top',
						  type: 'success',
						  html: result.message,
						  showConfirmButton: false,
						  timer: 1500
						});
					setTimeout(function(){
                        window.location = 'home';
                    },1400);
                }
                else{
                    // $('#errormsgLoginAdmin').html(result.message).fadeIn(500).delay(3000).fadeOut('slow');
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
});


$(document).ready(function(){
    $('#frmAddErrandCategory').submit(function(e){
        e.preventDefault();
        console.log('form was submitted!');

        let formdata = $(this).serialize();
        let url = $(this).attr('action');
        console.log(url);

        $.ajax({
            url: url,
            type: 'post',
            data: formdata,
            success:function(result){
                result = JSON.parse(result);
                console.log(result);
                if(result.code === 1){
                    // alert(result.message);
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
});


// $(document).ready(function(){
//     $.ajax({
//         url: 'getAllApplicant',
//         success:function(/*res*/){
//             // result = JSON.parse(res);
//             // // var arr = Object.values(result);
//             // var html = "";
//             // var data = result.message;
//             // var counter = 0;
//             // // console.log(arr.length);
//             // console.log(data.length);
//             // if(data != ""){
//             //     html += "<table class='table table-sm table-hover border'>";
//             //         html += "<thead>";
//             //             html += "<tr>";
//             //                 html += "<th width='3%' class='border'>#</th>";
//             //                 html += "<th>Lastname</th>";
//             //                 html += "<th>Firstname</th>";
//             //                 html += "<th>&nbsp</th>";
//             //                 html += "<th>Status</th>";
//             //                 html += "<th>Action</th>";
//             //             html += "</tr>";
//             //         html += "</thead>";
//             //         for(var a = 0; a < (data.length - 0); a++){
//             //             counter++;
//             //             var lastname = data[a].lastname;
//             //             var firstname = data[a].firstname;
//             //             var status = data[a].status;
//             //             var id = data[a].erunner_id;
//             //         html += "<tbody>";
//             //             html += "<tr>";
//             //                 html += "<td width='3%' class='border'>"+counter+"</td>";
//             //                 html += "<td class='dt1'>"+lastname+"</td>";
//             //                 html += "<td class='dt1'>"+firstname+"</td>";
//             //                 html += "<td><a class='open-AddBookDialog111' data-id='"+id+"' href='#applicantDetail' data-toggle='modal'>View details</a></td>";
//             //                 html += "<td class='text-danger'>"+status+"</td>";
//             //                 html += "<td><a class='btn btn-sm btn-success text-light open-AddBookDialog11' id='btnAccept' onclick='acceptErunner(event)' data-id='"+id+"' href=''>Accept</a><span class='text-muted open-AddBookDialog1'> | </span><a class='btn btn-sm btn-danger text-light open-AddBookDialog1' onclick='denyErunner()' data-id='"+id+"' href=''>Deny</a></td>";
//             //             html += "</tr>";
//             //         html += "</tbody>";
//             //         }
//             //     html += "</table>";
//             //     document.getElementById("data").innerHTML = html;
//             //     $('.dt1').css('textTransform', 'capitalize');
//             //     $('.open-AddBookDialog111').css('textDecoration', 'underline');
//             // }
//             // else{
//             //     document.getElementById("data").innerHTML = "<h4>No eRunner Applicant yet!</h4>";
//             // }
//         },
//         error:function(){
//             console.log('error!');
//         }
//     });
// });


// $(document).ready(function(){
//     $('#frmSearch').submit(function(e){
//         e.preventDefault();
//         console.log('form was submitted!');

//         let formdata = $(this).serialize();
//         let url = $(this).attr('action');
//         console.log(url);
//         console.log(formdata);

//         $.ajax({
//             url: url,
//             type: 'post',
//             data: formdata,
//             success:function(/*res*/){
//                 // result = JSON.parse(res);
//                 // var data = result.message;
//                 // var html = "";
//                 // var counter = 0;
//                 // console.log(data.length);
//                 // console.log(result);
//                 // console.log('reached!');
//                 // if(data != ""){
//                 //     html += "<table class='table table-sm table-hover border'>";
//                 //     html += "<thead>";
//                 //         html += "<tr>";
//                 //             html += "<th width='3%' class='border'>#</th>";
//                 //             html += "<th>Lastname</th>";
//                 //             html += "<th>Firstname</th>";
//                 //             html += "<th>&nbsp</th>";
//                 //             html += "<th>Status</th>";
//                 //             html += "<th>Action</th>";
//                 //         html += "</tr>";
//                 //     html += "</thead>";
//                 //     for(var a = 0; a < (data.length - 0); a++){
//                 //         counter++;
//                 //         var lastname = data[a].lastname;
//                 //         var firstname = data[a].firstname;
//                 //         var status = data[a].status;
//                 //         var id = data[a].erunner_id;
//                 //     html += "<tbody>";
//                 //         html += "<tr>";
//                 //             html += "<td width='3%' class='border'>"+counter+"</td>";
//                 //             html += "<td class='dt1'>"+lastname+"</td>";
//                 //             html += "<td class='dt1'>"+firstname+"</td>";
//                 //             html += "<td><a class='open-AddBookDialog111' data-id='"+id+"' href='#applicantDetail' data-toggle='modal'>View details</a></td>";
//                 //             html += "<td class='text-danger'>"+status+"</td>";
//                 //             html += "<td><a class='btn btn-sm btn-success text-light open-AddBookDialog11' id='btnAccept' onclick='acceptErunner(event)' data-id='"+id+"' href=''>Accept</a><span class='text-muted open-AddBookDialog1'> | </span><a class='btn btn-sm btn-danger text-light open-AddBookDialog1' onclick='denyErunner()' data-id='"+id+"' href=''>Deny</a></td>";
//                 //         html += "</tr>";
//                 //     html += "</tbody>";
//                 //     }
//                 // html += "</table>";
//                 // document.getElementById("data").innerHTML = html;
//                 // $('.dt1').css('textTransform', 'capitalize');
//                 // $('.open-AddBookDialog111').css('textDecoration', 'underline');
//                 // }                
//                 // else{
//                 //     document.getElementById("data").innerHTML = "<h4>No result found!</h4>";
//                 // }
//             },
//             error:function(){
//                 console.log('error!');
//             }
//         });
//     });
// });






$(document).on("click", ".open-AddBookDialog111", function (e) {
    e.preventDefault();
    var username = $(this).data('id');
    console.log(username);
    $(".modal-body #applicantUsername").val( username );
    // As pointed out in comments, 
    // it is superfluous to have to manually call the modal.
    // $('#addBookDialog').modal('show');
    $.ajax({
        url: 'getApplicantByUsername/'+username,
        success:function(res){
            console.log('reached');
            let result = JSON.parse(res);
            var details = result.message;
			console.log(details);
            let html = "";
            for(var a = 0; a < (details.length - 0); a++){
                html += "<div class='form-group'><span class='dt'>Firstname:</span> <span class='dt1'>"+details[a].firstname+"</div>";
                html += "<div class='form-group'><span class='dt'>Lastname:</span> <span class='dt1'>"+details[a].lastname+"</div>";
                html += "<div class='form-group'><span class='dt'>Middlename:</span> <span class='dt1'>"+details[a].middlename+"</div>";
                html += "<div class='form-group'><span class='dt'>Birthday:</span> <span class='dt1'>"+details[a].birthdate+"</div>";
                html += "<div class='form-group'><span class='dt'>City:</span> <span class='dt1'>"+details[a].city+"</div>";
                html += "<div class='form-group'><span class='dt'>Street:</span> <span class='dt1'>"+details[a].street+"</div>";
                html += "<div class='form-group'><span class='dt'>Barangay:</span> <span class='dt1'>"+details[a].barangay+"</div>";
                html += "<div class='form-group'><span class='dt'>Education level:</span> <span class='dt1'>"+details[a].education_level+"</div>";
                html += "<div class='form-group'><span class='dt'>Contact number:</span> <span class='dt1'>"+details[a].contact+"</div>";
                html += "<div class='form-group'><span class='dt'>Email:</span> <span class=''>"+details[a].email+"</div>";
                html += "<div class='form-group'><span class='dt'>Username:</span> <span class=''>"+details[a].username+"</div>";
            }
            document.getElementById("details").innerHTML = html;
            $('.dt1').css('textTransform', 'capitalize');
            $('.dt').css('fontWeight', '700');
        },
        error:function(){
            console.log('error!');
        }
    });

});
