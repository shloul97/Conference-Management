$(document).ready(function(){

    var selected = '';
    if(localStorage.getItem('profile-form') === null){
        selected = 'info-div';
        
    }
    else{
        selected = localStorage.getItem('profile-form');
        
    }

    $('#'+selected).show();
    var selector = $(".profile-select-div").find(`a[data-id='${selected}']`);
    selector.addClass('active-a');






    $(document).on('click','a[name=select-form]',function(e){
        e.preventDefault();

        var formId = $(this).attr('data-id');
        localStorage.setItem('profile-form',formId);

        $('a[name=select-form]').not(this).each(function(){
            var form = $(this).attr('data-id');
            $('#'+form).slideUp();
            if($(this).hasClass('active-a')){
                $(this).removeClass('active-a');
            }
        });

        $('#'+formId).slideDown();
        $(this).addClass('active-a');
    });

    $(document).on('submit','#change-pass-form',function(e){
        e.preventDefault();

        var current = $('#old-pass').val();
        var newPass = $('#new-pass').val();
        var confPass = $('#conf-pass').val();

        var action = 'changePass';
        
        if(newPass != confPass){
            $('#warn-msg').html('Password Doesn\'t Match');
            $('#warn-msg-div').fadeIn(200);
        }

        else{
            $.ajax({

			type: "POST",
            url: "../account/accountCheck.php",
            data: {action : action, old_pass : current, new_pass : newPass}, 
            cache: false,
            async : false,
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                if(obj.status == 0){
                    $('#warn-msg').html(obj.msg);
                    $('#warn-msg-div').fadeIn(200);
                }
                if(obj.status == 1){
                    $('#warn-msg').html(obj.msg);
                    $('#warn-msg-div').removeClass('warn-msg-div');
                    $('#warn-msg-div').addClass('success-div');
                    $('#warn-msg-div').fadeIn(300);

                    var interval = setInterval(function(){
                        window.location.reload();
                    },3000);
                    //window.location.href = '../select_role';
                }
            }

		    });
        }
    });


});