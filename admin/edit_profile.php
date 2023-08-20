<?php

include '../db_connection.php';
session_start();

// declare variable
$adminname = '';

$sql = "SELECT * FROM `admin_tbl` WHERE Email = '$_SESSION[adminEmail]'";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $adminname = $row['Name'];
}

// update profile
if (isset($_POST['update_profile'])) {

    $name = $_POST['name'];

    $sql = "UPDATE `admin_tbl` SET Name ='$name' WHERE Email = '$_SESSION[adminEmail]'";
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
if (!isset($_SESSION['adminEmail'])) {
    header("location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COVID19 - KeepSafe Yourself</title>
    <!-- Box-icons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/admin.css" />
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="dashboard.php" class="brand">
            <i class="bx bxs-virus"></i>
            <span class="text">COVID-19</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard.php">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="reg_patients.php">
                    <i class="bx bxs-user-detail"></i>
                    <span class="text">Registered Patient</span>
                </a>
            </li>
            <li>
                <a href="covid_test.php">
                    <i class="bx bx-test-tube"></i>
                    <span class="text">Covid Test</span>
                </a>
            </li>
            <li>
                <a href="report.php">
                    <i class="bx bxs-file-blank"></i>
                    <span class="text">Report</span>
                </a>
            </li>
            <li>
                <a href="doctors_video.php">
                    <i class='bx bxs-videos'></i>
                    <span class="text">Doctor's Video</span>
                </a>
            </li>
            <li>
                <a href="view_feedback.php">
                    <i class='bx bxs-chat'></i>
                    <span class="text">Message and Feedback</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu top">
            <li>
                <a href="view_profile.php">
                    <i class="bx bxs-group"></i>
                    <span class="text">Admin</span>
                </a>
            </li>
            <li class="active">
                <a href="edit_profile.php">
                    <i class="bx bxs-edit"></i>
                    <span class="text">Edit Profile</span>
                </a>
            </li>
            <li>
                <a href="change_password.php">
                    <i class="bx bx-lock-alt"></i>
                    <span class="text">Change Password</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->


    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class="bx bx-menu"></i>
            <!-- <a href="#" class="nav-link">Search</a> -->
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search..." />
                    <button type="submit" class="search-btn">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden />
            <label for="switch-mode" class="switch-mode"></label>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>

            <!-- ======= Admin-Edit-Profile starts here======= -->
            <div class="custom-profile-card">

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
                            <input name="name" class="form-control alert-primary" value="<?php echo $adminname; ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button name="update_profile" type="submit" class="w-100 btn btn-primary mt-2">Update Profile</button>
                    </div>
                </form>

            </div>
            <!-- ======= Admin-Edit-Profile ends here======= -->

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Connect with app.js file -->
    <script src="../js/app.js"></script>
</body>

</html>