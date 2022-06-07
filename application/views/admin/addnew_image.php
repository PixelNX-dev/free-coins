<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <form method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="form-group">
                    <label class="ad_label">Choose Niche</label>
                    <div class="ad_select_box">
                        <select name="nicheid" class="ad_select form-control" data-placeholder="Select Niche">
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
                        <label class="ad_label">Upload Image</label>
                        <div class="row">
                            <div class="col-xl-10">
                                <input type="file" class="form-control" name="userfiles[]"/>
                                <span style="color: red;">Image should be in jpeg or png format and maximum of 1MB.</span>
                            </div>
                            <div class="col-xl-2">
                                <div class="ad_addActions">
                                    <span class="ad_plus">&plus;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <button class="ad_btn ad_mTop15 bg-blue" onclick="uploadImages()">Save</button>
                <p id="imgErr" style="color:red;"></p>
            </div>
        </div>
    </div>
</div>