<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include('database.php');

$username = $_SESSION['username'];

$sql = "DELETE FROM user_data WHERE username = '$username'";
if (mysqli_query($con, $sql)) {
    unset($_SESSION['username']);
    header("Location: index.php");
    exit;
} else {
    echo "Σφάλμα κατά τη διαγραφή του προφίλ: " . mysqli_error($con);
}

mysqli_close($con);
?>