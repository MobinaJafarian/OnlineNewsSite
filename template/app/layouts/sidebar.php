<div class="col-lg-4">
                        <div class="sidebars-area">
                            <div class="single-sidebar-widget editors-pick-widget">
                                <h6 class="title text-left">Editor's Choice</h6>
                                <div class="editors-pick-post">
                                    <?php if(isset($topSelectedPosts[0])) { ?>
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="<?= asset($topSelectedPosts[0]['image']) ?>" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="<?= url('show-category/' . $topSelectedPosts[0]['cat_id']) ?>"><?= $topSelectedPosts[0]['category'] ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="details text-left">
                                        <a href="<?= url('show-post/' . $topSelectedPosts[0]['id']) ?>">
                                            <h4 class="mt-20"><?= $topSelectedPosts[0]['title'] ?></h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[0]['username'] ?></a></li>
                                            <li><a href="#"><?= $topSelectedPosts[0]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                            <li><a href="#"><?= $topSelectedPosts[0]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>

                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <?php if(isset($sidebarBanner)) { ?>
                            <div class="single-sidebar-widget ads-widget">
                                <a href="<?= $sidebarBanner['url'] ?>">
                                <img class="img-fluid" src="<?= asset($sidebarBanner['image']) ?>" alt="">
                                </a>
                            </div>
                            <?php } ?>

                            <div class="single-sidebar-widget most-popular-widget">
                                <h6 class="title text-left">The most controversial</h6>

                                <?php foreach($mostCommentsPosts as $mostCommentsPost) { ?>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="<?= asset($mostCommentsPost['image']) ?>" alt="" width="150" height="100">
                                    </div>
                                    <div class="details text-left">
                                        <a href="<?= url('show-post/' . $mostCommentsPost['id']) ?>">
                                            <h6><?= $mostCommentsPost['title'] ?></h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><?= $mostCommentsPost['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                            <li><a href="#"><?= $mostCommentsPost['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                               
                            
                          
                            </div>

                        </div>
                    </div>