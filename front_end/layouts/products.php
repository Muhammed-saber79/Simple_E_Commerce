<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/db_connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/vaildators.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/router.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/checklogin.php');


$db_product="SELECT * FROM products";
$products_op=mysqli_query($connection,$db_product);
?>


<body class="sub_page">

<div class="hero_area">
    <!-- header section strats -->
    <?php
    require ('header.php');
    ?>
    <!-- end header section -->
</div>


<!-- product section -->

<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Products
            </h2>
        </div>



        <div class="row">


            <?php
            while ($product_data=mysqli_fetch_assoc($products_op)){
                ?>

                <div class="col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="<?php echo url('front_end/images/') . $product_data['image_path']; ?>" alt="">
                            <a href="<?php echo url('adding_to_cart.php') . '?product_id='.$product_data['id'] ;?>" class="add_cart_btn">
                                <span>
                                  Add To Cart
                                </span>
                            </a>
                        </div>
                        <div class="detail-box">
                            <h5>
                                <?php echo $product_data['name'];?>
                            </h5>
                            <div class="product_info">
                                <h5>
                                    <span>$</span> <?php echo $product_data['price'];?>
                                </h5>
                                <div class="star_container">
                                    <?php
                                    for($i=0;$i<$product_data['rate'];$i++){
                                        ?>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>



        </div>
        <div class="btn_box">
            <a href="" class="view_more-link">
                View More
            </a>
        </div>
    </div>
</section>

<!-- end product section -->


<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/front_end/layouts/footer.php');
?>


</body>

