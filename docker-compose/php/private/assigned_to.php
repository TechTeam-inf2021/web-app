<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../connDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $assigned_to = $_POST['assigned_to'];

    // Check if the assigned_to user exists in the users table
    $sql_check_user = "SELECT * FROM users WHERE username='$assigned_to'";
    $result_check_user = $con->query($sql_check_user);
    if ($result_check_user->num_rows > 0) {
        // Update the task with the new assigned user
        $sql_assign = "UPDATE tasks SET assigned_to='$assigned_to' WHERE id='$task_id'";
        if ($con->query($sql_assign) === TRUE) {
            $_SESSION['success_message'] = "Task assigned successfully.";
        } else {
            $_SESSION['error_message'] = "Error: " . $con->error;
        }
    } else {
        $_SESSION['error_message'] = "User does not exist.";
    }

    $con->close();
    header("Location: dashboard.php");
    exit();
}
?>
