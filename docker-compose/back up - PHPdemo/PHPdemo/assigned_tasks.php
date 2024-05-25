<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name_of_task = mysqli_real_escape_string($con, $_POST['name_of_task']);
    
    $sql_user = "SELECT user_id FROM user_data WHERE username = '$username'";
    $result_user = mysqli_query($con, $sql_user);
    $row_user = mysqli_fetch_assoc($result_user);
    
    if ($row_user) {
        $user_id = $row_user['user_id'];
        
        $sql_list = "SELECT List_Id FROM tasklists WHERE User_Idf = $user_id";
        $result_list = mysqli_query($con, $sql_list);
        $row_list = mysqli_fetch_assoc($result_list);
        
        if ($row_list) {
            $List_Id = $row_list['List_Id'];
            $Task_Id  = mt_rand(10000000, 99999999);
            $Date_creation = date('Y-m-d H:i:s');
            
            $sql_insert = "INSERT INTO tasks (Task_Id, list_id, Date_creation, Name_of_task, usr_id) VALUES ($Task_Id, $List_Id, '$Date_creation', '$name_of_task', $user_id)";
            $result_insert = mysqli_query($con, $sql_insert);
            
            if ($result_insert) {
                echo "Επιτυχής εισαγωγή στο tasks";
            } else {
                echo "Αποτυχία εισαγωγής στο tasks",mysqli_error($con);
            }
        } else {
            echo "Δεν βρέθηκε αριθμός λίστας για τον συγκεκριμένο χρήστη";
        }
    } else {
        echo "Δεν βρέθηκε χρήστης με αυτό το username";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_task'])) {
    $Task_Id = $_POST["Task_Id"];
    $sql = "DELETE FROM tasks WHERE Task_Id = $Task_Id";

    if ($con->query($sql) === TRUE) {
        echo "Η εργασία διαγράφηκε με επιτυχία";
    } else {
        echo "Σφάλμα κατά τη διαγραφή εργασίας: " . $con->error;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_to_1'])) {
    $Task_Id = $_POST["Task_Id"];

    $sql = "UPDATE tasks SET status = 1 WHERE Task_Id = $Task_Id";

    mysqli_query($con,$sql); 
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_to_2'])) {
    $Task_Id = $_POST["Task_Id"];

    $sql = "UPDATE tasks SET status = 2 WHERE Task_Id = $Task_Id";

    mysqli_query($con,$sql); 
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_to_0'])) {
    $Task_Id = $_POST["Task_Id"];

    $sql = "UPDATE tasks SET status = 0 WHERE Task_Id = $Task_Id";

    mysqli_query($con,$sql); 
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
    <form method="post" action="assigned_tasks.php">
    <input type="text" name="name_of_task" placeholder="Όνομα εργασίας">
    <button type="submit" name="submit">Υποβολή</button>
</form>
    <h1>Διαγραφή Εργασίας</h1>
    <form action="assigned_tasks.php" method="post">
        <label for="Task_Id">Task ID:</label>
        <input type="number" id="task_id" name="Task_Id">
        <button type="submit" name="delete_task">Διαγραφή Εργασίας</button>
    <h1>Αλλαγή κατάστασης</h2>
    <form action="assigned_tasks.php" method="post">
        <label for="task_id">Task Id:</label>
        <input type="text" id="task_id" name="Task_Id">
        <br><br>
        <input type="submit" name="change_to_1" value="Αλλαγή σε Κατάσταση 1">
        <input type="submit" name="change_to_2" value="Αλλαγή σε Κατάσταση 2">
        <input type="submit" name="change_to_0" value="Αλλαγή σε Κατάσταση 0">

    </form>
    <?php
    echo '<a href="tasks.php"> ανάθεση σε άλλων χρήστη</a>';
    ?>
</body>
</html>