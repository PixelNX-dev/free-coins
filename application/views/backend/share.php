<div class="traf_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-12">
                            <div class="traf_adsBox">
                                <h1>Create, Share, Get Traffic</h1>
                                <p>Get Traffic From 75x Social Media Sites<br/>Without Writing Any Content. Now, Let’s Get Started</p>
                                <img src="<?= base_url() ?>assets/frontend/images/trafficads.png" alt="" class="img-fluid traf_adsImg">
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12">
                            <div class="traf_steps">
                                <ul class="steps">
                                    <!--  step-success -->
                                    <li class="step step-active" data-step="1">
                                      <div class="step-content">
                                        <span class="step-circle">1</span>
                                        <span class="step-text">Choose Your
                                            Niche</span>
                                        </div>
                                    </li>
                                    <li class="step" data-step="2">
                                      <div class="step-content">
                                        <span class="step-circle">2</span>
                                        <span class="step-text">Choose Content</span>
                                      </div>
                                    </li>
                                    <li class="step" data-step="3">
                                      <div class="step-content">
                                        <span class="step-circle">3</span>
                                        <span class="step-text">Preview & Edit</span>
                                      </div>
                                    </li>
                                    <li class="step" data-step="4">
                                      <div class="step-content">
                                        <span class="step-circle">4</span>
                                        <span class="step-text">Share &
                                            Get Traffic</span>
                                      </div>
                                    </li>
                                </ul>
                                <input type="hidden" value="<?= $urltoshare ?>" id="urltoshare">
                                <div class="traf_step_content">
                                    <div class="traf_stepContent text-center traf_active" data-target="1">
                                        <h1>Step 1: Choose Your Niche</h1>   

                                        <div class="row justify-content-center">
                                        <div class="col-xl-8">
                                            <div class="form-group">
                                                <label><b>Choose a niche keyword </b>that best describes </br>
                                                    the product or service you want to promote</label>
                                                
                                                <div class="niche_selectbox">
                                                    <select class="form-control" placeholder="Choose a niche" id="nicheid">
                                                        <?php if(!empty($niches)) {
                                                            echo '<option value="0">Choose a niche</option>';
                                                            foreach($niches as $soloNiche){
                                                                echo '<option value="'.$soloNiche['n_id'].'">'.$soloNiche['n_title'].'</option>';
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <button class="traf_btn traf_btnArrow traf_marginTop40" onclick="getContent()">Proceed to choose content</button>

                                    </div>
                                    <div class="traf_stepContent traf_chooseContent text-center d-none" data-target="2">
                                         <h1>Step 2: Choose Content</h1>   
                                         <div class="traf_content_wrapper">
                                            <label><b>Now choose the question</b> (headline) that will<br>
                                                build curiosity & entice people with benefits</label>

                                            <div class="row" id="questionContent">
                                            </div>
                                         </div>
                                         <div class="traf_content_wrapper traf_green">
                                            <label><b>Choose your call to action</b> ("this website answers <br> 
                                                that questions and solve your problem - click here!")</label>

                                            <div class="row" id="answerContent">
                                            </div>
                                         </div>

                                         <div class="traf_content_wrapper traf_blue traf_imgBox">
                                            <label>Finally, <b>select your image</b> which should grab attention<br>
                                                and hint at the "transformation" your product offers</label>

                                            <div class="row" id="imageContent">
                                                
                                            </div>
                                         </div>

                                         <button class="traf_btn traf_btnArrow traf_marginTop10" onclick="generatePreview()">Proceed to Preview & Edit</button>
                                         
                                    </div>
                                    <div class="traf_stepContent text-center d-none traf_previewEdit" data-target="3">
                                         <h1>Step 3: Preview & Edit</h1>   
                                         <label><b>Now preview & fine-tune your campaign - then save</b><br>
                                            (last chance to tweak your post before launch!)</label>

                                        <div class="row justify-content-between">
                                            <div class="col-xl-5 col-lg-6 col-md-12">
                                                <div class="traf_priview_wrapper">
                                                    <div class="traf_previewMockup">
                                                        <div class="traf_preview">
                                                            <img src="" class="imgDis">
                                                            <p class="traf_subtitle quesDis"></p>
                                                            <p class="traf_title ansDis"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-6 col-md-12">
                                                <div class="traf_whiteBox traf_uploadBox">
                                                    <span class="traf_upload"><img src="<?= base_url() ?>assets/frontend/images/svg/upload.svg" id="displayImage" class="traf_icon"></span>
                                                    <!-- traf_icon ye class jb icon rahega tb hi aayegi image upload hone k bad remove krni h -->
                                                    <span class="traf_imageName"></span>

                                                    <p>To change image use below option to upload</p>
                                                    <form id="uploadForm">
                                                        <label style="cursor: pointer;">
                                                            <input type="file" class="d-none" name="userfile" onchange="uploadImages()">
                                                            Browse Image ( only 1 MB is allowed )
                                                        </label> 
                                                    </form>
                                                    
                                                    <img src="<?= base_url() ?>assets/frontend/images/svg/preview_arrow1.svg" alt="" class="traf_prearrow" />
                                                </div>
                                                <div class="traf_whiteBox text-left traf_subtitleBox">
                                                    <p class="quesDis editArea" data-target="quesDis"></p>
                                                    <span style="font-size: 13px;color: red;">Double click on the text to edit it</span>
                                                    <img src="<?= base_url() ?>assets/frontend/images/svg/preview_arrow2.svg" alt="" class="traf_prearrow" />
                                                </div>
                                                <div class="traf_whiteBox text-left traf_titleBox">
                                                    <p class="ansDis editArea" data-target="ansDis"></p>
                                                    <span style="font-size: 13px;color: red;">Double click on the text to edit it</span>
                                                    <img src="<?= base_url() ?>assets/frontend/images/svg/preview_arrow3.svg" alt="" class="traf_prearrow" />
                                                </div>
                                            </div>
                                        </div>

                                        <button class="traf_btn traf_btnArrow traf_marginTop40" onclick="saveEverything()">Save &amp; Get Traffic</button>
                                    </div>
                                    <div class="traf_stepContent text-center d-none traf_shareGetTraffic" data-target="4">
                                         <h1>Step 4: Share & Get Traffic</h1>   
                                         <label>All done! Now, it's time to share & start to get traffic! <br>
                                           <b>Click the share icons below and confirm to promote...</b></label>

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


                                        <div class="traf_allDone text-center">
                                            <div class="traf_allDoneLine"><span>All Done!</span></div>
                                            <h4>Want to create another campaign?</h4>
                                            <p>Simply refresh the page and go again!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- popup -->
        <?php if( $this->session->userdata['nickname'] == '' )  { ?>
        <div class="traf_popup">
            <div class="traf_popupContent text-center">
                <h1>First, Please Add Your Clickbank<br>
                    Nickname Before Creating Content!</h1>
                <button class="traf_btn traf_btnArrow traf_marginTop30 traf_loadSetting">Click Here to Load Settings</button>
            </div>
        </div>
        <?php } else { ?>
        <script>window.nickname = "<?= $this->session->userdata['nickname'] ?>"; </script>
        
        <!-- edit text popup starts -->
        <div class="traf_popup">
            <div class="traf_popupContent text-center">
                <span class="traf_closePopup">
                    <img src="<?= base_url() ?>assets/frontend/images/svg/close.svg" alt="">
                </span>
                <h1>Edit the text here </h1>
                <textarea class="editableAreaText form-control" rows="5"></textarea>
                <input type="hidden" id="editableAreaTextInput">
                <button class="traf_btn traf_btnArrow traf_marginTop30" onclick="updateText()">Update</button>
            </div>
        </div>
        <!-- edit text popup ends -->

        <?php } ?>
