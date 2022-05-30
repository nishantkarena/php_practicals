var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;

$(document).ready(function(){
   var nameflag=false,selectflag=false;
   $("#cname").blur(function(){
       $("#cnameval").empty();
       if($(this).val()=="" || $(this).val()==null)
       {
           $("#cnameval").html("(*) Category Name required..!!");
           nameflag=false;
       }
       else{
           if(!$(this).val().match($FNameLNameRegEx))
           {
               $("#cnameval").html("(*) Invalid Category Name..!!");
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
   $('#submit').click(function(){
        nameflag= false;
		$("#nameval").empty();
		if($("#cname").val()==""){
			$("#nameval").html("Category name Required");
		}else{
			if(!$("#cname").val().match($FNameLNameRegEx)){
				$("#nameval").html("Category name Invalid");
			}else{
				nameflag=true;
			}
		}

        selectflag= false;
		$("#activeval").empty();
		if($("#active").val()==""){
			$("#activeval").html("Select Any..!!");
		}else{
			selectflag=true;
		}
   });
   $('#cname').keypress(function(e){
       $('#cnameval').empty();
       var flag= false;
       (e.which>=65 && e.which<=90) || (e.which>=92 && e.which<=122)
       ?flag=true
       :(flag=false,$('#cnameval').html('(*) Please Enter Valid Name..'));
       return flag;
   });

   
});