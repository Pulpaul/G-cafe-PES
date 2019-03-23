$(document).ready(function(){
	$("#btnLogIn").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();

		$.ajax({
			url: "php/loginRequest.php",
	        type: "POST",
	        data: {
	        	username: username,
	        	password: password
	        },
	        dataType: "json",
	        success: function(data)
	        {
				if (data == 1) {
					window.location = "jobOrder.php";
				} else if (data == 2) {
					window.location = "jobOrderListing.php";
				} else {
					alert("Please try again...");
				}
	        }
		});
	});

	$("#btnAddNewJobOrder").click(function(){
		var costEstimateNumber = $("#costEstimateNumber").val();
		var dateProjectGiven = $("#dateProjectGiven").val();
		var projectManager = $("#projectManager").val();
		var marketingCommunicationRep = $("#marketingCommunicationRep").val();
		var projectName = $("#projectName").val();
		var material = $("#material").val();
		var size = $("#size").val();
		var companyName = $("#companyName").val();

	if (costEstimateNumber == "" || dateProjectGiven == "" || projectManager == "" || marketingCommunicationRep == "" || projectName == "" || material == "" || size == "" || companyName == "") {
			alert("Please fill up the empty fields. Try again.");
		} else {
			$.ajax({
				url: "php/addNewJobOrder.php",
		        type: "POST",
		        data: {
		        	costEstimateNumber: costEstimateNumber,
		        	dateProjectGiven: dateProjectGiven,
		        	projectManager: projectManager,
		        	marketingCommunicationRep: marketingCommunicationRep,
		        	projectName: projectName,
		        	material: material,
		        	size: size,
		        	companyName: companyName
		        },
		        dataType: "json",
		        success: function(data)
		        {
					if (data == "Added.") {
						alert("New job order successfully added.");
						window.location = "jobOrder.php";
					} else {
						alert("Something went wrong. Try again.");
					}
		        }
			});
		}
	});

	$("#btnAddNewUser").click(function(){
		var fullName = $("#fullName").val();
		var artistId = $("#artistId").val();
		var emailAddress = $("#emailAddress").val();
		var password = $("#password").val();
		var confirmPassword = $("#confirmPassword").val();
		var accountType = $("#accountType").val();

		if (fullName == "" || artistId == "" || emailAddress == "" || password == "" || confirmPassword == "") {
			alert("Please fill up the empty fields.");
		} else {
			if (password != confirmPassword) {
				alert("Please check your password. Try again.");
			} else {
				$.ajax({
					url: "php/addNewUser.php",
			        type: "POST",
			        data: {
			        	fullName: fullName,
			        	artistId: artistId,
			        	emailAddress: emailAddress,
			        	password: password,
			        	confirmPassword: confirmPassword,
			        	accountType: accountType
			        },
			        dataType: "json",
			        success: function(data)
			        {
						if (data == "Added.") {
							window.location = "accounts.php";
						} else {
							alert("User ID already exist.");
						}
			        }
				});
			}
		}
	});

	$("#btnAddCompany").click("click", function(){

		var cen = $("#cen").val();
		var companyName = $("#companyName").val();
		var programManager = $("#programManager").val();
		var marketingCommunicationRep = $("#marketingCommunicationRep").val();

		if (cen == "" || companyName == "" || programManager == "" || marketingCommunicationRep == "") {
			alert("Please fill up the empty fields.");
		} else {
			$.ajax({
				url: "php/addNewCompany.php",
		        type: "POST",
		        data: {
		        	cen: cen,
		        	companyName: companyName,
		        	programManager: programManager,
		        	marketingCommunicationRep: marketingCommunicationRep
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	if (data == "Added.") {
		        		window.location = "companyList.php";
		        	} else {
		        		alert("CEN already exist.");
		        	}
		        }
			});
		}
	});

	$("#costEstimateNumber").change(function(){

		var cen = $(this).val();

		$.ajax({
			url: "php/getCompanyDetails.php",
	        type: "POST",
	        data: { cen: cen },
	        dataType: "json",
	        success: function(data)
	        {
	        	$('#companyName').val(data[0]['company_name']);
	        	$('#projectManager').val(data[0]['program_manager']);
	        	$('#marketingCommunicationRep').val(data[0]['marketing_communication_rep']);
	        }
		});
	});

	$(document).on( "click", "#btnViewJobDetails", function(){
		var id = $(this).attr("data-id");

		$.ajax({
			url: "php/getJobOrderDetails.php",
	        type: "POST",
	        data: { id:id },
	        dataType: "json",
	        success: function(data)
	        {
	        	$("#cen").html(data[0]['cost_estimate_number']);
	        	$("#pdg").html(data[0]['date_project_given']);
	        	$("#pm").html(data[0]['project_manager']);
	        	$("#mcr").html(data[0]['marketing_communication_rep']);
	        	$("#cn").html(data[0]['company_name']);
	        	$("#pn").html(data[0]['project_name']);
	        	$("#m").html(data[0]['material']);
	        	$("#s").html(data[0]['size']);
	        }
		});
	});

	$(document).on( "click", "#btnRemoveJobOrder", function(){
		var id = $(this).attr("data-id");
		var confirmation = confirm("Are you sure you want to remove this job order?");

		if (confirmation) {
			$.ajax({
				url: "php/removeJobOrder.php",
		        type: "POST",
		        data: { id:id },
		        dataType: "json",
		        success: function(data)
		        {
		        	$('#row'+id).fadeOut('fast');
		        }
			});
		}
	});

	$(document).on( "click", "#btnRemoveAccount", function(){
		var id = $(this).attr("data-ID");
		var confirmation = confirm("Are you sure you want to remove this account?");

		if (confirmation) {
			$.ajax({
				url: "php/removeAccount.php",
		        type: "POST",
		        data: { id:id },
		        dataType: "json",
		        success: function(data)
		        {
		        	$('#user'+id).fadeOut('fast');
		        }
			});
		}
	});

	$(document).on( "click", "#btnRemoveCompany", function(){
		var id = $(this).attr("data-id");
		var confirmation = confirm("Are you sure you want to remove this company?");

		if (confirmation) {
			$.ajax({
				url: "php/removeCompany.php",
		        type: "POST",
		        data: { id:id },
		        dataType: "json",
		        success: function(data)
		        {
		        	$('#company'+id).fadeOut('fast');
		        }
			});
		}
	});

	$("#newCEN").change(function(){
		var cen = $(this).val();
		
		$.ajax({
			url: "php/getCompanyDetails.php",
	        type: "POST",
	        data: { cen:cen },
	        dataType: "json",
	        success: function(data)
	        {
	        	$("#newCompanyName").val(data[0]['company_name']);
	        	$("#newProgramManager").val(data[0]['program_manager']);
	        	$("#newMarketingCommunicationRep").val(data[0]['marketing_communication_rep']);
	        }
		});
	});

	$(document).on( "click", "#btnViewUpdateModal", function(){
		var id = $(this).attr("data-id");

		$.ajax({
			url: "php/getCompanyDetailsForUpdate.php",
	        type: "POST",
	        data: { id: id },
	        dataType: "json",
	        success: function(data)
	        {
	        	$("#jobOrderId").val(data[0]['id']);
	        	$("#newCEN option").filter(function() {
    				return $(this).text() == data[0]['cost_estimate_number']; 
				}).prop('selected', true);
				$("#newDateProjectGiven").val(data[0]['date_project_given']);
				$("#newCompanyName").val(data[0]['company_name']);
				$("#newProgramManager").val(data[0]['project_manager']);
				$("#newMarketingCommunicationRep").val(data[0]['marketing_communication_rep']);
				$("#newProjectName").val(data[0]['project_name']);
				$("#newMaterial").val(data[0]['material']);
				$("#newSize").val(data[0]['size']);
	        }
		});
	});

	$("#btnUpdateJobOrder").click(function(){

		var jobOrderId = $("#jobOrderId").val();
		var newCEN = $("#newCEN").val();
		var newDateProjectGiven = $("#newDateProjectGiven").val();
		var newCompanyName = $("#newCompanyName").val();
		var newProgramManager = $("#newProgramManager").val();
		var newMarketingCommunicationRep = $("#newMarketingCommunicationRep").val();
		var newProjectName = $("#newProjectName").val();
		var newMaterial = $("#newMaterial").val();
		var newSize = $("#newSize").val();

		if (newProjectName == "" || newMaterial == "" || newSize == "") {
			alert("Please fill up the empty fields.");
		} else {
			$.ajax({
				url: "php/updateJobOrder.php",
		        type: "POST",
		        data: {
		        	jobOrderId: jobOrderId,
		        	newCEN: newCEN,
		        	newDateProjectGiven: newDateProjectGiven,
		        	newCompanyName: newCompanyName,
		        	newProgramManager: newProgramManager,
		        	newMarketingCommunicationRep: newMarketingCommunicationRep,
		        	newProjectName: newProjectName,
		        	newMaterial: newMaterial,
		        	newSize: newSize
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	alert(data);
		        	window.location = "jobOrder.php";
		        }
			});
		}
	});

	Date.prototype.timeNow = function () {
     	return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
	}

	$("#btnTimeIn").click(function(){
		var cen = $("#cen").html();
		var pn = $("#pn").html();
		var date = new Date();
		var currentDate = date.toDateString();
		var timeIn = new Date().timeNow();
		
		$.ajax({
			url: "php/timeIn.php",
	        type: "POST",
	        data: {
	        	cen: cen,
	        	pn: pn,
	        	currentDate: currentDate,
	        	timeIn: timeIn
	        },
	        dataType: "json",
	        success: function(data)
	        {
	        	alert("Your now currently time in...");
	        	window.location = "jobOrderListing.php";
	        }
		});
	});

});