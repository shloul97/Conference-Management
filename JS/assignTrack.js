$(document).ready(function(){

    $.ajax({

        type: "POST",
        url: "../assi_track/getTracks.php",
        data: null, 
        cache: false,
        async : false,
        beforeSend : function(){
           
        },
        success : function(d){
            var obj = jQuery.parseJSON(d);
            //console.log(obj);
            if(obj[0].status == 1){
                var htmlT = '';
                htmlT += `<div class="row">
                <div class="col-md-12 mb-3">
                    <b>Tracks exists:</b>
                </div>
            </div>`;
                for(var i = 1; i < obj.length;i++){
                    if(obj[i].track_status == 1){
                        htmlT += 
                        `
                        <div class="row">
                            <div class="col-md-10 mb-2">
                                <input class="form-control read-input" type="text" data-id="${obj[i].track_id}" name="section-title" id="section-title"  value="${obj[i].track_name}" readonly/>
                                
                            </div>
                            <div class="col-md-2 mb-2">
                                <span><button class="btn btn-danger" name="delete-btn" data-id="${obj[i].track_id}">Deactive</button></span>
                            </div>
                        </div>`;
                    }
                    else{
                        htmlT += 
                        `
                        <div class="row">
                            <div class="col-md-10 mb-2">
                                <input class="form-control read-input-disable" type="text" data-id="${obj[i].track_id}" name="section-title" id="section-title"  value="${obj[i].track_name} (This track not showing to users)" readonly/>
                                
                            </div>
                            <div class="col-md-2 mb-2">
                                <span><button class="btn btn-success" name="reactive-btn" data-id="${obj[i].track_id}">Reactive</button></span>
                            </div>
                        </div>`;
                    }
                    
                }
                $('.track-in-div').html(htmlT);
                $('.track-in-div').fadeIn(200);
            }
        }

    });

    $(document).on('click','button[name=delete-btn]',function(e){
        e.preventDefault();

        var button = $(this);

        var trackId = $(this).attr('data-id');

        var inputData = $('input[data-id='+trackId+']').val();
        inputData += ' (This track not showing to users)';

        var action = 'delete';
        $.ajax({

            type: "POST",
            url: "../assi_track/deleteT.php",
            data: {action: action, track_id : trackId}, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
                var obj = jQuery.parseJSON(d);
                //console.log(obj);
                if(obj.status == 1){
                    button.toggleClass('btn-danger btn-success');
                    button.html('Reactive');
                    
                    $('input[data-id='+trackId+']').val(inputData);
                    $('input[data-id='+trackId+']').toggleClass('read-input read-input-disable');
                }
            }
    
        });

    });

    $(document).on('click','button[name=reactive-btn]',function(e){
        e.preventDefault();

        var button = $(this);

        var trackId = $(this).attr('data-id');

        var inputData = $('input[data-id='+trackId+']').val();
        inputData = ' (This track not showing to users)';

        var action = 'active';
        $.ajax({

            type: "POST",
            url: "../assi_track/deleteT.php",
            data: {action: action, track_id : trackId}, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
                var obj = jQuery.parseJSON(d);
                //console.log(obj);
                if(obj.status == 1){
                    button.toggleClass('btn-success btn-danger');
                    button.html('Deactive');

                    var inputData = $('input[data-id='+trackId+']').val();
                    inputData = inputData.replace(' (This track not showing to users)','');
                    
                    $('input[data-id='+trackId+']').val(inputData);
                    $('input[data-id='+trackId+']').toggleClass('read-input-disable read-input');
                }
            }
    
        });

    });

    $(document).on('keyup','input[input-id]',function(){
        if($(this).val() != ''){
            $('#track-ass-btn').removeClass('disabled');

        }
        else{
            $('#track-ass-btn').addClass('disabled');
        }
    });


    $(document).on('submit','#tracks-form',function(e){
        e.preventDefault();

        data= $(this).serialize();
        //console.log(data);

        var action = 'assignTracks';

        $.ajax({

			type: "POST",
            url: "../assi_track/assignT.php",
            data: {action : action, data : data}, 
            cache: false,
            async : false,
            beforeSend : function(){
                $('#track-ass-btn').addClass('btn-danger disabled');
            },
            success : function(d){
            	//var obj = jQuery.parseJSON(d);
                $('#success-msg').html('Your Insertion saved successfuly, Window will reload in 3 seconds');
                $('.success-div').fadeIn(100);
                interval = setInterval(function(){
                    window.location.reload();
                    clearInterval(interval); 
                },3000);
                
            }

		});

    });

    $(document).on('click','#addT',function(e){
        e.preventDefault();
        var trackSec = `<div class="row">
        <div class="col-md-12 mb-2">
            <input class="form-control" name="tracks[]" input-id="tracks" placeholder="Track"/>
            
        </div>
        </div>`;
        $('#tracks-div').append(trackSec);
    });
});