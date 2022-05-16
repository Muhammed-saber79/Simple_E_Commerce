<?php
require("./Helpers/router.php");

session_start();
session_unset();
session_destroy();

header("location:".url("login.php"));
exit;
?>