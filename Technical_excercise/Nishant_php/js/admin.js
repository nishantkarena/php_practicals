var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;

$(document).ready(function(){
   var emailflag=false,passwordflag=false;
   $("#email").blur(function(){
    $("#emailval").empty();
    if($(this).val()=="" || $(this).val()==null)
    {
        $("#emailval").html("(*) Email required..!!");
        emailflag=false;
    }
    else{
        if(!$(this).val().match($EmailIdRegEx))
        {
            $("#emailval").html("(*) Invalid Email..!!");
            emailflag=false;
        }
        else{
            emailflag=true;
        }
    }
});
$("#password").blur(function(){
    $("#passwordval").empty();
    if($(this).val()=="" || $(this).val()==null)
    {
        $("#passwordval").html("(*) Password required..!!");
        passwordflag=false;
    }
    else{
            passwordflag=true;
    }
});
    $('#cnaclick').click(function(){
        emailflag=false;
        $("#emailval").empty();
		if($("#email").val()==""){
			$("#emailvalval").html("Email Required");
		}else{
			if(!$("#email").val().match($EmailIdRegEx)){
				$("#emailval").html("Email Invalid");
			}else{
				emailflag=true;
			}
		}
        passwordflag=false;
        $("#passwordval").empty();
		if($("#password").val()==""){
			$("#passwordval").html("Password Required");
		}else{
			passwordflag=true;
		}
        if(emailflag == true && passwordflag == true){
			document.register.submit();
		}else{
			// alert("Plaese Enter Valid Inputs");
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