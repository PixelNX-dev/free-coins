<div class="pfb_content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pfb_setup_wrapper">
                    <nav aria-label="breadcrumb" class="pfb_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home/mysites') ?>">My Sites</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Publish and Edit Content</li>
                        </ol>
                    </nav> 

                    <h2 class="pfb_bottompadder30">Publish and Edit Content</h2>
                    
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
                                    <p class="mb-0">Every day, you will have the option to post content to your site. You can post one article per day.
                                    You can "spin" your article, to make it unique and edit it as many times as you want.
                                    Today you can spin 1x article. This will reset at midnight tonight (EST) - in <?= $hours ?> hours.</p>
                                    <h6 class="c_top_inner_p">Please click to select your article.</h6>
                                    <div class="c_table table-responsive">
                                       <table class="table table-bordered">
                                          <tbody>
                                          <tr>
                                             <th>Article Title</th>
                                             <th>Categories</th>
                                             <th>Preview</th>
                                             <th>Publish This Article</th>
                                          </tr>
                                          
                                          <?php 
                                            if(!empty($nicheList)) {
                                                $colsArray = explode(',',$cols);

                                                foreach($nicheList as $soloNiche) {
                                                $articles = $this->DBfile->get_data('articletbl',array('art_nicheid'=>$soloNiche['n_id']),'art_title,art_id,'.$cols,'',3);
                                                if(!empty($articles)){ 
                                                $colCount = 0;
                                                foreach($articles as $soloArticles) {
                                                    $artTitle = $soloArticles['art_title'];
                                                    $artPreview = substr($soloArticles[$colsArray[$colCount]], 0, 100);
                                            ?>
                                            <tr>
                                                <td><?= $artTitle ?></td>
                                                <td class="pfb_link"><?= $soloNiche['n_title'] ?></td>
                                                <td><?= $artPreview ?></td>
                                                <td><a href="javascript:;" class="pfb_btn pfb_greenBtn" data-col="<?= $colsArray[$colCount] ?>" onclick="publishArticle(this,<?= $soloArticles['art_id'] ?>,<?= $soloNiche['n_id'] ?>)">Publish This Article</a></td>
                                            </tr>
                                          <?php $colCount++; } } } } ?>
                                       </tbody></table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="publishedContent" role="tabpanel" aria-labelledby="publishedContent_tab">
                                <div class="c_top_inner">
                                    <div class="c_table2">
                                        <h5>YOUR PUBLISHED CONTENT</h5>
                                        <p class="c_table2_p1">Below you can see content that you have published to your site. Click to edit the content.</p>
                                        <p class="c_table2_p2"><b>Note:-</b> since the content is spun automatically, we recommend you spend a few moments tweaking every article you post:</p>
                                        <div class="c_table table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Article Title</th>
                                                        <th>Categories</th>
                                                        <th>Published</th>
                                                        <th>Edit Article</th>
                                                    </tr>
                                                <?php 
                                                if(!empty($publishedArticles)) {
                                                   foreach($publishedArticles as $soloPublishedArticles){ 
                                                       $blogUrl = base_url().'n/'.$websiteData[0]['w_sitename'].'/'.$soloPublishedArticles['n_slug'].'/'.$soloPublishedArticles['webart_slug'];    
                                                    ?>
                                                    <tr>
                                                        <td><a href="<?= $blogUrl ?>" target="_blank" style="color: #1D548F;font-weight: bold;"><?= $soloPublishedArticles['webart_title'] ?></a></td>
                                                        <td class="pfb_link"><?= $soloPublishedArticles['n_title'] ?></td>
                                                        <td><?= date("dS, F \@ g:i a \E\S\T", strtotime($soloPublishedArticles['webart_date'])) ?></td>
                                                        <td><a href="javascript:;" class="pfb_btn pfb_redBtn" onclick="editContent(<?= $soloPublishedArticles['webart_id'] ?>)" >Edit</a></td>
                                                    </tr>
                                                <?php } } else {
                                                    echo '<tr><td colspan="4" style="text-align: center;">You have not published anything yet.</td></tr>';
                                                }
                                               ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $webid ?>" id="webid">
                </div>
        </div>
        </div>
    </div>
</div>