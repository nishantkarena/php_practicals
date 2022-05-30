var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;

$(document).ready(function(){
   var nameflag=false,selectflag=false,imageflag=false;
   $("#name").blur(function(){
       $("#nameval").empty();
       if($(this).val()=="" || $(this).val()==null)
       {
           $("#nameval").html("(*) Product Name required..!!");
           nameflag=false;
       }
       else{
           if(!$(this).val().match($FNameLNameRegEx))
           {
               $("#nameval").html("(*) Invalid Product Name..!!");
               nameflag=false;
           }
           else{
               nameflag=true;
           }
       }
   });
   $("#active").blur(function(){
       $("#activeval").empty();
       if($(this).val()=="" || $(this).val()==null)
       {
           $("#activeval").html("(*) Select Any..!!");
           selectflag=false;
       }
       else{
           selectflag=true;
       }
   });
   $("#image").blur(function(){
        $("#imageval").empty();
        if($(this).val()=="" || $(this).val()==null)
        {
            $("#imageval").html("(*) Select Any file..!!");
            imageflag=false;
        }
        else{
            imageflag=true;
        }
    });
    $('#submit').click(function(){
        nameflag= false;
        $("#nameval").empty();
        if($("#name").val()==""){
            $("#nameval").html("Product Name Required");
        }else{
            if(!$("#name").val().match($FNameLNameRegEx)){
                $("#nameval").html("Product Name Invalid");
            }else{
                nameflag=true;
            }
        }

        selectflag= false;
        $("#activeval").empty();
        if($("#active").val()==""){
            $("#activeval").html("Select Any");
        }else{
            selectflag=true;
        }

        imageflag= false;
        $("#imageval").empty();
        if($("#image").val()==""){
            $("#imageval").html("Select Any Image");
        }else{
            imageflag=true;
        }
    });
    $('#name').keypress(function(e){
       $('#nameval').empty();
       var flag= false;
       (e.which>=65 && e.which<=90) || (e.which>=92 && e.which<=122)
       ?flag=true
       :(flag=false,$('#nameval').html('(*) Please Enter Valid Name..'));
       return flag;
   });

   
});