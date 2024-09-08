$(document).ready(function(){

    $(document).on('click','button[name=role-action]', function(e){
        e.preventDefault();

        var button = $(this);

        var action = $(this).attr('data-value');
        

        var user_id = $(this).attr('data-id');

        $.ajax({

			type: "POST",
            url: "../chairs/suspend.php",
            data: {action : action, user_id:user_id}, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                if(obj.status == 1){
                    if(button.hasClass('btn-danger')){
                        button.toggleClass('btn-danger btn-success');
                        button.attr('data-value' , 'active');
                        button.html('Active');
                       
                    }
                    else if(button.hasClass('btn-success')){
                        button.toggleClass('btn-success btn-danger');
                        button.attr('data-value' , 'suspend');
                        button.html('Suspend');
                       
                    }  
                }
               
            },
            error: function (xhr, status, error) {                        
                alert('We can\'t send your form.'); 
                console.error(error); 
            } 

		});
    });

});