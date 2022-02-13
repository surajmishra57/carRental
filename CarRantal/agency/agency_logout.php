<?php
session_start();
echo session_destroy();
header("location:../customer/deshboard.php");
// echo "<script> location.href='../customer/deshboard.php';</script>";

?>