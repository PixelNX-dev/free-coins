<?php
   $pageTitle = $websiteData['w_sitetitle'] == '' ? '' : $websiteData['w_sitetitle'];
   $pageTitle = $singleArticle[0]['webart_title']." | ".$pageTitle ;
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
                                <div class="pf_headeradd"></div>
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
                    <?php 
                        $blogUrl = base_url().'n/'.$websiteData['w_sitename'].'/'.$singleArticle[0]['n_slug'].'/'.$singleArticle[0]['webart_slug'];
                    ?>
                        <div class="col-xl-8 col-lg-8 order-lg-1 order-md-2 order-sm-2 order-xs-2">
                        <div class="pf_whiteBox pf_onlyText pt-5">
                                <h3><?= $singleArticle[0]['webart_title'] ?></h3>
                                <div class="eg_view_icon mb-4">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="eg_view">
                                                <p><?= $singleArticle[0]['webart_views'] ?> View</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="eg_icon">
                                                <ul>
                                                    <li>
                                                    <p>Share</p>
                                                    </li>
                                                    <li>
                                                    <a href="https://www.facebook.com/sharer.php?t=<?= $singleArticle[0]['webart_title'] ?>&u=<?= $blogUrl ?>" class="blue"  target="_blank">
                                                        <svg id="Bold" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"></path>
                                                        </svg>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="https://twitter.com/intent/tweet?text=<?= $singleArticle[0]['webart_title'] ?>&url=<?= $blogUrl ?>" target="_blank" class="blue light_blue">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                                                    c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                                                    c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                                                    c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                                                    c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                                                    c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                                                    C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                                                    C480.224,136.96,497.728,118.496,512,97.248z"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="https://www.linkedin.com/shareArticle?title=<?= $singleArticle[0]['webart_title'] ?>&url=<?= $blogUrl ?>" class="blue dark_blue"  target="_blank">
                                                        <svg id="Bold" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"></path>
                                                            <path d="m.396 7.977h4.976v16.023h-4.976z"></path>
                                                            <path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"></path>
                                                        </svg>
                                                    </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                               
                                <p class="pf_bottompadder10"><?php
                                $art = $singleArticle[0]['webart_blog'];
                                echo strpos($art,'<') === false ? nl2br($art) : $art ; ?>
                                </p>

                                <div style='text-align: center;'>
                                    <h2>Want To Profit With NFTs Like This?</h2>
                                    <p>NFTs are a $4 billion a month industry in 2022.</p>
                                    <p><strong>Want to take your slice to profit with these NFTs?</strong></p>
                                    <p>You will need to buy and trade these NFTs (for example, buying an NFT for 0.001 BitCoin, then selling it for 0.002 BitCoin).</p>
                                    <p><strong>The first step is to setup and fund a &quot;wallet&quot;</strong> - which you can then use to send money to different marketplaces where you can trade NFTs.</p>
                                    <p>There are many cryptocurrency exchanges out there, but the one we recommend is <strong>Binance</strong>. This is the biggest exchange, worth over $4.5 billion.</p>
                                    <p>Binance lets you to get started with as little as $10, so simply click the banner below to get started with Binance:</p>
                                    <p>
                                        <a href="<?= $websiteData['w_binancelink']?>" target="_blank"><img src="https://thezentitan.com/dltitan/binance-banner.jpg" style="width: 100%;"/>
                                        </a>
                                    </p>
                                    <h3>STEP 1 - 
                                        <a href="<?= $websiteData['w_binancelink']?>" target="_blank" style="color:<?= $websiteData['w_themecolor'] ?>;">Click Here To Create Your Binance Account</a><br>
                                        Fund Your Wallet With $10 To Get Started
                                    </h3>
                                    <h3>STEP 2 - Use This Balance To Start Profiting With NFTs<br></h3>
                                </div>
                                <br/>
                                
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

                            <?php if( $websiteData['w_arcode'] != '' ) { ?>
                            <div class="pf_whiteBox pf_form">
                                <?= $websiteData['w_arcode'] ?>
                            </div>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>
            
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
	    <!-- GO To Top -->
        <a href="javascript:void(0);" id="scroll"><span class="fa fa-angle-double-up"></span></a>
        <!-- script -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/custom.js?q=<?= date('his') ?>"></script>
    </body>
</html> 