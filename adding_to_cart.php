<?php

require 'helpers/db_connection.php';
require 'helpers/vaildators.php';
require 'helpers/router.php';
require 'helpers/checklogin.php';

$product_id=$_GET['product_id'];
$user_id=$_SESSION['user']['id'];

if(isset($product_id)){
    if(!validate($product_id,1)){
        $_SESSION['product_id']='No Product Id .....';
        header ("Location:".url('index.php'));
    }elseif (!validate($product_id,5)){
        $_SESSION['product_id']='Invalid Product Id .....';
        header ("Location:".url('index.php'));
    }


    $put_in_cart="INSERT INTO cart (product_id,user_id) VALUES ('$product_id','$user_id')";
    $query_op=mysqli_query($connection,$put_in_cart);

    //echo mysqli_error($connection);exit;
    if(mysqli_num_rows($query_op)==0){
        $_SESSION['success_insert']='Product Added Successfully To Cart';
        header ("Location:".url('index.php'));
        exit;
    }else{
        $_SESSION['success_insert']="Product Can't Be Added To Cart,Please Try Again!";
        header ("Location:".url('index.php'));
        exit;
    }
}

