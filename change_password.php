<?php

include 'db_connection.php';
session_start();

// update profile
if (isset($_POST['change_password'])) {

    $password = '';
    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    $sql = "SELECT * FROM `user_tbl` WHERE Email = '$_SESSION[userEmail]'";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $db_password = $row['Password'];
    }

    if ($db_password == $current_pass && $new_pass == $confirm_new_password) {
        $sql = "UPDATE `user_tbl` SET Password ='$new_pass' WHERE Email = '$_SESSION[userEmail]'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $_SESSION['passChangeAlert'] = 'Password Changed Succesfully!';
            header("location: change_password.php");
            exit;
        } else {
            echo 'Something went wrong!';
        }
    } else {
        $_SESSION['passFailAlert'] = "Password didn't match! Please enter a correct password.";
        header("location: change_password.php");
        exit;
    }
}

// when User press backbutton after logout then he/she cannot access again this page without Login and this condition also use for security purpose.
if (!isset($_SESSION['userEmail'])) {
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>COVID19 - KeepSafe Yourself</title>
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/955a413869.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>


    <!-- ======= Header starts here ======= -->
    <header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0">
        <a href="user_dashboard.php" class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
            <span class="navbar-brand mb-0 h1 text-success"><b>Covid-19 Keepsafe Yourself</b></span>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a class="nav-link px-2 link-success"><strong><?php /*set default timezone as Asia/Dhaka -->*/ date_default_timezone_set("Asia/Dhaka"); /*now print current day & date -->*/
                                                                echo "Today is " . date("l, F j, Y"); ?></strong></a></li>

        </ul>
        <div class="col-md-3 text-end">

            <button class="btn btn-success btn-sm shadow dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                My Profile</button>
            <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item small" href="view_profile.php">View Profile</a></li>
                <li><a class="dropdown-item small" href="edit_profile.php">Edit Profile</a></li>
                <li><a class="dropdown-item small" href="change_password.php">Change Password</a></li>
            </ul>

            <a href="logout.php" class="btn btn-danger btn-sm shadow">Log out</a>
        </div>
    </header>
    <!-- ======= Header ends here======= -->



    <!-- ======= Change-Password starts here======= -->
    <div class="container col-lg-6 col-md-8 col-sm-8 custom-profile-card">

        <h5 class="mb-3 fw-bold">Change Password</h5>
        <hr class="my-3">

        <!-- PHP Coding for showing alert -->
        <?php
        if (isset($_SESSION['passChangeAlert'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?php echo $_SESSION['passChangeAlert'];
                unset($_SESSION['passChangeAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        if (isset($_SESSION['passFailAlert'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show small" role="alert">
                <?php echo $_SESSION['passFailAlert'];
                unset($_SESSION['passFailAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group row align-items-center">
                <label class="col-4">Current Password:</label>
                <div class="col-8">
                    <input name="current_password" type="password" class="form-control alert-success" required value="">
                </div>
            </div>
            <div class="form-group row align-items-center mt-2">
                <label class="col-4">New Password:</label>
                <div class="col-8">
                    <input name="new_password" type="password" class="form-control alert-success" required value="">
                </div>
            </div>
            <div class="form-group row align-items-center mt-2">
                <label class="col-4">Re-type new Password:</label>
                <div class="col-8">
                    <input name="confirm_new_password" type="password" class="form-control alert-success" required value="">
                </div>
            </div>
            <div class="mt-3">
                <button name="change_password" type="submit" class="w-100 btn btn-success">Change Password</button>
            </div>
        </form>

    </div>
    <!-- ======= Change-Password ends here======= -->



    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Lottie Animation -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Connect with app.js file -->
    <script src="js/app.js"></script>
</body>

</html>