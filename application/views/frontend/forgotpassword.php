<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= SITENAME ?> | Forgot Password</title>
		<link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/login-style.css">
		<!--favicon-->
		<link rel="icon" type="img/ico" href="<?= base_url() ?>assets/frontend/images/favicon.png">
	</head>

	<body class="notification_open">
		<div class="auth_main_wrapper">
			<div class="auth_loginForm">
				<div class="auth_log">
                    <img src="<?= base_url() ?>assets/frontend/images/logo.png" alt="">
                </div>
             <!--<div class="auth_log">
                 <a href="#" class="logo_"><span> <img src="https://trafficavalanche.net/assets/frontend/images/dollar-symbol.png"></span>payola</a>
                </div>-->
				<div class="traf_loginDetail">
				<div class="traf_login_box">
					
						<h1>Forgot Password</h1>
						<h6>Please enter your details below to continue</h6>
						
						<div class="auth_inputWrapper">
							<div class="auth_input"><label> Email Address</label>
								<input type="text" value="" placeholder="Enter Email" id="em">
							</div>
						</div>
						
						<div class="auth_remember">
							<div class="auth_remember">
								<a href="<?= base_url() ?>">Go Back To Login</a>
							</div>
						</div>
						
						<button type="submit" class="auth_btn" onclick="forgotSection()">Submit</button>
					</div>
				</div>
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