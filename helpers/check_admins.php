<?php

if($_SESSION['admin']['role_id'] != 1){

    $_SESSION['try_to_log']=$_SESSION['admin']['role_id'];
    header("location:".url('login.php'));
    exit;
    
}


?>