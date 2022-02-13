<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['is_auth']))
{
    header("location:./agency_login_page.php");
}
?>
<?php
include_once("../dbconnection.php");
if (isset($_REQUEST['v_save'])) {
    $v_model = $_REQUEST['v_model'];
    $v_number = $_REQUEST['v_number'];
    $v_capacity = $_REQUEST['v_capacity'];
    $v_rent = $_REQUEST['v_rent'];
    $pimage = $_FILES['v_image']['name'];
    $tmp_name = $_FILES['v_image']['tmp_name'];
    $agency = $_SESSION['Agency'];
   
    move_uploaded_file($tmp_name, "../images/$pimage");
    $sql = "INSERT INTO vehicle_tb(v_model,v_number,v_capacity,v_rant,v_image,agency
        ) VALUES('$v_model','$v_number','$v_capacity','$v_rent','$pimage','$agency')";
    if ($conn->query($sql))
    {
        $_SESSION['vMsg'] = '<div class="alert alert-success mt-2" role ="alert" >Vehicle Added Successfully. </div>';
         echo "<script> location.href='./agency_carstore.php';</script>";
    }
        
    else {
        echo "Not save";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BootStrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome CSS  -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <title>CarRantal</title>
</head>

<body>

    <?php 
       include_once('./agency_navbar.php');
       include_once('./agency_addcarform.php');
     ?>

</body>
<!-- Font Awesome JS -->
<script src="../js/all.min.js"></script>
<!-- BootStrap JS -->
<script src="../js/bootstrap.min.js"></script>

</html>