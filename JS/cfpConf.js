$(document).ready(function(){

    $(document).on('click','#insert-section-btn',function(e){
        e.preventDefault();
        $('.overlay').fadeIn(100,function(){
            $('.addSection').fadeIn(100);
        });
      
    });

    $(document).on('click','.overlay, #close-insertion',function(e){
        e.preventDefault();
        $('.addSection').fadeOut(100,function(){
            $('.overlay').fadeOut(100);
        });
    });

    $(document).on('submit','#add-section-form', function(e){
        e.preventDefault();

        var dataSearch = new FormData(this);

        $.ajax({

            type: "POST",
            url: "../conf_cfp/addNewDesc.php",
            processData: false,
            contentType: false,
            data: dataSearch, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
            	obj = jQuery.parseJSON(d);
                if(obj.status == 1){
                    $('#success-insert').html('<span>Insertion success ... page will reaload in 3 second</span>');
                    $('#success-insert').fadeIn(100);
                    var interval = setInterval(function(){
                        window.location.reload();
                    },3000);
                }
            },
            error: function (xhr, status, error) {                        
                alert('Your form was not sent successfully.'); 
                console.error(error); 
            } 
        });
    });

   
});