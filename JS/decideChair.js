$(document).ready(function(){

    $(document).on('submit','#decide-form',function(e){
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({

			type: "POST",
            url: "../decide_chair/decide.php",
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
                   console.log('hello');
                } 
            },
            error: function (xhr, status, error) {                        
                alert('Your form was not sent successfully.'); 
                console.error(error); 
            } 

		});
    });
});