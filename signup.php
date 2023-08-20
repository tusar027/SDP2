<!-- PHP Coding... -->
<?php

session_start();
include 'db_connection.php';

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $nid = $_POST['nid'];
  $dob = $_POST['dob'];
  $mobile = $_POST['mobile'];
  $city = $_POST['city'];
  $address = $_POST['address'];

  $emailQuery = "SELECT * FROM `user_tbl` WHERE Email = '$email'";
  $query = mysqli_query($connection, $emailQuery);
  $emailCount = mysqli_num_rows($query);

  if ($emailCount > 0) {
    $_SESSION['emailExistsAlert'] = 'Email already exists! Please enter a valid email.';
    header("location: signup.php");
    exit;
  } else {
    $sql = "INSERT INTO `user_tbl`(`Name`, `Email`, `Password`, `NID`, `DOB`, `Mobile`, `City`, `Address`) VALUES ('$name','$email','$password','$nid','$dob','$mobile','$city','$address')";
    $query = mysqli_query($connection, $sql);
    header("location: registration_success.php");
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
  <!-- header ends here -->

  <!-- registration page starts here -->
  <section class="registration-section">
    <div class="container bg-light rounded-3 p-5">
      <div class="row row-cols-1 row-sm-cols-1 row-cols-md-2 row-cols-lg-2 g-3 align-items-center">
        <!-- left part -->
        <div class="col">
          <div class="register-left-part p-3">
            <h2>Create new account</h2>
            <p>
              Create account and access all features.
            </p>
            <img class="img-fluid mt-5" src="images/registration-cover.svg" alt="" />
          </div>
        </div>
        <!-- right part -->
        <div class="col">
          <div>
            <!-- form start -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <div class="mb-3">
                <label for="" class="form-label">Full name</label>
                <input type="text" class="form-control form-control" name="name" required />
              </div>
              <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mb-3">
                <div class="col">
                  <label for="" class="form-label">Email</label>
                  <input type="email" class="form-control form-control" name="email" required />
                </div>
                <div class="col">
                  <label for="" class="form-label">Password</label>
                  <input type="password" class="form-control form-control" name="password" required />
                </div>
              </div>
              <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mb-3">
                <div class="col">
                  <label for="" class="form-label">NID</label>
                  <input type="number" class="form-control form-control" name="nid" required />
                </div>
                <div class="col">
                  <label for="" class="form-label">Date of birth</label>
                  <input type="date" class="form-control form-control" name="dob" required />
                </div>
              </div>
              <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mb-3">
                <div class="col">
                  <label for="" class="form-label">Mobile no</label>
                  <input type="text" class="form-control form-control" name="mobile" required />
                </div>
                <div class="col">
                  <label for="" class="form-label">City</label>
                  <input type="text" class="form-control form-control" name="city" required />
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                <textarea name="address" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <button name="submit" type="submit" class="btn register-btn w-100">
                Register
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- registration page ends here -->



  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <!-- Lottie Animation -->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <!-- Connect with app.js file -->
  <script src="js/app.js"></script>
</body>

</html>