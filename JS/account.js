$(document).ready(function(){



    var action = "";
    if(localStorage.getItem("login-action") === null){
        action = 'login'; 
    }
    else{
        action = localStorage.getItem("login-action");
    }

   
    if(action == 'signUp'){
        $('#reg-form-dis').addClass('active');
        $('#login-form-dis').removeClass('active');
        $('#login-form').fadeOut(300, function(){
            $('#reg-form').fadeIn(300);
        });
    }
    else{
        $('#login-form-dis').addClass('active');
        $('#reg-form-dis').removeClass('active');
        
        $('#reg-form').fadeOut(300, function(){
            $('#login-form').fadeIn(300)
        });

    }

    $('#login-form-dis').click(function(){
        action = 'login'; 
        localStorage.setItem("login-action",action);
        $(this).addClass('active');
        $('#reg-form-dis').removeClass('active');
        
        $('#reg-form').fadeOut(300, function(){
            $('#login-form').fadeIn(300)
        });
        
    });

    $('#reg-form-dis').click(function(){
        action = 'signUp';
        localStorage.setItem("login-action",action);
        $(this).addClass('active');
        $('#login-form-dis').removeClass('active');
        $('#login-form').fadeOut(300, function(){
            $('#reg-form').fadeIn(300);
        });
        
    });

    $(document).on('submit','#login-form',function(e){
        e.preventDefault();

        var data = $(this).serialize();
        var action = "signin";

        $.ajax({

			type: "POST",
            url: "../account/accountCheck.php",
            data: {action : action, data : data}, 
            cache: false,
            async : false,
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                if(obj.status == 0){
                    $('#error-msg').html(obj.msg);
                    $('#error-div').fadeIn(100);
                }
                if(obj.status == 1){
                    window.location.href = '../select_role';
                }
            }

		});
    });

    $(document).on('submit','#reg-form',function(e){
        e.preventDefault();

        var data = $(this).serialize();
        var action = "signup";

        var password = $('#reg-password').val();
        var password_conf = $('#reg-conf-pass').val();

        if(password == password_conf){
            $.ajax({

                type: "POST",
                url: "../account/accountCheck.php",
                data: {action : action, data : data}, 
                cache: false,
                async : false,
                success : function(d){
                    var obj = jQuery.parseJSON(d);
                    if(obj.status == 0){
                        $('#error-msg').html(obj.msg);
                        $('#error-div').fadeIn(100);
                    }
                    if(obj.status == 1){
                        window.location.href = '../select_role';
                    }
                }
    
            });
        }
        else{
            $('#error-msg').html('Password doesn\'t match');
            $('#error-div').fadeIn(100);

        }

        
    });

});