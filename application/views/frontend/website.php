<?php
   $pageTitle = $websiteData['w_sitetitle'] == '' ? '' : $websiteData['w_sitetitle'];
   $pageTitle = $nicheName == "" ? "Home | ".$pageTitle : $nicheName." | ".$pageTitle ;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $pageTitle ?></title>
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
                              <a href="<?= base_url('n/').$websiteData['w_sitename'] ?>"><img src="<?= base_url('assets/webupload/'.$websiteData['w_logourl']) ?>" alt="" class="img-fluid"/></a>
                           <?php } elseif($websiteData['w_logotext']!='') { ?>
                              <a href="<?= base_url('n/').$websiteData['w_sitename'] ?>" style="color:<?= $websiteData['w_themecolor'] ?>;font-family:<?= $websiteData['w_logofont'] ?>; font-size:40px;"><?= $websiteData['w_logotext'] ?></a>
                           <?php } else { ?>
                              <a href="<?= base_url('n/').$websiteData['w_sitename'] ?>"><img src="<?= base_url('assets/frontend/images/logo.png') ?>" alt="" class="img-fluid"/></a>
                           <?php } ?>
                           </div>

                           <?= empty($frontWebData) && isset($frontWebData['f_lbimage']) ? ($frontWebData['f_lbimage'] == '' ? '<div class="pf_headeradd"></div>' : '<div class="pf_headeradd"><a href="'.$frontWebData['f_affiliatelinkLB'].'" target="_blank"><img style="max-width: 728px;max-height: 90px;" src="'.$frontWebData['f_lbimage'].'" alt="" class="img-fluid"/></a></div>') : '<div class="pf_headeradd"></div>'; ?>
                        </div>
                        <div class="pf_menu_wrapper text-center">
                           <ul class="pf_menu">
                              <li class="pf_toggle"><span class="pf_closeMenu"></span></li>
                              <li <?= $nicheid == 0 ? 'class="pf_active"' : '' ?>><a href="<?= base_url('n/').$websiteData['w_sitename'] ?>">Home</a></li>
                              <?php if(!empty($nicheList)) { 
                                    foreach($nicheList as $soloNiche) { ?>
                              <li <?= $nicheid == $soloNiche['n_id'] ? 'class="pf_active"' : '' ?>><a href="<?= base_url('n/').$websiteData['w_sitename'].'/'.$soloNiche['n_slug'] ?>"><?= ucfirst($soloNiche['n_title']) ?></a></li>
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
                      
                <h2 class="pf_boxTitle pf_pageTitle_dv">Latest Posts</h2>
                <img class="img-fluid mb-5" src="<?= base_url('assets/frontend/images/border_title.png') ?>" alt="Border">
                     <div class="pf_whiteBox pf_onlyText bg_transprednt">
                        <?php if(!empty($articles)) {
                        foreach($articles as $soloArticles) { 
                           $blogUrl = base_url().'n/'.$websiteData['w_sitename'].'/'.$soloArticles['n_slug'].'/'.$soloArticles['webart_slug'];
                           ?>
                        <div class="pf_box_image_text_inner">
                           <span class="pf_box_orange">New</span>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="pf_box_image_right">
                                    
                                    <div class="pf_box_image_right_text mt-4">
                                       <h2 class="mb-3"><a href="<?= $blogUrl ?>" target="_blank"><?= $soloArticles['webart_title'] ?></a></h2>
                                       <i class="far fa-clock"></i><span class="pf_black"><?=  date("dS, F \@ g:i a \E\S\T", strtotime($soloArticles['webart_date'])) ?></span>
                                       <p class="mt-3 mb-4"><?= substr( strip_tags($soloArticles['webart_blog']), 0, 200) ?></p>
                                       <a href="<?= $blogUrl ?>"  target="_blank" class="pf_btn pf_greenBtn">Read More <span class="pf_btnIcon_img">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="12px">
                                            <path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M15.913,5.367 L11.280,0.899 C10.909,0.540 10.301,0.540 9.930,0.899 C9.742,1.080 9.638,1.323 9.638,1.583 C9.638,1.843 9.741,2.086 9.930,2.268 L12.861,5.095 L1.118,5.095 C0.585,5.095 0.151,5.524 0.151,6.051 C0.151,6.579 0.585,7.007 1.118,7.007 L12.861,7.007 L9.930,9.835 C9.742,10.016 9.638,10.259 9.638,10.519 C9.638,10.779 9.741,11.022 9.930,11.204 C10.111,11.379 10.351,11.475 10.605,11.475 C10.859,11.475 11.099,11.379 11.281,11.204 L15.913,6.736 C16.101,6.554 16.205,6.311 16.205,6.052 C16.205,5.791 16.101,5.548 15.913,5.367 Z"/>
                                            </svg>
                                       </span></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php } } ?>
                     </div>
                     
                  </div>


                  <div class="col-xl-4 col-lg-4 order-lg-2 order-md-1 order-sm-1 order-xs-1">
                     <div class="pf_whiteBox pf_about_box text-center">
                           <h2 class="pf_boxTitle">About Us</h2>
                           <p><?= $websiteData['w_abouttext'] ?></p>
                     </div>

                     <?php if( $websiteData['w_fburl'] != '' || $websiteData['w_yturl'] != '' || $websiteData['w_tiktokurl'] != '' || $websiteData['w_twiturl'] != '' || $websiteData['w_pinurl'] != '' || $websiteData['w_instaurl'] != '' ) { ?> 
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
                     <?php } ?> 
                     
                     <?= empty($frontWebData) && isset($frontWebData['f_smimage']) ? ($frontWebData['f_smimage'] == '' ? '<div class="pf_whiteBox pf_adBox"></div>' : '<div class="pf_whiteBox pf_adBox"><a href="'.$frontWebData['f_affiliatelinkSM'].'" target="_blank"><img src="'.$frontWebData['f_smimage'].'" alt="" class="img-fluid"/></a></div>') : '<div class="pf_whiteBox pf_adBox"></div>'; ?>


                     <?php if( $websiteData['w_arcode'] != '' ) { ?>
                     <div class="pf_whiteBox pf_form">
                        <?= $websiteData['w_arcode'] ?>
                     </div>
                     <?php } ?> 

                     </div> 

               </div>
            </div>
         </div>
         <!-- <div class="pf_footer">
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
         </div> -->
            <div class="pf_copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                           <p class="pf_margin0">Copyright © <?= date('Y') ?> <?= $websiteData['w_sitetitle'] == '' ? SITENAME : $websiteData['w_sitetitle'] ?>. All Right Reserved.</p>
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