   <!-- start footer Area -->
   <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 single-footer-widget">
                    <h4>اخبار پربازدید</h4>
                    <ul>
                        <?php foreach ($popularPosts as $popularPost) { ?>
                        <li><a href="<?= url('show-post/' . $popularPost['id']) ?>"><?= $popularPost['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 single-footer-widget">
                    <h4>لینک سریع</h4>
                    <ul>
                        <?php foreach ($menus as $menu) { ?>
                        <li><a href="<?= $menu['url'] ?>"><?= $menu['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-md-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->
    <script src="<?= asset('public/app/js/vendor/jquery-2.2.4.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?= asset('public/app/js/vendor/bootstrap.min.js') ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="<?= asset('public/app/js/easing.min.js') ?>"></script>
    <script src="<?= asset('public/app/js/hoverIntent.js') ?>"></script>
    <script src="<?= asset('public/app/js/superfish.min.js') ?>"></script>
    <script src="<?= asset('public/app/js/jquery.ajaxchimp.min.js') ?>"></script>
    <script src="<?= asset('public/app/js/jquery.magnific-popup.min.js') ?>"></script>
    <script src="<?= asset('public/app/js/mn-accordion.js') ?>"></script>
    <script src="<?= asset('public/app/js/jquery-ui.js') ?>"></script>
    <script src="<?= asset('public/app/js/jquery.nice-select.min.js') ?>"></script>
    <script src="<?= asset('public/app/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= asset('public/app/js/mail-script.js') ?>"></script>
    <script src="<?= asset('public/app/js/main.js') ?>"></script>
</body>

</html>