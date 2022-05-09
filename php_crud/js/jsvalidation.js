var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
var $ConNoRegEx = /^([0-9]{10})$/;
var $AgeRegEx = /^([0-9]{1,2})$/;

$(document).ready(function () {
	var fnameflag = false, lnameflag = false, emailflag = false, passwordflag = false, confpasswordflag = false, addressflag = false, designationflag = false, fileflag= false;
	$("#txtfirstname").blur(function () {
		$("#txtfirstnameval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#txtfirstnameval").html("(*) Firstname required..!!");
			fnameflag = false;
		}
		else {
			if (!$(this).val().match($FNameLNameRegEx)) {
				$("#txtfirstnameval").html("(*) Invalid firstname..!!");
				fnameflag = false;
			}
			else {
				fnameflag = true;
			}
		}
	});
	$("#txtlastname").blur(function () {
		$("#txtlastnameval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#txtlastnameval").html("(*) Lastname required..!!");
			lnameflag = false;
		}
		else {
			if (!$(this).val().match($FNameLNameRegEx)) {
				$("#txtlastnameval").html("(*) Invalid Lastname..!!");
				lnameflag = false;
			}
			else {
				lnameflag = true;
			}
		}
	});
	$("#txtemail").blur(function () {
		$("#txtemailval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#txtemailval").html("(*) Email required..!!");
			emailflag = false;
		}
		else {
			if (!$(this).val().match($EmailIdRegEx)) {
				$("#txtemailval").html("(*) Invalid Email..!!");
				emailflag = false;
			}
			else {
				emailflag = true;
			}
		}
	});
	$("#txtpassword").blur(function () {
		$("#txtpasswordval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#txtpasswordval").html("(*) Password required..!!");
			passwordflag = false;
		}
		else {
			if (!$(this).val().match($PasswordRegEx)) {
				$("#txtpasswordval").html("(*) Invalid Password..!!");
				passwordflag = false;
			}
			else {
				passwordflag = true;
			}
		}
	});
	$("#txtconfpassword").blur(function () {
		$("#txtconfpasswordval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#txtconfpasswordval").html("(*) Confirm Password required..!!");
			confpasswordflag = false;
		}
		else {
			if ($(this).val() != $("#txtpassword").val()) {
				$("#txtconfpasswordval").html("(*) Password Does Not Match..!!");
				confpasswordflag = false;
			}
			else {
				confpasswordflag = true;
			}
		}
	});
	$("#address").blur(function () {
		$("#addressval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#addressval").html("(*) Address required..!!");
			addressflag = false;
		}
		else {
			addressflag = true;
		}
	});
	$("#designation").blur(function () {
		$("#designationval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#designationval").html("(*) Select Designation..!!");
			designationflag = false;
		}
		else {
			designationflag = true;
		}
	});
	$("#fileToUpload").blur(function () {
		$("#fileToUploadval").empty();
		if ($(this).val() == "" || $(this).val() == null) {
			$("#fileToUploadval").html("(*) Select File..!!");
			fileflag = false;
		}
		else {
			fileflag = true;
		}
	});

	$('#cnaclick').click(function () {
		fnameflag= false;
		$("#fnameval").empty();
		if($("#fname").val()==""){
			$("#fnameval").html("First name Required");
		}else{
			if(!$("#fname").val().match($FNameLNameRegEx)){
				$("#fnameval").html("First name Invalid");
			}else{
				fnameflag=true;
			}
		}

		lnameflag= false;
		$("#txtlastnameval").empty();
		if($("#txtlastname").val()==""){
			$("#txtlastnameval").html("Last name Required");
		}else{
			if(!$("#txtlastname").val().match($FNameLNameRegEx)){
				$("#txtlastnameval").html("Last name Invalid");
			}else{
				lnameflag=true;
			}
		}

		emailflag= false;
		$("#txtemailval").empty();
		if($("#txtemail").val()==""){
			$("#txtemailvalval").html("Email Required");
		}else{
			if(!$("#txtemail").val().match($EmailIdRegEx)){
				$("#txtemailval").html("Email Invalid");
			}else{
				emailflag=true;
			}
		}

		passwordflag= false;
		$("#txtpasswordval").empty();
		if($("#txtpassword").val()==""){
			$("#txtpasswordval").html("Password Required");
		}else{
			if(!$("#txtpassword").val().match($PasswordRegEx)){
				$("#txtpasswordval").html("Password Invalid");
			}else{
				passwordflag=true;
			}
		}

		confpasswordflag= false;
		$("#txtconfpasswordval").empty();
		if($("#txtconfpassword").val()==""){
			$("#txtpasswordval").html("Password Required");
		}else{
			if(!$("#txtconfpassword").val().match("#txtpassword")){
				$("#txtconfpasswordval").html("Password Does Not Match..");
			}else{
				confpasswordflag=true;
			}
		}

		addressflag= false;
		$("#addressval").empty();
		if($("#address").val()==""){
			$("#addressval").html("Address Required");
		}else{
			addressflag=true;
		}

		designationflag= false;
		$("#designationval").empty();
		if($("#designation").val()==""){
			$("#designationval").html("Select Designation");
		}else{
			designationflag=true;
		}

		fileflag= false;
		$("#fileToUploadval").empty();
		if($("#fileToUpload").val()==""){
			$("#fileToUploadval").html("Select File");
		}else{
			fileflag=true;
		}
	});
	$('#txtfirstname').keypress(function (e) {
		$('#txtfnameval').empty();
		var flag = false;
		(e.which >= 65 && e.which <= 90) || (e.which >= 92 && e.which <= 122)
			? flag = true
			: (flag = false, $('#txtfirstnameval').html('(*) Please Enter Valid Name..'));
		return flag;
	});
	$('#txtlastname').keypress(function (e) {
		$('#txtlastnameval').empty();
		var flag = false;
		(e.which >= 65 && e.which <= 90) || (e.which >= 92 && e.which <= 122)
			? flag = true
			: (flag = false, $('#txtlastnameval').html('(*) Please Enter Valid Name..'));
		return flag;
	});
});