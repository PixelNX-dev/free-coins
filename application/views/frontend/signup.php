<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= SITENAME ?> | Sign Up</title>
        <!-- stylesheet -->
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/login-style.css">

        <!-- favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/frontend/images/favicon.png" type="image/x-icon">
    </head>
    <body class="notification_open">
        <div class="auth_main_wrapper">
            <div class="auth_loginForm">
                <div class="auth_log">
                    <img src="<?= base_url() ?>assets/frontend/images/logo.png" alt="" />
                </div>
                <h1>Welcome!</h1>
                <h6>To Use <?= SITENAME ?> Please Create Account By Signing Up.</h6>

                <div class="auth_inputWrapper">
                    <div class="auth_input">
                        <label>Name</label>
                        <input type="text" placeholder="Enter Name" id="nm" />
                    </div>
                    <div class="auth_input">
                        <label> Email Address</label>
                        <input type="text" placeholder="Enter Email" id="em" />
                    </div>
                    <div class="auth_input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Password" id="pwd"/>
                    </div>
                </div>

                <div class="auth_remember">
                    <a href="<?= base_url() ?>">Already have an account Login Now?</a> 
                </div>
                <button class="auth_btn" onclick="signupSection()">Sign Up</button>
            </div>
        </div>

        <div class="notificationPopup d-none">
            <span class="noti_icon"><img src=""></span>
            <span class="noti_msg">
                <span class="noti_heading"></span>
                <span class="noti_pera"></span>
            </span>
            <a class="close"><img src="<?= base_url() ?>assets/frontend/images/svg/close.svg" alt=""></a>
        </div>
        <!-- script -->
        
        <script>window.baseurl = "<?= base_url() ?>"</script>
        <script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/custom.js?q=<?= date('his') ?>"></script>
    </body>
</html>