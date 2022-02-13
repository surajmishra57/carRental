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

<body>
    <?php
         include_once("../dbconnection.php");
        $id=$_REQUEST['id'];
        if(isset($_REQUEST['v_save']))
        {

            $m = $_REQUEST['v_model'];
            $n = $_REQUEST['v_number'];
            $c = $_REQUEST['v_capacity'];
            $r = $_REQUEST['v_rent'];
            
            $pimage= $_FILES['v_image']['name'];
            $tmp_name = $_FILES['v_image']['tmp_name'];
            if($pimage==NULL)
            {
                $sql="UPDATE vehicle_tb SET v_model='".$m."',v_number='".$n."',v_capacity='".$c."',v_rant='".$r."' WHERE v_id='".$id."'";
            }
            else{
                $sql="UPDATE vehicle_tb SET v_image='".$pimage."',v_model='".$m."',v_number='".$n."',v_capacity='".$c."',v_rant='".$r."' WHERE v_id='".$id."'";
                 move_uploaded_file($tmp_name, "../images/$pimage");
            }
            if($conn->query($sql))
            {
                 $_SESSION['vMsg'] = '<div class="alert alert-success mt-2" role ="alert" >Vehicle Updated Successfully. </div>';
                 echo "<script> location.href='./agency_carstore.php';</script>";
            }
            else{
                 $_SESSION['vMsg'] = '<div class="alert alert-danger mt-2" role ="alert" >Not Update.'.$conn->error.' </div>';
                 echo "<script> location.href='./agency_carstore.php';</script>";
            }
                
            
           
            
        }
    ?>
    <?php 
      
       include_once('./agency_navbar.php');
       
       $sql = "SELECT * FROM vehicle_tb WHERE v_id='".$id."'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0)
       {
           $r=$result->fetch_assoc();
           $model=$r['v_model'];
           $number=$r['v_number'];
           $set=$r['v_capacity'];
           $rent=$r['v_rant'];
           $file=$r['v_image'];
           //echo $file;
       }
       else{
           echo $result->error;
       }
      
     ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form class="row g-3 shadow-lg p-3 mb-5 bg-white rounded" enctype="multipart/form-data" method="post"
                    actioin="">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label"><i class="fa-solid fa-car-side"></i> Vehical
                            Model</label>
                        <input type="text" class="form-control" id="inputEmail4" name="v_model"
                            value=<?php echo $model?> required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label"><i class="fa-solid fa-input-numeric"></i> Vehical
                            Number</label>
                        <input type="text" class="form-control" id="inputPassword4" name="v_number"
                            value=<?php echo $number?> required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label"><i class="fa-solid fa-person-seat-reclined"></i>
                            Seting
                            capacity</label>
                        <input type="number" class="form-control" id="inputAddress" name="v_capacity"
                            value=<?php echo $set?> min="1" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label"><i class="fa-solid fa-indian-rupee-sign"></i> Rent
                            Per
                            day</label>
                        <input type="number" class="form-control" id="inputAddress2" name="v_rent" min="1"
                            value=<?php echo $rent?> required>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress2" class="form-label"><i class="fa-solid fa-camera"></i> Vehical
                            Image</label>
                        <input type="file" class="form-control" id="inputAddress2 " name="v_image">
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-success" name="v_save">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
                <div class="text-center"><a href="./agency_carstore.php" class="btn btn-success  shadow-sm "> Back </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    </div>

</body>
<!-- Font Awesome JS -->
<script src="../js/all.min.js"></script>
<!-- BootStrap JS -->
<script src="../js/bootstrap.min.js"></script>

</html>