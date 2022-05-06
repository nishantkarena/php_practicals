var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;

$(document).ready(function () {

    var emailflag = false, passwordflag = false;
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
    $("#password").blur(function () {
        $("#passwordval").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#passwordval").html("(*) Password required..!!");
            passwordflag = false;
        }
        else {
            if (!$(this).val().match($PasswordRegEx)) {
                $("#passwordval").html("(*) Invalid Password..!!");
                passwordflag = false;
            }
            else {
                passwordflag = true;
            }
        }
    });
    $('#cnaclick').click(function () {
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
        $("#passwordval").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#passwordval").html("(*) Password required..!!");
            passwordflag = false;
        }
        else {
            passwordflag = true;
        }
    });
});