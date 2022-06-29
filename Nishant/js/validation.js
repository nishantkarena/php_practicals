var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
var $ConNoRegEx = /^([0-9]{10})$/;
var $AgeRegEx = /^([0-9]{1,2})$/;
var nameflag = false, emailflag = false, passwordflag = false,editpasswordflag = false, hobbiesflag=false;

$(document).ready(function () {
	$("#name").blur(function () {
		var nameflag = false;
		$("#nameval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#nameval").html("(*) Name required..!!");
			nameflag = false;
		}
		else {
			if (!$(this).val().match($FNameLNameRegEx)) {
				$("#nameval").html("(*) Invalid Name..!!");
				nameflag = false;
			}
			else {
				nameflag = true;
			}
		}
	});

	$("#email").blur(function () {
		$("#emailval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#emailval").html("(*) Email required..!!");
			emailflag = false;
		}
		else {
			if (!$(this).val().match($EmailIdRegEx)) {
				$("#emailval").html("(*) Invalid Email..!!");
				emailflag = false;
			}
			else {
				emailflag = true;
			}
		}
	});
	$("#password").blur(function () {
		$("#passwordval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#passwordval").html("(*) Password required..!!");
			passwordflag = false;
		}
		else {
			if (!$(this).val().match($PasswordRegEx)) {
				$("#passwordval").html("(*) Invalid Password, it must be 1 Uppercase,1 special Character, 8 to 12 characters!!");
				passwordflag = false;
			}
			else {
				passwordflag = true;
			}
		}
	});
	$("#editpassword").blur(function () {
		$("#editpasswordval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#editpasswordval").html("(*) Password required..!!");
			editpasswordflag = false;
		}
		else {
			if (!$(this).val().match($PasswordRegEx)) {
				$("#editpasswordval").html("(*) Invalid Password, it must be 1 Uppercase,1 special Character, 8 to 12 characters!!");
				editpasswordflag = false;
			}
			else {
				editpasswordflag = true;
			}
		}
	});
	$("#checkbox").blur(function () {
		$("#hobbiesval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#hobbiesval").html("(*) Hobby required..!!");
			hobbiesflag = false;
		}
		else {
			hobbiesflag = true;
		}
	});

	$("#cnaclick").click(function () {
		
		nameflag= false;
		$("#nameval").empty();
		if($("#name").val()==""){
			$("#nameval").html("Name Required");
		}else{
			if(!$("#name").val().match($FNameLNameRegEx)){
				$("#nameval").html("Name Invalid");
			}else{
				nameflag=true;
			}
		}

		emailflag= false;
		$("#emailval").empty();
		if($("#email").val()==""){
			$("#emailval").html("Email Required");
		}else{
			if(!$("#email").val().match($EmailIdRegEx)){
				$("#emailval").html("Email Invalid");
			}else{
				emailflag=true;
			}
		}

		passwordflag= false;
		$("#passwordval").empty();
		if($("#password").val()==""){
			$("#passwordval").html("Password Required");
		}else{
			if(!$("#password").val().match($PasswordRegEx)){
				$("#passwordval").html("Password Invalid");
			}else{
				passwordflag=true;
			}
		}
		editpasswordflag= false;
		$("#editpasswordval").empty();
			if(!$("#editpassword").val().match($PasswordRegEx)){
				$("#editpasswordval").html("Password Invalid");
			}else{
				editpasswordflag=true;
			}

		
		if(fnameflag == true && lnameflag==true && emailflag == true && passwordflag == true && confpasswordflag == true && addressflag == true && designationflag == true && fileflag == true){
			document.register.submit();
			// $("#validate").html("1");
		}else{
			// $("#validate").html("Plaese Enter Valid Inputs");
			//alert("Plaese Enter Valid Inputs");
			// Location.replace("registration.php");
			
		}
		
	});
	$('#name').keypress(function (e) {
		$('#nameval').empty();
		var flag = false;
		(e.which >= 65 && e.which <= 90) || (e.which >= 92 && e.which <= 122)
			? flag = true
			: (flag = false, $('#nameval').html('(*) Please Enter Valid Name..'));
		return flag;
	});
	
});