<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'navbar.php';
include '../connDB.php';

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name_of_task = mysqli_real_escape_string($con, $_POST['name_of_task']);
        $list_id = mysqli_real_escape_string($con, $_POST['list_id']);
        
        $sql_user = "SELECT user_id FROM user_data WHERE username = '$username'";
        $result_user = mysqli_query($con, $sql_user);
        $row_user = mysqli_fetch_assoc($result_user);
        
        if ($row_user) {
            $user_id = $row_user['user_id'];
            $Task_Id = mt_rand(10000000, 99999999);
            $Date_creation = date('Y-m-d H:i:s');
            
            $sql_insert = "INSERT INTO tasks (Task_Id, list_id, Date_creation, Name_of_task, usr_id) VALUES ($Task_Id, $list_id, '$Date_creation', '$name_of_task', $user_id)";
            $result_insert = mysqli_query($con, $sql_insert);
            
            if ($result_insert) {
                echo "Επιτυχής εισαγωγή στο tasks";
            } else {
                echo "Αποτυχία εισαγωγής στο tasks: " . mysqli_error($con);
            }
        } else {
            echo "Δεν βρέθηκε χρήστης με αυτό το username";
        }
    } elseif (isset($_POST['delete_task'])) {
        $Task_Id = $_POST["Task_Id"];
        $sql = "DELETE FROM tasks WHERE Task_Id = $Task_Id";

        if ($con->query($sql) === TRUE) {
            echo "Η εργασία διαγράφηκε με επιτυχία";
        } else {
            echo "Σφάλμα κατά τη διαγραφή εργασίας: " . $con->error;
        }
    } elseif (isset($_POST['change_status'])) {
        $Task_Id = $_POST["Task_Id"];
        $status = $_POST["status"];

        $sql = "UPDATE tasks SET status = $status WHERE Task_Id = $Task_Id";

        if ($con->query($sql) === TRUE) {
            echo "Η κατάσταση της εργασίας άλλαξε με επιτυχία";
        } else {
            echo "Σφάλμα κατά την αλλαγή κατάστασης: " . $con->error;
        }
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
<form method="post" action="assigned_tasks.php">
    <label for="name_of_task">Όνομα Εργασίας:</label>
    <input type="text" name="name_of_task" id="name_of_task" placeholder="Όνομα εργασίας" required>
    <br>
    <label for="list_id">Επιλέξτε Λίστα Εργασιών:</label>
    <select name="list_id" id="list_id">
        <?php
        // Ανάκτηση των υπαρχουσών λιστών εργασιών
        $sql = "SELECT List_Id, Name_of_List FROM tasklists";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['List_Id'] . "'>" . $row['Name_of_List'] . "</option>";
            }
        } else {
            echo "<option value=''>Δεν βρέθηκαν λίστες εργασιών</option>";
        }
        ?>
    </select>
    <br>
    <button type="submit" name="submit">Υποβολή</button>
</form>
    <h1>Διαγραφή Εργασίας</h1>
    <form action="assigned_tasks.php" method="post">
        <label for="Task_Id">Task ID:</label>
        <input type="number" id="Task_Id" name="Task_Id" required>
        <button type="submit" name="delete_task">Διαγραφή Εργασίας</button>
    </form>
    <h1>Αλλαγή Κατάστασης</h1>
    <form action="assigned_tasks.php" method="post">
        <label for="Task_Id">Task ID:</label>
        <input type="number" id="Task_Id" name="Task_Id" required>
        <br>
        <label for="status">Νέα Κατάσταση:</label>
        <select id="status" name="status" required>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <br>
        <button type="submit" name="change_status">Αλλαγή Κατάστασης</button>
    </form>
    <br>
</body>
</html>



