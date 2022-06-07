<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITENAME ?> | Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/js/toastr/toastr.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/login.css" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="ad_login_wrapper">

        <div class="ad_logo">
              <img src="<?= base_url() ?>assets/frontend/images/dark_logo.png" alt="" />
        </div>
        <div class="ad_login_box ad_active" id="login">
              <div class="ad_logo">
                    <span>Login</span>
              </div>
              <div class="ad_inputBox">
                  <label>Email</label>
                  <input type="text" value="<?= isset($_COOKIE['em']) ? $_COOKIE['em'] : '' ?>" placeholder="Enter Email" id="em" />
              </div>
              <div class="ad_inputBox">
                  <label>Password</label>
                  <input type="password" value="<?= isset($_COOKIE['em']) ? $_COOKIE['pwd'] : '' ?>" placeholder="Enter Password" id="pwd"/>
              </div>
              <div class="ad_rememberme">
                <label class="ad_checkBox " for="rememberme">
                    <input type="checkbox" class="d-none" <?= isset($_COOKIE['em']) ? 'checked' : '' ?> id="rememberme" value="1">
                    <span class="ad_mRight10"></span>
                    Remember me
                </label>
              </div>

              <a class="ad_btn bg-primary-gradient" onclick="loginSection()">Login</a>
        </div>
    <script>window.baseurl = "<?= base_url() ?>"</script>
    <script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/toastr/toastr.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/login.js?q=<?= date('his') ?>"></script>
</body>
</html>