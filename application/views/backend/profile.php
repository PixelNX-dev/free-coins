<div class="pfb_content_wrapper">
    <div class="pfb_createWbsite pfb_profile_dv">
        <h4 class="pfb_bottompadder20">Edit Profile</h4>

            <div class="form-group">
                <label>Name</label>
                <input type="text" id="u_name" class="form-control" placeholder="Enter Name" value="<?= $userList[0]['u_name'] ?>">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" class="form-control" placeholder="Enter Email"  value="<?= $userList[0]['u_email'] ?>">
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" id="pwd" class="form-control" placeholder="Enter Password">
            </div>

            <?php if($userList[0]['u_id'] == 3 || $userList[0]['u_id'] == 5) { ?>
            <div class="text-center">
                <button class="pfb_btn pfb_purpleBtn" style="cursor: not-allowed;">Disabled for Review Access</button>
            </div>
            <?php } else { ?>
            <div class="text-center">
                <button class="pfb_btn pfb_purpleBtn" onclick="saveProfile()">Update</button>
            </div>
            <?php } ?>
    </div>
</div>