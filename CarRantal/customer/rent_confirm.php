<?php
session_start();

if(!isset($_SESSION['is_authc']))
{
    header("location:./login_page.php");
}
else{
    include_once("../dbconnection.php");
    $id=$_REQUEST['id'];
    $model=$_REQUEST['model'];
    $b_email=$_SESSION['rEmail'];
    $b_start_date=date('Y-m-d',strtotime( $_SESSION['startDate']));
    $b_end_date=date('Y-m-d',strtotime( $_SESSION['endDate']));
    $rent=$_REQUEST['rent'];
    $agency=$_REQUEST['agency'];
   
    $sql = "INSERT INTO booked_vehicle_tb(car_id,user_email,rent,s_date,end_date,agency) VALUES('".$id."','".$b_email."','".$rent."','".$b_start_date."','".$b_end_date."','".$agency."')";
    if($conn->query($sql))
    {
        $_SESSION['confirm']='<div class="alert alert-success mt-2" role ="alert" >'.$model. ' Successfully Booked, Click On Your Account To View .</div>';
        header("location:./deshboard.php");
    }
    else{
        echo '<div class="alert alert-danger mt-2" role ="alert" >Some Server Error .</div>';  
    }
    
}
?>