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
$(document).ready(function(){

  // datatable
  if($('.ad_datatable_wrapper').length){
    let dataSrc = $('.ad_datatable_wrapper .ad_table').data('source');
    var adDatatable = $('.ad_datatable_wrapper .ad_table').DataTable({
        responsive: true,
        ajax: dataSrc
    });
    //datatable search
    $('.ad_datatableSearch').keyup(function(){
        adDatatable.search($(this).val()).draw() ;
    })
  }
  

  // profile dorpdown
  $(document).on('click','.ad_profile_wrapper',function(){
      $(this).find('.ad_profileDropdown').slideToggle()
  })

  // body click
  $(document).on('click', function(e){
      if(!$(e.target).closest('.ad_profile_wrapper').length){
         $('.ad_profileDropdown').slideUp()
      }
  })

  // toggle menu
  $(document).on('click','.ad_toggle', function(){
    $(this).closest('.admin_main_wrapper').toggleClass('ad_mainMenuOpen')
    $(this).closest('.admin_main_wrapper').removeClass('ad_submenuOpen')
  })
  $(document).on('click','.ad_main_menu>ul>li>a[href="#"]', function(){
     $(this).closest('.admin_main_wrapper').toggleClass('ad_submenuOpen')
  })

  $(document).on('click','.ad_plus',function(){
    let html = $('.repDiv').html();
    $('.parentDiv').append(html);
  });

  $(document).on('change','#imgfile',function(){
    if ( $(this).val() != '' )
      $(this).addClass('validate');
  });

})


function submitNiche(){
let tempArr = [];
let descArr = [];
let err = 0;
$('.nicheTitle').each(function(){
  if( $(this).val() != '' ){
    if( $(this).val().length < 21 )
      tempArr.push($(this).val());
    else{
      toastr.error('Category title should not be more than 20 Characters.');
      $(this).css('border-color','red');
      $(this).focus();
      err++;
    }
  }
});
$('.nicheDesc').each(function(){
  if( $(this).val() != '' ){
    descArr.push($(this).val());
  }
});
if( err == 0 ) {
  $.ajax({
    url: baseurl + 'admin/submitNiche', 
    type: "POST",             
    data: {'title':tempArr,'desc':descArr},      
    success: function(e) {
        if(e == 1)
            toastr.success('Category saved successfully.');
        else
            toastr.error('Something went wrong. Please, refresh the page and try again.');
          
        setTimeout(function(){  window.location.href = baseurl + "admin/categories"; }, 3000);
    }
  });
}
else{
  setTimeout(function(){ $('.nicheTitle').css('border-color',''); }, 5000);
}
}


function submitArticles(){
  var art_id = $('#art_id').val();
  var err = 0;
  let obj = {};
  
  $('.form-control').each(function(){
    var idd = $(this).attr('id');
    var v = $.trim($(this).val());
    if( v != '' )
      obj[idd] = v;
    else
      err++;
  });
  if( art_id == 0 )
    var str = 'Article added successfully';
  else
    var str = 'Article updated successfully';
 
  if( err != 0 ){
    toastr.error('You can\'t leave the fields empty.')
  }
  else{
    obj.art_id = art_id;
    
    $.ajax({
      url: baseurl + 'admin/articles/postreq', 
      type: "POST",             
      data: obj,      
      success: function(e) {
          if(e == 1)
              toastr.success(str);
          else
              toastr.error('Something went wrong. Please, refresh the page and try again.');
          
          setTimeout(function(){  window.location.href = baseurl + "admin/articles"; }, 3000);
      }
    });
  }
}


function submitNiche_com(){
  let tempArr = [];
  let err = 0;
  $('.nicheTitle').each(function(){
    if( $(this).val() != '' ){
      if( $(this).val().length < 21 )
        tempArr.push($(this).val());
      else{
        toastr.error('Sharing Niche title should not be more than 20 Characters.');
        $(this).css('border-color','red');
        $(this).focus();
        err++;
        
      }
    }
  });
  if( err == 0 ) {
    $.ajax({
      url: baseurl + 'admin/submitNicheCom', 
      type: "POST",             
      data: {'title':tempArr},      
      success: function(e) {
          if(e == 1)
              toastr.success('Sharing Niche saved successfully.');
          else
              toastr.error('Something went wrong. Please, refresh the page and try again.');
            
          setTimeout(function(){  window.location.href = baseurl + "admin/com_niche"; }, 3000);
      }
    });
  }
  else{
    setTimeout(function(){ $('.nicheTitle').css('border-color',''); }, 5000);
  }
  }

function validateAndSubmit(pageType){
var tempArr = {};
let err = 0;
$('.form-control').each(function(){
  let labelText = $(this).parents('div[class="form-group"]').children('label').text();
  let inputValue = $(this).val();
  let URLpattern = new RegExp('^(https?:\\/\\/)?((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&amp;a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$','i');
  $(this).css('border-color','');

  if( $(this).hasClass('validate') ) {
    if (err == 0) {
      if (inputValue == '') {
        toastr.error('Please, enter the ' + labelText + '.');
        $(this).css('border-color','red');
        $(this).focus();
        err++;
      }
    }

    if (err == 0) {
      if ($(this).data('maxlength') !== undefined) {
        if( inputValue.length > $(this).data('maxlength') ){
          let validLength = parseInt($(this).data('maxlength')) - 1;
          toastr.error(labelText + ' should not be more than '+ validLength +' Characters.');
          $(this).css('border-color','red');
          $(this).focus();
          err++;
        }
      }
    }

    if (err == 0) {
      if ($(this).data('minlength') !== undefined) {
        if( inputValue.length < $(this).data('minlength') ){
          let validLength = parseInt($(this).data('minlength'));
          toastr.error(labelText + ' should not be less than '+ validLength +' Characters.');
          $(this).css('border-color','red');
          $(this).focus();
          err++;
        }
      }
    }

    if (err == 0) {
      if ($(this).data('url') !== undefined) {
        if ( !URLpattern.test(inputValue) ) {
          toastr.error('Please, enter the valid URL for ' + labelText + '.');
          $(this).css('border-color','red');
          $(this).focus();
          err++;
        }
      }
    }

    if (err == 0) {
      if ($(this).data('isselect') !== undefined) {
        if ( inputValue == 0 ) {
          toastr.error('Please, choose valid option for ' + labelText + '.');
          $(this).css('border-color','red');
          $(this).focus();
          err++;
        }
      }
    }

    if (err == 0) {
      if ($(this).attr('type') == 'file') {
        if ( inputValue == '' ) {
          toastr.error('Please, upload an image for ' + labelText + '.');
          $(this).css('border-color','red');
          $(this).focus();
          err++;
        }
        else{
          let imgsize = $(this)[0].files[0].size;
          if( imgsize > 999999 )  // 1 byte less than 1 MB
          {
            toastr.error('Please, upload an image less than or equal to 1 MB for ' + labelText + '.');
            $(this).css('border-color','red');
            $(this).focus();
            err++;
          }
          else{
            let imgName = $(this)[0].files[0].name;
            let imgExt = imgName.split('.').pop().toLowerCase();
            if( imgExt != 'jpg' && imgExt != 'jpeg' && imgExt != 'png'){
              toastr.error(labelText+' should be in jpg ,jpeg or png format');
              $(this).css('border-color','red');
              $(this).focus();
              err++;
            }
          }
        }
      }
    }
  }
  
  tempArr[$(this).attr('name')] = $(this).val();

  if( $(this).is('input[type="radio"]') ){
    tempArr[$(this).attr('name')] = $('input[name="p_affiliatenetwork"]:checked').val();
  }
  if( err == 0 ){
    if( $(this).attr('name') == 'p_affiliatelink' ){
      if($('input[name="p_affiliatenetwork"]:checked').val() == 'cb'){
        if ( !URLpattern.test(inputValue) ) {
          toastr.error('Please, enter the valid URL for ' + labelText + '.');
          $(this).css('border-color','red');
          $(this).focus();
          err++;
        }
      }
      else
        tempArr[$(this).attr('name')] = $(this).val();
    }
  }
  
});
if( err == 0 ) {
  if( $('#uploadForm').length > 0 ){
    let myForm = document.getElementById('uploadForm');
    var obj = new FormData(myForm);
    $.ajax({
      url: baseurl + 'admin/submitCommonData', 
      type: "POST",             
      data: obj,
      contentType: false,
      cache: false,
      processData:false,  
      success: function(e) {
        handlingSubmitResponse(e);
      }
    });
  }
  else{
    var obj = {};
    obj.tempArr = tempArr;
    obj.pageType = pageType;
    obj.uniqeid = $('input[name="uniqeid"]').val();

    $.ajax({
      url: baseurl + 'admin/submitCommonData', 
      type: "POST",             
      data: obj, 
      success: function(e) {
          handlingSubmitResponse(e);
      }
    });
  }
}
}

function handlingSubmitResponse(e){
  if(e == 1){
    if( $('input[name="uniqeid"]').val() == 0 )
      toastr.success('Data saved successfully.');
    else
      toastr.success('Data updated successfully.');
  }
  else
    toastr.error(e);
  
  setTimeout(function(){ location.reload(); }, 3000);
}


function editData(id,type){
if( type == 'niche' || type == 'nichecom' ){
  let nicheTitle = $('#niche_'+id).text();
  let nicheDescription = $('#desc_'+id).text();
  var outputHtml = '<label class="ad_label">Niche</label><input type="text" value="'+nicheTitle+'" class="form-control" id="nicheTitle" /><label class="ad_label">Description</label><textarea class="form-control" id="nicheDescription" />'+nicheDescription+'</textarea>';
}
else if( type == 'questions' ){
  let quesTitle = $('#ques_'+id).text();
  var outputHtml = '<label class="ad_label">Questions</label><textarea class="form-control" id="quesTitle" />'+quesTitle+'</textarea>';
}
else if( type == 'answers' ){
  let ansTitle = $('#ans_'+id).text();
  var outputHtml = '<label class="ad_label">Answers</label><textarea class="form-control" id="ansTitle" />'+ansTitle+'</textarea>';
}
$('.editPopupBtn').attr('onclick',"updateData("+id+",'"+type+"')");
$('#editContent').html(outputHtml);
$('#editDataModal').modal('show');
}

function updateData(id,type){
var objData = {};
if( type == 'niche' ){
  var u = 'submitNiche';
  objData.id = id;
  objData.title = $('#nicheTitle').val();
  objData.desc = $('#nicheDescription').val();
}
else if( type == 'nichecom' ){
  var u = 'submitNicheCom';
  objData.id = id;
  objData.title = $('#nicheTitle').val();
}
else if( type == 'questions' ){
  var u = 'com_submitCommonData';
  objData.id = id;
  objData.pageType = 'question';
  objData.edittitle = $('#quesTitle').val();
}
else if( type == 'answers' ){
  var u = 'com_submitCommonData';
  objData.id = id;
  objData.pageType = 'answer';
  objData.edittitle = $('#ansTitle').val();
}

$.ajax({
  url: baseurl + 'admin/'+u, 
  type: "POST",             
  data: objData,
  success: function(e) {
      if(e == 1)
          toastr.success('Data updated successfully.');
      else
          toastr.error('Something went wrong. Please, refresh the page and try again.');
        
      setTimeout(function(){ location.reload(); }, 3000);
  }
});

$('#editDataModal').modal('hide');
}


function deleteData(id,type){
var conf = confirm("It will also delete all linked data. Do you really want to continue?");
if( conf == true ) {
  var objData = {};
  objData.deleteid = id;
  objData.delete = 'yes';
  objData.pageType = type;

  if( type == 'niche' )
    var u = 'submitNiche';
  else if( type == 'nichecom' )
    var u = 'submitNicheCom';
  else if( type == 'users' )
    var u = 'submitUserRecords';
  else if( type == 'questions' ){
    var u = 'com_submitCommonData';
    objData.pageType = 'question';
  }
  else if( type == 'answers' ){
    var u = 'com_submitCommonData';
    objData.pageType = 'answer';
  }
  else if( type == 'images' ){
    var u = 'images/postreq';
    objData.imagepath = $('#imgpath_'+id).attr('src');
  }
  else if( type == 'articles' ){
    var u = 'articles/postreq';
  }
  else
    var u = 'submitCommonData';

  $.ajax({
    url: baseurl + 'admin/'+u, 
    type: "POST",             
    data: objData,
    success: function(e) {
        if(e == 1)
            toastr.success('Data deleted successfully.');
        else
            toastr.error('Something went wrong. Please, refresh the page and try again.');
        
        setTimeout(function(){ location.reload(); }, 3000);
    }
  });
}
}

function updateSocialSites(id,_this){
var cls = $(_this).attr('class');
if( $(_this).is(':checked') )
  var sts = 1;
else
  var sts = 0;

$.ajax({
  url: baseurl + 'admin/socialsites/postreq', 
  type: "POST",             
  data: {'id':id,'col':cls,'sts':sts},
  success: function(e) {
      if(e == 1)
          toastr.success('Data updated successfully.');
      else
          toastr.error('Something went wrong. Please, refresh the page and try again.');
  }
});
}

function saveProfile(){
let u_name = $.trim($('#u_name').val());
if(u_name != ''){
   $.ajax({
      url: baseurl + 'admin/profile', 
      type: "POST",             
      data: {'u_name':u_name,'pwd':$('#pwd').val()},
      success: function(e) {
         console.log(e)
          if(e == 1)
              toastr.success('Profile updated successfully.');
          else
              toastr.error('Something went wrong. Please, refresh the page and try again.');

         setTimeout(function(){ location.reload(); }, 3000);
      }
    });
}else
   toastr.error('Please enter the name.')
}

function submitUserRecords(){
var u_id = $('#u_id').val();
var err = 0;
let obj = {};
if( u_id == 0 ){
  $('.form-control').each(function(){
    var idd = $(this).attr('id');
    var v = $.trim($(this).val());
    if( v != '' )
      obj[idd] = v;
    else
      err++;
  });
  var str = 'User added successfully';
}
else{
  $('.form-control').each(function(){
    var idd = $(this).attr('id');
    var v = $.trim($(this).val());
    if( v != '' )
      obj[idd] = v;
    else if(idd != 'u_password')
      err++;
  });
  var str = 'User updated successfully';
}
if( err != 0 ){
  toastr.error('You can\'t leave the fields empty.')
}
else{
  obj.u_id = u_id;
  
  $.ajax({
    url: baseurl + 'admin/submitUserRecords', 
    type: "POST",             
    data: obj,      
    success: function(e) {
        if(e == 1)
            toastr.success(str);
        else
            toastr.error('Something went wrong. Please, refresh the page and try again.');
        
        setTimeout(function(){  window.location.href = baseurl + "admin/users"; }, 3000);
    }
  });
}
}

function submitCommonData(pageType){
  let tempArr = [];
  let err = 0;
  $('.dataTitle').each(function(){
    if( $(this).val() != '' ){
      if( $(this).val().length < 251 )
        tempArr.push($(this).val());
      else{
        toastr.error('It should not be more than 250 Characters.');
        $(this).css('border-color','red');
        $(this).focus();
        err++;
      }
    }
      //tempArr.push($(this).val());
  });

  if( err == 0 ) {
    let obj = {};
    obj.title = tempArr;
    obj.pageType = pageType;
    obj.nicheid = $('#nicheid').val();
    $.ajax({
      url: baseurl + 'admin/com_submitCommonData', 
      type: "POST",             
      data: obj,      
      success: function(e) {
          if(e == 1)
              toastr.success('Data saved successfully.');
          else
              toastr.error('Something went wrong. Please, refresh the page and try again.');
          
          setTimeout(function(){ location.reload(); }, 3000);
      }
    });
  }
  else{
    setTimeout(function(){ $('.nicheTitle').css('border-color',''); }, 5000);
  }
}

function uploadImages(){
  let myForm = document.getElementById('uploadForm');
  let formData = new FormData(myForm);
  $.ajax({
    url: baseurl + 'admin/uploadImages',
    type: "POST",
    data:  formData,
    contentType: false,
    cache: false,
    processData:false,
    success: function(data)
    {
      if(data == 1) {
        toastr.success('Image uploaded successfully.');
        setTimeout(function(){ location.reload(); }, 3000);
      }
      else{
        let imgErr = JSON.parse(data,true);
        for(let i=0 ; i < imgErr.length ; i++ ){
          $('#imgErr').html(imgErr[i] + '<br/>');
        }
      }
    }         
  });
}