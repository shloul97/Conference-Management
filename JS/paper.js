$(document).ready(function(){

    $(document).on('click','#show-review-form',function(e){

        $('#pc-form').slideToggle(300);
        $('#slider-arrow').toggleClass('fa-arrow-down fa-arrow-up');
    });

    $(document).on('click','#show-reviewed',function(e){

        $('#review-div').slideToggle(300);
        $('#slider-arrow-review').toggleClass('fa-arrow-down fa-arrow-up');
    });

    $(document).on('submit','#pc-form', function(e){
        e.preventDefault();
        var data = new FormData(this);
        

        console.log(data);
        

        /*var file_data = $('#paper').prop('files')[0];
        data.append('file', file_data);*/

        $.ajax({

			type: "POST",
            url: "../paper/submitReview.php",
            processData: false,
            contentType: false,
            data: data, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                console.log(obj);
                if(obj.status == 1){
                    $('#pc-form').slideUp(300);
                    $('#slider-arrow').removeClass('fa-arrow-up');
                    $('#slider-arrow').addClass('fa-arrow-down');
                    var interval = setInterval(function(){
                        window.location.reload();
                        clearInterval(interval);
                    },1000)
                } 
            },
            error: function (xhr, status, error) {                        
                alert('Your form was not sent successfully.'); 
                console.error(error); 
            } 

		});
    });

});