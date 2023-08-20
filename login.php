<?php

session_start();
include 'db_connection.php';

if (isset($_POST['login'])) {

    $email = $_POST['email']; //input-email stored in variable
    $password = $_POST['password']; ////input-password stored in variable

    $sql = "SELECT * FROM `user_tbl` WHERE Email = '$email'";
    $result = mysqli_query($connection, $sql);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($_POST['password'] === $row['Password']) {

                $_SESSION['userId'] = $row['Id'];
                $_SESSION['userName'] = $row['Name'];
                $_SESSION['userEmail'] = $row['Email'];

                header("location: user_dashboard.php");
                exit;
            } else {
                // echo 'Wrong password';
                // $wrongPassword = '';
                $_SESSION['wrongPasswordAlert'] = 'Wrong Password!';
                header("location: login.php");
                exit;
            }
        }
    } else {
        // echo 'Invalid email';
        // $wrongEmail = '';
        $_SESSION['invalidEmailAlert'] = 'Invalid Email!';
        header("location: login.php");
        exit;
    }
    // if User already logged in, then there in no need to login again. He/she will be able to access direct userDashboard file.
    if (isset($_SESSION['userEmail'])) {
        header("location: user_dashboard.php");
    }
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
    <!-- header starts here -->
    <?php
    include 'header.php';
    ?>
    <!-- header starts here -->


    <!-- Login Page -->
    <section>
        <div class="col-4 mx-auto login-bg">
            <h1 class="login-title">Login to your account</h1>
            <hr>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="email" name="email" placeholder="Email address" required class="form-control form-control mb-3 mt-4" />
                <input type="password" name="password" placeholder="Password" required class="form-control form-control mb-4" />
                <button name="login" type="submit" class="btn register-btn w-100">Login</button>
                <p class="form-text">Don't have an account? <a href="signup.php">Register now</a></p>
            </form>

            <!-- PHP Coding for showing alert -->
            <?php
            if (isset($_SESSION['wrongPasswordAlert'])) {
            ?>
                <br>
                <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                    <?php echo $_SESSION['wrongPasswordAlert'];
                    unset($_SESSION['wrongPasswordAlert']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            if (isset($_SESSION['invalidEmailAlert'])) {
            ?>
                <br>
                <div class="alert alert-warning alert-dismissible fade show small" role="alert">
                    <?php echo $_SESSION['invalidEmailAlert'];
                    unset($_SESSION['invalidEmailAlert']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
        </div>
    </section>



    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Lottie Animation -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Connect with app.js file -->
    <script src="js/app.js"></script>
</body>

</html>