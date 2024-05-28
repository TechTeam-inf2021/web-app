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
        $Name_of_List = mysqli_real_escape_string($con, $_POST['Name_of_List']); // Καθαρισμός της εισόδου του χρήστη

        $sql = "SELECT user_id FROM user_data WHERE username = '$username'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $user_id = $row['user_id'];
                $List_Id = mt_rand(10000000, 99999999);

                $sql_insert = "INSERT INTO tasklists (List_Id, User_Idf, Name_of_List) VALUES ($List_Id, $user_id, '$Name_of_List')";
                $result_insert = mysqli_query($con, $sql_insert);

                if ($result_insert) {
                    echo "Επιτυχής εισαγωγή στο taskslists";
                } else {
                    echo "Αποτυχία εισαγωγής στο taskslists", mysqli_error($con);
                }
            }
        } else {
            echo "Δεν βρέθηκε χρήστης με αυτό το username,", mysqli_error($con);
        }
    } elseif (isset($_POST['submit_delete'])) {
        $Name_of_List_Delete = mysqli_real_escape_string($con, $_POST['Name_of_List_Delete']); // Καθαρισμός της εισόδου του χρήστη

        $sql_delete = "DELETE FROM tasklists WHERE Name_of_List = '$Name_of_List_Delete' AND User_Idf = (SELECT user_id FROM user_data WHERE username = '$username')";
        $result_delete = mysqli_query($con, $sql_delete);

        if ($result_delete) {
            if (mysqli_affected_rows($con) > 0) {
                echo "Επιτυχής διαγραφή της λίστας";
            } else {
                echo "Δεν βρέθηκε λίστα με αυτό το όνομα για διαγραφή";
            }
        } else {
            echo "Αποτυχία διαγραφής από τα tasklists: ", mysqli_error($con);
        }
    } else {
        echo "Το πεδίο Name_of_List δεν έχει οριστεί ή είναι κενό.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Task List Form</title>
</head>
<body>
    <h1>Δημιουργία Νέας Λίστας Εργασιών</h1>
    <form action="create_and_delete_tasklist.php" method="post">
        <label for="Name_of_List">Όνομα Λίστας:</label>
        <input type="text" id="Name_of_List" name="Name_of_List" required>
        <input type="submit" name="submit" value="Submit">
    </form>
    <h2>Διαγραφη Λιστας Εργασιων</h2>
    <form action="create_and_delete_tasklist.php" method="post">
        <label for="Name_of_List_Delete">Όνομα Λίστας:</label>
        <input type="text" id="Name_of_List_Delete" name="Name_of_List_Delete" required>
        <input type="submit" name="submit_delete" value="Delete List">
    </form>
</body>
</html>
