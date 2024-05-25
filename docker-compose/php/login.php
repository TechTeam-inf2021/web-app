<?php
session_start();

include 'connDB.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)) {
        echo "Παρακαλώ εισάγετε το username και το password.";
    } else {
        $query = "SELECT * FROM user_data WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        
        if($count == 1) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Λάθος username ή password.";
        }
    }
}
mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Σύνδεση</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Σύνδεση">
    </form>
</body>
</html>