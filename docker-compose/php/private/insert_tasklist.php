<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../connDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $title = trim($_POST['title']); // Trim whitespace from the input

    // Check if the title is empty
    if (empty($title)) {
        // Redirect back to the dashboard with an error message
        $_SESSION['error_message_tasklist'] = "Task list name cannot be empty.";
        header("Location: dashboard.php");
        exit();
    }

    $sql = "INSERT INTO tasklists (title, user_name) VALUES ('$title', '$username')";

    if ($con->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
