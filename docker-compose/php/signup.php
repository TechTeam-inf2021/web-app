<?php
include 'connDB.php';

$name = $_POST["name"];
$surname = $_POST["surname"];
$username_input = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$simplepush_key = $_POST["simplepush_key"];
$user_id = mt_rand(10000000, 99999999);



$sql = "INSERT INTO user_data (name, surname, username, password, email, simplepush_key, user_id) VALUES ('$name', '$surname', '$username_input', '$password', '$email', '$simplepush_key', '$user_id')";

if (mysqli_query($con, $sql)) {
  header("Location: login.php");
  exit;
} else {
  echo "Σφάλμα εισαγωγής δεδομένων: " . mysqli_error($con);
}

mysqli_close($con);
include 'signup.html'

?>
