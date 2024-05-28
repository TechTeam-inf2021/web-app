<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../connDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $tasklist_id = $_POST['tasklist_id'];
    $title = $_POST['title'];
    $date_time = date('Y-m-d H:i:s');
    $status = $_POST['status'];

    // Check if the title is empty
    if (empty($title) || $title == null) {
        // Redirect back to the dashboard with an error message
        $_SESSION['error_message_task'] = "Task name cannot be empty.";
        header("Location: dashboard.php");
        exit();
    }

    $sql = "INSERT INTO tasks (title, date_time, status, assigned_to, tasklist_id) 
            VALUES ('$title', '$date_time', '$status', '$username', '$tasklist_id')";

    if ($con->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
