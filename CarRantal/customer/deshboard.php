<!DOCTYPE html>
<?php
session_start();

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
       include_once('navbar.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    if(isset($_SESSION['confirm']))
                    {
                        echo $_SESSION['confirm'];
                        unset($_SESSION['confirm']);
                    }

                    
                    if(isset($_SESSION['is_authc']) &&isset($_SESSION['startDate']) &&isset($_SESSION['endDate']) )
                    {
                         echo '<div class="alert alert-primary mt-2" role ="alert" >Cars Avalable From Date ' . $_SESSION['startDate'] .' to '.$_SESSION['endDate']. '</div>';
                    }
                 ?>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-12 con">
                <?php
                    include_once("../dbconnection.php");
                    if(isset($_SESSION['is_authc']))
                    {
                        $sql="SELECT * FROM vehicle_tb WHERE v_id NOT IN (SELECT car_id FROM booked_vehicle_tb  WHERE ((s_date BETWEEN '".date('Y-m-d',strtotime($_SESSION['startDate']))."' AND '".date('Y-m-d',strtotime($_SESSION['endDate']))."') OR (end_date BETWEEN '".date('Y-m-d',strtotime($_SESSION['startDate']))."' AND '".date('Y-m-d',strtotime($_SESSION['endDate']))."')))";
                        
                    }
                    else{
                        $sql = "SELECT * FROM vehicle_tb ";
                    }
                     
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0)
                        {
                             while ($row = $result->fetch_assoc())
                             {
                                $img_data = $row['v_image'];
                                if($img_data==NULL)
                                    $img_data = "no_image.jpg";
                                $i = $row['v_id'];
                                $rent=$row['v_rant'];
                                $model=$row['v_model'];
                                $agency=$row['agency'];
                                echo "<div class='card m-3' style='width: 18rem;'>";
                                echo "<img src='../images/$img_data' class='card-img-top' alt='...'>";
                               
                                echo " <div class='card-body'>";
                                echo " <h5 class='card-title'>".$row['v_model']."</h5>";
                                echo "<p><b>Vehicle Number : </b>" .$row['v_number']."</p>";
                                echo "<p><b>Vehicle Capacity : </b>".$row['v_capacity'] ." person</p>";
                                echo "<p><b>Vehicle Rent : </b>" .$row['v_rant']."rs. per day</p>";
                                echo "<a href='./rent_confirm.php?id=$i&rent=$rent&model=$model&agency=$agency' class='btn btn-success'>Rent Now</a>";
                                echo "</div>";
                                echo "</div>";
                                
                             }
                        }
                        else{
                             echo ' <h3 class="alert-danger p-2 mt-5">No Vehicle Avaiable On Your Chosen Date</h3>';
                        }
                ?>

            </div>
        </div>
    </div>

</body>
<!-- Font Awesome JS -->
<script src="../js/all.min.js"></script>
<!-- BootStrap JS -->
<script src="../js/bootstrap.min.js"></script>

</html>