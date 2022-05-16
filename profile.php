
<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/db_connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/vaildators.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/router.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/checklogin.php');

?>

<body class="sub_page" style="background-color: #7abaff">

<div class="hero_area">
    <!-- header section strats -->
    <?php
    require('front_end/layouts/header.php');
    ?>
    <!-- end header section -->
</div>

<!-- about section -->

<h2 style="text-align: center;margin-bottom: 200px;margin-top: 25px"> عشان والله معنت قادر <?php echo  "  [". $_SESSION['user']['name'] . "]  "?>كفاية على كدا يا اسطا </h2>

<!-- end about section -->


<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/front_end/layouts/footer.php');
?>


</body>

