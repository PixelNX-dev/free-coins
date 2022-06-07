</div>
       
	    <!-- GO To Top -->
        <a href="javascript:void(0);" id="scroll"><span class="fa fa-angle-double-up"></span></a>
        <div class="notificationPopup d-none" style="z-index:9999999;">
            <span class="noti_icon"><img src=""></span>
            <span class="noti_msg">
                <span class="noti_heading"></span>
                <span class="noti_pera"></span>
            </span>
            <a class="close"><img src="<?= base_url() ?>assets/frontend/images/svg/close.svg" alt=""></a>
        </div>

        <?php if(isset($is_page) && $is_page == 'create' ) { ?>
        <!-- confirmation popup -->
        <div class="modal fade pfb_modal" id="conformPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="pfb_confirmationbox text-center">
                            <h3>Are you sure?</h3>
                            <p id="showsitename"></p>
                            <div>
                                <a class="pfb_btn pfb_purpleBtn" id="setupsiteurl" href="javascript:;" >Okay, Use this website URL</a>
                            </div> 
                            <a class="pfb_close" data-dismiss="modal"><img src="<?= base_url() ?>assets/backend/images/svg/cancel.svg" alt=""> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
        <?php } ?>


        <?php if(isset($is_page) && $is_page == 'mysites' ) { ?>
        <!-- Pro Account Popup -->
        <div class="modal fade pfb_modal" id="proAccountPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="pfb_confirmationbox text-center">
                            <p>Please upgrade your account to create unlimited sites.</p>
                            <div>
                                <a class="pfb_btn pfb_purpleBtn" href="https://grabfreecoin.com/freecoin-upgrade1" target="_blank">Upgrade Now</a>
                            </div> 
                            <a class="pfb_close" data-dismiss="modal"><img src="<?= base_url() ?>assets/backend/images/svg/cancel.svg" alt=""> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>      
        </div>

        <!-- Delete Popup -->
        <div class="modal fade pfb_modal" id="DeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="pfb_confirmationbox text-center">
                            <img class="img-fluid" src="<?= base_url() ?>assets/backend/images/delete_img.png" alt="Delete Image">
                            <h3>Are you sure?</h3>
                            <p>Do you really want to delete these records ?</p>
                            <div>
                                <a href="#" class="pfb_btn pfb_redBtn">Yes, Delete It</a>
                            </div> 
                            <a  class="pfb_close" data-dismiss="modal">No, Keep this records</a>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
        <?php } ?>

        <div class="modal fade pf_modal" id="VideoPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="pf_videobox text-center">
                            <!--<div class="pf_iframe"></div>-->
                            <div class="pf_iframe pfb_custom_banner"></div>
                            <a hre="javascript:;" class="pfb_close" data-dismiss="modal"><img src="<?= base_url() ?>assets/backend/images/svg/cancel.svg" alt=""> Close</a>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
        
        <?php if(isset($publishedArticles)) { ?>
        <!-- Edit Popup -->
        <div class="modal fade pfb_modal" id="EditPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="pfb_confirmationbox text-left pfb_editorPopup">
                            <h3>Edit Content </h3>
                            <div class="pfb_editor mb-4">
                                <input class="form-control" type="text" id="editTitleArea">
                            </div> 
                            <div class="pfb_editor">
                                <textarea id="editContentArea"></textarea>
                            </div> 
                            <input type="hidden" id="artId">
                            <div class="pfd_btnholder">
                                <a href="javascript:;" class="pfb_btn pfb_greenBtn" onclick="updateContent()">Update</a>
                                <a class="pfb_close" data-dismiss="modal">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
        <?php } ?>

        <!-- Share Popup -->

        <div class="traf_popup traf_sharePopup">
            <div class="traf_popupContent text-center">
                <span class="traf_closePopup">
                    <img src="<?= base_url() ?>assets/frontend/images/svg/close.svg" alt="">
                </span>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="traf_categories text-left">
                            
                            <h2>Categories</h2>
                            <ul>
                            <li>
                                <label class="traf_checkbox">
                                    <input type="checkbox" name="showall" class="d-none" onclick="filterSocialSites(this)">
                                    <span></span>Show All
                                </label>
                            </li>
                            <?php if(!empty($colName)) { 
                            for($i=0;$i<count($colName);$i++) { ?>
                                <li>
                                    <label class="traf_checkbox">
                                        <input type="checkbox" name="<?= $colName[$i] ?>" class="d-none" onclick="filterSocialSites(this)">
                                        <span></span>
                                        <?= ucwords(str_replace('_',' ',$colName[$i])) ?>
                                    </label>
                                </li>
                            <?php } } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div class="traf_share_wrapper text-left">
                            <ul class="socialul" data-idtext="">
                            <?php if(!empty($social)) { 
                            foreach($social as $soloSocial) { ?>
                                <li class="<?= $soloSocial['s_name']?> socialicons" data-100_million_users=<?= $soloSocial['100_million_users']?>  data-list_building=<?= $soloSocial['list_building']?>  data-ecommerce_buyers=<?= $soloSocial['ecommerce_buyers']?>  data-digital_product_buyers=<?= $soloSocial['digital_product_buyers']?>  data-bookmarking=<?= $soloSocial['bookmarking']?>  data-affiliate_buyers=<?= $soloSocial['affiliate_buyers']?> >
                                    <a href="javascript:;" data-url="<?= $soloSocial['s_url']?>"  onclick="sharethelink(this)">
                                        <span class="traf_shareIcon">
                                            <img src="<?= base_url() ?>assets/frontend/images/svg/share/<?= $soloSocial['s_name']?>.svg" alt="">
                                        </span> 
                                        <?= $soloSocial['s_name']?>
                                    </a>
                                </li>
                            <?php } } ?>    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- script -->
        
        <script>window.baseurl = "<?= base_url() ?>"</script>
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- google fonts for editor start -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <?php if(isset($publishedArticles)) { ?>
            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
        <?php } ?>
        <script src="<?= base_url() ?>assets/backend/js/colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/select2.min.js?q=<?= date('his') ?>"></script>
        <script src="<?= base_url() ?>assets/backend/js/custom.js?q=<?= date('his') ?>"></script>
        <script src="<?= base_url() ?>assets/backend/js/share.js?q=<?= date('his') ?>"></script>
        
        
        <?php if(isset($publishedArticles)) { ?>
            <script>
            tinymce.init({
            selector: 'textarea#editContentArea',
            height: 350,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
            </script>
        <?php } ?>
    </body>
</html> 