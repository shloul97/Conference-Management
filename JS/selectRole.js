$(document).ready(function(){

    $(document).on('click', 'a[name=select-role]', function(e){

        e.preventDefault();

        var role_id = $(this).attr('data-id');
        var conf_id = $(this).attr('conf-id');

        var action = 'selectRole';

        $.ajax({

			type: "POST",
            url: "../select_role/select.php",
            data: {action : action, role_id : role_id, conf_id : conf_id}, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                //console.log(obj);
                if(obj.status == 1){
                    window.location.href = '../'+obj.msg;
                }
                

            },
            error: function (xhr, status, error) {                        
                alert('Your form was not sent successfully.'); 
                console.error(error); 
            } 

		});
    });

});