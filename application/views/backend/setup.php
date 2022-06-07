<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="pfb_setup_wrapper">
                    <nav aria-label="breadcrumb" class="pfb_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home/mysite') ?>">My Sites</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Basic Settings</li>
                        </ol>
                    </nav> 
                    <h2>Basic Settings</h2>
                    <p class="pfb_bottompadder30">Welcome to Local City Profits. </p>
                    <form id="setupUploadForm" method="post" onsubmit="return false;" enctype="multipart/form-data">
                    <div class="pfb_white_box">
                        <h3>This software creates a DFY website, focused on your town/city/village/area 
                            <span>Start by entering a few details about you and your city.</span>
                        </h3>

                        <div class="pfb_setup_website pfb_bottompadder30">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="pfb_feild">Field</th>
                                            <th class="pfb_edit">Edit</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td class="pfb_feild"><h4>Store URL</h4></td>
                                            <td class="pfb_edit">
                                                <a href="javascript:;" class="pfb_url"><?= base_url() ?>s/<?= $websiteData[0]['w_sitename'] ?></a>
                                                <input type="text" name="w_storeurl" placeholder="store url" class="form-control" value="<?= $websiteData[0]['w_storeurl'] ?>">
                                            </td>
                                            <td><p class="pfb_margin0">This is the URL Where your site will appear. Only letters(A-Z) and number (0-9) are allowed. your store is currently :</p>
                                                <a href="<?= base_url() ?>s/<?= $websiteData[0]['w_sitename'] ?>" class="pfb_url"><?= base_url() ?>s/<?= $websiteData[0]['w_sitename'] ?></a>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <td class="pfb_feild"><h4>Name of your City/Town </h4></td>
                                            <td class="pfb_edit">
                                                <input type="text" name="w_sitetitle" placeholder="Enter your City/Town name" class="form-control" value="<?= $websiteData[0]['w_sitetitle'] ?>">
                                            </td>
                                            <td><p class="pfb_margin0">Your website is focused on one city/town/district. We recommend you enter the place where you live (eg "New York" or "Brooklyn")</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pfb_feild"><h4>Name of your country  </h4></td>
                                            <td class="pfb_edit">
                                                <input type="text" name="w_sitetitle" placeholder="Enter your Country name" class="form-control" value="<?= $websiteData[0]['w_sitetitle'] ?>">
                                            </td>
                                            <td> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="pfb_feild"><h4>Your URL </h4></td>
                                            <td class="pfb_edit">
                                                <p class="m-0">http://localcity.com/</p>
                                                <input type="text" name="w_sitetitle" placeholder="Enter your URL" class="form-control" value="<?= $websiteData[0]['w_sitetitle'] ?>">
                                            </td>
                                            <td><p class="pfb_margin0">This is the URL where your site will appear. Only letters (A-Z) and numbers (0-9) are allowed. Your site is currently <a href="javascript:void(0);" target="_blank" class="pfb_purplecolor">http://localcity.com/xxx </a> </p>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="pfb_feild"><h4>ClickBank NickName</h4></td>
                                            <td class="pfb_edit">
                                                <input type="text" name="w_cbname" placeholder="Nickname here..." class="form-control" value="<?= $websiteData[0]['w_cbname'] ?>">
                                            </td>
                                            <td><p class="pfb_margin0">This is your ClickBank nickname. You can create an account <a href="https://www.clickbank.com/" target="_blank" class="pfb_purplecolor">here</a>  if  you do not have one.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pfb_feild"><h4>Support Email</h4></td>
                                            <td class="pfb_edit">
                                                <input type="text" name="w_supportemail" placeholder="Email here..." class="form-control" value="<?= $websiteData[0]['w_supportemail'] ?>">
                                            </td>
                                            <td><p class="pfb_margin0">This is the email address visitors can reach you on, if they have any feedback or requests to make. </p>
                                            </td>
                                        </tr>
                                        
                                        <!-- <tr>
                                            <td class="pfb_feild"><h4>Footer Link</h4></td>
                                            <td class="pfb_edit">
                                                <input type="text" name="" placeholder="Link here..." class="form-control">
                                            </td>
                                            <td><p class="pfb_margin0">This is your footer link. You can create an account here if you do not have one.</p>
                                            </td>
                                        </tr> -->
                                        <!--<tr>
                                            <td class="pfb_feild"><h4>Welcome text</h4></td>
                                            <td class="pfb_edit">
                                                <textarea name="w_welcometext" placeholder="Text here..." class="form-control"><?= $websiteData[0]['w_welcometext'] ?></textarea>
                                            </td>
                                            <td>
                                                <p class="pfb_margin0">This is your welcome description.</p>
                                            </td>
                                        </tr>-->
                                        
                                        <tr>
                                            <td class="pfb_feild"><h4>About your City</h4></td>
                                            <td class="pfb_edit">
                                                <textarea name="w_abouttext" placeholder="Text here..." class="form-control"><?= $websiteData[0]['w_abouttext'] ?></textarea>
                                            </td>
                                            <td>
                                                <p class="pfb_margin0">This introduces your city, and gets people excited about how things are opening up now that restrictions are lifting. </p>
                                            </td>
                                        </tr>
                                        
                                        <!--<tr>
                                            <td class="pfb_feild"><h4>Disclaimer Text</h4></td>
                                            <td class="pfb_edit">
                                                <textarea name="w_disclaimertext" placeholder="Text here..." class="form-control"><?= $websiteData[0]['w_disclaimertext'] ?></textarea>
                                            </td>
                                            <td>
                                                <p class="pfb_margin0">This is disclaimer message which will help visitors.</p>
                                            </td>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--<div class="pfb_setup_btns">-->
                    <!--    <a href="javascript:;" class="pfb_btn pfb_greenBtn" onclick="openConfirmPopup()">Submit</a>-->
                    <!--</div>-->
                    
                    <div class="pfb_white_box">
                        <h3>Upload logo & favicon</h3>
                        <div class="pfb_upload_logo_fav">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="pfb_upload_box">
                                        <h5 class="pfb_font18">Logo</h5>
                                        <p class="pfb_fontweight500">Your logo should be 200-400px width and 50-100px height, and transparent or white background. </p>

                                        <div class="pfb_upload">
                                        <!-- , loading_logo -->
                                            <div class="pfb_uploadIcon <?= $websiteData[0]['w_logourl'] != '' ? 'checked_logo' : '' ?>">
                                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="59" height="50" viewBox="0 0 59 50">
  
  <path d="M47.177,41.803 L45.403,41.802 C44.557,41.802 43.868,41.120 43.868,40.281 C43.868,39.875 44.028,39.493 44.318,39.206 C44.608,38.919 44.993,38.761 45.403,38.761 L47.177,38.761 C49.537,38.761 51.750,37.842 53.410,36.172 C55.070,34.504 55.964,32.297 55.928,29.960 C55.855,25.254 51.876,21.427 47.057,21.427 L44.577,21.427 L44.577,18.293 C44.577,9.921 37.766,3.079 29.393,3.041 L29.322,3.041 C21.472,3.041 14.948,8.865 14.148,16.587 L14.018,17.847 L12.743,17.948 C7.320,18.377 3.071,22.941 3.071,28.337 C3.071,34.077 7.786,38.753 13.582,38.761 L13.713,38.761 C14.561,38.761 15.250,39.443 15.250,40.281 C15.250,41.120 14.561,41.802 13.715,41.802 L13.598,41.803 C6.099,41.803 -0.000,35.762 -0.000,28.337 C-0.000,24.931 1.288,21.679 3.625,19.183 C5.537,17.142 7.991,15.756 10.722,15.174 L11.253,15.061 L11.361,14.534 C12.138,10.729 14.091,7.332 17.007,4.709 C20.384,1.672 24.758,-0.000 29.323,-0.000 C39.157,-0.000 47.375,7.918 47.642,17.651 L47.662,18.373 L48.387,18.446 C54.437,19.057 59.000,24.064 59.000,30.094 C59.000,36.550 53.696,41.803 47.177,41.803 ZM41.151,31.226 L40.696,31.440 C39.207,32.141 37.425,31.837 36.261,30.684 L31.095,25.568 L31.095,48.479 C31.095,49.318 30.406,50.000 29.559,50.000 C28.712,50.000 28.024,49.318 28.024,48.479 L28.024,25.568 L22.858,30.684 C22.121,31.413 21.142,31.815 20.100,31.815 C19.510,31.815 18.945,31.689 18.420,31.441 L17.967,31.226 L29.559,19.746 L41.151,31.226 Z" class="cls-1"/>
</svg> 
                                                <!--<img src="<?= base_url() ?>assets/backend/images/svg/upload.svg" alt="">-->
                                                <i class="fas fa-circle-notch fa-spin"></i>
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="pfb_uploadDetail">
                                                <h6 class="pfb_fontweight500">Click here to browse your Logo,
                                                    <label class="pfb_margin0 pfb_purplecolor"><input type="file" name="w_logourl" class="d-none" id="">Browse</label>
                                                </h6>
                                                <p class="pfb_margin0 pfb_fontweight500">Supports: JPG, JPEG, PNG </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pfb_upload_box">
                                        <h5 class="pfb_font18">Favicon</h5>
                                        <p class="pfb_fontweight500">Your favicon should be 32px width and 32px height (ideally 32 x 32 px) and transparent or white background and size can be upto 1 MB.</p>

                                        <div class="pfb_upload">
                                            <div class="pfb_uploadIcon <?= $websiteData[0]['w_faviconurl'] != '' ? 'checked_logo' : '' ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="59" height="50" viewBox="0 0 59 50">
  
  <path d="M47.177,41.803 L45.403,41.802 C44.557,41.802 43.868,41.120 43.868,40.281 C43.868,39.875 44.028,39.493 44.318,39.206 C44.608,38.919 44.993,38.761 45.403,38.761 L47.177,38.761 C49.537,38.761 51.750,37.842 53.410,36.172 C55.070,34.504 55.964,32.297 55.928,29.960 C55.855,25.254 51.876,21.427 47.057,21.427 L44.577,21.427 L44.577,18.293 C44.577,9.921 37.766,3.079 29.393,3.041 L29.322,3.041 C21.472,3.041 14.948,8.865 14.148,16.587 L14.018,17.847 L12.743,17.948 C7.320,18.377 3.071,22.941 3.071,28.337 C3.071,34.077 7.786,38.753 13.582,38.761 L13.713,38.761 C14.561,38.761 15.250,39.443 15.250,40.281 C15.250,41.120 14.561,41.802 13.715,41.802 L13.598,41.803 C6.099,41.803 -0.000,35.762 -0.000,28.337 C-0.000,24.931 1.288,21.679 3.625,19.183 C5.537,17.142 7.991,15.756 10.722,15.174 L11.253,15.061 L11.361,14.534 C12.138,10.729 14.091,7.332 17.007,4.709 C20.384,1.672 24.758,-0.000 29.323,-0.000 C39.157,-0.000 47.375,7.918 47.642,17.651 L47.662,18.373 L48.387,18.446 C54.437,19.057 59.000,24.064 59.000,30.094 C59.000,36.550 53.696,41.803 47.177,41.803 ZM41.151,31.226 L40.696,31.440 C39.207,32.141 37.425,31.837 36.261,30.684 L31.095,25.568 L31.095,48.479 C31.095,49.318 30.406,50.000 29.559,50.000 C28.712,50.000 28.024,49.318 28.024,48.479 L28.024,25.568 L22.858,30.684 C22.121,31.413 21.142,31.815 20.100,31.815 C19.510,31.815 18.945,31.689 18.420,31.441 L17.967,31.226 L29.559,19.746 L41.151,31.226 Z" class="cls-1"/>
</svg> 
                                                <!--<img src="<?= base_url() ?>assets/backend/images/svg/upload.svg" alt="">-->
                                                <i class="fas fa-circle-notch fa-spin"></i>
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="pfb_uploadDetail">
                                                <h6 class="pfb_fontweight500">Click here to browse your Favicon,
                                                    <label class="pfb_margin0 pfb_purplecolor"><input type="file" name="w_faviconurl" class="d-none" id="">Browse</label>
                                                </h6>
                                                <p class="pfb_margin0 pfb_fontweight500">Supports: JPG, JPEG, PNG </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="pfb_fontweight500 pfb_font18 pfb_bottompadder20">if you don't have logo image then please add text.</h5>
                                </div>

                                <div class="col-xl-10 col-lg-12">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-12">
                                            <div class="pfb_logotext_box">
                                                <h5 class="pfb_font18 pfb_margin0">Logo Text</h5>
                                                <input type="text" class="form-control" placeholder="Profit Pusher" name="w_logotext" value="<?= $websiteData[0]['w_logotext'] ?>">
                                            </div>
                                            <div class="pfb_logotext_box">
                                                <h5 class="pfb_font18  pfb_margin0">Logo Font</h5>
                                                <div class="pfb_selectBox">
                                                    <select class="form-control" name="w_logofont">
                                                        <option value="Lato" style='font-family: Lato;' <?= $websiteData[0]['w_logofont'] == 'Lato' ? 'selected' : '' ; ?>>Lato</option>
                                                        <option value="Lobster" style='font-family: Lobster;'  <?= $websiteData[0]['w_logofont'] == 'Lobster' ? 'selected' : '' ; ?>>Lobster</option>
                                                        <option value="Montserrat" style='font-family: Montserrat;'<?= $websiteData[0]['w_logofont'] == 'Montserrat' ? 'selected' : '' ; ?>>Montserrat</option>
                                                        <option value="Oswald" style='font-family: Oswald;'<?= $websiteData[0]['w_logofont'] == 'Oswald' ? 'selected' : '' ; ?>>Oswald</option>
                                                        <option value="Pacifico" style='font-family: Pacifico;'<?= $websiteData[0]['w_logofont'] == 'Pacifico' ? 'selected' : '' ; ?>>Pacifico</option>
                                                        <option style='font-family: Raleway;'<?= $websiteData[0]['w_logofont'] == 'Raleway' ? 'selected' : '' ; ?>>Raleway</option>
                                                        <option value="Roboto" style='font-family: Roboto;'<?= $websiteData[0]['w_logofont'] == 'Roboto' ? 'selected' : '' ; ?>>Roboto</option>
                                                        <option value="Maven+Pro" style='font-family:Maven+Pro;' <?= $websiteData[0]['w_logofont'] == 'Maven+Pro' ? 'selected' : '' ; ?> >Maven Pro</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <div class="pfb_logotext_box">
                                                <h5 class="pfb_font18  pfb_margin0">Logo Preview</h5>
                                                <div class="form-control text-center pfb_logoPrev" style="font-family:<?= $websiteData[0]['w_logofont'] ?>"><?= $websiteData[0]['w_logotext'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <h3>Change Theme color & fonts</h3>

                        <div class="pfb_changeColor_wrapper">
                            <div class="row">
                                <div class="col-lg-9 col-md-12">
                                    <div class="row">
                                    <div class="col-lg-5 col-md-12">
                                        <div class="pfb_logotext_box">
                                            <h5 class="pfb_font18  pfb_margin0">Theme Color</h5>
                                            <label class="form-control pfb_colorFeild">
                                                <span style="background-color: <?= $websiteData[0]['w_themecolor'] == '' ? '#9d3cff' : $websiteData[0]['w_themecolor'] ?>;"></span>
                                                <input type="text" value="<?= $websiteData[0]['w_themecolor'] == '' ? '#9d3cff' : $websiteData[0]['w_themecolor'] ?>" name="w_themecolor" value="<?= $websiteData[0]['w_themecolor'] == '' ? '#9d3cff' : $websiteData[0]['w_themecolor'] ?>">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="pfb_logotext_box">
                                            <h5 class="pfb_font18  pfb_margin0">Theme Font</h5>
                                            <div class="pfb_selectBox">
                                                <div class="pfb_selectBox">
                                                    <select class="form-control" name="w_themefont">
                                                        <option style='font-family:Maven+Pro;' value="Maven+Pro" <?= $websiteData[0]['w_themefont'] == 'Maven+Pro' ? 'selected' : '' ; ?>>Maven Pro</option>
                                                        <option style='font-family: Lato;' value="Lato" <?= $websiteData[0]['w_themefont'] == 'Lato' ? 'selected' : '' ; ?>>Lato</option>
                                                        <option style='font-family: Lobster;' value="Lobster" <?= $websiteData[0]['w_themefont'] == 'Lobster' ? 'selected' : '' ; ?>>Lobster</option>
                                                        <option style='font-family: Montserrat;' value="Montserrat" <?= $websiteData[0]['w_themefont'] == 'Montserrat' ? 'selected' : '' ; ?>>Montserrat</option>
                                                        <option style='font-family: Oswald;' value="Oswald" <?= $websiteData[0]['w_themefont'] == 'Oswald' ? 'selected' : '' ; ?>>Oswald</option>
                                                        <option style='font-family: Pacifico;' value="Pacifico" <?= $websiteData[0]['w_themefont'] == 'Pacifico' ? 'selected' : '' ; ?>>Pacifico</option>
                                                        <option style='font-family: Raleway;' value="Raleway" <?= $websiteData[0]['w_themefont'] == 'Raleway' ? 'selected' : '' ; ?>>Raleway</option>
                                                        <option style='font-family: Roboto;' value="Roboto" <?= $websiteData[0]['w_themefont'] == 'Roboto' ? 'selected' : '' ; ?>>Roboto</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>SEO Setting</h3>

                        <div class="pfb_seo_setting">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Keyword</label>
                                                <input type="text" name="w_seokeyword" class="form-control" placeholder="Enter keyword here..." value="<?= $websiteData[0]['w_seokeyword'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Author</label>
                                                <input type="text" name="w_seoauthor" class="form-control" placeholder="Enter author name here..." value="<?= $websiteData[0]['w_seoauthor'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="w_seodesc" class="form-control" placeholder="Enter your description here..."><?= $websiteData[0]['w_seodesc'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Pixel Codes for Analytics & Tracking</h3>

                        <div class="pfb_seo_setting">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Script</label>
                                                <textarea name="w_seoextscript" class="form-control" placeholder="Enter your external script here..."><?= $websiteData[0]['w_seoextscript'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    
                    <input type="hidden" name="w_id" value="<?= $websiteData[0]['w_id'] ?>"/>

                    <div class="pfb_setup_btns">
                        <a href="<?= base_url('home/mysites') ?>" class="pfb_fontweight500"><img src="<?= base_url() ?>assets/backend/images/svg/arrowleft.svg" alt=""> Return to homepage</a>
                        <a href="javascript:;" class="pfb_btn pfb_purpleBtn" onclick="submitSetupWebsite()">Save Changes to website setup</a>
                        <!--<a href="javascript:;" class="pfb_btn pfb_purpleBtn">Save Changes to website setup</a>-->
                    </div>
                    </form>
            </div>
        </div>
      
    </div>
</div>