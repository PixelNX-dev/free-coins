"use strict";

$(document).ready(function(){
	 // datatable
    if($('.traf_table').length){
      let dataSrc = $('.traf_table').data('source');
      var adDatatable = $('.traf_table').DataTable({
         responsive: true,
         ajax: dataSrc,
         columns: [
            null,
            null,
            { className : "traf_action" }
        ]
      });
      //datatable search
      $('.traf_datatableSearch').keyup(function(){
          adDatatable.search($(this).val()).draw() ;
      })
    }
	
	// toggle js
	$('.msg_toggle_wrapper').on('click',function(e){
		var __this = $(e.target)
		if(__this.className !== "msg_toggle_wrapper"){
			console.log(__this)
			__this = __this.closest('.msg_toggle_wrapper')
		}
		console.log(__this)
		__this.closest('.ifc_menu_wrapper').find('.ifc_menu').toggleClass('ifc_menu_open');
   })
   
   // select2
   $('.niche_selectbox select').select2();  

   // choose niche feild
   $(document).on('keyup','.traf_chooseNiche input', function(e){
      if (e.keyCode == 13) {
         let value = $(this).val()
         if( value != ''){
            $(this).addClass('d-none')
            $(this).closest('.traf_chooseNiche').find('.traf_searchTag').removeClass('d-none');
            $(this).closest('.traf_chooseNiche').find('.traf_searchTag .traf_val').html(value);
         }
      }
   })
   $(document).on('click','.deleteSharedLink',function(){
      Swal.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         // icon: 'warning',
         showCancelButton: true,
         showCloseButton: true,
         confirmButtonColor: '#f36d6d',
         cancelButtonColor: '#fff',
         confirmButtonText: 'Yes, delete it!'
       }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               url: baseurl + 'home/shared/delete', 
               type: "POST",             
               data: {'deleteid':$(this).data('shareid')},
               success: function(e) {
                   if(e == 1)
                       toastr.success('Data deleted successfully. Page will reload itself in 3 seconds.');
                   else
                       toastr.error('Something went wrong. Please, refresh the page and try again.');
      
                  setTimeout(function(){ location.reload(); }, 3000);
               }
            });
         }
       })
      
   })

   // load setting
   $(document).on('click','.traf_loadSetting',function(){
      location.href = baseurl + 'home/settings';
   })

   // menu toggle
   $(document).on('click','.traf_toggle',function(){
      $(this).closest('.traf_menu_wrapper').toggleClass('traf_menuOpen')
   })

   // user toggle
   $(document).on('click','.traf_user',function(){
      $(this).closest('.traf_user_wrapper').find('.traf_userPopup').slideToggle(200);
   })

   // Check the content
   $(document).on('click','.traf_contentBox',function(){
      let type = $(this).data('type');
      $('.traf_contentBox[data-type="'+type+'"]').each(function(){
         $(this).removeClass('traf_selected');
      });
      $(this).addClass('traf_selected');
   });
	
	// for outside click off
	$(document).on('click',function(e){
		var __this = $(e.target)
		
		if(!__this.hasClass('ifc_menu').length && !__this.closest('.ifc_menu').length&& !__this.closest('.ifc_menu_wrapper').length){
			$('.ifc_menu').removeClass('ifc_menu_open')
		}
		if(!__this.closest('.traf_user_wrapper').length){
			$('.traf_userPopup').slideUp()
		}
		if(!__this.closest('.traf_menu_wrapper').length){
			$('.traf_menu_wrapper').removeClass('traf_menuOpen')
		}
   })
   
   $(document).on('dblclick','.editArea',function(){
      var t = $(this).text();
      $('.editableAreaText').val(t);
      $('#editableAreaTextInput').val($(this).data('target'));
      $('body').addClass('popupOpen');
   });

   $(document).on('click','.traf_closePopup',function(){
      $('body').removeClass('popupOpen');
   });

   
   $(document).on('change','.prodCheckbox',function(){
      var afid = $(this).val();
      var affLink = $.trim($('#afflink_'+afid).val());
      var affNicheid = $.trim($('#nicheid_'+afid).val());
      if( $(this).is(':checked') )
         var sts = 1;
      else
         var sts = 0;
      if( affLink != "" )
      {
         $.ajax({
          url: baseurl + 'home/save_activated_camp', 
          type: "POST",             
          data: {'afid':afid,'affLink':affLink,'sts':sts,'affNicheid':affNicheid},
          success: function(e) {
              if(e == 1)
                  toastr.success('Data updated successfully.');
              else
                  toastr.error('Something went wrong. Please, refresh the page and try again.');
          }
        });
      }
      else{
         if( sts == 1 ){
            toastr.error('Enter the affiliate link to activate this product.');
            $('#checked_'+afid).trigger('click');
         }
      }
    });
});

$(window).on('load',function(){
	$('.traf_loader_wrapper').hide();
})

function loadSteps(targetVal){
   
   //let targetVal = $(this).attr('data-step')
   var obj = $('li[data-step="'+targetVal+'"]');
   $('.traf_steps .steps li').removeClass('step-active');
   obj.addClass('step-active');
   obj.prev().addClass('step-success');

   $('.traf_stepContent').addClass('d-none').removeClass('traf_active');
   obj.closest('.traf_steps').find('[data-target="'+targetVal+'"]').removeClass('d-none').addClass('traf_active');
}

function saveSettings(){
   let value = $.trim($('#nickname').val());
   if(value != ''){
      $.ajax({
         url: baseurl + 'home/settings', 
         type: "POST",             
         data: {'u_nickname':value},
         success: function(e) {
             if(e == 1)
                 toastr.success('Settings updated successfully.');
             else
                 toastr.error('Something went wrong. Please, refresh the page and try again.');

            setTimeout(function(){ location.href = baseurl + 'home/create'; }, 3000);
         }
       });
   }else
      toastr.error('Please enter the nickname.')
}


function getContent(){
   var nicheid = $('#nicheid').val();
   if( nicheid == 0 )
      showNotifications('error','Please, choose a niche to move forward.');
   else if( nicheid != 0 ){
      $.ajax({
         url: baseurl + 'home/getContent/', 
         type: "POST",             
         data: {'nicheid':nicheid},
         success: function(data) {
            var d = JSON.parse(data,true);
            $('#questionContent').html(d[0]);
            $('#answerContent').html(d[1]);
            $('#imageContent').html(d[2]);
            loadSteps(2);
         }
      });
   }
   else
      showNotifications('error','We don\'t have any niche right now.');
}

function generatePreview(){
   let err = 0
   $('.traf_contentBox[data-type="ques"]').each(function(){
      if( $(this).hasClass('traf_selected') ){
         $('.quesDis').html($(this).children('p').html());
         err++;
      }
   });

   if( err == 0 )
   {
      showNotifications('error','Please, choose a question.');
      return false;
   }
   err = 0
   $('.traf_contentBox[data-type="ans"]').each(function(){
      if( $(this).hasClass('traf_selected') ){
         $('.ansDis').html($(this).children('p').html());
         err++;
      }
   });

   if( err == 0 )
   {
      showNotifications('error','Please, choose an answer.');
      return false;
   }
   err = 0
   $('.traf_contentBox[data-type="img"]').each(function(){
      if( $(this).hasClass('traf_selected') ){
         $('.imgDis').attr('src',$(this).children('img').attr('src'));
         err++;
      }
   });

   if( err == 0 )
   {
      showNotifications('error','Please, choose an image.');
      return false;
   }
   loadSteps(3);
}


function filterSocialSites(_this){
   var cls = $(_this).attr('name');
   if( cls == 'showall' ){
      $('.socialicons').removeClass('d-none');
   }
   else{
      $('.socialicons').each(function(){
         var v = $(this).data(cls);
         $(this).addClass('d-none');
         if( $(_this).is(':checked') ){
            if( v == 1 )
               $(this).removeClass('d-none');
         }
         else{
            if( v == 0 )
               $(this).removeClass('d-none');
         }
      });
   }
}

function updateText(){
   var t = $.trim($('.editableAreaText').val());
   if( t != "" ){
      if( t.length < 251 ){
         var cls = $('#editableAreaTextInput').val();
         $('.'+cls).text(t);
         $('body').removeClass('popupOpen');
      }
      else{
         showNotifications('error','Text can\'t be more than 250 characters.');
      }
   }
   else
      showNotifications('error','This can\'t be empty.');
}


function uploadImages(){
   let myForm = document.getElementById('uploadForm');
   let formData = new FormData(myForm);
   $.ajax({
     url: baseurl + 'home/uploadImages',
     type: "POST",
     data:  formData,
     contentType: false,
     cache: false,
     processData:false,
     success: function(data)
     {
         var str = data.split('|@#|');
         if(str[1] == 0)
            showNotifications('error',str[0]);
         else{
            $('.traf_imageName').text(str[1]);
            $('#displayImage').attr('src',str[0]);
            $('.imgDis').attr('src',str[0]);
            $('#displayImage').removeClass('traf_icon');
            showNotifications('success','Image updated successfully');
         }
     }         
   });
 }

function saveEverything(){
   $.ajax({
      url: baseurl + 'home/saveEverything/', 
      type: "POST",             
      data: {'share_ques':$('.quesDis[data-target="quesDis"]').text(),'share_ans':$('.ansDis[data-target="ansDis"]').text(),'share_image':$('.imgDis').attr('src'),'share_url':$('#urltoshare').val()},
      success: function(resp) {
         $('.socialul').attr('id',resp);
         loadSteps(4);
      }
   });
}

function sharethelink(_this){
   var socialUrl = $(_this).data('url');
   var id = $('.socialul').attr('id');
   var shareUrl = $('#shareUrl_'+id).attr('href');
   socialUrl = socialUrl.replace("COM-BLAST-QUES", "");
   socialUrl = socialUrl.replace("COM-BLAST-ANS", "");
   socialUrl = socialUrl.replace("COM-BLAST-IMAGE", "");
   /* var idText = $('.socialul').data('idtext');
   socialUrl = socialUrl.replace("COM-BLAST-QUES", encodeURIComponent($('.quesDis'+idText).text()));
   socialUrl = socialUrl.replace("COM-BLAST-ANS", encodeURIComponent($('.ansDis'+idText).text()));
   socialUrl = socialUrl.replace("COM-BLAST-IMAGE", encodeURIComponent($('.imgDis'+idText).attr('src'))); */
   socialUrl = socialUrl.replace("COM-BLAST-URL", encodeURIComponent(shareUrl));
   window.open(socialUrl, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes");
}

function openShareOptions(id){
   $('.socialul').attr('id',id);
   $('.socialul').data('idtext','_'+id);
   $('body').addClass('popupOpen');
}

function showNicheProd(_this){
   window.location = baseurl + 'home/activate_campaigns/' + $(_this).val();
}