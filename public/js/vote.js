$(document).ready(function(){
    $("#frm-id").submit(function(){
        var form_data =  $("#frm-id").serialize();
        $.ajax({
            url: 'PostsController@vote',
            type: "POST"
        });
    });
});
