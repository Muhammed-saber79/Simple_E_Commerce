<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/db_connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/vaildators.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/router.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/checklogin.php');





if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=clean($_POST['name']);
    $price=clean($_POST['price']);


    #image details .....
    $image_name=$_FILES['image']['name'];
    $image_temp_name=$_FILES['image']['tmp_name'];
    $image_type=$_FILES['image']['type'];



    #start validation ......
    $errors=[];
    if(!validate($name,1)){
        $errors['name']="*Name Field Required";
    }elseif(!validate($name,3)){
        $errors['name']="*Name Length Must Be At Least 7 Chars";
    }




    if(!validate($price,1)){
        $errors['role']="*Price Field Required";
    }elseif(!validate($price,5)){
        $errors['role']="*Please Enter Valid Price";
    }


    if(!validate($image_name,1)){
        $errors['image']="*image Field Required";
    }else{
        $arr_type=explode('/',$image_type);
        if (!validate($arr_type[1],6)){
            $errors['image']="Not Allawed Extension";
        }
    }


    if (count($errors)>0){
        $_SESSION['Message']=$errors;
    }else{
        $final_name=rand(10,1000) . time() . "-" . $image_name;
        $distination_path="./front_end/images/" . $final_name;

        if (move_uploaded_file($image_temp_name,$distination_path)){
            $add_product="INSERT INTO products(name,price,image_path) VALUES('$name','$price','$final_name')";
            $query_add=mysqli_query($connection,$add_product);
//            echo mysqli_error($connection);
//            exit;

            if($query_add){
                $message="*Product Added Successfully";
            }else{
                $message="*Error Adding New Product,Please Try Again";
            }
            $_SESSION['Message']=[$message];
            header("location:index.php");
            exit;

        }else{
            $_SESSION['Message']=["Image Didn't Moved Correctly"];
        }

    }

}







?>

<body class="sub_page">

<div class="hero_area">
    <!-- header section strats -->
    <?php
    require('front_end/layouts/header.php');
    ?>
    <!-- end header section -->
</div>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">

                <?php
                if (isset($_SESSION['Message'])){
                    foreach($_SESSION['Message'] as $key => $value){
                        echo $value . "<br>";
                    }
                }else{
                    echo "Dashboard/Add New Product";
                }
                unset($_SESSION['Message']);
                ?>

            </li>
        </ol>

        <div class="container">
            <form  action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="POST"   enctype ="multipart/form-data">



                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text"  name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number"  name="price"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Price">
                </div>





                <div class="form-group">
                    <label for="exampleInputPassword1">Product Image</label>
                    <input type="file"   name="image"  >
                </div>



                <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Save</button>
            </form>
        </div>
    </div>
</main>


<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/front_end/layouts/footer.php');
?>


</body>


