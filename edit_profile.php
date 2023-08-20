<?php

include 'db_connection.php';
session_start();

// declare variable
$patientName = '';
$patientMobile = '';
$patientNID = '';
$patientDOB = '';
$patientAddress = '';
$patientCity = '';

$sql = "SELECT * FROM `user_tbl` WHERE Email = '$_SESSION[userEmail]'";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $patientName = $row['Name'];
    $patientMobile = $row['Mobile'];
    $patientNID = $row['NID'];
    $patientDOB = $row['DOB'];
    $patientAddress = $row['Address'];
    $patientCity = $row['City'];
}

// update profile
if (isset($_POST['update_profile'])) {

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $nid = $_POST['nid'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $sql = "UPDATE `user_tbl` SET Name ='$name', Mobile ='$mobile', NID ='$nid', DOB ='$dob', Address ='$address', City ='$city' WHERE Email = '$_SESSION[userEmail]'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['profileUpdateAlert'] = 'Updated Successfully!';
        header("location: edit_profile.php");
        exit;
    } else {
        echo 'Something went wrong!';
    }
}


// when User press backbutton after logout then he/she cannot access again this page without Login and this condition also use for security purpose.
if (!isset($_SESSION['userId'])) {
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



    <!-- ======= Edit-Profile starts here======= -->
    <div class="container col-lg-6 col-md-8 col-sm-8 custom-profile-card">

        <h5 class="mb-3 fw-bold">Edit Profile</h5>
        <hr class="my-3">

        <!-- PHP Coding for showing alert -->
        <?php
        if (isset($_SESSION['profileUpdateAlert'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?php echo $_SESSION['profileUpdateAlert'];
                unset($_SESSION['profileUpdateAlert']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group row align-items-center">
                <label class="col-4">Name:</label>
                <div class="col-8">
                    <input name="name" class="form-control alert-success" value="<?php echo $patientName; ?>">
                </div>
            </div>

            <div class="form-group row align-items-center mt-2">
                <label class="col-4">Mobile No:</label>
                <div class="col-8">
                    <input name="mobile" class="form-control alert-success" value="<?php echo $patientMobile; ?>">
                </div>
            </div>

            <div class="form-group row align-items-center mt-2">
                <label class="col-4">NID or Birth Certificate:</label>
                <div class="col-8">
                    <input type="number" name="nid" class="form-control alert-success" value="<?php echo $patientNID; ?>">
                </div>
            </div>

            <div class="form-group row align-items-center mt-2">
                <label class="col-4">Date of Birth:</label>
                <div class="col-8">
                    <input type="date" name="dob" class="form-control alert-success" value="<?php echo $patientDOB; ?>">
                </div>
            </div>

            <div class="form-group row align-items-center mt-2">
                <label class="col-4">Address:</label>
                <div class="col-8">
                    <input name="address" class="form-control alert-success" value="<?php echo $patientAddress; ?>">
                </div>
            </div>

            <div class="form-group row align-items-center mt-2">
                <label class="col-4">City:</label>
                <div class="col-8">
                    <input name="city" class="form-control alert-success" value="<?php echo $patientCity; ?>">
                </div>
            </div>
            <div class="mt-3">
                <button name="update_profile" type="submit" class="w-100 btn btn-success">Update Profile</button>
            </div>
        </form>

    </div>
    <!-- ======= Edit-Profile ends here======= -->



    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Lottie Animation -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Connect with app.js file -->
    <script src="js/app.js"></script>
</body>

</html>