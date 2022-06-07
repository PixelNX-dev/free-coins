<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pfb_setup_wrapper">
                    <nav aria-label="breadcrumb" class="pfb_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home/mysites') ?>">My Sites</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Social & Lists</li>
                        </ol>
                    </nav> 

                    <h2>Social & Lists</h2>
                   
                <div class="pfb_white_box">
                    <h3>Now Activate Additional <b>List-Building & Social Component</b> For Your Site (Optional):</h3>
                    <div class="pfb_form_dv">
                        <form>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-12 col-lg-4 col-form-label">Autoresponder Code</label>
                                <div class="col-12 col-lg-8">
                                    <textarea rows="8" class="form-control sidebarFields" id="w_arcode" resize="none"><?= $websiteData[0]['w_arcode'] ?></textarea>
                                    <p>This is your autoresponder code. Add this if you want to build a list on the sidebar of your site.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="pfb_white_box">
                    <h3>Finally, enter your <b>Social URLs to Share (Optional)</b></h3>
                    <div class="pfb_social_url">
                        <ul class="pfb_socila_btn_list">
                            <li>
                                <a href="javascript:;" class="pfb_comman_icon fb_icon">
                                    <span><i class="fab fa-facebook-f"></i></span>
                                    <b>Facebook URL</b>
                                </a>
                                <input class="pfb_input form-control sidebarFields" id="w_fburl" placeholder="http://facebok.com/xx" value="<?= $websiteData[0]['w_fburl'] ?>">
                            </li>
                            <li>
                                <a href="javascript:;" class="pfb_comman_icon youtube_icon">
                                    <span>
                                        <i class="fab fa-youtube"></i>
                                    </span>
                                    <b>Youtube URL</b>
                                </a>
                                <input class="pfb_input form-control sidebarFields" id="w_yturl" placeholder="http://youtube.com/xx" value="<?= $websiteData[0]['w_yturl'] ?>">
                            </li>
                             <li>
                                <a href="javascript:;" class="pfb_comman_icon twitter_icon">
                                    <span><i class="fab fa-twitter"></i></span>
                                    <b>Twitter URL</b>
                                </a>
                                <input class="pfb_input form-control sidebarFields" id="w_twiturl" placeholder="http://twitter.com/xx" value="<?= $websiteData[0]['w_twiturl'] ?>">
                            </li>
                            <li>
                                <a href="javascript:;" class="pfb_comman_icon tiktok_icon">
                                    <span><i class="fab fa-tiktok"></i> </span>
                                    <b>Tiktok URL</b>
                                </a>
                                <input class="pfb_input form-control sidebarFields" id="w_tiktokurl" placeholder="http://tiktok.com/xx" value="<?= $websiteData[0]['w_tiktokurl'] ?>">
                            </li>
                            <li>
                                <a href="javascript:;" class="pfb_comman_icon pinterest_icon">
                                    <span><i class="fab fa-pinterest-p"></i></span>
                                    <b>Pinterest URL</b>
                                </a>
                                <input class="pfb_input form-control sidebarFields" id="w_pinurl" placeholder="http://pinterest.com/xx" value="<?= $websiteData[0]['w_pinurl'] ?>">
                            </li>
                            <li>
                                <a href="javascript:;" class="pfb_comman_icon instagram_icon">
                                    <span><i class="fab fa-instagram"></i></span>
                                    <b>Instagram URL</b>
                                </a>
                                <input class="pfb_input form-control sidebarFields" id="w_instaurl" placeholder="http://instagram.com/xx" value="<?= $websiteData[0]['w_instaurl'] ?>">
                            </li>
                        </ul>
                        <p>This is the URL for this social network. It will be displayed as a clickable banner on your site.</p>
                    </div>
                </div>
                    
                

                <div class="pfb_setup_btns">
                    <a href="<?= base_url('home/mysites') ?>" class="pfb_fontweight500"><img src="<?= base_url() ?>assets/backend/images/svg/arrowleft.svg" alt=""> Return to My Sites</a>
                    <a href="javascript:;" class="pfb_btn pfb_purpleBtn" onclick="submitSocialLists(<?= $webid ?>)">Save Social & Lists Option</a>
                </div>
            </div>
        </div>
    </div>
    
    
    </div>
</div>

