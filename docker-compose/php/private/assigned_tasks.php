<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../Login.php");
    exit();
}
include 'navbar.php';
include '../connDB.php';
// Έλεγχος εάν έχει υποβληθεί η φόρμα
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $user_id = $_POST['user_id'];
    
    // Ενημέρωση της εργασίας με το νέο χρήστη
    $sql = "UPDATE tasks SET usr_id = ? WHERE Task_Id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $user_id, $task_id);

    if ($stmt->execute()) {
        echo "Η εργασία ανατέθηκε με επιτυχία.";
    } else {
        echo "Σφάλμα: " . $stmt->error;
    }

    $stmt->close();
}

// Ανάκτηση όλων των εργασιών
$tasks = [];
$sql = "SELECT Task_Id, Name_of_task FROM tasks";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
} else {
    echo "Δεν βρέθηκαν εργασίες.<br>";
}

// Ανάκτηση όλων των χρηστών
$users = [];
$sql = "SELECT user_id, username FROM user_data";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "Δεν βρέθηκαν χρήστες.<br>";
}

// Κλείσιμο σύνδεσης
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ανάθεση Εργασίας</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="task_id">Επιλέξτε Εργασία:</label>
        <select name="task_id" id="task_id">
            <?php
            if (!empty($tasks)) {
                foreach ($tasks as $task) {
                    echo "<option value='" . $task['Task_Id'] . "'>" . $task['Name_of_task'] . "</option>";
                }
            } else {
                echo "<option value=''>Δεν βρέθηκαν εργασίες</option>";
            }
            ?>
        </select>
        <br>

        <label for="user_id">Επιλέξτε Χρήστη:</label>
        <select name="user_id" id="user_id">
            <?php
            if (!empty($users)) {
                foreach ($users as $user) {
                    echo "<option value='" . $user['user_id'] . "'>" . $user['username'] . "</option>";
                }
            } else {
                echo "<option value=''>Δεν βρέθηκαν χρήστες</option>";
            }
            ?>
        </select>
        <br>

        <input type="submit" value="Ανάθεση Εργασίας">
    </form>
</body>
</html>