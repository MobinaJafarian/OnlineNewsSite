<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=asset($setting['icon'])?>">
    <!-- Meta Description -->
    <meta name="description" content="<?=$setting['description']?>">
    <!-- Meta Keyword -->
    <meta name="keywords" content="<?=$setting['keywords']?>">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title><?=$setting['title']?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="<?=asset('public/app/css/linearicons.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/nice-select.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/animate.min.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/main.css')?>">
</head>

<body>
    <header>

        <div class="header-top" style="padding-bottom:30px;">
            <div class="container">
                <div class="row text-left float-left mb-10">

                <div class="header-top-left no-padding ">
                        <ul>
                            <li><a href="<?= url('login') ?>"><span class="lnr lnr-enter-down"></span><span style="font-size:15px;">  Login</span></a></li>
                            <li><a href="<?= url('register') ?>"><span class="lnr lnr-user"></span><span style="font-size:15px;">  Register</span></a></li>

                        </ul>
                    </div>

                    <div class="header-top-left no-padding text-dark">
                        <ul>
                            <li><span>ONLINE  NEWS</span></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="logo-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                        <a href="http://localhost/OnlineNewsSite/">
                            <img class="img-fluid" src="<?=asset($setting['logo'])?>" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                        <img class="img-fluid" src="<?=asset($bodyBanner['image'])?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu" id="main-menu">
            <div class="row align-items-center justify-content-between">
            <div class="navbar-right">
                    <form class="Search">
                        <input type="text" class="form-control Search-box text-left" name="Search-box" id="Search-box" placeholder="Search">
                        <label for="Search-box" class="Search-box-label">
								<span class="lnr lnr-magnifier"></span>
							</label>
                        <span class="Search-close">
								<span class="lnr lnr-cross"></span>
                        </span>
                    </form>
                </div>
            <nav id="nav-menu-container">
                    <ul class="nav-menu">
                            <?php foreach ($menus as $menu) {?>
                        <li class="menu-active">
                                <a href="<?=$menu['url']?>">
                                <?=$menu['name']?>
                                </a></li>
                        <?php }?>
                    </ul>
                </nav>

                

                <!-- #nav-menu-container -->

            </div>
        </div>
    </header>
