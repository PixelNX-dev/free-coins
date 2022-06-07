<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pfb_setup_wrapper">
                    <nav aria-label="breadcrumb" class="pfb_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home/create') ?>">My Sites</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('home/website_setup/'.$webid) ?>">Basic Settings</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('home/about_city/'.$webid) ?>">About Your City</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('home/choose_niche/'.$webid) ?>">Niches</a></li>
                            <li class="breadcrumb-item active"><a href="javaScript:;">Banners</a></li>
                        </ol>
                    </nav> 

                    <h2>Create Banners</h2>
                    <p class="pfb_bottompadder30">Now choose the 2x banners for each niche that you have selected (one wide banner, one square banner). </br> You can replace these later with your own banners.</p>
                    <form id="chooseBannerForm" method="post" onsubmit="return false;">
                    <div class="pfb_white_box">
                    <?php 
                        if(!empty($nicheList)) {
                            $i=0;
                            foreach($nicheList as $soloNiche) {
                                $i++;
                            $largeBanners = $this->DBfile->get_data('largebannerstbl',array('l_nicheid'=>$soloNiche['n_id']));
                            $smallBanners = $this->DBfile->get_data('smallbannerstbl',array('s_nicheid'=>$soloNiche['n_id']));
                            
		                    $frontWebData = $this->DBfile->get_data('frontwebtbl',array('f_webid'=>$webid,'f_nicheid'=>$soloNiche['n_id']));
                            
                    ?>
                        <h3 class="pfb_feilds nicheCls" id="niches_<?= $soloNiche['n_id'] ?>">NICHE #<?= $i ?>: <?= strtoupper($soloNiche['n_title']) ?></h3>
                        <?php if(!empty($largeBanners)) { ?>
                        <h3>First, choose 2X <b>728 x 90 </b>banners for the <?= strtolower($soloNiche['n_title']) ?> niche:</h3>
                        <div class="pfb_setup_website pfb_sidebar_table pb-5">
                            <?php foreach($largeBanners as $soloLarge) { ?>
                                <div class="pfb_graybox">
                                    <div class="row pfb_feildBox m-0">
                                        <div class="col-12 col-lg-4 p-0 pfb_feilds">
                                            <label class="pfb_selecttoggle inline_toggle">
                                                <input type="checkbox" name="lbanner[]" id="lb_<?= $soloLarge['l_id'] ?>" value="<?= $soloLarge['l_imageurl'] ?>" class="d-none largeBanners_<?= $soloLarge['l_nicheid'] ?>" <?= !empty($frontWebData) ? ( $frontWebData[0]['w_lbimg1'] == $soloLarge['l_imageurl'] || $frontWebData[0]['w_lbimg2'] == $soloLarge['l_imageurl'] ? 'checked' : '' ) : '' ?>>
                                                <span></span>
                                                <?= $soloLarge['l_name'] ?>
                                            </label>
                                        </div>
                                        <div class="col-12 col-lg-8 p-0  pfb_niches">
                                            <div class="pfb_table_dv">
                                                <p>Affiliate link</p>
                                                <input type="text" name="lb_<?= $soloLarge['l_id'] ?>" value="<?= strpos($soloLarge['l_clickbankurl'],'zzzz') > 0 ? str_replace('zzzzz',$websiteData[0]['w_cbname'],$soloLarge['l_clickbankurl']) : str_replace('xxxx',$websiteData[0]['w_cbname'],$soloLarge['l_clickbankurl']) ?>" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12  p-0">
                                            <img src="<?= $soloLarge['l_imageurl'] ?>" alt="Ad Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="pfb_rate">
                                        <a href="<?= $soloLarge['l_salespage'] ?>" target="_blank" class="pfb_btn">Sales Letter</a>
                                        <a href="<?= $soloLarge['l_affiliatepage'] ?>" target="_blank" class="pfb_btn pfb_purpleBtn">Affiliate Page</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php if(!empty($smallBanners)) { ?>
                        <h3>Then select 2x <b>300x325</b> banners for the <?= strtolower($soloNiche['n_title']) ?> niche:</h3>
                        <div class="pfb_setup_website pfb_sidebar_table">
                            <div class="pfb_white_box fullwidth_content">
                                <div class="row">
                                    <?php foreach($smallBanners as $soloSmall) { ?>
                                    <div class="col-lg-4">
                                        <div class="row mx-0 pfb_graybox fullwidth_content">
                                            <div class="col-12 p-0">
                                                <label class="pfb_selecttoggle inline_toggle">
                                                    <input type="checkbox" name="sbanner[]" id="sb_<?= $soloSmall['s_id'] ?>" value="<?= $soloSmall['s_imageurl'] ?>" class="d-none smallBanners_<?= $soloSmall['s_nicheid'] ?>" <?= !empty($frontWebData) ? ( $frontWebData[0]['w_smimg1'] == $soloSmall['s_imageurl'] || $frontWebData[0]['w_smimg2'] == $soloSmall['s_imageurl'] ? 'checked' : '' ) : '' ?>>
                                                    <span></span>
                                                    <?= $soloSmall['s_name'] ?>
                                                </label>
                                            </div>
                                            <div class="col-12 p-0">
                                                <img src="<?= $soloSmall['s_imageurl'] ?>" alt="Ad Image" class="img-fluid">
                                            </div>
                                            <div class="col-12 p-0 pfb_niches">
                                                <div class="pfb_table_dv">
                                                    <p>Affiliate link</p>
                                                    <input type="text" name="sb_<?= $soloSmall['s_id'] ?>" value="<?= str_replace('zzzzz',$websiteData[0]['w_cbname'],$soloSmall['s_clickbankurl']) ?>" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-12 p-0 pfb_rate">
                                                <a href="<?= $soloSmall['s_salespage'] ?>" target="_blank" class="pfb_btn">Sales Letter</a>
                                                <a href="<?= $soloSmall['s_affiliatepage'] ?>" target="_blank" class="pfb_btn pfb_purpleBtn">Affiliate Page</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    <?php } } ?>
                    </div> 
                         
                    <div class="pfb_setup_btns">
                        <a href="<?= base_url() ?>home/choose_niche/<?= $webid ?>" class="pfb_fontweight500"><img src="<?= base_url() ?>assets/backend/images/svg/arrowleft.svg" alt=""> Return to Niche Page</a>
                        <a href="javascript:;" class="pfb_btn pfb_purpleBtn" onclick="submitFinalSteps(<?= $webid ?>)">Save & Proceed To My Sites</a>
                    </div>
                    </form>   
                </div>
        </div>
        </div>
    </div>
</div>