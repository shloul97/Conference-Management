$(document).ready(function(){

    /*   Page name to redirect   */
    var page = $('#page_name').val();
    localStorage.setItem('page_name',page);

    $(document).on('click','.list-group-item-action',function(e){
        e.preventDefault();
    });

    $(document).on('click','a[name=login-btn]',function(){
        var action = $(this).attr('id');

        if(action == 'login-act'){
            localStorage.setItem('login-action','login');
            window.location.href = '../account';
        }
        if(action == 'signUp-act'){
            localStorage.setItem('login-action','signUp');
            window.location.href = '../account';
        }
        
    });

   



});