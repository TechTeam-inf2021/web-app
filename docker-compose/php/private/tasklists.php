<?php

session_start(); // Ξεκινά τη συνεδρία

// Έλεγχος αν ο χρήστης έχει συνδεθεί, αν όχι τον ανακατευθύνει στη σελίδα σύνδεσης
if (!isset($_SESSION['username'])) {
    header("Location: ../public/login.php");
    exit();
}
include 'navbar.php';
include '../connDB.php';

// Κώδικας για δημιουργία εργασίας
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_task'])) {
    $task_title = $_POST['task_title'];
    $creation_datetime = date('Y-m-d H:i:s');
    $status = $_POST['status'];
    $task_list_id = $_POST['task_list_id'];

    $sql = "INSERT INTO tasks (title, creation_datetime, status, task_list_id) VALUES ('$task_title', '$creation_datetime', '$status', '$task_list_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Η εργασία δημιουργήθηκε με επιτυχία";
    } else {
        echo "Σφάλμα κατά τη δημιουργία εργασίας: " . $con->error;
    }
}

// Κώδικας για διαγραφή εργασίας
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_task'])) {
    $task_id = $_POST['task_id'];

    $sql = "DELETE FROM tasks WHERE id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Η εργασία διαγράφηκε με επιτυχία";
    } else {
        echo "Σφάλμα κατά τη διαγραφή εργασίας: " . $con->error;
    }
}

// Κώδικας για επεξεργασία εργασίας
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_task'])) {
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET status='$status' WHERE id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Η εργασία ενημερώθηκε με επιτυχία";
    } else {
        echo "Σφάλμα κατά την ενημέρωση εργασίας: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαχείριση Ανατεθειμένων Εργασιών</title>
</head>
<body>
    <h1>Δημιουργία Νέας Εργασίας</h1>
    <form action="tasks.php" method="post">
        <!-- Προσθέστε τα απαραίτητα πεδία εισόδου εδώ -->
        <button type="submit" name="create_task">Δημιουργία Εργασίας</button>
    </form>
    
    <h1>Διαγραφή Εργασίας</h1>
    <form action="assigned_tasks.php" method="post">
        <!-- Προσθέστε τα απαραίτητα πεδία εισόδου εδώ -->
        <button type="submit" name="delete_task">Διαγραφή Εργασίας</button>
    </form>

    <h1>Επεξεργασία Εργασίας</h1>
    <form action="assigned_tasks.php" method="post">
        <!-- Προσθέστε τα απαραίτητα πεδία εισόδου εδώ -->
        <button type="submit" name="edit_task">Επεξεργασία Εργασίας</button>
    </form>
</body>
</html>