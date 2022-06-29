require('./bootstrap');
$(document).ready(function (){
    $("#activedata").on('change',function(){
        alert("ldkfj");
        var value = $(this).val();
        $.ajax({
            url:"/admin/filter",
            type:"POST",
            data:'request=' + value,
            beforeSend:function(){
                $("#table").html("<span>Working...</span>");
            },
            success:function(data){
                $("#table").html(data);
            }
        });
    });
});