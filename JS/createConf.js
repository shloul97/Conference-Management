$(document).ready(function(){

    $(document).on('submit','#create-conf',function(e){
        e.preventDefault();

        var data = $(this).serialize();
        var action = 'createConf';

        $.ajax({

			type: "POST",
            url: "../create_conf/confRequest.php",
            data: {action : action, data : data}, 
            cache: false,
            async : false,
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                if(obj.status == 1){
                    window.location.reload();
                }
            }

		});
    });
});