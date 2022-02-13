<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['is_auth']))
{
    header("location:./agency_login_page.php");
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

<body style="background-color: white;">

    <?php 
       include_once('./agency_navbar.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col sm-12">
                <h3 class="alert-warning p-2 mt-2 sticky-top text-center"><i
                        class="fas fa-store"></i><?php echo $_SESSION['Agency']?> Agency Cars
                    Information</h3>
                <div class="text-end"><a href="./agency_addcarpage.php" class="btn btn-success mt-4 shadow-sm add_btn"
                        style="font-weight : bold"><i class="fas fa-plus"></i> Add Car</a></div>
                <?php 
                if(isset($_SESSION['vMsg']))
                {
                    echo $_SESSION['vMsg'];
                    unset($_SESSION['vMsg']);
                }?>
                <?php
                        include_once("../dbconnection.php");
                        
                        $sql = "SELECT * FROM vehicle_tb WHERE agency='" . $_SESSION['Agency'] . "'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<table class="table">';
                            echo ' <thead>';
                            echo ' <tr>';
                            echo ' <th scope="col">ID</th>';
                            echo '<th scope="col">Image</th>';
                            echo '<th scope="col">Vehicle Model</th>';
                            echo '<th scope="col">Vehicle Number</th>';
                            echo '<th scope="col">Vehicle Capacity</th>';
                            echo '<th scope="col">Vehicle Rent</th>';
                            echo '<th scope="col">Action</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo ' <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                $img_data = $row['v_image'];
                                 if($img_data==NULL)
                                    $img_data = "no_image.jpg";
                                $i = $row['v_id'];
                                echo "<tr>";
                                echo "<td>" . $row['v_id'] . "</td>";
                                echo "<td><image src='../images/$img_data' width='100px' height='100px'/></td>";
                                echo "<td>" . $row['v_model'] . "</td>";
                                echo "<td>" . $row['v_number'] . "</td>";
                                echo "<td>" . $row['v_capacity'] . " Person </td>";
                                echo "<td>" . $row['v_rant'] . " R.s per day</td>";
                                echo "<td><a href='./agency_updateCar.php?id=$i' class='btn btn-warning btn-sm btn-edit'>Edit</a><a href='./agency_deleteCar.php?id=$i' class='btn btn-danger btn-sm btn-del'>Delete</a></td>";

                                echo "</tr>";
                            }
                            echo ' </tbody>';
                            echo ' </table>';
                        } else {
                            echo ' <h3 class="alert-danger p-2 mt-5">No Vehicle Avalable In Agency Go To  "+Add Car"</h3>';
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