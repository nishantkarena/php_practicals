$(document).ready(function() {
$('#butsave').on('click', function() {
var check = $('#checkbox').val();
if(check!=""){
	$.ajax({
		url: "ajax-process.php",
		type: "POST",
		data: {
			check : check				
		},
		cache: false,
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
                alert("hello");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$('#success').html('Data added successfully !'); 						
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
			
		}
	});
	}
	else{
		alert('Please fill all the field !');
	}
});
});