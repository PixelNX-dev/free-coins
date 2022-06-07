<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pfb_setup_wrapper">
                    <div class="pfb_white_box">
                        <div class="pfb_whitebox_title">
                            <div class="inner_dv">
                                <h3><b>My Website</b></h3>
                                <p>Manage all your sites on this page. If you want to create unlimited sites, <br> upgrade to "unlimited" <a href="javascript:;" style="color: #1D548F;font-weight: bold;">Here</a>
                            </p>
                            </div>
                        <?php if(isset($this->session->userdata['is_oto1']) && $this->session->userdata['is_oto1'] == 0 ) { ?>
                            <a href="javascript:;" class="pfb_btn" data-toggle="modal" data-target="#proAccountPopup"><img src="<?= base_url() ?>assets/backend/images/svg/plus.svg"> create new website</a>
                        <?php } else { ?>
                            <a href="<?= base_url('home/create') ?>" class="pfb_btn"><img src="<?= base_url() ?>assets/backend/images/svg/plus.svg"> create new website</a>
                        <?php } ?>
                        </div>
                        <div class="pfb_setup_website pfb_bottompadder30 my_website_dv">
                            <div class="table-responsive">
                                <table>
                                    <thead> 
                                        <tr>
                                            <th>Website</th>
                                            <th>Categories</th>
                                            <th>Site Setting & Monitization</th>
                                            <th>Daily Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($siteList)) { 
                                            foreach($siteList as $soloSite) { ?>
                                        <tr>
                                            <td><a id="shareUrl_<?= $soloSite['w_id'] ?>" href="<?= base_url('n/'.$soloSite['w_sitename']) ?>" target="_blank"><?= base_url('n/'.$soloSite['w_sitename']) ?> </a></td>
                                            <?php
                                                $nicheList = $this->DBfile->get_join_data('frontwebtbl','nichetbl','frontwebtbl.f_nicheid=nichetbl.n_id',array('f_webid'=>$soloSite['w_id']),'n_title');
                                                $nicheStr = '';
                                                if(!empty($nicheList)){
                                                    foreach($nicheList as $soloNiche)
                                                        $nicheStr .= ucfirst($soloNiche['n_title']).' , ';
                                                }
                                            ?>
                                            <td><p><?= trim($nicheStr,', ') ?></p></td>
                                            <td>
                                                <ul class="pfb_inline_listing">
                                                    <li>
                                                        <a href="<?= base_url('home/create/'.$soloSite['w_id']) ?>">
                                                            Site Setup 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= base_url('home/social_lists/'.$soloSite['w_id']) ?>">
                                                            Social & Lists
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= base_url('home/custom_banners/'.$soloSite['w_id']) ?>">
                                                            Crypto banners
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" onclick="openShareOptions(<?= $soloSite['w_id'] ?>)">
                                                            Share & Promote
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="pfb_action_btn">
                                                    <a href="<?= base_url('home/publish_edit/'.$soloSite['w_id']) ?>" class="pfb_edit_btn pfb_btn pfb_publicEdit_btn " title="Publish & Edit Content">
                                                        Publish & Edit Articles
                                                    </a>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pfb_white_box">
                        <div class="pfb_setup_website pfb_bottompadder30 pfb_upgrade_soft">
                            <h3>Upgrade Your Package</h3>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="software_box borderBottom_pink">
                                        <h5 class="text_pink"><?= SITENAME ?> App</h5>
                                        <p>Create one <?= SITENAME ?> website</p>
                                        <a href="javascript:void(0);" class="pfb_btn">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17">
                                                    <path class="cls-1" d="M535.115,971.408c0.189-.289.336-0.508,0.479-0.731,2.156-3.356,4.419-6.624,7.565-9.136a5.457,5.457,0,0,1,3.84-1.535A67.276,67.276,0,0,0,535.158,977,20.459,20.459,0,0,0,528,968.352C531.269,967.386,533.09,969.524,535.115,971.408Z" transform="translate(-528 -960)"></path>
                                                </svg>
                                            </span> 
                                            Installed
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="software_box borderBottom_blue">
                                        <h5 class="text_blue"><?= SITENAME ?> Unlimited</h5>
                                        <p>Create unlimited <?= SITENAME ?> websites (with agency rights).</p>
                                        <?php if(isset($this->session->userdata['is_oto1']) && $this->session->userdata['is_oto1'] == 0 ) { ?>
                                            <a href="https://grabfreecoin.com/freecoin-upgrade1" target="_blank" class="pfb_btn pfb_purpleBtn">Get Instant Access!</a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0);" class="pfb_btn">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17">
                                                    <path class="cls-1" d="M535.115,971.408c0.189-.289.336-0.508,0.479-0.731,2.156-3.356,4.419-6.624,7.565-9.136a5.457,5.457,0,0,1,3.84-1.535A67.276,67.276,0,0,0,535.158,977,20.459,20.459,0,0,0,528,968.352C531.269,967.386,533.09,969.524,535.115,971.408Z" transform="translate(-528 -960)"></path>
                                                </svg>
                                                </span> 
                                                Installed
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="software_box borderBottom_orange">
                                        <h5 class="text_orange"><?= SITENAME ?> Reseller</h5>
                                        <p>Get resell rights to <?= SITENAME ?> & 30x other software tools.</p>
                                        <a href="https://bonus.software/freecoin"  target="_blank" class="pfb_btn pfb_purpleBtn"> 
                                            Get Instant Access!
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>