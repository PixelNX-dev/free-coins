<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pfb_setup_wrapper">
                    <nav aria-label="breadcrumb" class="pfb_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home/create') ?>">My Sites</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('home/website_setup/'.$webid) ?>">Basic Settings</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('home/about_city/'.$webid) ?>">About Your City</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('home/choose_niche/'.$webid) ?>">Niches</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:;">Custome Banner</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Your Content</li>
                        </ol>
                    </nav> 

                    <h2 class="pfb_bottompadder30">Your Content</h2>
                    
                    <div class="pfb_content_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="contentFeed_tab" data-toggle="tab" href="#contentFeed" role="tab" aria-controls="contentFeed" aria-selected="true">New Content Feed</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="publishedContent_tab" data-toggle="tab" href="#publishedContent" role="tab" aria-controls="publishedContent" aria-selected="false">Your Published Content</a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contentFeed" role="tabpanel" aria-labelledby="contentFeed_tab">
                                <div class="c_top_inner">
                                    <h5>NEW CONTENT FEED</h5>
                                    <p class="mb-0">Every day, you will have the option to post content to your site. You can post <b>one</b> article per day.</p>
                                    <p class="mb-0">You can <b>"spin"</b> your article, to make it unique and <b>edit</b> it asmany times as you want.</p>
                                    <p>Today you can spin I x article.This will reset at midnight tonight (EST) - in 5 hours.</p>
                                    <h6 class="c_top_inner_p">Please click to select your article</h6>
                                    <div class="c_table table-responsive">
                                       <table class="table table-bordered">
                                          <tbody><tr>
                                             <th>Article Title</th>
                                             <th>Niche</th>
                                             <th>Preview</th>
                                             <th>Publish This Article</th>
                                          </tr>
                                          <tr>
                                             <td>5 ways to make money now that lockdown has ended</td>
                                             <td class="pfb_link">Make Money</td>
                                             <td>This is the first 20 or so words of the article and then it stops like this...</td>
                                             <td><a href="#" class="pfb_btn pfb_greenBtn" data-target="#publishedPopup" data-toggle="modal">Publish This Article</a></td>
                                          </tr>
                                          <tr>
                                             <td>5 tune-ups you should do for your body(now that you can leave the house)</td>
                                             <td class="pfb_link">Health &amp; fitness</td>
                                             <td>This is the first 20 or so words of the article and then it stops like this...</td>
                                             <td><a href="#" class="pfb_btn pfb_greenBtn" data-target="#publishedPopup" data-toggle="modal">Publish This Article</a></td>
                                          </tr>
                                          <tr>
                                             <td>Best places to meet women in Manhattan</td>
                                             <td class="pfb_link">Dating</td>
                                             <td>This is the first 20 or so words of the article and then it stops like this...</td>
                                             <td><a href="#" class="pfb_btn pfb_greenBtn" data-target="#publishedPopup" data-toggle="modal" >Publish This Article</a></td>
                                          </tr>
                                          <tr>
                                             <td>Top holiday destinations (that aren't Manhattan!)</td>
                                             <td class="pfb_link">Travel</td>
                                             <td>This is the first 20 or so words of the article and then it stops like this...</td>
                                             <td><a href="#" class="pfb_btn pfb_greenBtn" data-target="#publishedPopup" data-toggle="modal">Publish This Article</a></td>
                                          </tr>
                                          <tr>
                                             <td>In crypto currency still worth the hype right now?</td>
                                             <td class="pfb_link">Crypto Currencies</td>
                                             <td>This is the first 20 or so words of the article and then it stops like this...</td>
                                             <td><a href="#" class="pfb_btn pfb_greenBtn" data-target="#publishedPopup" data-toggle="modal">Publish This Article</a></td>
                                          </tr>
                                          <tr>
                                             <td>Best restaurants in Manhattan (now that lockdown has lifted)</td>
                                             <td class="pfb_link">Night life</td>
                                             <td>This is the first 20 or so words of the article and then it stops like this...</td>
                                             <td><a href="#" class="pfb_btn pfb_greenBtn" data-target="#publishedPopup" data-toggle="modal">Publish This Article</a></td>
                                          </tr>
                                          <tr>
                                             <td>Best restaurants in Manhattan (now that lockdown has lifted)</td>
                                             <td class="pfb_link">Eating Out</td>
                                             <td>This is the first 20 or so words of the article and then it stops like this...</td>
                                             <td><a href="#" class="pfb_btn pfb_greenBtn" data-target="#publishedPopup" data-toggle="modal">Select This Article</a></td>
                                          </tr>
                                       </tbody></table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="publishedContent" role="tabpanel" aria-labelledby="publishedContent_tab">
                                <div class="c_top_inner">
                                    <div class="c_table2">
                                        <h5>YOUR PUBLISHED CONTENT</h5>
                                        <p class="c_table2_p1">Below you can see content that you have published to your site.Click to edit the content.</p>
                                        <p class="c_table2_p2"><b>Note:-</b> Since the content is spun automaticaally, we recommend you spend a few moments tweaking every article you post:</p>
                                        <div class="c_table table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Article Title</th>
                                                        <th>Niche</th>
                                                        <th>Published</th>
                                                        <th>Edit Article</th>
                                                    </tr>
                                                    <tr>
                                                        <td>5 ways to make money now that lockdown has ended</td>
                                                        <td class="pfb_link">Make Money</td>
                                                        <td>13th, May @ 2:32PM EST</td>
                                                        <td><a href="#" class="pfb_btn pfb_redBtn" data-target="#EditPopup" data-toggle="modal" >Edit</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5 tune-ups you should do for your body(now that you can leave the house)</td>
                                                        <td class="pfb_link">Health &amp; fitness</td>
                                                        <td>12th, May @ 2:32PM EST</td>
                                                        <td><a href="#" class="pfb_btn pfb_redBtn" data-target="#EditPopup" data-toggle="modal">Edit</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Best places to meet women in Manhattan</td>
                                                        <td class="pfb_link">Dating</td>
                                                        <td>11 th, May @ 2:32PM EST</td>
                                                        <td><a href="#" class="pfb_btn pfb_redBtn" data-target="#EditPopup" data-toggle="modal">Edit</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Top holiday destinations (that aren't Manhattan!)</td>
                                                        <td class="pfb_link">Travel</td>
                                                        <td>10th, May @ 2:32PM EST</td>
                                                        <td><a href="#" class="pfb_btn pfb_redBtn" data-target="#EditPopup" data-toggle="modal">Edit</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="pfb_setup_btns">
                        <a href="<?= base_url() ?>home/choose_niche/<?= $webid ?>" class="pfb_fontweight500"><img src="<?= base_url() ?>assets/backend/images/svg/arrowleft.svg" alt=""> Return to Niche Page</a>
                        <!--<a href="javascript:;" class="pfb_btn pfb_purpleBtn" onclick="submitSelectedProducts(<?= $webid ?>)">Save & Proceed To Top Pick</a>-->
                        <a href="<?= base_url() ?>home/top_product/<?= $webid ?>" class="pfb_btn pfb_purpleBtn">Save & Proceed To Top Pick</a>
                    </div>
                </div>
        </div>
        </div>
    </div>
</div>