$(document).ready(function(){

    $(document).on('click','#self-super-btn',function(e){
        e.preventDefault();

        var action = 'self';

        var email = $('#email').val();

        $.ajax({

			type: "POST",
            url: "../assi_superchair/sendInvite.php",
            data: {action : action, email : email}, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                //console.log(obj);
                if(obj.status == 1){
                    //window.location.href = '../select_role';
                }
                alert('Your form was sent successfully.'); 
                

            },
            error: function (xhr, status, error) {                        
                alert('Your form was not sent successfully.'); 
                console.error(error); 
            } 

		});
    });
});