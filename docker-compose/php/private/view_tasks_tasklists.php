<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'navbar.php';
include '../connDB.php';

$username = $_SESSION['username'];

// Επιλογή του user_id από τον πίνακα user_data χρησιμοποιώντας το όνομα χρήστη
$sql_user_id = "SELECT user_id FROM user_data WHERE username = '$username'";
$result_user_id = mysqli_query($con, $sql_user_id);
$row_user_id = mysqli_fetch_assoc($result_user_id);
$user_id = $row_user_id['user_id'];

// Επιλογή όλων των tasklists για τον συγκεκριμένο χρήστη με βάση το user_id
$sql_list = "SELECT List_Id, Name_of_List FROM tasklists WHERE User_Idf = '$user_id'";
$result_list = mysqli_query($con, $sql_list);

if (isset($_POST['view_tasks'])) {
    $tasklist_id = $_POST['tasklist_id'];
    // Επιλογή των tasks για την επιλεγμένη tasklist
    $sql_tasks = "SELECT * FROM tasks WHERE list_id = '$tasklist_id'";
    $result_tasks = mysqli_query($con, $sql_tasks);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklists & Tasks</title>
</head>
<body>
    <h2>Tasklists του Χρήστη</h2>
    <form method="post">
        <select name="tasklist_id">
            <?php
            // Εμφάνιση των tasklists ως επιλογές
            while ($row_tasklist = mysqli_fetch_assoc($result_list)) {
                echo "<option value='" . $row_tasklist['List_Id'] . "'>" . $row_tasklist['Name_of_List'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="view_tasks">Εμφάνιση Tasks</button>
    </form>

    <?php if (isset($result_tasks)) : ?>
        <h2>Tasks της Tasklist</h2>
        <ul>
            <?php while ($row_task = mysqli_fetch_assoc($result_tasks)) : ?>
                <li>
                    <?php echo $row_task['Name_of_task']; ?> 
                    - 
                    <a href="view_tasks_tasklists.php?task_id=<?php echo $row_task['Task_Id']; ?>">Προβολή Λεπτομερειών</a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php if (isset($_GET['task_id'])) {
        $task_id = $_GET['task_id'];
        // Επιλογή των στοιχείων του επιλεγμένου task
        $sql_task_details = "SELECT * FROM tasks WHERE Task_Id = '$task_id' ORDER BY Date_creation DESC";
        $result_task_details = mysqli_query($con, $sql_task_details);
        $row_task_details = mysqli_fetch_assoc($result_task_details);
        if ($row_task_details) {
            echo "<h2>Λεπτομέρειες Task</h2>";
            echo "<p><strong>Όνομα Task:</strong> " . $row_task_details['Name_of_task'] . "</p>";
            echo "<p><strong>Ημερομηνία Δημιουργίας:</strong> " . $row_task_details['Date_creation'] . "</p>";
            if ($row_task_details['status'] == 0){
                echo "<p><strong>Κατάστασ: Σε αναμονή</strong> ";
            }elseif ($row_task_details['status'] == 1){
                echo "<p><strong>Κατάστασ: Σε εξέλιξη</strong> ";
            }else{
                echo "<p><strong>Κατάστασ: Ολοκληρωμένη</strong> ";
            }
            echo "</p>";
            echo "<a href=\"view_tasks_tasklists.php\">Επιστροφή";  

        } else {
            echo "<p>Δεν βρέθηκαν λεπτομέρειες για αυτό το task.</p>";
        }
    } ?>
</body>
</html>