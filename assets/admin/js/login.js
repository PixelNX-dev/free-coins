toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
// login js
function loginSection(){
    var email = $.trim($('#em').val());
    var pwd = $.trim($('#pwd').val());
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(email == ''){
        toastr.error('Please enter your email.');
        if(email == ''){ $("#em").focus();}
    }else if(!regex.test(email)){
        toastr.error('Please enter a valid email.');
        if(email == ''){ $("#em").focus();}
    }else if(pwd == ''){
        toastr.error('Please enter password.');
        
        if(pwd == ''){ $("#pwd").focus();}
    }else{
        let formdata = {};
        formdata.em = email;
        formdata.pwd = pwd;
        formdata.rem = $('#rememberme:checked').length;

        $.ajax({
            url: baseurl + 'authenticate/login', 
            type: "POST",             
            data: formdata,      
            success: function(e) {
                if(e == 0)
                    toastr.error('We can\'t find your email.');
                else if(e == 1)
                    toastr.error('Your password doesn\'t match with our records.');
                else if(e == 2)
                    toastr.error('Your account is InActive. Please, contact support.');
                else if(e == 3)
                    toastr.error('Your account is Blocked. Please, contact support.');
                else if( e == 5 ) {
                    toastr.success('Welcome, you logged in successfully.');
                    setTimeout(function(){
                        window.location = baseurl+'home/checkLoginUser';
                    },3000);
                }
                else
                    toastr.error('Something went wrong. Please, refresh the page and try again.');
            }
        });
    }
    
}

// Forgot Password
function forgotSection(){
    var email = $.trim($('#em').val());
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(email == ''){
        toastr.error('Please enter your email.');
        if(email == ''){ $("#em").focus();}
    }else if(!regex.test(email)){
        toastr.error('Please enter a valid email.');
        if(email == ''){ $("#em").focus();}
    }else{
        let formdata = {};
        formdata.em = email;
        $.ajax({
            url: baseurl + 'authenticate/forgotSection', 
            type: "POST",             
            data: formdata,      
            success: function(e) {
                if(e == 0)
                    toastr.error('We can\'t find your email.');
                else if(e == 2)
                    toastr.error('Your account is InActive. Please, contact support.');
                else if(e == 3)
                    toastr.error('Your account is Blocked. Please, contact support.');
                else if( e == 5 ) {
                    toastr.success('Check your email for the new password.');
                    setTimeout(function(){
                        window.location = baseurl;
                    },3000);
                }
                else
                    toastr.error('Something went wrong. Please, refresh the page and try again.');
            }
        });
    }
    
}

function removeMessage() {
    
    ($("#toast-container").is(".toast-error") || $("#toast-container").is(".toast-success")) && setTimeout(function() {
        $(".toast-message").text(""),
            $("#toast-container").removeClass("toast-error tost-success")
    }, 3e3)
}