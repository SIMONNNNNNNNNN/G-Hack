$('select').change(function(){
    $.ajax({
        url: base_url + 'privilege/updatePrivilege',
        data: { "id": $(this).data('id'),"privilege":$(this).val() },
        dataType:"html",
        type: "post",
        success: function(data){
            if(data="1"){
                $('#successful').show();
            }else{

            }

        }

    });

});
