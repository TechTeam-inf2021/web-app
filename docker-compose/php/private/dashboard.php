<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include 'navbar.php';
include '../connDB.php';
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklists & Tasks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="dashboard.js"></script>
</head>
<body>
    <?php
        $sql_1 = "SELECT * FROM tasklists WHERE user_name= '$username' ORDER BY id DESC";
        echo $username;
        $result_1 = $con->query($sql_1);
        echo "<h1>tasklists:</h1><br>";
        echo "<div class='tasklist-container'>";
        if ($result_1->num_rows > 0) {
            // Output data of each row
            echo "<div class='tasklist'>";
            $count =0;
            while ($row = $result_1->fetch_assoc()) {
                echo "<div class='tasklist-item'>";
                echo "<div class='tasklist-title'>" . $row["title"] . "</div>";
                echo "<input type='text' placeholder='Search...' class='search-bar'>";
                echo "<div class='task-container'>";
                    $tasklist_id = $row["id"];
                    $sql_2 = "SELECT t.title, t.date_time, t.status, t.assigned_to, t.tasklist_id
                              FROM tasks t
                              JOIN tasklists tl ON t.tasklist_id = tl.id
                              WHERE tl.user_name = '$username' AND t.tasklist_id = '$tasklist_id'";
                    $result_2 = $con->query($sql_2);
                    if ($result_2->num_rows > 0) {
                        
                        while ($row_2 = $result_2->fetch_assoc()) {
                            
                            echo "<div class='task'>" . 
                            "<div class='title'> Task name: " . 
                                $row_2["title"] . 
                            "</div><button class ='info_button' onclick=info(". $count .")>show info</button>" . 
                            "<div class ='info' style='display: none;'>
                            <div class='date_time'>Datetime created: " . 
                                $row_2["date_time"] . 
                            "</div>" . 
                            "<div class='status'>Current status:" . 
                                $row_2["status"] . 
                            "</div></div></div>";
                            $count++;
                        }
                    }
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "0 results";
        }
        echo "</div>";
    include 'footer.php';
    ?>
    
</body>
</html>
