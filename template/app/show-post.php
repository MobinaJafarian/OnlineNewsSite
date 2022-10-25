<?php 
        require_once(BASE_PATH . '/template/app/layouts/header.php');
   ?>
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= asset($post['image']) ?>" alt="">
                            </div>
                            <div class="content-wrap post-left text-left"">
                                <ul class="tags mt-10">
                                    <li><a href="<?= url('show-category/' . $post['cat_id']) ?>"><?= $post['category'] ?></a></li>
                                </ul>
                                <a href="#">
                                    <h3><?= $post['title'] ?></h3>
                                </a>
                                <ul class="meta pb-20">
                                    <li><a href="#"><span class="lnr lnr-user"></span><?= $post['username'] ?></a></li>
                                    <li><a href="#"><?= $post['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"><?= $post['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                               <p>
                               <?= $post['body'] ?>
                               </p>

                                <div class="comment-sec-area">
                                    <div class="container">
                                        <div class="row flex-column">
                                            <h6>Comment</h6>
                                            <?php foreach ($comments as $comment) { ?>
                                            <div class="comment-list float-left post-left text-left"">
                                                <div class="single-comment justify-content-between ">
                                                    <div class="user justify-content-between ">

                                                        <div class="desc post-left text-left"">
                                                            <h5><a href="#"><?= $comment['username'] ?></a></h5>
                                                            <p class="date mt-3"><?= $comment['created_at'] ?></p>
                                                            <p class="comment ml-10">
                                                                <?= $comment['comment'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($_SESSION['user'])) { ?>
                            <div class="comment-form">
                                <h4>Add new comment</h4>
                                <form action="<?= url('comment-store') ?>" method="post">
                                    <div class="form-group">
                                            <input type="text" value="<?= $id ?>" name="post_id" class="d-none">
                                        <textarea class="form-control mb-10 text-left" rows="5" name="comment" placeholder="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'text'" required=""></textarea>
                                    </div>
                                    <button type="submit" class="primary-btn text-uppercase">Send</button>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- End single-post Area -->
                    </div>
                    <?php 
                        require_once(BASE_PATH . '/template/app/layouts/sidebar.php');
                        ?>
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>


    <!-- start footer Area -->
    <?php 
        require_once(BASE_PATH . '/template/app/layouts/footer.php');
   ?>