<?php

require_once BASE_PATH . '/template/admin/layouts/head-tag.php';

?>


<section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Create Menu</h1>
    </section>

<section class="row my-3">
    <section class="col-12">
        <form method="post" action="<?= url('admin/menu/store') ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ..." required>
                </div>

                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." required>
                </div>

                <div class="form-group">
                    <label for="parent_id">parent ID</label>
                    <select name="parent_id" id="parent_id" class="form-control" autofocus>

                    <option value="">main menu</option>

                    <?php foreach($menus as $menu) { ?>
                        <option value="<?= $menu['id'] ?>">
                                <?= $menu['name'] ?>
                        </option>
                    <?php } ?>
                  

                    </select>
        </div>

        <button type="submit" class="btn btn-primary btn-sm">store</button>
        </form>
        </section>
        </section>


        <?php

        require_once BASE_PATH . '/template/admin/layouts/footer.php';

        ?>