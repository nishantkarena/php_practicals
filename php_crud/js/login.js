var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;

$(document).ready(function(){
    var emailflag=false;
    $("#txtemail").blur(function(){
        $("#txtemailval").empty();
        if($(this).val()=="" || $(this).val()==null)
        {
            $("#txtemailval").html("(*) Email required..!!");
            emailflag=false;
        }
        else{
            if(!$(this).val().match($EmailIdRegEx))
            {
                $("#txtemailval").html("(*) Invalid Email..!!");
                emailflag=false;
            }
            else{
                emailflag=true;
            }
        }
    });
    $('#cnaclick').click(function(){
        $("#txtemailval").empty();
        if($(this).val()=="" || $(this).val()==null)
        {
            $("#txtemailval").html("(*) Email required..!!");
            emailflag=false;
        }
        else{
            if(!$(this).val().match($EmailIdRegEx))
            {
                $("#txtemailval").html("(*) Invalid Email..!!");
                emailflag=false;
            }
            else{
                emailflag=true;
            }
        }                   
    });
});