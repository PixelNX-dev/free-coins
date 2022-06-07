<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pfb_setup_wrapper">
                    <nav aria-label="breadcrumb" class="pfb_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home/mysites') ?>">My Sites</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('home/website_setup/'.$webid) ?>">Basic Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        </ol>
                    </nav> 
                    <h2>Categories</h2>
                    <p class="pdf_selectedmsg"><b class="selectedNicheText"><?= count($webNiche) ?> Categories Selected.</b> Please Select 5 Categories to proceed</p>
                    <p class="pfb_bottompadder30">Now choose the categories for your site. This will divide your site into sections with content about each. Choose up to FIVE categories?</p>
                    <?php
                        $colorArray = array('','pfb_yellow','pfb_orange','pfb_cyan','pfb_blue','pfb_pink');
                    ?>
                    <div class="row">
                    <?php 
                        if(!empty($nicheList)) {
                            $i=0;
                            foreach($nicheList as $soloNiche) {
                    ?>
                        <div class="col-lg-6 col-md-12">
                            <label class="pfb_niche_checkbox">
                                <input type="checkbox" name="webniche[]" value="<?= $soloNiche['n_id'] ?>" class="d-none" <?= in_array($soloNiche['n_id'],$webNiche) ? 'checked' : '' ?>>
                                <span>
                                    <span>
                                        <span class="pfb_title"><?= $soloNiche['n_title'] ?></span>
                                         <span class="pfb_pera"><?= $soloNiche['n_desc'] ?></span> 
                                    </span>
                                </span>
                            </label>
                        </div>
                    <?php $i++; } } ?>
                    </div>
                    
                    <div class="pfb_setup_btns">
                        <a href="<?= base_url('home/website_setup/'.$webid) ?>" class="pfb_fontweight500"><img src="<?= base_url() ?>assets/backend/images/svg/arrowleft.svg" alt=""> Return to Basic Settings</a>
                        <a href="javascript:;" class="pfb_btn pfb_purpleBtn" onclick="submitSelectedNiches(<?= $webid ?>)">Save & Create Site</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>