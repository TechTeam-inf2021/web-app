<?php
session_start();

// Ελέγχουμε εάν ο χρήστης είναι συνδεδεμένος
if (!isset($_SESSION['username'])) {
    // Αν δεν είναι συνδεδεμένος, τον ανακατευθύνουμε στη σελίδα σύνδεσης
    header("Location: ../auth/login.php");
    exit;
}

include './include/navbar.php';

// Αν ο χρήστης είναι συνδεδεμένος, εμφανίζουμε τα προσωπικά του στοιχεία
include '../connDB.php';

$username = $_SESSION['username'];

function generateRandomString($length = 10) {
  return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$random_username = generateRandomString(10);
$random_email = generateRandomString(5) . '@example.com';
$random_password = password_hash(generateRandomString(12), PASSWORD_DEFAULT);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Σφάλμα εκτέλεσης ερωτήματος: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "<h2>Προφίλ Χρήστη</h2>";
  echo "Όνομα: " . $row["name"] . "<br>";
  echo "Επώνυμο: " . $row["surname"] . "<br>";
  echo "Όνομα Χρήστη: " . $row["username"] . "<br>";
  echo "Email: " . $row["email"] . "<br>";
  echo '<form action="./php_actions/delete_profile.php" method="post">';
  echo '<input type="submit" value="Διαγραφή προφίλ">';
  echo '</form>';
} else {
  echo "Δεν βρέθηκαν στοιχεία χρήστη.";
}

mysqli_close($con);

include './include/footer.php';
?>

