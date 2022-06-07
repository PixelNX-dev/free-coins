<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <div class="form-group">
                    <label class="ad_label">Name</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control" id="u_name" value="<?= !empty($userData) ? $userData[0]['u_name'] : '' ?>"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Email</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control" id="u_email" value="<?= !empty($userData) ? $userData[0]['u_email'] : '' ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Password</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control" id="u_password" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ad_label">Front End</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <select id="is_fe" class="form-control">
                                <option value="0" <?= !empty($userData) ? ( $userData[0]['is_fe'] == 0 ? 'selected' : '' ) : ''?>>No</option>
                                <option value="1" <?= !empty($userData) ? ( $userData[0]['is_fe'] == 1 ? 'selected' : '' ) : ''?>>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="ad_label">Unlimited</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <select id="is_oto1" class="form-control">
                                <option value="0" <?= !empty($userData) ? ( $userData[0]['is_oto1'] == 0 ? 'selected' : '' ) : ''?>>No</option>
                                <option value="1" <?= !empty($userData) ? ( $userData[0]['is_oto1'] == 1 ? 'selected' : '' ) : ''?>>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="<?= !empty($userData) ? $userData[0]['u_id'] : 0 ?>" id="u_id">
                <button class="ad_btn ad_mTop15 bg-blue" onclick="submitUserRecords()"><?= !empty($userData) ? 'Update' : 'Save' ?></button>
            </div>
        </div>
    </div>
</div>