<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= SITENAME ?><?= isset($pagename) ? ' | '.$pagename : "" ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/js/select2/select2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/js/toastr/toastr.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
        <link rel="shortcut icon" href="<?= base_url() ?>assets/backend/images/favicon.png" type="image/x-icon">
    </head>
    <body>
        <div class="admin_main_wrapper ad_mainMenuOpen">
            <div class="admin_header">
                <div class="ad_headerLeft"><span class="ad_toggle"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px"><path d="M 0 2 L 0 4 L 24 4 L 24 2 Z M 0 11 L 0 13 L 24 13 L 24 11 Z M 0 20 L 0 22 L 24 22 L 24 20 Z"/></svg></span><h1><?= $pagename ?></h1></div>
                <div class="ad_headerRight">
                    <div class="ad_profile_wrapper">
                       <span><img src="<?= base_url() ?>assets/admin/images/profile.jpg" class="ad_mRight10" alt="" /><span class="ad_userName ad_subheading1">Hello <?= $this->session->userdata['firstname'] ?></span></span> 

                       <div class="ad_profileDropdown">
                            <ul>
                                <li><a href="<?= base_url('admin/profile') ?>">Profile</a></li>
                                <li><a href="<?= base_url('admin/logout') ?>">Logout</a></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
            <div class="admin_sidebar">
                <div class="ad_main_menu">
                    <ul>
                        <li>
                            <a href="<?= base_url('admin/dashboard') ?>">
                                <span><svg version="1.1" width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M506.188,236.413L297.798,26.65c-0.267-0.27-0.544-0.532-0.826-0.786c-22.755-20.431-57.14-20.504-79.982-0.169c-0.284,0.253-0.56,0.514-0.829,0.782L5.872,236.352c-7.818,7.804-7.831,20.467-0.028,28.285c7.804,7.818,20.467,7.83,28.284,0.028L50,248.824v172.684c0,44.112,35.888,80,80,80h72c11.046,0,20-8.954,20-20v-163h70v163c0,11.046,8.954,20,20,20h70c44.112,0,80-35.888,80-80c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20c0,22.056-17.944,40-40,40h-50v-163c0-11.046-8.954-20-20-20H202c-11.046,0-20,8.954-20,20v163h-52c-22.056,0-40-17.944-40-40v-212c0-0.2-0.003-0.399-0.009-0.597L243.946,55.26c7.493-6.363,18.483-6.339,25.947,0.055L422,208.425v113.083c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20v-72.82l15.812,15.917c3.909,3.935,9.047,5.904,14.188,5.904c5.097,0,10.195-1.937,14.096-5.812C513.932,256.912,513.974,244.249,506.188,236.413z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></span>
                                <h5>Dashboard</h5>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/categories') ?>">
                                <span><svg version="1.1" width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M176.792,0H59.208C26.561,0,0,26.561,0,59.208v117.584C0,209.439,26.561,236,59.208,236h117.584C209.439,236,236,209.439,236,176.792V59.208C236,26.561,209.439,0,176.792,0z M196,176.792c0,10.591-8.617,19.208-19.208,19.208H59.208C48.617,196,40,187.383,40,176.792V59.208C40,48.617,48.617,40,59.208,40h117.584C187.383,40,196,48.617,196,59.208V176.792z"/></g></g><g><g><path d="M452,0H336c-33.084,0-60,26.916-60,60v116c0,33.084,26.916,60,60,60h116c33.084,0,60-26.916,60-60V60C512,26.916,485.084,0,452,0z M472,176c0,11.028-8.972,20-20,20H336c-11.028,0-20-8.972-20-20V60c0-11.028,8.972-20,20-20h116c11.028,0,20,8.972,20,20V176z"/></g></g><g><g><path d="M176.792,276H59.208C26.561,276,0,302.561,0,335.208v117.584C0,485.439,26.561,512,59.208,512h117.584C209.439,512,236,485.439,236,452.792V335.208C236,302.561,209.439,276,176.792,276z M196,452.792c0,10.591-8.617,19.208-19.208,19.208H59.208C48.617,472,40,463.383,40,452.792V335.208C40,324.617,48.617,316,59.208,316h117.584c10.591,0,19.208,8.617,19.208,19.208V452.792z"/></g></g><g><g><path d="M452,276H336c-33.084,0-60,26.916-60,60v116c0,33.084,26.916,60,60,60h116c33.084,0,60-26.916,60-60V336C512,302.916,485.084,276,452,276z M472,452c0,11.028-8.972,20-20,20H336c-11.028,0-20-8.972-20-20V336c0-11.028,8.972-20,20-20h116c11.028,0,20,8.972,20,20V452z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></span>
                                <h5>Categories</h5>
                            </a>
                        </li>
                        
                       
                       

                       

                        <li>
                            <a href="<?= base_url('admin/socialsites') ?>">
                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="21px" height="21px" viewBox="0 0 13 14"><path d="M10.636,4.667 C10.022,4.667 9.468,4.429 9.047,4.049 L4.673,6.511 C4.707,6.669 4.727,6.832 4.727,7.000 C4.727,7.203 4.693,7.396 4.643,7.584 L8.966,10.017 C9.394,9.595 9.985,9.333 10.636,9.333 C11.940,9.333 13.000,10.380 13.000,11.667 C13.000,12.953 11.940,14.000 10.636,14.000 C9.333,14.000 8.272,12.953 8.272,11.667 C8.272,11.557 8.290,11.453 8.305,11.348 L3.820,8.823 C3.417,9.138 2.916,9.333 2.363,9.333 C1.060,9.333 -0.000,8.287 -0.000,7.000 C-0.000,5.713 1.060,4.667 2.363,4.667 C2.953,4.667 3.487,4.888 3.901,5.242 L8.316,2.758 C8.290,2.620 8.272,2.479 8.272,2.333 C8.272,1.046 9.333,-0.000 10.636,-0.000 C11.940,-0.000 13.000,1.046 13.000,2.333 C13.000,3.620 11.940,4.667 10.636,4.667 Z" class="cls-1"/></svg></span>
                                <h5>Social Sites</h5>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('admin/articles') ?>">
                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="21px" height="21px" viewBox="0 0 13 14"><path d="M10.636,4.667 C10.022,4.667 9.468,4.429 9.047,4.049 L4.673,6.511 C4.707,6.669 4.727,6.832 4.727,7.000 C4.727,7.203 4.693,7.396 4.643,7.584 L8.966,10.017 C9.394,9.595 9.985,9.333 10.636,9.333 C11.940,9.333 13.000,10.380 13.000,11.667 C13.000,12.953 11.940,14.000 10.636,14.000 C9.333,14.000 8.272,12.953 8.272,11.667 C8.272,11.557 8.290,11.453 8.305,11.348 L3.820,8.823 C3.417,9.138 2.916,9.333 2.363,9.333 C1.060,9.333 -0.000,8.287 -0.000,7.000 C-0.000,5.713 1.060,4.667 2.363,4.667 C2.953,4.667 3.487,4.888 3.901,5.242 L8.316,2.758 C8.290,2.620 8.272,2.479 8.272,2.333 C8.272,1.046 9.333,-0.000 10.636,-0.000 C11.940,-0.000 13.000,1.046 13.000,2.333 C13.000,3.620 11.940,4.667 10.636,4.667 Z" class="cls-1"/></svg></span>
                                <h5>Articles</h5>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('admin/users') ?>">
                                <span><svg version="1.1" width="21px" height="21px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40c59.551,0,108,48.448,108,108S315.551,256,256,256z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></span>
                                <h5>Users</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>