$(document).ready(function(){

    function uniqId() {
        return Math.round(new Date().getTime() + (Math.random() * 100));
    }
      

    $(document).on('submit','#sheet-form', function(e){
        e.preventDefault();
        var data = new FormData(this);

        console.log(data);
        var action = 'submit_paper';

        /*var file_data = $('#paper').prop('files')[0];
        data.append('file', file_data);*/

        $.ajax({

			type: "POST",
            url: "../submit_paper/submit.php",
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
                if(obj.response == 1){
                    window.location.href = "../select_role";
                }

                

            },
            error: function (xhr, status, error) {                        
                alert('Your form was not sent successfully.'); 
                console.error(error); 
            } 

		});
    });


    $(document).on('click','#insert-author',function(e){

        var id = uniqId();
        e.preventDefault();
        var htmlAuth = `<div class="content-box mb-2" style="width: 50%;" id="${id}">
        <div class="row">
            <div class="col-md-12 mb-2">
                <input class="form-control" name="fname[]" id="fname" placeholder="First Name" required/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <input class="form-control" name="lname[]" id="lname" placeholder="Last Name" required/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <input class="form-control" name="email[]" id="email" placeholder="E-mail" required/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <select class="form-control" name="author-country[]" required>
                    <option vlaue="">Select Country</option>
                    <option vlaue="JO">Jordan</option>
                    <option vlaue="US">United States</option>
                    <option vlaue="KSA">Saudi Arabia</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <input class="form-control" name="affiliation[]" id="affiliation" placeholder="affiliation" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <input class="form-control" name="webpage[]" id="webpage" placeholder="Webpage" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2 center">
                <button class="btn btn-danger" data-id="${id}" name="remove-author">Remove</button>
            </div>
        </div>
    </div>`;
        $(htmlAuth).appendTo('.autors-div').slideDown(500);
    });

    $(document).on('click','button[name=remove-author]',function(e){
        e.preventDefault();
        var divId = $(this).attr('data-id');

        $('#'+divId).slideUp(300,function(){
            $('#'+divId).remove();
        });
        
    });

    
});