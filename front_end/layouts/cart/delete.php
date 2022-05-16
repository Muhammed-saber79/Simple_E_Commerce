<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/db_connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/vaildators.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/router.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/New_Projects/Native/e_commerce/helpers/checklogin.php');


$product_id=$_GET['product_id'];



if(validate($product_id,1)){

$delete_product="DELETE FROM cart WHERE product_id=$product_id";
$query_op=mysqli_query($connection,$delete_product);


if($query_op){
$message="*Product Dropped Successfully .....";
}else{
$message="*Error Removing This Product .....";
}

}else{
$message="*Invalid Id .....";
}


$_SESSION['Message']=[$message];
header("location:cart.php");
exit;

?>