<?php

session_start();
include '../../db_connection.php';

$sql = "DELETE FROM `user_tbl` WHERE Id = $_GET[Id]";
$query = mysqli_query($connection, $sql);

if ($query) {
    $_SESSION['patientDeleteAlert'] = 'Deleted Successfully!';
    header("location: ../../reg_patients.php");
    exit;
} else {
    echo 'Something went wrong!';
}
