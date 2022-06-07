<div class="traf_content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
               <div class="traf_shared_wrapper">
                    <div class="traf_createNew">
                        <h3>Shared Posts</h3>
                        <div class="form-inline">
                            <div class="traf_searctFeild">
                                <input type="text" id="urltoshare" class="form-control traf_datatableSearch" placeholder="Search">
                            </div>
                            <button class="traf_btn" onclick="window.location.href='<?= base_url('home/create') ?>';">Create New Site</button>
                        </div>
                    </div>

                    <table class="traf_table table" data-source="<?= base_url('home/shared/list') ?>">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>URL</th>
                                <!-- <th>Total View</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
               </div>
             </div>
        </div>
    </div>
</div>


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