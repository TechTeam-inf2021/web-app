
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

include 'connDB.php';
// Έλεγχος εάν έχει υποβληθεί η φόρμα
if(isset($_POST['submit'])){
    // Λήψη του ονόματος χρήστη από τη φόρμα
    $username = $_POST['username'];

    // Εκτέλεση εντολής SQL για να εντοπίσετε τον χρήστη βάσει του ονόματος
    $sql = "SELECT user_id FROM user_data WHERE username = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Αν βρέθηκε ο χρήστης, τότε ανατίθεται η εργασία σε αυτόν
        $row = $result->fetch_assoc();
        $user_id = $row["user_id"];

        // Εδώ γίνεται η ανάθεση της εργασίας στον συγκεκριμένο χρήστη
        $task_id = $_POST['task_id']; // Χρησιμοποιούμε το task_id από την φόρμα HTML
        $sql_assign_task = "UPDATE Tasks SET usr_id = '$user_id' WHERE Task_Id = '$task_id'";
        
        if ($con->query($sql_assign_task) === TRUE) {
            echo "Η εργασία ανατέθηκε με επιτυχία στον χρήστη με όνομα: $username και ID: $user_id";
        } else {
            echo "Σφάλμα κατά την ανάθεση της εργασίας: " . $con->error;
        }
    } else {
        echo "Δεν βρέθηκε χρήστης με το συγκεκριμένο όνομα.";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Φόρμα Ανάθεσης Εργασίας</title>
</head>
<body>

<h2>Φόρμα Ανάθεσης Εργασίας</h2>

<form method="post" action="tasks.php">
    <label for="username">Όνομα Χρήστη:</label>
    <input type="text" id="username" name="username" required>
    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
    <br><br>
    <input type="submit" value="Ανάθεση" name="submit">
</form>

</body>
</html>