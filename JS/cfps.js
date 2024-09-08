function getCfps(dataSearch = null){


    if(dataSearch == null){
        var action = 'all';
        var dataArr;

        $.ajax({
            type: "POST",
            url: "../cfp/getCfps.php",
            data: {action : action}, 
            cache: false,
            async : false,
            beforeSend: function() {
                
            },
            success: function(d){
                dataArr = jQuery.parseJSON(d);
                    
            },
            complete: function() {
                        
            }
        });

        return dataArr;
    }
    if(dataSearch.length != 0){

        $.ajax({

			type: "POST",
            url: "../cfp/getCfps.php",
            processData: false,
            contentType: false,
            data: dataSearch, 
            cache: false,
            async : false,
            beforeSend : function(){
               
            },
            success : function(d){
            	dataArr = jQuery.parseJSON(d);
            },
            error: function (xhr, status, error) {                        
                alert('Your form was not sent successfully.'); 
                console.error(error); 
            } 

		});

        return dataArr;

    }
    
}




$(document).ready(function(){

    //var cfp = jQuery.parseJSON(getCfps());
    
    var cfps = getCfps();
    
    //console.log(cfps);
    
    displayData(cfps);

    $(document).on('submit','#search-form',function(e){

        e.preventDefault();
        var data = new FormData(this);
        data.append('action' , 'search');
        cfps = getCfps(data);

        //console.log(cfps);
        displayData(cfps);
    });
    

    function displayData(cfp){

        htmlData = ``;
        if(cfp.length > 0){
            for(var i = 0; i< cfp.length; i++){
                cfpTopics = cfp[i]['topics']
                htmlData += `<tr>
                <td><a class="link" href="../conf_cfp?cfpId=${cfp[i]['cfp_id']}">${cfp[i]['acronym']}</a></td>
                <td>${cfp[i]['conf_name']} (${cfp[i]['acronym']})</td>
                <td>${cfp[i]['city']}, ${cfp[i]['country']}</td>
                <td>${cfp[i]['sub_deadline']}</td>
                <td>${cfp[i]['start_date']}</td>
                
                <td>`
                    if(cfpTopics.length != 0){
                        htmlData += `<div class="list-group">`;
        
                        for(var j = 0; j< cfpTopics.length;j++){
                            htmlData += `<a href="#" class="list-group-item list-group-item-action">${cfpTopics[j]}</a>`;
                        }
        
        
                        htmlData += `</div>`;
                    }
        
                htmlData += `</td>
                </tr>`;        
            }
        
            $('#table-cfp').html(htmlData);

        }
        else {
            htmlData += `<tr>`;
            htmlData += `<td colspan="6"><span>We're Sorry we can't find any result for your search</span></td>`;
            htmlData += `
                </tr>`; 

            $('#table-cfp').html(htmlData);
        }   
            
        
    
    }

    
});