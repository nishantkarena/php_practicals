$(document).ready(function (){
    $("#activedata").on('change',function(){
        var value = $(this).val();
        $.ajax({
            url:"../js/process.php",
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