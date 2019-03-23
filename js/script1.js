$(document).ready(function(){ 
    $("#btnaddnewadmin").click(function () {
		var adminId = $("#adminId").val();
		var lastname = $("#lastname").val();
		var firstname = $("#firstname").val();
		var username = $("#username").val();
		var password = $("#password").val();
		var confirmpassword = $("#confirmpassword").val();
		if (lastname == "" || firstname == "" || username == "" || password == "" || confirmpassword == "") {
			alert("Please fill up the empty fields.");
		} else {
			if (password != confirmpassword) {
				alert("Please check your password. Try again.");
			} else {
				$.ajax({
					url: "php/addnewadmin.php",
			        type: "POST",
			        data: {
			        	adminId: adminId,
			        	lastname: lastname,
			        	firstname: firstname,
			        	username: username,
						password: password,
			        	confirmpassword: confirmpassword,
			        },
			        dataType: "json",
			        success: function(data)
			        {
						if (data == "Added.") {
							window.location = "account.php";
						} else {
							alert("User ID already exist.");
						}
			        }
				});
			}
		}
	});
$("#btnLogIn").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();

		$.ajax({
			url: "php/login.php",
	        type: "POST",
	        data: {
	        	username: username,
	        	password: password
	        },
	        dataType: "json",
	        success: function(data)
	        {
				if (data == 1) {
					window.location = "account.php";
				} else if (data == 2) {
					window.location = "jobOrderListing.php";
				} else {
					alert("Please try again...");
				}
	        }
		});
    });
$(document).on("click", "#btnRemoveAdmin", function () {
    var id = $(this).attr("data-id");
    var confirmation = confirm("Are you sure you want to remove this account?");

    if (confirmation) {
        $.ajax({
            url: "php/adminRemove.php",
            type: "POST",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $('#user' + id).fadeOut('fast');
                window.location = "account.php"
            }
        });
    }
});
$(document).on("click", "#btnViewUpdate", function () {
    var id = $(this).attr("data-id");

    $.ajax({
        url: "php/updatedetails.php",
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (data) {
            $("#admin_id").val(data[0]['admin_id']);
            $("#newlastname").val(data[0]['lastname']);
            $("#newfirstname").val(data[0]['firstname']);
            $("#newusername").val(data[0]['username']);
            $("#newpassword").val(data[0]['password']);
          
        }
    });
});
$("#btnUpdateAdmin").click(function () {

    var adminId = $("#admin_id").val();
    var newlastname = $("#newlastname").val();
    var newfirstname = $("#newfirstname").val();
    var newusername = $("#newusername").val();
    var newpassword = $("#newpassword").val();


    if (newlastname == "" || newfirsname == "" || newusername == "" || newpassword == "") {
        alert("Please fill up the empty fields.");
    } else {
        $.ajax({
            url: "php/adminUpdate.php",
            type: "POST",
            data: {
                adminId: adminId,
                newlastname: newlastname,
                newfirstname: newfirstname,
                newusername: newusername,
                newpassword: newpassword,
            },
            dataType: "json",
            success: function (data) {
                alert(data);
                window.location = "account.php";
            }
        });
    }
});
$(document).on("click", "#btnViewJobDetails", function () {
    var id = $(this).attr("data-id");

    $.ajax({
        url: "php/updatedetails.php",
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (data) {
            $("#ai").html(data[0]['admin_id']);
            $("#ln").html(data[0]['lastname']);
            $("#fn").html(data[0]['firstname']);
            $("#un").html(data[0]['username']);
            $("#ps").html(data[0]['password']);
        }
    });
});
$("#btnaddnewmarshall").click(function () {
    var id = $("#id").val();
    var user_name = $("#user_name").val();
    var user_email = $("#user_email").val();
    var user_password = $("#user_password").val();
    var user_number = $("#user_number").val();
    var user_address = $("#user_address").val();
    var user_status = $("#user_status").val();
    var confirmpassword = $("#confirmpassword").val();
    if (user_name == "" || user_email == "" || user_password == "" || user_number == "" || user_address == "" || user_status == "") {
        alert("Please fill up the empty fields.");
    } else {
        if (user_password != confirmpassword) {
            alert("Please check your password. Try again.");
        } else {
            $.ajax({
                url: "php/addnewmarshall.php",
                type: "POST",
                data: {
                    id : id,
                    user_name: user_name,
                    user_email:user_email,
                    user_password: user_password,
                    user_number: user_number,
                    user_address: user_address,
                    user_status: user_status,
                    confirmpassword: confirmpassword,
                },
                dataType: "json",
                success: function (data) {
                    if (data == "Added.") {
                        window.location = "marshallacc.php";
                    } else {
                        alert("User ID already exist.");
                    }
                }
            });
        }
    }
});
$(document).on("click", "#btnRemoveMarshall", function () {
    var id = $(this).attr("data-id");
    var confirmation = confirm("Are you sure you want to remove this account?");

    if (confirmation) {
        $.ajax({
            url: "php/marshallRemove.php",
            type: "POST",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $('#user' + id).fadeOut('fast');
                window.location = "marshallacc.php"
            }
        });
    }
});
$("#btnUpdateMarshall").click(function () {

    var marshall_id = $("#marshall_id").val();
    var newlastname = $("#newlastname").val();
    var newfirstname = $("#newfirstname").val();
    var newlocation = $("#newlocation").val();
    var newusername = $("#newusername").val();
    var newpassword = $("#newpassword").val();


    if (newlastname == "" || newfirstname == "" || newusername == "" || newpassword == "" || newlocation == "") {
        alert("Please fill up the empty fields.");
    } else {
        $.ajax({
            url: "php/marshallUpdate.php",
            type: "POST",
            data: {
                marshall_id: marshall_id,
                newlastname: newlastname,
                newfirstname: newfirstname,
                newlocation: newlocation,
                newusername: newusername,
                newpassword: newpassword,
            },
            dataType: "json",
            success: function (data) {
                alert(data);
                window.location = "marshallacc.php";
            }
        });
    }
});
$(document).on("click", "#btnViewMarsDetails", function () {
    var id = $(this).attr("data-id");

    $.ajax({
        url: "php/marshallupdatedetails.php",
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (data) {
            $("#id").html(data[0]['id']);
            $("#ai").html(data[0]['marshall_id']);
            $("#ln").html(data[0]['lastname']);
            $("#fn").html(data[0]['firstname']);
            $("#lc").html(data[0]['location']);
            $("#un").html(data[0]['username']);
            $("#ps").html(data[0]['password']);
        }
    });
});
$(document).on("click", "#btnViewMarsUpdate", function () {
    var id = $(this).attr("data-id");

    $.ajax({
        url: "php/marshallupdatedetails.php",
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (data) {
            $("#marshall_id").val(data[0]['marshall_id']);
            $("#newlastname").val(data[0]['lastname']);
            $("#newfirstname").val(data[0]['firstname']);
            $("#newlocation").val(data[0]['location']);
            $("#newusername").val(data[0]['username']);
            $("#newpassword").val(data[0]['password']);

        }
    });
});
$("#btnUpdateMarshalll").click(function () {

    var marshall_Id = $("#marshall_id").val();
    var newlastname = $("#newlastname").val();
    var newfirstname = $("#newfirstname").val();
    var newlocation = $("#newlocation").val();
    var newusername = $("#newusername").val();
    var newpassword = $("#newpassword").val();


    if (newlastname == "" || newfirsname == "" || newusername == "" || newpassword == "" || newlocation == "") {
        alert("Please fill up the empty fields.");
    } else {
        $.ajax({
            url: "php/marshallUpdate.php",
            type: "POST",
            data: {
                marshall_Id: marshall_Id,
                newlastname: newlastname,
                newfirstname: newfirstname,
                newlocation: newlocation,
                newusername: newusername,
                newpassword: newpassword,
            },
            dataType: "json",
            success: function (data) {
                alert(data);
                window.location = "marshall.php";
            }
        });
    }
});
$("#costEstimateNumber").change(function(){

        var cen = $(this).val();

        $.ajax({
            url: "php/marshallDetails.php",
            type: "POST",
            data: { cen: cen },
            dataType: "json",
            success: function(data)
            {
                $('#username').val(data[0]['username']);
                $('#number').val(data[0]['number']);
            }
        });
    });

$("#btnaddnewevent").click(function () {
    var marshall_id = $("#marshall_id").val();
    var lastname = $("#lastname").val();
    var firstname = $("#firstname").val();
    var cafename = $("#cafename").val();
    var tournatype = $("#tournatype").val();
    var eventdate = $("#eventdate").val();
    var eventtime = $("#eventtime").val();
    var maxteams = $("#maxteams").val();
    var location = $("#location").val();
    if (cafename == "" || tournatype == "" || location == "") {
        alert("Please fill up the empty fields.");
    } else {
        if (location == tournatype) {
            alert("Please check your password. Try again.");
        } else {
            $.ajax({
                url: "php/addnewevent.php",
                type: "POST",
                data: {
                    
                    marshall_id: marshall_id,
                    lastname: lastname,
                    firstname: firstname,
                    cafename: cafename,
                    tournatype:tournatype,
                    eventdate: eventdate,
                    eventtime: eventtime,
                    maxteams: maxteams,
                    location: location,
                },
                dataType: "json",
                success: function (data) {
                    if (data == "Added.") {
                        window.location = "eventinfo.php";
                    } else {
                        alert("User ID already exist.");
                    }
                }
            });
        }
    }
});

setInterval(function(){
        $('#report_noti_dash').load('php/report_noti_dash.php')
      }, 2000 ); 

      setInterval(function(){
        $('#report_noti').load('php/report_noti.php')
      }, 2000 ); 

      $(document).on( "click", "#seen_report_btn", function(){

        $.ajax({
          url: "php/seen_report.php",
          type: "POST",
          data: { },
          dataType: "json",
          success:function(data)
          {

          }
        });
      });

      setInterval(function(){
        $('#count_accept').load('php/count_accept.php')
      }, 2000 ); 
      
      $(document).on( "click", "#seen_accept_noti", function(){

        $.ajax({
          url: "php/seen_accept_noti.php",
          type: "POST",
          data: { },
          dataType: "json",
          success:function(data)
          {

          }
        });
      });

      setInterval(function(){
        $('#fetch_accep_noti').load('php/fetch_accep_noti.php')
      }, 2000 ); 

});

function lettersOnly(input){
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex,"");
}

function validation(){

  var a = document.getElementById("cafename").value;
  var b = document.getElementById("landmark").value;

  if (a.length < 6 ) {
    document.getElementById("cafe").innerHTML = "Cafename is too short";
    return false;
  }
  if (a.length > 25 ) {
    document.getElementById("cafe").innerHTML = "Cafename is too long";
    return false;
  }
  if (b.length < 6 ) {
    document.getElementById("land").innerHTML = "Landmark is too short";
    return false;
  }
  if (b.length > 25 ) {
    document.getElementById("land").innerHTML = "Landmark is too long";
    return false;
  }
}  


//print
        function printTicket() {
            window.print();
        }