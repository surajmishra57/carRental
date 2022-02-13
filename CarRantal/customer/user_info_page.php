<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['is_authc']))
{
    header("location:./login_page.php");
}
?>

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

<body style="background-color: white;">

    <?php 
       include_once('./navbar.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="alert-warning p-2 mt-2 sticky-top text-center"> Booked Vehicle
                    Information</h3>
                <?php
                    if(isset($_SESSION['cancel']))
                    {
                        echo $_SESSION['cancel'];
                        unset($_SESSION['cancel']);
                    }
                 ?>
                <?php
                        include_once("../dbconnection.php");
                        
                        $sql = "SELECT booked_vehicle_tb.id,vehicle_tb.v_image,vehicle_tb.v_model,vehicle_tb.v_number,vehicle_tb.v_capacity,booked_vehicle_tb.rent,booked_vehicle_tb.s_date,booked_vehicle_tb.end_date FROM vehicle_tb INNER JOIN booked_vehicle_tb ON booked_vehicle_tb.car_id= vehicle_tb.v_id WHERE booked_vehicle_tb.user_email='".$_SESSION['rEmail']."'";
                        $result = $conn->query($sql);
                       
                        if ($result!==false && $result->num_rows > 0) {
                            
                            echo '<table class="table">';
                            echo ' <thead>';
                            echo ' <tr>';
                            
                            echo '<th scope="col">Image</th>';
                            echo '<th scope="col">Vehicle Model</th>';
                            echo '<th scope="col">Vehicle Number</th>';
                            echo '<th scope="col">Vehicle Capacity</th>';
                            echo '<th scope="col">Vehicle Rent</th>';
                           
                    
                            echo '<th scope="col">Start Date</th>';
                            echo '<th scope="col">End Date</th>';
                            
                            
                            echo '<th scope="col">Action</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo ' <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                
                                $img_data = $row['v_image'];
                                 if($img_data==NULL)
                                    $img_data = "no_image.jpg";
                                $i = $row['id'];
                                echo "<tr>";
                               
                                echo "<td><image src='../images/$img_data' width='100px' height='100px'/></td>";
                                echo "<td>" . $row['v_model'] . "</td>";
                                echo "<td>" . $row['v_number'] . "</td>";
                                echo "<td>" . $row['v_capacity'] . " Person </td>";
                                echo "<td>" . $row['rent'] . " R.s per day</td>";
                               
                                echo "<td>" .date('d-m-Y',strtotime($row['s_date']))  . " </td>";
                                 echo "<td>" .date('d-m-Y',strtotime($row['end_date'])) . " </td>";
                                echo "<td><a href='./rent_cancel.php?id=$i' class='btn btn-danger btn-sm btn-del'>Cancel</a></td>";

                                echo "</tr>";
                            }
                            echo ' </tbody>';
                            echo ' </table>';
                        }
                         else 
                            echo ' <h3 class="alert-danger p-2 mt-5">No Vehicle Booked</h3>';
                        
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