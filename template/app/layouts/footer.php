   <!-- start footer Area -->
   <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 single-footer-widget text-left">
                    <h4>Popular News</h4>
                    <ul>
                        <?php foreach ($popularPosts as $popularPost) { ?>
                        <li><a href="<?= url('show-post/' . $popularPost['id']) ?>"><?= $popularPost['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 single-footer-widget text-left">
                    <h4>quick link</h4>
                    <ul>
                        <?php foreach ($menus as $menu) { ?>
                        <li><a href="<?= $menu['url'] ?>"><?= $menu['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 single-footer-widget text-left">
                    <h4>Contact us</h4>
                    <ul>
                            <li><a href=""><span class="lnr lnr-phone-handset"></span><span>  +1 958-787-1176</span></a></li>
                            <li><a href=""><span class="lnr lnr-envelope"></span><span>  admin@onlinenews.com</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved
                </p>
                <div class="col-lg-4 col-md-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-telegram"></i></a>
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