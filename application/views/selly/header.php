<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url() ?>theme/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Seller Land</title>
    <link href="<?= base_url();?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--    CSS    ============================================= -->
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/linearicons.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/hexagons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .mlogo {
            font-size: 1.5rem;
        font-weight: 600;
        color: #fff;
        text-transform: uppercase;
        }
        .logo-smiley {
                transform: rotate(-15deg);
        }
    </style>
</head>
<body style="overflow-x:hidden">
<header id="header" id="home">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">

                <a class=" d-flex align-items-center justify-content-center" href="<?= site_url() ?>" style="font-size: 20px;">
                    <div class="sidebar-brand-icon logo-smiley">
                        <i class="fas fa-laugh-wink" style="color: #fff !important;"></i>
                    </div>
                 
                    <div class="sidebar-brand-text mx-3 mlogo">Selly.io <sup></sup></div>
                </a>
                <!-- <a href="<?= site_url('main/view/all-products') ?>"><img src="<?= base_url() ?>theme/img/logo.png" alt="your logo" title="" ></a> -->
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="<?= site_url('main/view/index') ?>">Home</a></li>
                    <li class="menu-has-children"><a href="">Services</a>
                        <ul>
                            <li><a href="<?= site_url('main/view/ecommerce') ?>">E-commerce <br> <p class="lead" style="font-size:11px;">Sell Digital Goods</p></a></li>
                            <li><a href="<?= site_url('main/view/payments') ?>">Payments<br> <p class="lead" style="font-size: 11px;">Payment Processing for a wide range</p></a></li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('main/view/prices') ?>">Pricing</a></li>
                    <li><a href="<?= site_url('main/view/all-stores') ?>">Stores</a></li>
                    <li><a href="<?= site_url('main/view/all-products') ?>">Products</a></li>
                    <?php if(empty($web_login)){ ?>
                    <li><a href="<?= site_url('main/view/signin') ?>" class="btn btn-light btn-large text-dark">Sign in</a></li>
                    <li><a href="<?= site_url('main/view/signup') ?>" class="btn">Sign up </a></li>
                    <?php } else { ?>
                    <!-- <li><a href="<?= site_url('main/view/all-products') ?>">Products</a></li> -->
                    <li class="menu-has-children"><a href="#"><?= $web_login[0]['username'] ?></a>
                        <ul>
                            <li> <a href="<?= site_url('/Main/view/myqueries')?>" >My Queries</a> </li>
                            <li><a href="<?= site_url('main/destroy') ?>">Logout</a></li>
                        </ul>
                    </li>
                    <?php } ?>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->
