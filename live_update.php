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

    <main>
        <!-- Covid Info Section -->
        <section>
            <div class="container covid-info-container mt-5">
                <!-- <h1>Covid Update</h1> -->
                <div class="row row row-cols-1 row-sm-cols-1 row-cols-md-4 row-cols-lg-4 text-center ">
                    <div class="col">
                        <h3 class="covid-info-title">Total Cases</h3>
                        <h5 id="totalCases" class="covid-info-text">0</h5>
                    </div>
                    <div class="col">
                        <h3 class="covid-info-title">Total Tests</h3>
                        <h5 id="tests" class="covid-info-text">0</h5>
                    </div>
                    <div class="col">
                        <h3 class="covid-info-title">Total Recovered</h3>
                        <h5 id="totalRecovered" class="covid-info-text" style="color: #26ae60;">0</h5>
                    </div>
                    <div class="col">
                        <h3 class="covid-info-title">Total Deaths</h3>
                        <h5 id="totalDeaths" class="covid-info-text" style="color: #FF0000;">0</h5>
                    </div>
                </div>
                <span>
                    <p class="covid-info-footer">Bangladesh | Last update: <?php date_default_timezone_set("Asia/Dhaka");
                                                                            echo date("l, F j, Y"); ?></p>
                </span>
            </div>

            <!-- Using JavaScript for getting covid update by API -->
            <script>
                // GET CORONA UPDATE USING API (disease.sh)
                const url = "https://disease.sh/v3/covid-19/countries/bangladesh";
                fetch(url)
                    .then((response) => response.json())
                    .then((data) => covidInfo(data));
                const covidInfo = (data) => {
                    document.getElementById("totalCases").innerText = data.cases;
                    document.getElementById("tests").innerText = data.tests;
                    document.getElementById("totalRecovered").innerText = data.recovered;
                    document.getElementById("totalDeaths").innerText = data.deaths;
                };
            </script>

            </div>
        </section>

        <section>
            <div class="container">
                <iframe src="https://public.domo.com/cards/bWxVg" width="100%" height="600" marginheight="0" marginwidth="0" frameborder=""></iframe>
            </div>
        </section>
    </main>

    <!-- header starts here -->
    <?php
    include 'footer.php';
    ?>
    <!-- header ends here -->


    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Lottie Animation -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Connect with app.js file -->
    <script src="js/app.js"></script>
</body>

</html>