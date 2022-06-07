/*--------------------- Copyright (c) 2020 -----------------------
[Javascript]
Project: Cloner100k 
*/
(function ($) {
    "use strict";
    /*-----------------------------------------------------
        Function  Start
    -----------------------------------------------------*/
    var Cloner100k = {
        initialised: false,
        version: 1.0,
        mobile: false,
        init: function () {
            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }
            /*-----------------------------------------------------
                Function Calling
            -----------------------------------------------------*/
            this.preLoader();
            this.topButton();
        },
        /*-----------------------------------------------------
            Fix Preloader
        -----------------------------------------------------*/
        preLoader: function () {
            $(window).on('load', function () {
                $(".preloader_wrapper").removeClass('preloader_active');
            });
            jQuery(window).on('load', function () {
                setTimeout(function () {
                    jQuery('.preloader_open').addClass('loaded');
                }, 100);
            });
        },
        /*-----------------------------------------------------
            Fix GoToTopButton
        -----------------------------------------------------*/
        topButton: function () {
            var scrollTop = $("#scroll");
            $(window).on('scroll', function () {
                if ($(this).scrollTop() < 150) {
                    scrollTop.removeClass("active");
                } else {
                    scrollTop.addClass("active");
                }
            });
            $('#scroll').click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 1500);
                return false;
            });

            $(function() {
                $('.go_to_demo').click (function() {
                    $('html, body').animate({scrollTop: $('#go_to_demo').offset().top }, 'slow');
                    return false;
                });
            });
        },
    }
    Cloner100k.init();
})(jQuery);

$(document).ready(function(){
    $(document).on('click','.pf_toggle',function(){
        $(this).closest('.pf_headerMain').toggleClass('pf_menu_open');
    })

    $(document).on('click',function(e){
        let thiss = $(e.target);
        if(!thiss.closest('.pf_menu_wrapper').length && !thiss.closest('.pf_toggle').length){
            $('.pf_headerMain').removeClass('pf_menu_open');
        }
    })
    $(document).on('click','.close',function(){
        $('.notificationPopup').addClass('d-none');
    })
})

// login js
function loginSection(){
    var email = $.trim($('#em').val());
    var pwd = $.trim($('#pwd').val());
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(email == ''){
        showNotifications('error','Please enter your email.');
        if(email == ''){ $("#em").focus();}
    }else if(!regex.test(email)){
        showNotifications('error','Please enter a valid email.');
        if(email == ''){ $("#em").focus();}
    }else if(pwd == ''){
        showNotifications('error','Please enter password.');
        
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
                    showNotifications('error','We can\'t find your email.');
                else if(e == 1)
                    showNotifications('error','Your password doesn\'t match with our records.');
                else if(e == 2)
                    showNotifications('error','Your account is InActive. Please, contact support.');
                else if(e == 3)
                    showNotifications('error','Your account is Blocked. Please, contact support.');
                else if( e == 5 ) {
                    showNotifications('success','Welcome, you logged in successfully.');
                    setTimeout(function(){
                        window.location = baseurl+'home/checkLoginUser';
                    },3000);
                }
                else
                    showNotifications('error','Something went wrong. Please, refresh the page and try again.');
            }
        });
    }
    
}

// Sign Up js
function signupSection(){
    var uname = $.trim($('#nm').val());
    var email = $.trim($('#em').val());
    var pwd = $.trim($('#pwd').val());
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(uname == ''){
        showNotifications('error','Please enter your name.');
        if(uname == ''){ $("#nm").focus();}
    }else if(email == ''){
        showNotifications('error','Please enter your email.');
        if(email == ''){ $("#em").focus();}
    }else if(!regex.test(email)){
        showNotifications('error','Please enter a valid email.');
        if(email == ''){ $("#em").focus();}
    }else if(pwd == ''){
        showNotifications('error','Please enter password.');
        if(pwd == ''){ $("#pwd").focus();}
    }else{
        let formdata = {};
        formdata.nm = uname;
        formdata.em = email;
        formdata.pwd = pwd;

        $.ajax({
            url: baseurl + 'authenticate/signup', 
            type: "POST",             
            data: formdata,      
            success: function(e) {
                if(e == 2){
                    showNotifications('success','Thank you for buying access to Payola. We have just updated your account password.');
                    setTimeout(function(){
                        window.location = baseurl+'home';
                    },3000);
                }
                else if( e == 5 ) {
                    showNotifications('success','Welcome, you signed up successfully.');
                    setTimeout(function(){
                        window.location = baseurl+'home';
                    },3000);
                }
                else
                    showNotifications('error','Something went wrong. Please, refresh the page and try again.');
            }
        });
    }
    
}


// Forgot Password
function forgotSection(){
    var email = $.trim($('#em').val());
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(email == ''){
        showNotifications('error','Please enter your email.');
        if(email == ''){ $("#em").focus();}
    }else if(!regex.test(email)){
        showNotifications('error','Please enter a valid email.');
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
                    showNotifications('error','We can\'t find your email.');
                else if(e == 2)
                    showNotifications('error','Your account is InActive. Please, contact support.');
                else if(e == 3)
                    showNotifications('error','Your account is Blocked. Please, contact support.');
                else if( e == 5 ) {
                    showNotifications('success','Check your email for the new password.');
                    setTimeout(function(){
                        window.location = baseurl;
                    },3000);
                }
                else
                    showNotifications('error','Something went wrong. Please, refresh the page and try again.');
            }
        });
    }
    
}

function showNotifications(type, message){
    $('.notificationPopup').removeClass('success');
    $('.notificationPopup').removeClass('error');
    let img = baseurl+'assets/frontend/images/svg/'+type+'.svg';
    $('.noti_icon img').attr('src',img);
    if( type == 'success' )
        $('.noti_heading').text('Congratulations!');
    else
        $('.noti_heading').text('Oops!');
    $('.noti_pera').text(message);
    $('.notificationPopup').removeClass('d-none');
    $('.notificationPopup').addClass(type);
}

function showVideo(videolink){
    var iframe = '';
    if( videolink.indexOf("you") > 0 ){
        let videoIdArray = videolink.split("?v=");
        let videoId = '';
        if( videoIdArray.length == 2 )
            videoId = videoIdArray[1];
        else{
            let videoIdArray = videolink.split("/");
            videoId = videoIdArray[videoIdArray.length - 1];
        }
        iframe = '<iframe width="418" height="230" src="https://www.youtube.com/embed/'+videoId+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
    else if( videolink.indexOf("vime") > 0 ){
        let videoIdArray = videolink.split("/");
        let videoId = videoIdArray[videoIdArray.length - 1];
        iframe = '<iframe src="https://player.vimeo.com/video/'+videoId+'?autoplay=1" width="418" height="230" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
    }
    $('.placeIframe').html(iframe);
    $("#VideoPopup").modal('show');
}