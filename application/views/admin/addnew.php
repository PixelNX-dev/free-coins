<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <div class="form-group">
                    <label class="ad_label">Choose Niche</label>
                    <div class="ad_select_box">
                        <select id="nicheid" class="ad_select form-control" data-placeholder="Select Niche">
                            <?php if(!empty($nicheList)) { 
                            foreach($nicheList as $soloList) { 
                                echo '<option value="'.$soloList['n_id'].'">'.$soloList['n_title'].'</option>';
                            } } else {
                                echo '<option value="0">Please add niche first</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="parentDiv">
                    <div class="form-group repDiv">
                        <label class="ad_label"><?= ucfirst($pagetype) ?></label>
                        <div class="row">
                            <div class="col-xl-10">
                                <textarea class="form-control dataTitle"></textarea>
                                <span style="color: red;">It can't be more than 250 Characters.</span>
                            </div>
                            <div class="col-xl-2">
                                <div class="ad_addActions">
                                    <span class="ad_plus">&plus;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="ad_btn ad_mTop15 bg-blue" onclick="submitCommonData('<?= $pagetype ?>')">Save</button>
            </div>
        </div>
    </div>
</div>