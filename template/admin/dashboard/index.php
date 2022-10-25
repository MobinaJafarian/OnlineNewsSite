<?php
require_once(BASE_PATH . "/template/admin/layouts/head-tag.php");
?>
    <div class="row mt-3">

        <div class="col-sm-6 col-lg-3">
            <a href="<?= url('admin/category') ?>" class="text-decoration-none">
                <div class="card text-white bg-gradiant-green-blue mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-clipboard-list"></i> Categories</span> <span class="badge badge-pill right"><?= $categoryCount['COUNT(*)']; ?></span></div>
                    <div class="card-body">
                        <section class="font-12 my-0"><i class="fas fa-clipboard-list"></i> GO TO Categories!</section>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="<?= url('admin/user') ?>" class="text-decoration-none">
                <div class="card text-white bg-juicy-orange mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-users"></i> Users</span>  <span class="badge badge-pill right"><?= $userCount['COUNT(*)']; ?></span></div>
                    <div class="card-body">
                        <section class="d-flex justify-content-between align-items-center font-12">
                            <span class=""><i class="fas fa-users-cog"></i> Admin <span class="badge badge-pill mx-1"><?= $adminCount['COUNT(*)']; ?></span></span>
                            <span class=""><i class="fas fa-user"></i> All Users <span class="badge badge-pill mx-1"><?= $userCount['COUNT(*)'] + $adminCount['COUNT(*)']; ?></span></span>
                        </section>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="<?= url('admin/post') ?>" class="text-decoration-none">
                <div class="card text-white bg-dracula mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i> Article</span>  <span class="badge badge-pill right"><?= $postCount['COUNT(*)']; ?></span></div>
                    <div class="card-body">
                        <section class="d-flex justify-content-between align-items-center font-12">
                            <span class=""><i class="fas fa-bolt"></i> Views <span class="badge badge-pill mx-1"><?= $postsViews['SUM(view)']; ?></span></span>
                        </section>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="<?= url('admin/comment') ?>" class="text-decoration-none">
                <div class="card text-white bg-neon-life mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-comments"></i> Comment</span>  <span class="badge badge-pill right"><?= $commentsCount['COUNT(*)']; ?></span></div>
                    <div class="card-body">
<!--                        <h5 class="card-title">Info card title</h5>-->
                        <section class="d-flex justify-content-between align-items-center font-12">
                            <span class=""><i class="fa fa-eye-slash"></i> Unseen <span class="badge badge-pill mx-1"><?= $commentsUnseenCount['COUNT(*)']; ?></span></span>
                            <span class=""><i class="fa fa-check-circle"></i> Approved <span class="badge badge-pill mx-1"><?= $commentsApprovedCount['COUNT(*)']; ?></span></span>
                        </section>
                    </div>
                </div>
            </a>
        </div>

    </div>


    <div class="row mt-2">
        <div class="col-4">
            <h2 class="h6 pb-0 mb-0">
                Most viewed posts
            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>view</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($postsWithView as $key => $post) {?>
                    <tr>
                        <td><a class="text-primary" href="<?= url('admin/post') ?>"><?=  $key += 1 ?></a></td>
                        <td><a class="text-dark" href="<?= url('admin/post') ?>"><?=  $post['title'] ?></a></td>
                        <td><span class="badge badge-secondary"><?=  $post['view'] ?></span></td>
                    </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <h2 class="h6 pb-0 mb-0">
                Most commented posts
               
            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($postsComments as $key => $post) {?>
                        <tr>
                            <td><a class="text-primary" href="<?= url('admin/post') ?>"><?=  $key +=1 ?></a></td>
                            <td><a class="text-dark" href="<?= url('admin/post') ?>"><?=  $post['title'] ?></a></td>
                            <td><span class="badge badge-success"><?=  $post['comment_count'] ?></span></td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <h2 class="h6 pb-0 mb-0">
                Comments
            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>comment</th>
                        <th>status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($lastComments as $key => $comment) {?>

                        <tr >
                            <td><a class="text-primary" href="<?= url('admin/comment') ?>"><?=  $key +=1 ?></a></td>
                            <td><a class="text-dark" href="<?= url('admin/comment') ?>"><?=  $comment['username'] ?></a></td>
                            <td><a class="text-dark" href="<?= url('admin/comment') ?>"><?=  $comment['comment'] ?></a></td>
                            <td><span class="badge badge-warning"><?=  $comment['status'] ?></span></td>
                        </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
require_once(BASE_PATH . "/template/admin/layouts/footer.php");
?>