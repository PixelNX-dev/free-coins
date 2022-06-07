<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <div class="form-group">
                    <label class="ad_label">Choose Niche</label>
                    <div class="ad_select_box">
                        <select name="v_nicheid" class="ad_select form-control validate" data-placeholder="Select Niche" data-isselect=1>
                            <?php if(!empty($nicheList)) { 
                            foreach($nicheList as $soloList) { 
                                $sel = isset($resultSet) && $resultSet['v_nicheid'] == $soloList['n_id'] ? 'selected' : '' ;
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
                            <input type="text" class="form-control validate" name="v_name" data-maxlength=51 data-minlength=5 value="<?= isset($resultSet) ? $resultSet['v_name'] : '' ?>"/>
                            <span style="color: #3a8ffd;">It should be between 5 to 50 Characters.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Youtube URL</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="v_yturl" data-url=1 value="<?= isset($resultSet) ? $resultSet['v_yturl'] : '' ?>" />
                            <span style="color: #3a8ffd;">It should be a valid URL starting with http or https.</span>
                        </div>
                    </div>
                </div> 
                
                <input type="hidden" name="uniqeid" value="<?= isset($resultSet) ? $resultSet['v_id'] : 0 ?>">
                <button class="ad_btn ad_mTop15 bg-blue" onclick="validateAndSubmit('videos')"><?= isset($resultSet) ? 'Update' : 'Save' ?></button>
            </div>
        </div>
    </div>
</div>