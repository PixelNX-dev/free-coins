<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <div class="form-group">
                    <label class="ad_label">Choose Niche</label>
                    <div class="ad_select_box">
                        <select name="p_nicheid" class="ad_select form-control validate" data-placeholder="Select Niche" data-isselect=1>
                            <?php if(!empty($nicheList)) { 
                            foreach($nicheList as $soloList) { 
                                $sel = isset($resultSet) && $resultSet['p_nicheid'] == $soloList['n_id'] ? 'selected' : '' ;
                                echo '<option '.$sel.' value="'.$soloList['n_id'].'">'.$soloList['n_title'].'</option>';
                            } } else {
                                echo '<option value="0">Please add niche first</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Product Name</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="p_name" data-maxlength=51 data-minlength=5 value="<?= isset($resultSet) ? $resultSet['p_name'] : '' ?>"/>
                            <span style="color: #3a8ffd;">It should be between 5 to 50 Characters.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Sales Letter URL</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="p_salespageurl" data-url=1 value="<?= isset($resultSet) ? $resultSet['p_salespageurl'] : '' ?>" />
                            <span style="color: #3a8ffd;">It should be a valid URL starting with http or https.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Affiliate Page URL</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="p_affiliatepage" data-url=1 value="<?= isset($resultSet) ? $resultSet['p_affiliatepage'] : '' ?>" />
                            <span style="color: #3a8ffd;">It should be a valid URL starting with http or https.</span>
                        </div>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="ad_label">Image URL</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="p_imageurl" data-url=1 value="<?= isset($resultSet) ? $resultSet['p_imageurl'] : '' ?>" />
                            <span style="color: #3a8ffd;">It should be a valid URL starting with http or https.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Video Link</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="p_videolink" data-url=1 value="<?= isset($resultSet) ? $resultSet['p_videolink'] : '' ?>" />
                            <span style="color: #3a8ffd;">It should be a valid URL starting with http or https.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Description</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <textarea class="form-control validate" name="p_description" data-maxlength=501 data-minlength=50  /><?= isset($resultSet) ? $resultSet['p_description'] : '' ?></textarea>
                            <span style="color: #3a8ffd;">It should be between 50 to 500 Characters.</span>
                        </div>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="ad_label">Affiliate Network</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="radio" <?= isset($resultSet) && $resultSet['p_affiliatenetwork'] == 'jv' ? 'checked' : '' ; ?> class="form-control" name="p_affiliatenetwork" value="jv">JvZoo<br/>
                            <input type="radio" <?= isset($resultSet) && $resultSet['p_affiliatenetwork'] == 'w' ? 'checked' : '' ; ?> class="form-control" name="p_affiliatenetwork" value="w">Warrior Plus<br/>
                            <input type="radio" <?= isset($resultSet) ? ( $resultSet['p_affiliatenetwork'] == 'cb' ? 'checked' : '' ) : 'checked' ; ?> class="form-control" name="p_affiliatenetwork" value="cb">ClickBank<br/>
                        </div>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="ad_label">Affiliate Link for ClickBank</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control" name="p_affiliatelink" value="<?= isset($resultSet) ? $resultSet['p_affiliatelink'] : '' ?>" />
                            <span style="color: #3a8ffd;">It should be a valid URL starting with http or https.</span>
                        </div>
                    </div>
                </div> 
                <input type="hidden" name="uniqeid" value="<?= isset($resultSet) ? $resultSet['p_id'] : 0 ?>">
                <button class="ad_btn ad_mTop15 bg-blue" onclick="validateAndSubmit('products')"><?= isset($resultSet) ? 'Update' : 'Save' ?></button>
            </div>
        </div>
    </div>
</div>