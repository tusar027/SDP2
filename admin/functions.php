<?php
// count total users in database
function userCountFunction()
{
    include '../db_connection.php';
    $userCount = '';
    $sql = "SELECT COUNT(*) AS userCount FROM user_tbl";
    $query = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $userCount = $row['userCount'];
    }
    return ($userCount);
}

// count total message/feedback in database
function patientFeedbackCount()
{
    include '../db_connection.php';
    $feedbackCount = '';
    $sql = "SELECT COUNT(*) AS feedbackCount FROM feedback_tbl";
    $query = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $feedbackCount = $row['feedbackCount'];
    }
    return ($feedbackCount);
}

// count total message/feedback in database
function covidTestRequestCount()
{
    include '../db_connection.php';
    $testRequestCount = '';
    $sql = "SELECT COUNT(*) AS testRequestCount FROM covid_test_tbl";
    $query = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $testRequestCount = $row['testRequestCount'];
    }
    return ($testRequestCount);
}
