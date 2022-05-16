<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/db_connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/vaildators.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/router.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/checklogin.php');


$user_id=$_SESSION['user']['id'];
$db_cart_data="SELECT cart.*,products.* FROM cart INNER JOIN products ON cart.product_id=products.id WHERE user_id='$user_id'";
$query_op=mysqli_query($connection,$db_cart_data);





?>

<body class="sub_page">

<div class="hero_area">
    <!-- header section strats -->
    <?php
    require('../header.php');
    ?>
    <!-- end header section -->
</div>


<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <?php
                if(isset($_SESSION['Message'])){
                    foreach($_SESSION['Message'] as $key => $value){
                        echo $value . "<br>";
                    }
                }else{
                    echo "Dashboard/List Products";
                }
                unset($_SESSION['Message']);
                ?>
            </li>
        </ol>




        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>photo</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>photo</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>



                        <tbody>
                        <?php
                        while($product_data=mysqli_fetch_assoc($query_op)){
                            ?>
                            <tr style="text-align: center;">
                                <td><img src="<?php echo url('front_end/images/').$product_data['image_path']; ?> " width="50px" height="50px" style="border-radius:50%;"></td>
                                <td><?php echo $product_data['name']; ?></td>
                                <td><?php echo $product_data['price']; ?></td>
                                <td style="text-align: center;">
                                    <a href="delete.php?product_id=<?php echo $product_data['product_id'];?>" class='btn btn-outline-danger m-r-1em'>Drop From Cart</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/front_end/layouts/footer.php');
?>


</body>

