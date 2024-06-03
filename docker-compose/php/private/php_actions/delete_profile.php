<?php
session_start();

// Ελέγχουμε εάν ο χρήστης είναι συνδεδεμένος
if (!isset($_SESSION['username'])) {
    header("Location: ../../auth/login.php");
    exit;
}

include '../../connDB.php';

$username = $_SESSION['username'];

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$random_name = generateRandomString(10);
$random_surname = generateRandomString(10);
$random_email = generateRandomString(5) . '@example.com';
$random_username = generateRandomString(12);

$sql_update_user = "UPDATE users SET name='$random_name', surname='$random_surname', email='$random_email', password = '$random_password', username = '$random_username'WHERE username='$username'";

if (mysqli_query($con, $sql_update_user)) {
    // Αποσύνδεση του χρήστη
    unset($_SESSION['username']);
    session_destroy();
    header("Location: ../index.php");
    exit;
} else {
    echo "Σφάλμα κατά την ενημέρωση του προφίλ: " . mysqli_error($con);
}

mysqli_close($con);
?>