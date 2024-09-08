$(document).ready(function(){
   
    $(document).on('submit','#cfp-create',function(e){
        e.preventDefault();

        data = new FormData(this);
        //console.log(data);

        var action = '';

        $.ajax({

			type: "POST",
            url: "../create_cfp/create.php",
            processData: false,
            contentType: false,
            data: data, 
            cache: false,
            async : false,
            beforeSend : function(){
                $('#topic-submit').addClass('disabled');
            },
            success : function(d){

                $('#topic-submit').removeClass('disabled');
            	var obj = jQuery.parseJSON(d);
                if(obj.status == 1){
                    $('#success-msg').html('Your Insertion saved successfuly, Window will reload in 3 seconds');
                    $('.success-div').fadeIn(100);
                    interval = setInterval(function(){
                        window.location.reload();
                        clearInterval(interval); 
                    },3000);
                }
                
                
            }

		});

    });


    $(document).on('click','#addT',function(e){
        e.preventDefault();
        var topicSec = `<div class="row">
            <div class="col-md-12 mb-2">
                <input class="form-control" name="topics[]" input-id="topics" placeholder="Topic"/>
            </div>
            </div>`;
        $('#topic-div').append(topicSec);
    });

    $(document).on('click','#addD',function(e){
        e.preventDefault();
        var topicSec = `<hr><div class="row">
            <div class="col-md-12 mb-2">
                <input class="form-control" name="section-title[]" input-id="topics" id="section-title" placeholder="Section Title" />
            </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <textarea class="form-control disabled" style="height: 185px;" name="desc-area[]" input-id="topics" id="desc-area" placeholder="Description" ></textarea>
                </div>
            </div>`;
        $('#desc-div').append(topicSec);
    });
});