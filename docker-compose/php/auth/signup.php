<?php
include '../connDB.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $username_input = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $simplepush_key = $_POST["simplepush_key"];




$sql = "INSERT INTO users (name, surname, username, password, email, simplepushio_key) VALUES ('$name', '$surname', '$username_input', '$password', '$email', '$simplepush_key')";

if (mysqli_query($con, $sql)) {
  header("Location: login.php");
  exit;
} else {
  echo "Σφάλμα εισαγωγής δεδομένων: " . mysqli_error($con);
}

mysqli_close($con);
}

?>


<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up | Trello</title>
    <link rel="icon" href="https://bxp-content-static.prod.public.atl-paas.net/img/favicon.ico">
    <link rel="stylesheet" href="./styles/signup.css">
</head>

<body>
    <div class="signup-container">
        <h2>Εγγραφή</h2>
        <form action="signup.php" method="post">
            <div class="signup-row">
                <label for="name">Όνομα:</label>
                <label for="surname">Επώνυμο:</label>
            </div>
            <div class="signup-row">
                <input type="text" id="name" name="name" required>
                <input type="text" id="surname" name="surname" required>
            </div>
            <div class="signup-row">
                <label for="username">Username:</label>
                <label for="password">Password:</label>
            </div>
            <div class="signup-row">
                <input type="text" id="username" name="username" required>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="signup-row">
                <label for="email">Email:</label>
                <label for="simplepush_key">Simplepush.io Key:</label>
            </div>
            <div class="signup-row">
                <input type="email" id="email" name="email" required>
                <input type="text" id="simplepush_key" name="simplepush_key">
            </div>
            <label style="width: 100%; text-align: center;">
                <input type="checkbox" name="terms"> Συμφωνώ με τους όρους και προϋποθέσεις
            </label><br><br>
            <input type="submit" value="Εγγραφή">
        </form>
        <a href="../index.php" id="goback">back</a>
    </div>
</body>

</html>
