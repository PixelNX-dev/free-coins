<div class="admin_main">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ad_box ad_mBottom30">
                <div class="form-group">
                    <label class="ad_label">Name</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" id="u_name" class="form-control" placeholder="Enter Name" value="<?= $userList[0]['u_name'] ?>">
                        </div>
                    </div>

                    <label class="ad_label">Email</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="text" class="form-control" placeholder="Enter Name" value="<?= $userList[0]['u_email'] ?>">
                        </div>
                    </div>

                    <label class="ad_label">Password</label>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="password" id="pwd" class="form-control">
                        </div>
                    </div>

                </div>
                <button class="ad_btn ad_mTop15 bg-blue" onclick="saveProfile()">Submit</button>
            </div>
        </div>
    </div>
</div>