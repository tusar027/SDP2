<?php

include '../db_connection.php';
include 'functions.php';
session_start();
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
            <li class="active">
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
            <li>
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
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <p><?php /*set default timezone as Asia/Dhaka -->*/ date_default_timezone_set("Asia/Dhaka"); /*now print current day & date -->*/
                        echo date("l, F j, Y"); ?></>
                    </p>
                </div>
                <!-- <a href="#" class="btn-download">
                    <i class="bx bxs-cloud-download"></i>
                    <span class="text">Message</span>
                </a> -->
            </div>

            <ul class="box-info">
                <li>
                    <i class="bx bxs-group"></i>
                    <span class="text">
                        <h3><?php echo userCountFunction(); ?></h3>
                        <p>Registered Patient</p>
                    </span>
                </li>
                <li>
                    <i class="bx bxs-check-circle"></i>
                    <span class="text">
                        <h3><?php echo covidTestRequestCount(); ?></h3>
                        <p>Test Request</p>
                    </span>
                </li>
                <li>
                    <i class="bx bxs-report"></i>
                    <span class="text">
                        <h3><?php echo patientFeedbackCount(); ?></h3>
                        <p>Patient Feedback</p>
                    </span>
                </li>
            </ul>
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