<?php

include('database.php');  

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

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Φόρμα Εγγραφής Χρήστη</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <h1>Εγγραφή</h1>
        <a href="index.php">Πίσω</a>
    </header>
    <main>
        <h2>Φόρμα Εγγραφής Χρήστη</h2>
        <form action="register.php" method="post">
            <label for="name">Όνομα:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="surname">Επώνυμο:</label><br>
            <input type="text" id="surname" name="surname" required><br>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="simplepush_key">Simplepush.io Key:</label><br>
            <input type="text" id="simplepush_key" name="simplepush_key"><br>
            <label><input type = "checkbox" name="terms"> I agree to terms and conditions </label>
            <input type="submit" value="Υποβολή">
        </form>
    </main>
    <main>
        <form action="view_profile.php" method="GET">
            <label for="user_id">Εισάγετε το ID του χρήστη:</label>
            <input type="text" id="user_id" name="user_id">
            <button type="submit">View Profile</button>
          </form>
    </main>
    <footer>
        <p>&copy; 2024 Πλατφόρμα Διαχείρισης Λιστών Εργασιών</p>
    </footer>
    <i class="bi bi-brightness-high-fill" id="dark"></i>
</body>

</html>


