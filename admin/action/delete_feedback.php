<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `feedback_tbl` WHERE Id = $_GET[Id]";
$query = mysqli_query($connection, $sql);

if ($query) {
    $_SESSION['feedbackDeleteAlert'] = 'Deleted Successfully!';
    header("location: ../../view_feedback.php");
    exit;
} else {
    echo 'Something went wrong!';
}
