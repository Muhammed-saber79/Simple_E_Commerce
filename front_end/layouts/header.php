<?php



?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="<?php echo url('front_end/images/fevicon.png')?>" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Minics</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo url('front_end/css/bootstrap.css'); ?>" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

    <!-- font awesome style -->
    <link href="<?php echo url('front_end/css/font-awesome.min.css'); ?>" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo url('front_end/css/style.css');?>" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo url('front_end/css/responsive.css'); ?>" rel="stylesheet" />

</head>

<body>


<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">

        <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/front_end/layouts/topNav.php');
        ?>
        <div class="header_bottom">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
              <span>
                Minics
              </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo url('index.php'); ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url('front_end/layouts/about.php'); ?>"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url('front_end/layouts/products.php'); ?>">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url('front_end/layouts/why_us.php'); ?>">Why Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url('front_end/layouts/testimonial.php'); ?>">Testimonial</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url('front_end/layouts/cart/cart.php'); ?>">Cart</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- end header section -->

