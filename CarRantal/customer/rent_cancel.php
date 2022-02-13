<?php
session_start();

if(!isset($_SESSION['is_authc']))
{
    header("location:./login_page.php");
}
else{
    include_once("../dbconnection.php");
    $id=$_REQUEST['id'];    
    $sql="DELETE FROM booked_vehicle_tb WHERE id = $id";
    if($conn->query($sql))
    {
        $_SESSION['cancel']='<div class="alert alert-danger mt-2" role ="alert" >Booking Has been Canceled.</div>';
        header("location:./user_info_page.php");
    }
    else{
        echo '<div class="alert alert-danger mt-2" role ="alert" >Some Server Error .</div>';
    }
    
}
?>