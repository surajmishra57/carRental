<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['is_authc']))
{
    header("location:./login_page.php");
}
if(isset($_REQUEST['s_search']))
{
    if(isset($_SESSION['startDate']) && isset($_SESSION['endDate']))
    {
        unset($_SESSION['startDate']);
        unset($_SESSION['endDate']);
    }
    $date=date('d-m-Y',strtotime($_REQUEST['s_date']));
    $newdate=date('d-m-Y',strtotime($_REQUEST['s_date'] .'+ '. $_REQUEST['s_day'].'days'));
    if(date('Y-m-d')>date('Y-m-d',strtotime($_REQUEST['s_date'])))
    {
        
        $regmsg = '<div class="alert alert-danger mt-2 mb-2" role ="alert">Enter Valid Date </div>';
    }
       
    else
    {
        $_SESSION['startDate']=$date;
        $_SESSION['endDate']=$newdate;   
        echo "<script> location.href='./deshboard.php';</script>";
        
    }   
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

<body>

    <?php 
       include_once('./navbar.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h3 class="text-center mb-3 mt-5"><i class="fa-solid fa-car-side"></i>Search Cars </h3>
                <form action="" method="post" class="shadow-lg p-3 mt-5 bg-white rounded">
                    <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                    $regmsg=NULL;
                }?>
                    <div class="mb-3">
                        <label for="exampleInputDate" class="form-label">From Date</label>
                        <input type="date" class="form-control" id="exampleInputDate" name="s_date"
                            value="<?php echo date('d-m-Y')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDays" class="form-label">To {days}</label>
                        <select id="inputDays" class="form-select" required name="s_day">
                            <option value="1">1 day</option>
                            <option value="2">2 days</option>
                            <option value="3">3 days</option>
                            <option value="4">4 days</option>
                            <option value="5">5 days</option>
                            <option value="6">6 days</option>
                            <option value="7">7 days</option>
                            <option value="8">8 days</option>
                            <option value="9">9 days</option>
                            <option value="10">10 days</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success" name="s_search">Search</button>
                </form>
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