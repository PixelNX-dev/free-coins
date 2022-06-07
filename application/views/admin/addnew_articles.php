<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <div class="form-group">
                    <label class="ad_label">Choose Niche</label>
                    <div class="ad_select_box">
                        <select id="art_nicheid" class="ad_select form-control" data-placeholder="Select Niche">
                            <?php if(!empty($nicheList)) { 
                            foreach($nicheList as $soloList) { 
                                $sel = !empty($articleData) ? ( $soloList['n_id'] == $articleData[0]['art_nicheid'] ? 'selected' : '' ) : '' ;
                                echo '<option value="'.$soloList['n_id'].'" '.$sel.'>'.$soloList['n_title'].'</option>';
                            } } else {
                                echo '<option value="0">Please add niche first</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Title</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control" id="art_title" value="<?= !empty($articleData) ? $articleData[0]['art_title'] : '' ?>"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Body</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <textarea class="form-control" id="art_body"><?= !empty($articleData) ? $articleData[0]['art_body'] : '' ?></textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="<?= !empty($articleData) ? $articleData[0]['art_id'] : 0 ?>" id="art_id">
                <button class="ad_btn ad_mTop15 bg-blue" onclick="submitArticles()"><?= !empty($articleData) ? 'Update' : 'Save' ?></button>
            </div>
        </div>
    </div>
</div>