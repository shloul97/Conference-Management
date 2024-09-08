$(document).ready(function(){

    $(document).on('click','a[name=conf-details]',function(e){
        e.preventDefault();

        var confId = $(this).attr('data-id');

        $.ajax({

			type: "POST",
            url: "../tech_admin/details.php",
            data: {conf_id : confId}, 
            cache: false,
            async : false,
            success : function(d){
            	var obj = jQuery.parseJSON(d);
                if(obj.status == 1){
                    var htmlCont = `<div class="row mb-3" style="text-align: right; cursor: pointer;">
                    <i class="fa-solid fa-xmark fa-xl" style="color: #ff0000;" id="close-overlay"></i>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Conference Name</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.conf_name}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Acronym</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.acronym}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Start Date</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.start_date}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>End Date</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.end_date}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Submission Deadline</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.sub_deadline}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Max Submission</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.sub_count}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Location</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.country} , ${obj.city}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Conference Website</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.web_page}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Primary Area</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.primary_area}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Secondary Area</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.sec_area}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Organizer ID</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.user_id}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Created Date</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.created_date}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Organizer Phone</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.contact_phone}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h4>Conference Status</h4>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <p>${obj.status}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                        <button class="btn btn-warning" name="approve-btn" data-id="${obj.conf_id}">Approve</button>
                        </div>
                    </div>
                    `;

                    $('#conf_deta').html(htmlCont);

                    $('.overlay').fadeIn(100,function(){
                        $('#conf_deta').fadeIn(100);
                    })

                }
            }

		});
    });

    $(document).on('click','#close-overlay',function(){
        $('#conf_deta').fadeOut(100,function(){
            $('.overlay').fadeOut(100);
        })
    });

    $(document).on('click','button[name=approve-btn]',function(e){
        e.preventDefault();

        var action = 'approve';
        var confId = $(this).attr('data-id');
        var parentTd = $(this).closest('td');
        
        $.ajax({
            type: "POST",
            url: "../tech_admin/decide.php",
            data: {action : action , conf_id : confId}, 
            cache: false,
            async : false,
            success : function(d){ 
                //var obj = jQuery.parseJSON(d);
                var htmlApp = `<span style="color:#1b9600;"><i class="fa-solid fa-check"></i> Approved</span>`;
                parentTd.html(htmlApp);
                
            }
        });

    });

    $(document).on('click','button[name=reject-btn]',function(e){
        e.preventDefault();

        var action = 'reject';
        var confId = $(this).attr('data-id');
        var parentTd = $(this).closest('td');
        
        $.ajax({
            type: "POST",
            url: "../tech_admin/decide.php",
            data: {action : action , conf_id : confId}, 
            cache: false,
            async : false,
            success : function(d){ 
                //var obj = jQuery.parseJSON(d);
                var htmlApp = `<span style="color:#d81b05;"><i class="fa-solid fa-xmark"></i> Rejected</span>`;
                parentTd.html(htmlApp);
                
            }
        });

    });
});