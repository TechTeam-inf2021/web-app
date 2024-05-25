<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';
$username = $_SESSION['username'];

$sql = "SELECT user_id FROM user_data WHERE username = '$username'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $user_id = $row['user_id'];
        $List_Id = mt_rand(10000000, 99999999);
        $Name_of_List = "Axileas";

        $sql_insert = "INSERT INTO  tasklists (List_Id, User_Idf, Name_of_List) VALUES ($List_Id, $user_id, '$Name_of_List')";
        $result_insert = mysqli_query($con, $sql_insert);

        if ($result_insert) {
            echo "Επιτυχής εισαγωγή στο taskslists";
        } else {
            echo "Αποτυχία εισαγωγής στο taskslists",  mysqli_error($con);
        };
        }
    } else {
        echo "Δεν βρέθηκε χρήστης με αυτό το username,", mysqli_error($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Value2 Form</title>
</head>
<body>
    <form action="create_and_delete_tasklist.php" method="post">
        <label for="Task_of_List">Value 2:</label>
        <input type="text" id="Task_of_List" name="Task_of_List">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

