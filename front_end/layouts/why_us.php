<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/db_connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/vaildators.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/router.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/checklogin.php');
?>

<body class="sub_page">

<div class="hero_area">
    <!-- header section strats -->
    <?php
    require ('header.php');
    ?>
    <!-- end header section -->
</div>

<!-- why us section -->

<section class="why_us_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Why Choose Us
            </h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box ">
                    <div class="img-box">
                        <img src="<?php echo url('front_end/images/w1.png'); ?>" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Fast Delivery
                        </h5>
                        <p>
                            variations of passages of Lorem Ipsum available
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box ">
                    <div class="img-box">
                        <img src="<?php echo url('front_end/images/w2.png'); ?>" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Free Shiping
                        </h5>
                        <p>
                            variations of passages of Lorem Ipsum available
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box ">
                    <div class="img-box">
                        <img src="<?php echo url('front_end/images/w3.png'); ?>" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Best Quality
                        </h5>
                        <p>
                            variations of passages of Lorem Ipsum available
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end why us section -->


<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/front_end/layouts/footer.php');
?>


</body>


