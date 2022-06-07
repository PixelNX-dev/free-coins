<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <form id="uploadForm" method="post" onsubmit="return false;" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="ad_label">Bonus Name</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="b_name" data-maxlength=51 data-minlength=5 value="<?= isset($resultSet) ? $resultSet['b_name'] : '' ?>"/>
                            <span style="color: #3a8ffd;">It should be between 5 to 50 Characters.</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="ad_label">Logo</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="file" class="form-control <?= isset($resultSet) ? '' : 'validate' ?>" name="userfiles" id="imgfile"/>
                            <span style="color: #3a8ffd;">Logo should be in jpeg or png format and maximum of 1MB.</span>
                        </div>
                        <?= isset($resultSet) ? '<div class="logo_preview"><img src="'.base_url().'assets/upload/'.$resultSet['b_image'].'" /></div>' : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="ad_label">Description</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <textarea class="form-control validate" name="b_description" data-maxlength=501 data-minlength=50  /><?= isset($resultSet) ? $resultSet['b_description'] : '' ?></textarea>
                            <span style="color: #3a8ffd;">It should be between 50 to 500 Characters.</span>
                        </div>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="ad_label">Vimeo URL</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control validate" name="b_vimeourl" data-url=1 value="<?= isset($resultSet) ? $resultSet['b_vimeourl'] : '' ?>" />
                            <span style="color: #3a8ffd;">It should be a valid URL starting with http or https.</span>
                        </div>
                    </div>
                </div> 
                <input type="hidden" name="uniqeid" value="<?= isset($resultSet) ? $resultSet['b_id'] : 0 ?>">
                <input type="hidden" name="pageType" value='bonus'>
                </form>
                <button class="ad_btn ad_mTop15 bg-blue" onclick="validateAndSubmit('bonus')"><?= isset($resultSet) ? 'Update' : 'Save' ?></button>
            </div>
        </div>
    </div>
</div>