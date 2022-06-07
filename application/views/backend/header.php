<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= SITENAME ?></title>
        <!-- stylesheet -->
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/colorpicker/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/share.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/responsive.css">

        <!-- favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/backend/images/favicon.png" type="image/x-icon">

        <?php if(isset($websiteData) ) { ?>
        <!-- google fonts for editor start -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Maven+Pro', 'Lato', 'Lobster', 'Lora', 'Montserrat', 'Open+Sans', 'Oswald', 'PT+Sans', 'Pacifico',  'Raleway', 'Roboto', 'Roboto+Slab' ]
                }            
            });
           
            var webfont_load = [
                {id:'Maven+Pro',html:"<span style='font-family:Maven+Pro;'>Maven Pro</span>",text:"Maven Pro"},
                {id:"Lato",html:"<span style='font-family:Lato;'>Lato</span>",text:"Lato"},
                {id:"Lobster",html:"<span style='font-family:Lobster;'>Lobster</span>",text:"Lobster"},
                {id:"Lora",html:"<span style='font-family:Lora;'>Lora</span>",text:"Lora"},
                {id:"Montserrat",html:"<span style='font-family:Montserrat;'>Montserrat</span>",text:"Montserrat"},
                {id:"Open+Sans",html:"<span style='font-family:Open+Sans;'>Open Sans</span>",text:"Open Sans"},
                {id:"Oswald",html:"<span style='font-family:Oswald;'>Oswald</span>",text:"Oswald"},
                {id:"PT+Sans",html:"<span style='font-family:PT+Sans;'>PT Sans</span>",text:"PT Sans"},
                {id:"Pacifico",html:"<span style='font-family:Pacifico;'>Pacifico</span>",text:"Pacifico"},
                {id:"Raleway",html:"<span style='font-family:Raleway;'>Raleway</span>",text:"Raleway"},
                {id:"Roboto",html:"<span style='font-family:Roboto;'>Roboto</span>",text:"Roboto"},
                {id:"Roboto+Slab",html:"<span style='font-family:Roboto+Slab;'>Roboto Slab</span>",text:"Roboto Slab"},
            ]
        </script>
        <!-- google fonts for editor end -->
        <?php } ?>

    </head>
    <body class="notification_open">
        <!-- PreLodar Start -->
        <div class="preloader_wrapper preloader_active preloader_open">
            <div class="preloader_holder">
                <div class="preloader d-flex justify-content-center align-items-center h-100">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- PreLodar End -->
        <div class="pfb_main_wrapper">
            <div class="pfb_header_wrapper">
                <div class="pfb_logo">
                    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/backend/images/logo.png" alt="" class="img-fluid"/></a>
                </div>
                <div class="pfb_menu_wrapper">
                    <ul class="pdb_menu">
                        <li <?= isset($is_page) && $is_page != 'share' ? 'class="pfb_active"' : '' ; ?>>
                            <a href="<?= base_url() ?>home/mysites">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="19" height="18" viewBox="0 0 19 18"> <path d="M4.416,6.140 C3.597,6.140 2.932,6.824 2.932,7.665 L2.932,13.424 C2.932,14.265 3.597,14.949 4.416,14.949 L7.236,14.949 C8.055,14.949 8.721,14.265 8.721,13.424 L8.721,7.665 C8.721,6.824 8.055,6.140 7.236,6.140 L4.416,6.140 ZM7.236,13.424 L4.416,13.424 L4.416,7.665 L7.236,7.665 L7.237,13.424 C7.237,13.424 7.237,13.424 7.236,13.424 L7.236,13.424 ZM15.994,10.563 C15.994,10.985 15.662,11.326 15.252,11.326 L10.947,11.326 C10.537,11.326 10.205,10.985 10.205,10.563 C10.205,10.142 10.537,9.801 10.947,9.801 L15.252,9.801 C15.662,9.801 15.994,10.142 15.994,10.563 L15.994,10.563 ZM15.994,13.462 C15.994,13.883 15.662,14.225 15.252,14.225 L10.947,14.225 C10.537,14.225 10.205,13.883 10.205,13.462 C10.205,13.040 10.537,12.699 10.947,12.699 L15.252,12.699 C15.662,12.699 15.994,13.040 15.994,13.462 L15.994,13.462 ZM15.994,7.665 C15.994,8.086 15.662,8.428 15.252,8.428 L10.947,8.428 C10.537,8.428 10.205,8.086 10.205,7.665 C10.205,7.244 10.537,6.902 10.947,6.902 L15.252,6.902 C15.662,6.902 15.994,7.244 15.994,7.665 L15.994,7.665 ZM16.773,-0.000 L2.226,-0.000 C0.999,-0.000 -0.000,1.026 -0.000,2.288 L-0.000,14.949 C-0.000,16.631 1.332,18.000 2.969,18.000 L16.031,18.000 C17.668,18.000 19.000,16.631 19.000,14.949 C19.000,14.528 18.668,14.186 18.258,14.186 C17.848,14.186 17.516,14.528 17.516,14.949 C17.516,15.790 16.850,16.474 16.031,16.474 L2.969,16.474 C2.150,16.474 1.484,15.790 1.484,14.949 L1.484,4.614 L17.516,4.614 L17.516,11.136 C17.516,11.557 17.848,11.898 18.258,11.898 C18.668,11.898 19.000,11.557 19.000,11.136 L19.000,2.288 C19.000,1.026 18.001,-0.000 16.773,-0.000 L16.773,-0.000 ZM13.768,1.525 C14.177,1.525 14.510,1.868 14.510,2.288 C14.510,2.709 14.177,3.051 13.768,3.051 C13.358,3.051 13.025,2.709 13.025,2.288 C13.025,1.868 13.358,1.525 13.768,1.525 L13.768,1.525 ZM17.478,2.288 C17.478,2.709 17.145,3.051 16.736,3.051 C16.327,3.051 15.994,2.709 15.994,2.288 C15.994,1.868 16.327,1.525 16.736,1.525 C17.145,1.525 17.478,1.868 17.478,2.288 L17.478,2.288 ZM1.484,2.288 C1.484,1.868 1.817,1.525 2.226,1.525 L11.669,1.525 C11.586,1.764 11.541,2.021 11.541,2.288 C11.541,2.570 11.591,2.840 11.682,3.089 L1.484,3.089 L1.484,2.288 Z" class="cls-1"/>
                                    </svg>
                                </span>  Dashboard 
                            </a>
                        </li> 

                        <li <?= isset($is_page) && $is_page == 'training' ? 'class="pfb_active"' : '' ; ?>><a href="https://grabfreecoin.com/freecoin-fe-members" target="_blank"><span><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -32 512 512" width="20"><path d="m464.867188 0h-224.933594c-25.988282 0-47.132813 21.144531-47.132813 47.132812v144.292969l-41.765625-20.769531c-1.410156-.703125-2.84375-1.367188-4.289062-1.996094 12.261718-12.800781 19.820312-30.144531 19.820312-49.226562 0-39.277344-31.953125-71.234375-71.230468-71.234375-39.28125 0-71.234376 31.957031-71.234376 71.234375 0 21.34375 9.449219 40.515625 24.371094 53.582031-27.480468 15.460937-48.472656 45.621094-48.472656 82.984375v48.199219c0 20.75 13.472656 38.410156 32.132812 44.6875v83.847656c0 8.28125 6.714844 15 15 15h96.398438c8.285156 0 15-6.71875 15-15v-168.535156l48.023438 24.007812c18.378906 9.1875 43.308593 3.710938 54.582031-17.207031h53.78125l-56.949219 156.605469c-2.832031 7.785156 1.1875 16.394531 8.972656 19.222656 8.898438 3.238281 16.8125-2.34375 19.222656-8.96875l60.675782-166.859375h10.515625l61.296875 166.90625c2.328125 6.332031 10.183594 12.238281 19.253906 8.90625 7.773438-2.855469 11.765625-11.472656 8.90625-19.25l-57.5-156.5625h75.554688c25.484374 0 47.132812-20.558594 47.132812-47.132812v-176.734376c0-26.578124-21.648438-47.132812-47.132812-47.132812zm-410.765626 119.433594c0-22.738282 18.496094-41.234375 41.230469-41.234375 22.738281 0 41.234375 18.496093 41.234375 41.234375 0 22.734375-18.496094 41.230468-41.234375 41.230468-22.734375 0-41.230469-18.496093-41.230469-41.230468zm181.398438 135.527344c-.039062.109374-.078125.222656-.113281.335937-1.023438 2.855469-3.335938 5.261719-6.167969 6.425781-2.996094 1.21875-6.367188 1.089844-9.246094-.347656-28.523437-14.269531-69.738281-34.859375-69.738281-34.859375-9.953125-4.976563-21.703125 2.273437-21.703125 13.417969v177.800781h-66.398438v-81.402344c0-8.28125-6.71875-15-15-15-9.449218 0-17.132812-7.683593-17.132812-17.132812v-48.199219c0-36.652344 29.84375-65.332031 65.332031-65.332031h13.253907c10.054687 0 20.097656 2.359375 29.070312 6.839843 0 0 74.402344 37 93.351562 46.4375 4.058594 2.015626 5.988282 6.75 4.492188 11.015626zm246.5-31.09375c0 4.582031-1.777344 8.882812-5.011719 12.117187-3.183593 3.1875-7.601562 5.015625-12.121093 5.015625h-200.46875c-.027344-.082031-.046876-.164062-.074219-.242188l37.226562-74.449218c3.703125-7.410156.703125-16.417969-6.707031-20.125-7.40625-3.703125-16.417969-.703125-20.125 6.707031l-31.75 63.496094c-5.917969-2.949219-12.796875-6.375-20.167969-10.039063v-159.214844c0-9.445312 7.683594-17.132812 17.132813-17.132812h224.933594c4.519531 0 8.9375 1.828125 12.125 5.023438 3.230468 3.226562 5.007812 7.527343 5.007812 12.109374zm0 0"/><path d="m432.734375 64.265625h-160.667969c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h160.667969c8.28125 0 15-6.714844 15-15s-6.714844-15-15-15zm0 0"/><path d="m432.734375 120.5h-80.335937c-8.28125 0-15 6.714844-15 15s6.71875 15 15 15h80.335937c8.28125 0 15-6.714844 15-15s-6.714844-15-15-15zm0 0"/><path d="m432.734375 176.734375h-80.335937c-8.28125 0-15 6.714844-15 15 0 8.28125 6.71875 15 15 15h80.335937c8.28125 0 15-6.71875 15-15 0-8.285156-6.714844-15-15-15zm0 0"/></svg></span> Training </a>
                        </li>

                        <li>
                            <a href="https://bonus.software/freecoin" target="_blank">
                                <span>
                                    <svg height="20px" width="20px" fill="#000000" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 100" x="0px" y="0px">
                                    <path d="M43.49414,52.877l9.46,3.59473a5.6713,5.6713,0,0,1,3.52637,3.29492,3.6614,3.6614,0,0,1-.44238,3.2002c-1.90625,3.00586-6.92481,3.86035-10.32569,1.75586L39.625,60.959l-5.25879,8.50586,6.08692,3.76368A17.35307,17.35307,0,0,0,45,75.199V80H55V75.14056a16.34442,16.34442,0,0,0,9.48438-6.82025A13.71585,13.71585,0,0,0,65.96826,56.6084,15.58551,15.58551,0,0,0,56.50635,47.124l-9.459-3.59472a5.67042,5.67042,0,0,1-3.52783-3.29688,3.65683,3.65683,0,0,1,.44238-3.19824c1.90528-3.00684,6.92432-3.86328,10.32569-1.75684L60.375,39.042l5.25977-8.50586-6.08741-3.76465A17.33614,17.33614,0,0,0,55,24.81049V20H45v4.86621a16.33918,16.33918,0,0,0-9.48389,6.81445,13.70933,13.70933,0,0,0-1.48486,11.709A15.589,15.589,0,0,0,43.49414,52.877Z"></path>
                                    <path d="M50,95A45,45,0,1,0,5,50,45.05077,45.05077,0,0,0,50,95Zm0-84A39,39,0,1,1,11,50,39.0439,39.0439,0,0,1,50,11Z"></path>
                                    </svg>
                                </span>Resell <?= SITENAME ?> 
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="pfb_userWrapper">
                    <div class="pfb_user">
                        <a href="javascript:void(0);" class="pfb_user_Wrapper">
                            <span class="pfb_profileletter"><?= strtoupper($this->session->userdata['initials']) ?></span>
                            <span class="pfb_profilename"><?= $this->session->userdata['firstname'] ?></span>
                            <span class="pfb_toggle"><img src="<?= base_url() ?>assets/backend/images/svg/user_toggle.svg" alt=""></span>
                        </a>
                        <div class="pfb_profileDropdown">
                            <ul>
                                <li><a href="<?= base_url('home/profile') ?>">Profile</a></li>
                                <li><a href="<?= base_url('home/logout') ?>">Logout</a></li>
                            </ul>
                       </div>
                    </div>
                    
                </div>
            </div>