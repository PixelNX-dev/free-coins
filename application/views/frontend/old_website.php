<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $websiteData['w_sitetitle'] == '' ? '' : $websiteData['w_sitetitle'] ?></title>
        <meta name="description" content="<?= $websiteData['w_seodesc'] ?>">
        <meta name="keywords" content="<?= $websiteData['w_seokeyword'] ?>">
        <meta name="author" content="<?= $websiteData['w_seoauthor'] ?>">
        <!-- stylesheet -->
        <link href="https://fonts.googleapis.com/css2?family=<?= $websiteData['w_themefont'] ?>:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <style>
            :root{
                --primaryColor:<?= $websiteData['w_themecolor'] ?>;
                --headingColor:#534462; 
                --secondaryColor:#7f708f;   
                --peraColor:#9b8fa8;
                --whiteColor:#ffffff;
                --rating:#ffe851;
                --transition:all 0.6s ease-in-out;
            }
            body{
                margin: 0;
                padding: 0;
                font-size: 16px;
                color: var(--peraColor);
                font-family: <?= $websiteData['w_themefont'] ?>;
                font-weight: 400;
                line-height: 25px;
                background-color: #eff0f4;
            }
        </style>
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/style.css?q=<?= date('his') ?>">
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/responsive.css">

        <!-- favicon -->
        <link rel="shortcut icon" href="<?= $websiteData['w_faviconurl'] == '' ? base_url('assets/frontend/images/favicon.png') : base_url('assets/webupload/'.$websiteData['w_faviconurl']) ?>" type="image/x-icon">
       <?= $websiteData['w_seoextscript'] ?>
    </head>
    <body>
<!-- PreLodar Start -->
<div class="preloader_wrapper preloader_active preloader_open">
    <div class="preloader_holder">
        <div class="preloader d-flex justify-content-center align-items-center h-100">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- PreLodar End -->
        <div class="pf_main_wrapper">
            <div class="pf_headerMain">
                <!-- <span class="pf_toggle"></span> -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pf_top_header pf_toppadder20 pf_bottompadder30  form-inline justify-content-between align-items-center">

                                <div class="pf_logo">
                                <?php if($websiteData['w_logourl']!='') { ?>
                                    <a href="<?= base_url('s/').$websiteData['w_sitename'] ?>"><img src="<?= base_url('assets/webupload/'.$websiteData['w_logourl']) ?>" alt="" class="img-fluid"/></a>
                                <?php } elseif($websiteData['w_logotext']!='') { ?>
                                    <a href="<?= base_url('s/').$websiteData['w_sitename'] ?>" style="color:<?= $websiteData['w_themecolor'] ?>;font-family:<?= $websiteData['w_logofont'] ?>; font-size:40px;"><?= $websiteData['w_logotext'] ?></a>
                                <?php } else { ?>
                                    <a href="<?= base_url('s/').$websiteData['w_sitename'] ?>"><img src="<?= base_url('assets/frontend/images/logo_inner.png') ?>" alt="" class="img-fluid"/></a>
                                <?php } ?>
                                </div>

                                <?= $websiteData['w_lbimg1'] == '' ? '<div class="pf_headeradd"></div>' : '<div class="pf_headeradd"><a href="'.$websiteData['w_lglink1'].'" target="_blank"><img src="'.$websiteData['w_lbimg1'].'" alt="" class="img-fluid"/></a></div>'; ?>
                            </div>
                            <div class="pf_menu_wrapper text-center">
                                <ul class="pf_menu">
                                    <li class="pf_toggle"><span class="pf_closeMenu"></span></li>
                                    <?php if(!empty($nicheList)) { 
                                        foreach($nicheList as $soloNiche) { ?>
                                    <li <?= $nicheid == $soloNiche['n_id'] ? 'class="pf_active"' : '' ?>><a href="<?= base_url('s/').$websiteData['w_sitename'].'/'.$soloNiche['n_id'] ?>"><?= ucfirst($soloNiche['n_title']) ?></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pf_content_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 order-lg-1 order-md-2 order-sm-2 order-xs-2">
                            <div class="pf_whiteBox pf_onlyText">
                                <h2 class="pf_boxTitle">Welcome to <?= $websiteData['w_sitename'] == '' ? '' : $websiteData['w_sitename'] ?>!</h2>
                                <p class="pf_bottompadder10"><?= $websiteData['w_welcometext'] == '' ? '' : $websiteData['w_welcometext'] ?></p>
                            </div>

                            <?php $topProd = $this->DBfile->get_data('frontwebtbl',array('f_webid'=>$websiteData['w_id'],'f_nicheid'=>$nicheid)); 
                            if( $topProd[0]['f_topprod'] != '' ) {
                            ?>
                                <div class="pf_whiteBox">
                                    <h2 class="pf_boxTitle">Our #1 Pick For "<?= ucfirst($nicheName) ?>" Products</h2>

                                    <div class="pf_iframe_wrapper align-items-center pf_bottompadder20">
                                        <div class="pf_iframe">
                                        <?php $videoLink = $topProd[0]['f_topytlink']; 
                                        if($videoLink != ""){
                                            if( strpos($videoLink, 'you') !== false ){
                                                $videoIdArray = explode("?v=",$videoLink);
                                                if( count($videoIdArray) == 2 )
                                                    $videoId = $videoIdArray[1];
                                                else{
                                                    $videoIdArray = explode("/",$videoLink);
                                                    $videoId = $videoIdArray[count($videoIdArray) - 1];
                                                }
                                                $iframe = '<iframe width="418" height="230" src="https://www.youtube.com/embed/'.$videoId.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                            }
                                            else if( strpos($videoLink, 'vime') !== false ){
                                                $videoIdArray = explode("/",$videoLink);
                                                $videoId = $videoIdArray[count($videoIdArray) - 1];
                                                $iframe = '<iframe src="https://player.vimeo.com/video/'.$videoId.'" width="418" height="230" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
                                            } 
                                            echo $iframe;   
                                        }
                                        ?>                                           
                                        </div>
                                        <div class="pf_socialreview">
                                            <h4><?= $topProd[0]['f_topprod'] ?></h4>
                                            <div class="pf_rating">
                                            <?php for($s=1;$s<6;$s++) { ?>
                                                <i class="fas fa-star <?= $s <= $topProd[0]['f_topstars'] ? 'pf_active' : '' ?>" aria-hidden="true" ></i>
                                            <?php } ?>
                                            </div>
                                            <div class="pf_bottompadder20">
                                                <a href="<?= $topProd[0]['f_topafflink'] ?>" target="_blank" class="pf_btn pf_greenBtn">Get Instant Access</a>
                                            </div>
                                            <button class="pf_btn pf_blueBtn" onclick="document.getElementById('bonusSection').scrollIntoView()">Claim Your Bonuses</button>
                                        </div>
                                    </div>
                                    <p class="pf_margin0"><?= $topProd[0]['f_topdesc'] ?></p>
                                </div>
                            <?php } 
                            $selectedProducts = $this->DBfile->get_join_data('productstbl','productwebtbl','productstbl.p_id=productwebtbl.pw_prodid',array('pw_websiteid'=>$websiteData['w_id'],'pw_nicheid'=>$nicheid),'p_name,p_imageurl,pw_stars,pw_afflink,p_description');

                            if(!empty($selectedProducts)){
                                foreach($selectedProducts as $soloProd) { ?>

                                <div class="pf_whiteBox pf_bonusBox">
                                    <div class="pf_bonusImg">
                                        <img src="<?= $soloProd['p_imageurl'] ?>" alt="" class="img-fluid" />
                                    </div>
                                    <div class="pf_bonusDetail">
                                        <h4><?= $soloProd['p_name'] ?></h4>
                                        <div class="pf_rating">
                                            <?php for($s=1;$s<6;$s++) { ?>
                                                <i class="fas fa-star <?= $s <= $soloProd['pw_stars'] ? 'pf_active' : '' ?>" aria-hidden="true" ></i>
                                            <?php } ?>
                                        </div>
                                        <p><?= $soloProd['p_description'] ?></p>
                                    </div>
                                    <div class="pf_bonus_btns"> 
                                        <div class="pf_bottompadder20">
                                            <a href="<?= $soloProd['pw_afflink'] ?>" target="_blank" class="pf_btn pf_greenBtn">Get Instant Access</a>
                                        </div>
                                        <button class="pf_btn pf_blueBtn" onclick="document.getElementById('bonusSection').scrollIntoView()">Claim Your Bonuses</button>
                                    </div>
                                </div>

                            <?php } } ?>
                            

                            <div class="pf_whiteBox pf_onlyText" id="bonusSection">
                                <h2 class="pf_boxTitle">Choose Your Product, Choose Your Bonuses & Order!</h2>
                                <p class="pf_bottompadder10">First, browse our above top-rated products and click the "GET INSTANT ACCESS" to purchase one. Second, scroll through our bonuses below to choose up to 5 that you want.Then, email us and we will give you access to the bonuses you want.</p>

                                <h5 class="pf_boxsubheading pf_margin0">Start by purchasing one of our 5x top-rated products above!</h5>
                            </div>

                            <div class="pf_whiteBox pf_step_wrapper">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="pf_stepBox text-center">
                                            <img src="<?= base_url() ?>assets/frontend/images/step1.png" alt="">
                                            <p>First, choose the top-rated product that you want, above...</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="pf_stepBox text-center">
                                            <img src="<?= base_url() ?>assets/frontend/images/step2.png" alt="">
                                            <p>Second, choose the 5 bonuses that you want below...</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="pf_stepBox text-center">
                                            <img src="<?= base_url() ?>assets/frontend/images/step3.png" alt="">
                                            <p>After you have purchased, <br><a href="mailto:<?= $websiteData['w_supportemail'] ?>">Click here</a>  to claim your software</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pf_whiteBox pf_logo_wrapper">
                            <?php  if(!empty($bonuses)){
                                foreach($bonuses as $soloBonus) { ?>
                                <div class="pf_logoBox">
                                    <div class="pf_logoimg">
                                        <img src="<?= base_url('assets/upload/').$soloBonus['b_image'] ?>" alt="" class="img-fluid" />
                                    </div>
                                    <p>
                                    <?= $soloBonus['b_description'] ?><a href="javascript:;" onclick="showVideo('<?= $soloBonus['b_vimeourl'] ?>')">Preview</a> 
                                    </p>
                                </div>
                            <?php } } ?>
                            </div>

                            <?= $websiteData['w_lbimg2'] == '' ? '<div></div>' : '<div class="footer_adimg"><a href="'.$websiteData['w_lglink2'].'" target="_blank"><img src="'.$websiteData['w_lbimg2'].'" alt="" class="img-fluid"/></a></div>'; ?>

                        </div>
                        <div class="col-xl-4 col-lg-4 order-lg-2 order-md-1 order-sm-1 order-xs-1">
                           <div class="pf_whiteBox pf_about_box text-center">
                               <h2 class="pf_boxTitle">About Us</h2>
                                <p><?= $websiteData['w_abouttext'] ?></p>
                           </div>

                            <div class="pf_whiteBox pf_share_wrapper">
                                <?php if( $websiteData['w_fburl'] != '' ) { ?>
                               <div class="pf_shareBox facebook">
                                    <a href="<?= $websiteData['w_fburl'] ?>" target="_blank">
                                        <span class="pf_icon"><i class="fab fa-facebook-f"></i></span>
                                        <span class="pf_text">Follow Me On Facebook</span>
                                    </a>
                               </div>
                                <?php } if( $websiteData['w_yturl'] != '' ) { ?>
                               <div class="pf_shareBox youtube">
                               <a href="<?= $websiteData['w_yturl'] ?>" target="_blank">
                                    <span class="pf_icon"><i class="fab fa-youtube"></i></span>
                                    <span class="pf_text">Subscribe Me On Youtube</span>
                                </a>
                               </div>
                               <?php } if( $websiteData['w_tiktokurl'] != '' ) { ?>
                               <div class="pf_shareBox tiktok">
                               <a href="<?= $websiteData['w_tiktokurl'] ?>" target="_blank">
                                    <span class="pf_icon"><i class="fab fa-tiktok"></i></span>
                                    <span class="pf_text">Follow Me On Tiktok</span>
                                </a>
                               </div>
                               <?php } if( $websiteData['w_twiturl'] != '' ) { ?>
                               <div class="pf_shareBox twitter">
                               <a href="<?= $websiteData['w_twiturl'] ?>" target="_blank">
                                    <span class="pf_icon"><i class="fab fa-twitter"></i></span>
                                    <span class="pf_text">Follow Me On Twitter</span>
                                </a>
                               </div>
                               <?php } if( $websiteData['w_pinurl'] != '' ) { ?>
                               <div class="pf_shareBox pinterest">
                               <a href="<?= $websiteData['w_pinurl'] ?>" target="_blank">
                                    <span class="pf_icon"><i class="fab fa-pinterest"></i></span>
                                    <span class="pf_text">Follow Me On Pinterest</span>
                                </a>
                               </div>
                               <?php } if( $websiteData['w_instaurl'] != '' ) { ?>
                               <div class="pf_shareBox instagram">
                               <a href="<?= $websiteData['w_instaurl'] ?>" target="_blank">
                                    <span class="pf_icon"><i class="fab fa-instagram"></i></span>
                                    <span class="pf_text">Follow Me On Instagram</span>
                                </a>
                               </div>
                               <?php } ?>
                            </div>

                            <?= $websiteData['w_smimg1'] == '' ? '<div class="pf_whiteBox pf_adBox"></div>' : '<div class="pf_whiteBox pf_adBox"><a href="'.$websiteData['w_smlink1'].'" target="_blank"><img src="'.$websiteData['w_smimg1'].'" alt="" class="img-fluid"/></a></div>'; ?>

                           
                           <div class="pf_whiteBox pf_form">
                            <?= $websiteData['w_arcode'] ?>
                            </div>

                            <?= $websiteData['w_smimg2'] == '' ? '<div class="pf_whiteBox pf_adBox"></div>' : '<div class="pf_whiteBox pf_adBox"><a href="'.$websiteData['w_smlink2'].'" target="_blank"><img src="'.$websiteData['w_smimg2'].'" alt="" class="img-fluid"/></a></div>'; ?> 
                        </div> 
                    </div>
                </div>
            </div>
            <div class="pf_footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="pf_footerDetail">
                                <h2>Affiliate Disclaimer</h2>
                                <p><?= $websiteData['w_disclaimertext'] ?></p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="pf_footerDetail">
                                <h2>Legal</h2>
                                <ul>
                                    <li><a href="https://affiliatecloner.net/footer1601757347048" target="_blank">Terms and Conditions</a></li>
                                    <li><a href="https://affiliatecloner.net/footer1601757347048" target="_blank">Privacy Policy</a></li>
                                    <li><a href="https://affiliatecloner.net/footer1601757347048" target="_blank">Income Disclaimer</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pf_copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <p class="pf_margin0">Copyright © 2020 Profit Pusher. All Right Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- Video Frame popup -->
       <div class="modal fade pf_modal" id="VideoPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="pf_videobox text-center">
                            <div class="pf_iframe placeIframe"></div>
                            <a hre="javascript:;" class="pfb_close" data-dismiss="modal"><img src="<?= base_url() ?>assets/backend/images/svg/cancel.svg" alt="">Close</a>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
	    <!-- GO To Top -->
        <a href="javascript:void(0);" id="scroll"><span class="fa fa-angle-double-up"></span></a>
        <!-- script -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/custom.js?q=<?= date('his') ?>"></script>
    </body>
</html> 