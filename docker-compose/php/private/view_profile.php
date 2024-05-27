<?php
session_start();

// Ελέγχουμε εάν ο χρήστης είναι συνδεδεμένος
if (!isset($_SESSION['username'])) {
    // Αν δεν είναι συνδεδεμένος, τον ανακατευθύνουμε στη σελίδα σύνδεσης
    header("Location: ../public/login.php");
    exit;
}
include 'navbar.php';
// Αν ο χρήστης είναι συνδεδεμένος, εμφανίζουμε τα προσωπικά του στοιχεία
include '../connDB.php';

$username = $_SESSION['username'];

$sql = "SELECT * FROM user_data WHERE username = '$username'";
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
  echo "User_Id: " . $row["user_id"] . "<br>";
  echo '<form action="delete_profile.php" method="post">';
  echo '<input type="submit" value="Διαγραφή προφίλ">';
  echo '</form>';
} else {
  echo "Δεν βρέθηκαν στοιχεία χρήστη.";
}

mysqli_close($con);
?>