<?php
session_start();

if(!isset($_SESSION['is_auth']))
{
    header("location:./agency_login_page.php");
}
else{
    include_once("../dbconnection.php");
    $id=$_REQUEST['id'];    
    $sql="SELECT car_id  FROM booked_vehicle_tb WHERE car_id = '".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows >0)
    {
        $_SESSION['vMsg'] = '<div class="alert alert-danger mt-2" role ="alert" >This Vehicle Has Been Booked By User, First Cancel Booking. </div>';
        echo "<script> location.href='./agency_carstore.php';</script>";
    } 
    else{
        $sql="DELETE FROM vehicle_tb WHERE v_id = '".$id."'";
        if($conn->query($sql))
        {
            $_SESSION['vMsg'] = '<div class="alert alert-success mt-2" role ="alert" >Vehicle Deleted Successfully. </div>';
            echo "<script> location.href='./agency_carstore.php';</script>";
        }   
        else{
            $_SESSION['vMsg'] = '<div class="alert alert-danger mt-2" role ="alert" >Not Update.'.$conn->error.' </div>';
            echo "<script> location.href='./agency_carstore.php';</script>";
        }
    }
   
    
}
?>