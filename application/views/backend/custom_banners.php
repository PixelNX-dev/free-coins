<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pfb_setup_wrapper">
                    <nav aria-label="breadcrumb" class="pfb_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home/mysites') ?>">my sites</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crypto Banners</li>
                        </ol>
                    </nav> 

                    <h2>CRYPTO BANNERS</h2>
                    <p class="mb-0">You can monetize your site traffic with the banners you add here.</p>
                    <p class="mb-0"> Please review the training for possible ideas of banners you can add here.</p>
                <form method="post" onsubmit="return false;" enctype="multipart/form-data" id="CustomBannerUploadForm"> 
                <div class="pfb_white_box">
                    <?php 
                    if(!empty($nicheList)) {
                        $i=0;
                        foreach($nicheList as $soloNiche) {
                            $i++;
                    ?>
                        <h3>CATEGORY #<?= $i ?>: <b><?= strtoupper($soloNiche['n_title']) ?></b>
                            <label class="pfb_selecttoggle">
                                <input type="checkbox" name="overwrite[]" id="niche_<?= $soloNiche['n_id'] ?>" class="d-none customBanners" value="<?= $soloNiche['n_id'] ?>" <?= $soloNiche['f_affiliatelinkLB'] != "" ? "checked" : ""; ?>>
                                <span></span>
                            </label>
                        </h3>
                        <div class="pfb_setup_website pfb_customeBanner pfb_bottompadder30">
                            <div class="table-responsive">
                                <table>
                                    <thead> 
                                        <tr><th colspan="2">Ideas</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="pfb_formInput">
                                                    <label>Affiliate Link for 728 x 90 Banner</label>
                                                    <input type="text" class="form-control ideas_<?= $soloNiche['n_id'] ?>" value="<?= $soloNiche['f_affiliatelinkLB'] ?>" name="affiliatelinkLB_<?= $soloNiche['n_id'] ?>" placeholder="Affiliate Link for 728 x 90 Banner">
                                                </div>
                                                <div class="pfb_formInput">
                                                    <label>Affiliate Link for 300 x 325 Banner</label>
                                                    <input type="text" class="form-control ideas_<?= $soloNiche['n_id'] ?>" value="<?= $soloNiche['f_affiliatelinkSM'] ?>" name="affiliatelinkSM_<?= $soloNiche['n_id'] ?>" placeholder="Enter Affiliate Link for 300 x 325 Banner">
                                                </div>
                                            </td>
                                            <td>Show Image
                                                <label>728 x 90 Banner <?= $soloNiche['f_lbimage'] != "" ? "<a class='pfb_view_link' href='javascript:;' onclick='showImage(this)' data-src='".$soloNiche['f_lbimage']."' data-size='728'>View</a>" : "" ?></label>
                                                <div class="pfb_inputWithReload">
                                                    <input type="file" class="form-control ideas_<?= $soloNiche['n_id'] ?> pfb_fileInpute" name="lbimage_<?= $soloNiche['n_id'] ?>" value="" data-size="728x90">
                                                    <span><?= $soloNiche['f_lbimage'] != "" ? "Uploaded" : "Upload Banner" ?></span>
                                                    <p class="pfb_uploadeImage_text"><?= $soloNiche['f_lbimage'] != "" ? explode("/upload/",$soloNiche['f_lbimage'])[1] : "" ?></p>
                                                    <input type="hidden" value="<?= $soloNiche['f_lbimage'] != "" ? explode("/upload/",$soloNiche['f_lbimage'])[1] : "" ?>" id="hidden_lbimage_<?= $soloNiche['n_id'] ?>" name="hidden_lbimage_<?= $soloNiche['n_id'] ?>">
                                                </div>
                                                <label>300 x 325 Banner <?= $soloNiche['f_smimage'] != "" ? "<a class='pfb_view_link' href='javascript:;' onclick='showImage(this)' data-src='".$soloNiche['f_smimage']."' data-size='300'>View</a>" : "" ?></label>
                                                <div class="pfb_inputWithReload">
                                                    <input type="file" class="form-control pfb_fileInpute ideas_<?= $soloNiche['n_id'] ?>" name="smimage_<?= $soloNiche['n_id'] ?>" value="" data-size="300x325">
                                                    <span><?= $soloNiche['f_smimage'] != "" ? "Uploaded" : "Upload Banner" ?></span>
                                                    <p class="pfb_uploadeImage_text"><?= $soloNiche['f_smimage'] != "" ? explode("/upload/",$soloNiche['f_smimage'])[1] : "" ?></p>
                                                    <input type="hidden" value="<?= $soloNiche['f_smimage'] != "" ? explode("/upload/",$soloNiche['f_smimage'])[1] : "" ?>" id="hidden_smimage_<?= $soloNiche['n_id'] ?>" name="hidden_smimage_<?= $soloNiche['n_id'] ?>">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } } ?>
                    </div>

                    <div class="pfb_setup_btns">
                        <a href="<?= base_url() ?>home/mysites" class="pfb_fontweight500"><img src="<?= base_url() ?>assets/backend/images/svg/arrowleft.svg" alt=""> Return to My Sites</a>
                        <a href="javascript:;" class="pfb_btn pfb_purpleBtn" onclick="submitCustomBanners(<?= $webid ?>)">Save crypto Banners</a>
                    </div>
                </div>
                </form>
        </div>
        </div>
    </div>
</div>