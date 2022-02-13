<?php
include_once("../dbconnection.php");

if (isset($_REQUEST['r_Signup'])) {
    if ($_REQUEST['password'] !== $_REQUEST['re_password']) {
        $regmsg = '<div class="alert alert-warning mt-2" role ="alert" > Password And Re-Password Not Match</div>';
    } else {
        $s = "SELECT r_email FROM user WHERE r_email='" . $_REQUEST['email'] . "'";
        $result = $conn->query($s);
        if ($result->num_rows == 1) {
            $regmsg = '<div class="alert alert-danger mt-2" role ="alert" > User Already Registered </div>';
        } else {
            $fname      = mysqli_real_escape_string($conn, trim($_REQUEST['f_name']));
            $lname      = mysqli_real_escape_string($conn, trim($_REQUEST['l_name']));
            $email      = mysqli_real_escape_string($conn, trim($_REQUEST['email']));
            $phone      = mysqli_real_escape_string($conn, trim($_REQUEST['phone']));
            $password   = mysqli_real_escape_string($conn, trim($_REQUEST['password']));
            $re_password = mysqli_real_escape_string($conn, trim($_REQUEST['re_password']));
            $sql = "INSERT INTO user(f_name,l_name,r_email,r_phone,r_password) VALUES('$fname','$lname','$email','$phone','$password')";
            if ($conn->query($sql) == true)
                 $_SESSION['rMsg'] = '<div class="alert alert-success mt-2" role ="alert" >Account Successfully Created, Please Login </div>';
                 echo "<script> location.href='./login_page.php';</script>";
        }
    }
}

?>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h3 class="text-center mb-5"><i class="fa-solid fa-user-plus"></i> Sign Up </h3>
            <form class="row g-3 shadow-lg p-3 mb-5 bg-white rounded" method="post" action="">
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }

                ?>
                <div class="col-md-6">
                    <label for="inputFirstName" class="form-label"><i class="fa-solid fa-user"></i> First Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="f_name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputLastName" class="form-label"><i class="fa-solid fa-user"></i> Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" name="l_name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label"><i class="fa-solid fa-at"></i> Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPhone" class="form-label"><i class="fa-solid fa-phone"></i> Phone</label>
                    <input type="number" class="form-control" id="inputPhone" min="0" name="phone" required>
                </div>
                <div class="col-12">
                    <label for="inputPassword" class="form-label"><i class="fa-solid fa-lock"></i>
                        Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" required>
                </div>
                <div class="col-12">
                    <label for="inputRePassword" class="form-label"><i class="fa-solid fa-lock"></i>
                        Re-Password</label>
                    <input type="password" class="form-control" id="inputRepassword" name="re_password" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success" name="r_Signup">Sign Up</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <p><small>Already have account <a href="./login_page.php"> click here</a></small></p>
                </div>
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }

                ?>
            </form>

        </div>
        <div class="col-sm-3"></div>
    </div>

</div>