<?php

 require_once("../dbconnection.php");

if (!isset($_SESSION['is_login'])) {
    if (isset($_REQUEST['r_Login'])) {
        $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
        $sql = "SELECT * FROM agency_tb WHERE email = '" . $rEmail . "' AND r_password = '" . $rPassword . "' limit  1";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            if ($_REQUEST['rember'])
                $_SESSION['is_login'] = true;
            $_SESSION['aEmail'] = $rEmail;
            $r_data = $result->fetch_assoc();
            $_SESSION['Agency'] = $r_data['agency'];
            echo $_SESSION['Agency'];
            $_SESSION['is_auth'] = true;
            if(isset($_SESSION['is_authc']))
                unset($_SESSION['is_authc']);
            echo "<script> location.href='./agency_carstore.php';</script>";
        } else {
           
                $regmsg = '<div class="alert alert-danger mt-2 mb-2" role ="alert">Enter Valid Usernam and Password </div>';
           
        }
    }
} else {
    $_SESSION['is_auth'] = true;
    echo "<script> location.href='./agency_carstore.php';</script>";
}
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h3 class="text-center mb-3"><i class="fa-solid fa-arrow-right-to-bracket"></i> Agency Sign In </h3>
            <form method="post" action="" class="shadow-lg p-3 mb-5 bg-white rounded">
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }
                if(isset($_SESSION['arsi']))
                {
                    echo $_SESSION['arsi'];
                    $_SESSION['arsi']=NULL;
                }
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-light fa-at"></i> Email
                        address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="rEmail" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> <i class="fa-light fa-shield-keyhole"></i>
                        Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="rPassword" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rember">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-success  btn-block" name="r_Login">Submit</button>
                <p><small>Don't have Agency? <a href="./agency_register_page.php"> click here</a></small></p>
                <!-- <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }
                ?> -->
            </form>

        </div>
        <div class="col-sm-3"></div>
    </div>

</div>