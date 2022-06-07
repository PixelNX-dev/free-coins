/*--------------------- Copyright (c) 2022 -----------------------
[Javascript]
Project: FreeCoin 
*/
(function ($) {
    "use strict";
    /*-----------------------------------------------------
        Function  Start
    -----------------------------------------------------*/
    var FreeCoin = {
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
            this.Scrollbar_window();
            this.bannerUpload();
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
        /*if no Webkit browser*/
        Scrollbar_window: function(){
            let isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
            let isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
            let scrollbarDiv = document.querySelector('.theme_scrollbar');
            if (!isChrome && !isSafari) {
               // scrollbarDiv.innerHTML = 'You need Webkit browser to run this code';
            }
        },
        bannerUpload: function(){
            if ( $('.pfb_fileInpute').length > 0 ) {
                var _URL = window.URL || window.webkitURL;
                $(".pfb_fileInpute").change(function (e) {
                    var file, img;
                    if ((file = this.files[0])) {
                        let typee = file.type;
                        let nm = $(this).attr('name');
                        if( typee.indexOf("image") > -1 ) {
                            $(this).parent().find('span').text("Uploaded");
                            $(this).parent().find('.pfb_uploadeImage_text').text(file.name);
                            $(this).parent().find('#hidden_'+nm).val(file.name);
                        }
                        else{
                            showNotifications('error','Please, upload only images.');
                            $(this).parent().find('span').text("Upload Banner");
                            $(this).parent().find('.pfb_uploadeImage_text').text("");
                            $(this).parent().find('#hidden_'+nm).val("");
                        }
                    }
                });
            }
        }
    }
    FreeCoin.init();
})(jQuery);

// profile dorpdown
$(document).on('click','.pfb_userWrapper',function(){
    //alert('Enter');
    $(this).find('.pfb_profileDropdown').slideToggle();
})
// body click
$(document).on('click', function(e){
    if(!$(e.target).closest('.pfb_userWrapper').length){
    $('.pfb_profileDropdown').slideUp()
    }
})

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
    
    // colorpicker
    $('.pfb_colorFeild input').colorpicker();

    $(document).on('change','.pfb_colorFeild input',function(){
        var colorval = $(this).val()
        $(this).closest('.pfb_colorFeild').find('span').css('background-color',colorval)
    })

    $(document).on('click','.close',function(){
        $('.notificationPopup').addClass('d-none');
    })

    $(document).on('keyup','input[name="w_logotext"]',function(){
        $('.pfb_logoPrev').text($.trim($(this).val()));
    });
    
    $(document).on('change','select[name="w_logofont"]',function(){
        $('.pfb_logoPrev').css('font-family',$.trim($(this).val()));
    });

    $(document).on('change','input[name="webniche[]"]',function(){
        let len = $('input[name="webniche[]"]:checked').length;
        $('.selectedNicheText').text(len + ' Categories Selected.');
    });
    

    $(document).on('change','input[name="w_logourl"],input[name="w_faviconurl"]',function(){
        var parentElem = $(this).parents('div[class="pfb_upload"]').children('.pfb_uploadIcon');
        parentElem.addClass('loading_logo');
        var err=0;
        if( $(this)[0].files.length != 0 ){
            let imgsize = $(this)[0].files[0].size;
            if( imgsize > 999999 ){  // 1 byte less than 1 MB
                err++;
                showNotifications('error','Please, upload an image less than or equal to 1 MB.');
            }
            else{
                let imgName = $(this)[0].files[0].name;
                let imgExt = imgName.split('.').pop().toLowerCase();
                if( imgExt != 'jpg' && imgExt != 'jpeg' && imgExt != 'png' && imgExt != 'ico'){
                    err++;
                    showNotifications('error','Image should be in jpg ,jpeg or png format.');
                }
                if( err == 0 ){
                    parentElem.removeClass('loading_logo');
                    parentElem.addClass('checked_logo');
                }
                else{
                    setTimeout(function(){ parentElem.removeClass('loading_logo'); }, 2000);
                }
            }
        }
        else
            parentElem.removeClass('checked_logo');
    });

    $(document).on('click','.fas',function(){
        var d = $(this).data('count');
        var id = $(this).data('prodid');
        $("i[data-prodid="+id+"]").removeClass('pf_active');
        for( var i=1; i < 6 ; i++ ){
            if( i < d || i == d )
                $("i[data-prodid="+id+"][data-count="+i+"]").addClass('pf_active');
        }
        $('#star_'+id).val(d);
    });

    $(document).on('change','.prodCheckbox',function(){
        let elem = $(this).attr('name');
        let len = $('input[name="'+elem+'"]:checked').length;
        let frontwebid = $(this).data('frontwebid');
        $('#prodCounter_'+frontwebid).text(len);
    });


})

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

async function uploadMerch(){
    let myPromise = new Promise(function(resolve) {
        let myForm = document.getElementById('merchUploadForm');
        var obj = new FormData(myForm);
        $.ajax({
            url: baseurl + 'home/merchUpload', 
            type: "POST",             
            data: obj,
            contentType: false,
            cache: false,
            processData:false,  
            success: function(e) {
                resolve(e);
            }
        });
    });
    const x = await myPromise;
    return x;
}

function saveProfile(){
    let u_name = $.trim($('#u_name').val());
    if(u_name != ''){
       $.ajax({
          url: baseurl + 'home/profile', 
          type: "POST",             
          data: {'u_name':u_name,'pwd':$('#pwd').val()},
          success: function(e) {
              if(e == 1)
                showNotifications('success','Profile updated successfully.');
              else
              showNotifications('error','Something went wrong. Please, refresh the page and try again.');
 
             setTimeout(function(){ location.reload(); }, 3000);
          }
        });
    }else
    showNotifications('error','Please enter the name.')
 }
 
 function openConfirmPopup(){
     var sitename = $.trim($('input[name="w_sitename"]').val());
     var w_firstname = $.trim($('input[name="w_firstname"]').val());
     if( sitename != '' && w_firstname != "" ){
        var regexp = new RegExp(/^[a-z0-9 ]*$/);
        if( regexp.test(sitename) ){
            $.ajax({
                url: baseurl + 'home/checksitename', 
                type: "POST",             
                data: {'sitename':sitename,'webid':$('input[name="w_id"]').val()},
                success: function(e) {
                    if(e == 0)
                        showNotifications('error','Please, enter different site name. Someone is already using this name.');
                    else{
                        $('#showsitename').html('You want to use the URL '+baseurl+'n/'+sitename.toLowerCase()+' ?<br/>This cannot be changed.');
                        $('#setupsiteurl').attr('onclick',"submitSetupWebsite()");
                        $("#conformPopup").modal('show');
                        $('input[name="w_id"]').val(e)
                    }
                }
            });
        }
        else
            showNotifications('error','Site URL can have letters (a-z) and numbers (0-9) only.');
     }
     else
        showNotifications('error','You can\'t leave Your Name field empty.');
 }

 function submitSetupWebsite(step=1){
        let myForm = document.getElementById('setupUploadForm');
        var obj = new FormData(myForm);
        $.ajax({
        url: baseurl + 'home/submitSetupWebsite', 
        type: "POST",             
        data: obj,
        contentType: false,
        cache: false,
        processData:false,  
        success: function(e) {
            if( e == 1 ){
                if(step == 1){
                    showNotifications('success','Basic settings saved successfully.');
                    setTimeout(function(){  window.location.href = baseurl + "home/choose_categories/"+$('input[name="w_id"]').val(); }, 2000);
                }
            }
            else{
                showNotifications('error',e);
            }
        }
        });
 }


 function submitSelectedNiches(webId){
    let len = $('input[name="webniche[]"]:checked').length;
    if( len == 5 ){
        var webniche = new Array();
        $('input[name="webniche[]"]:checked').each(function() {
            webniche.push($(this).val());
        });

        $.ajax({
            url: baseurl + 'home/choose_categories/' + webId, 
            type: "POST",             
            data: {'niches':webniche},
            success: function(e) {
                if(e == 1){
                    showNotifications('success','Categories got saved successfully.');
                    setTimeout(function(){  window.location.href = baseurl + "home/mysites/"; }, 2000);
                }
                else
                    showNotifications('error','Something, went wrong.');
            }
        });
    }
    else
        showNotifications('error','Please select 5 categories only.');
 }


 function submitSelectedProducts(webId){
    var webprod = new Array();
    var starObj = {};
    var afflinks = {};
    $('.prodCheckbox:checked').each(function() {
        let pid = $(this).val();
        webprod.push($(this).data('frontwebid')+'|'+pid+'|'+$(this).data('nicheid'));
        starObj[pid] = $('#star_'+pid).val();
        afflinks[pid] = $('#afflink_'+pid).val();
    });

    $.ajax({
        url: baseurl + 'home/choose_product/' + webId, 
        type: "POST",             
        data: {'prods':webprod,'stars':starObj,'links':afflinks},
        success: function(e) {
            if(e == 1){
                showNotifications('success','Thank you for choosing the products.');
                setTimeout(function(){  window.location.href = baseurl + "home/top_product/"+webId; }, 2000);
            }
            else
                showNotifications('error','Something, went wrong.');
        }
    });
 }

function getOtherNicheProducts(nicheId,fId){
    $.ajax({
        url: baseurl + 'home/getOtherNicheProducts/' + nicheId, 
        type: "POST",             
        data: {},
        success: function(e) {
            if(e == 0)
                showNotifications('error','Something, went wrong.');
            else{
                var obj = JSON.parse(e);
                if( obj.length == 0 )
                    showNotifications('error','There are no other products apart from the selected one.');
                else{
                    $('#f_topprod_'+nicheId+'_'+fId).val(obj[0].p_name);
                    if( obj[0].p_affiliatenetwork == 'cb' ){
                        let w_cbname = $('#w_cbname').val();
                        let str = obj[0].p_affiliatelink;
                        $('#f_topafflink_'+nicheId+'_'+fId).val(str.replace("zzzzz", w_cbname));
                        $('#affLinkText_'+nicheId+'_'+fId).html('Here is your ClickBank Affiliate Link.');
                    }
                    else if( obj[0].p_affiliatenetwork == 'w' ){
                        $('#f_topafflink_'+nicheId+'_'+fId).val('');
                        $('#affLinkText_'+nicheId+'_'+fId).html('Get your affiliate link from the <a href="'+obj[0].p_affiliatepage+'" target="_blank" class="pfb_link">Affiliate page</a>.');
                    }
                    else{
                        $('#f_topafflink_'+nicheId+'_'+fId).val('');
                        $('#affLinkText_'+nicheId+'_'+fId).html('Get your affiliate link from the <a href="'+obj[0].p_affiliatepage+'" target="_blank" class="pfb_link">Affiliate page</a> .');
                    }
                    $('#f_topdesc_'+nicheId+'_'+fId).val(obj[0].p_description);
                    $('#f_topytlink_'+nicheId+'_'+fId).val(obj[0].p_videolink);
                    //$('#ytlinktext_'+nicheId+'_'+fId).html('<a href="'+obj[0].p_videolink+'" target="_blank">Preview Video</a>' );
                }
            }
        }
    });
}

function showImage(_this){
    let imgSrc = $(_this).data("src");
    let imgSize = $(_this).data("size");
    $('.pf_iframe').html("<img src='"+imgSrc+"'>");
    $("#VideoPopup").removeClass("pfb_rectangleImg pfb_squareImg");
    if( imgSize == 300 )
        $("#VideoPopup").addClass("pfb_squareImg");
    else
        $("#VideoPopup").addClass("pfb_rectangleImg");
    $("#VideoPopup").modal('show');
}


 function submitTopProduct(webId){
    var tpArr = {};
    $('.tpProds').each(function() {
        tpArr[$(this).attr('id')] = $(this).val();
    });

    $.ajax({
        url: baseurl + 'home/top_product/' + webId, 
        type: "POST",             
        data: {'tpprod':tpArr},
        success: function(e) {
            if(e == 1){
                showNotifications('success','Thank you for the top product selections.');
                setTimeout(function(){  window.location.href = baseurl + "home/set_sidebar/"+webId; }, 2000);
            }
            else
                showNotifications('error','Something, went wrong.');
        }
    });
 }

 function submitFinalSteps(webId){
    var lBanners = {};
    var sBanners = {};
    let lb_count = 0;
    let sb_count = 0;
    $('.nicheCls').each(function(){
        let nicheId = ($(this).attr('id')).split("_")[1]
        let lbCheck = 0;
        $('.largeBanners_'+nicheId+':checked').each(function() {
            lbCheck++;
                lBanners[nicheId+"_"+lbCheck] = $('input[name="'+$(this).attr('id')+'"]').val() + "_|local|_" + $(this).val();
                lb_count++;
            if( lbCheck == 2 )
                lbCheck = 0;
        });
        let sbCheck = 0;
        $('.smallBanners_'+nicheId+':checked').each(function() {
            sbCheck++;
            sBanners[nicheId+"_"+sbCheck] = $('input[name="'+$(this).attr('id')+'"]').val() + "_|local|_" + $(this).val();
            sb_count++;
            if( sbCheck == 2 )
                sbCheck = 0;
        });
    });

    //if( lb_count == 10 )
    if( lb_count < 1 )
        showNotifications('error','Please, choose any two for 728 x 90 Banner Ads each Niche.');
    //else if( sb_count == 10 )
    else if( sb_count < 1 )
        showNotifications('error','Please, choose any two for 300 x 325 Banner Ads for each Niche.');
    else {
        $.ajax({
            url: baseurl + 'home/choose_banners/' + webId, 
            type: "POST",             
            data: {'lBanners':JSON.stringify(lBanners),'sBanners':JSON.stringify(sBanners)},
            success: function(e) {
                if(e == 1){
                    showNotifications('success','Congratulations your website is ready.');
                    setTimeout(function(){  window.location.href = baseurl + "home/mysites/"; }, 2000);
                }
                else
                    showNotifications('error','Something, went wrong.');
            }
        });
    }
 }


 function submitSocialLists(webId){
    var sidebarFields = {};
    $('.sidebarFields').each(function(){
        sidebarFields[$(this).attr('id')] = $(this).val();
    });

    $.ajax({
        url: baseurl + 'home/social_lists/' + webId, 
        type: "POST",             
        data: {'sidebarFields':sidebarFields},
        success: function(e) {
            if(e == 1){
                showNotifications('success','Congratulations Social & Lists Option saved successfully.');
                setTimeout(function(){  window.location.href = baseurl + "home/mysites/"; }, 2000);
            }
            else
                showNotifications('error','Something, went wrong.');
        }
    });
       
 }

 function submitCustomBanners(webId){
    let cb_count = 0;
    let err = 0;
    $('.customBanners:checked').each(function() {
        cb_count++;
        let nid = ($(this).attr('id')).split("_")[1];
        $('.ideas_'+nid).each(function(){
            var nm = $(this).attr('name');
            if( nm.indexOf("image") > 0 ){
                if( $.trim($("#hidden_"+nm).val()) == "" )
                    err++;
            }
            else{
                if( $.trim($(this).val()) == "" )
                    err++;
            }            
        });
    });
    if( cb_count == 0 )
        showNotifications('error','Select atleast one crypto banner.');
    else if( err != 0 )
        showNotifications('error','Every field is important if you have chosen the category.');
    else {
        let myForm = document.getElementById('CustomBannerUploadForm');
        var obj = new FormData(myForm);
        $.ajax({
        url: baseurl + 'home/custom_banners/'+webId, 
        type: "POST",             
        data: obj,
        contentType: false,
        cache: false,
        processData:false,  
        success: function(e) {
            if( e == 1 )
                showNotifications('success','Crypto banner settings saved successfully.');
            else
                showNotifications('error',e);
        }
        });
    }
}

function publishArticle(_this,articleId,nicheId){
    $.ajax({
        url: baseurl + 'home/publish_edit/' + $('#webid').val(), 
        type: "POST",             
        data: {'articleId':articleId,'nicheId':nicheId,'col':$(_this).data('col')},
        success: function(e) {
            $("#publishedPopup").modal('hide');
            if(e == 1){
                showNotifications('success','Article published successfully.');
                setTimeout(function(){ location.reload(); }, 3000);
            }
            else if(e == 2)
                showNotifications('error','You have already published an article today. Please, try again tomorrow.');
            else                    
                showNotifications('error','Something went wrong, please try again.');
        }
    });
}

function editContent(webart_id){
    $.ajax({
        url: baseurl + 'home/publish_edit/'+$('#webid').val(), 
        type: "POST",             
        data: {'webart_id' : webart_id},
        success: function(e) {
            if( e == 0 )
                showNotifications('error','Something went wrong. Please, reload the page and try again.');
            else
            {
                var obj = JSON.parse(e);
                $('#artId').val(webart_id);
                tinymce.get("editContentArea").setContent(obj.webart_blog);
                $('#editTitleArea').val(obj.webart_title);
                $('#EditPopup').modal('show');
            }
        }
    });
}

function updateContent(){
    var webart_blog = tinymce.get("editContentArea").getContent();
    var webart_title = $('#editTitleArea').val();
    if( webart_blog != "" && webart_title != "" ){
        $.ajax({
            url: baseurl + 'home/publish_edit/'+$('#webid').val(), 
            type: "POST",             
            data: {'webart_id' : $('#artId').val(),'webart_blog' : webart_blog,'webart_title': webart_title},
            success: function(e) {
                if( e == 0 )
                    showNotifications('error','Something went wrong. Please, reload the page and try again.');
                else
                {
                    $('#EditPopup').modal('hide');
                    showNotifications('success','Article updated successfully.');
                    setTimeout(function(){ location.reload(); }, 3000);
                }
            }
        });
    }
    else
    {
        showNotifications('error','You can\'t leave title or article empty.');
    }
}