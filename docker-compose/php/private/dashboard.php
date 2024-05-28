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
    <script src="dashboard.js" defer></script>
</head>
<body>
    <ul class="header">
        <li>
            <h2>Search tasklist:</h2>
            <input type="text" placeholder="Search task lists..." class="search-bar-tasklists" onkeyup="filterTaskLists()" style="margin-bottom: 20px;">
        </li>
        <li>
            <!-- Form to add a new task list -->
            <h2>Create a new tasklist:</h2>
            <form action="insert_tasklist.php" method="POST" style="margin-bottom: 20px;">
                <input type="text" name="title" placeholder="Enter new task list name" class="add-task-list" required>
                <button type="submit">Add Task List</button>
            
            <!-- Display error messages if any -->
            <?php
            if (isset($_SESSION['error_message'])) {
                echo "<p style='color: red;'>" . $_SESSION['error_message'] . "</p>";
                unset($_SESSION['error_message']); // Clear the error message after displaying it
            }
            ?>
            </form>
        </li>
    </ul>
    <?php
        $sql_1 = "SELECT * FROM tasklists WHERE user_name= '$username' ORDER BY id DESC";
        $result_1 = $con->query($sql_1);
        echo "<h1>Tasklists:</h1><br>";
        echo "<div class='tasklist-container' id='tasklist-container'>";
        if ($result_1->num_rows > 0) {
            echo "<div class='tasklist'>";
            $count = 0;
            while ($row = $result_1->fetch_assoc()) {
                $tasklist_id = $row["id"];
                echo "<div class='tasklist-item' data-title='" . strtolower($row["title"]) . "'>";
                echo "<div class='tasklist-title'>" . $row["title"] . "</div>";
                echo "<input type='text' placeholder='Search tasks...' class='search-bar' onkeyup='filterTasks(this, $tasklist_id)'>";
                echo "<form action='delete_tasklist.php' method='POST' style='display:inline-block; margin-bottom: 10px;'>
                        <input type='hidden' name='tasklist_id' value='" . $tasklist_id . "'>
                        <button type='submit'>Delete Task List</button>
                      </form>";
                echo "<div class='task-container' id='task-container-$tasklist_id'>";
                    $sql_2 = "SELECT t.id, t.title, t.date_time, t.status, t.assigned_to, t.tasklist_id
                              FROM tasks t
                              JOIN tasklists tl ON t.tasklist_id = tl.id
                              WHERE tl.user_name = '$username' AND t.tasklist_id = '$tasklist_id'
                              order by t.date_time desc";
                    $result_2 = $con->query($sql_2);
                    if ($result_2->num_rows > 0) {
                        while ($row_2 = $result_2->fetch_assoc()) {
                            echo "<div class='task'>" . 
                            "<div class='title'> Task name: " . 
                                $row_2["title"] . 
                            "<div><button class='info_button' onclick='info(". $count .")'>show info</button></div></div>" . 
                            "<div class='info' style='display: none;'>
                            <div class='date_time'><div>Datetime created:</div>" . 
                                $row_2["date_time"] . 
                            "</div>" . 
                            "<div class='status'><div>Current status:</div>" . 
                                $row_2["status"] . 
                            "</div></div>" .
                            "<form action='delete_task.php' method='POST' style='display:inline-block;'>
                                <input type='hidden' name='task_id' value='" . $row_2["id"] . "'>
                                <button type='submit'>Delete</button>
                             </form>
                             <form action='assigned_to.php' method='POST' style='display:inline-block; margin-top: 10px;'>
                                <input type='hidden' name='task_id' value='" . $row_2["id"] . "'>
                                <input type='text' name='assigned_to' placeholder='Assign to user' required>
                                <button type='submit'>Assign</button>
                             </form></div>";
                            $count++;
                        }
                    }
                echo "<form action='insert_task.php' method='POST'>";
                echo "<input type='hidden' name='tasklist_id' value='" . $tasklist_id . "'>";
                echo "<input type='text' name='title' placeholder='Add a new task...' class='add-task-bar'>";
                echo "<button type='submit'>Add Task</button>";
                echo "<label>Επιλέξτε Κατάσταση:</label>";
                echo "<select name='status'>";
                    echo "<option value='σε αναμονή'>σε αναμονή</option>";
                    echo "<option value='σε εξέλιξη'>σε εξέλιξη</option>";
                    echo "<option value='ολοκληρωμένη'>ολοκληρωμένη</option>";
                echo "</select>";
                echo "</form>";
                if (isset($_SESSION['error_message_task'])) {
                    echo "<p style='color: red;'>" . $_SESSION['error_message_task'] . "</p>";
                    unset($_SESSION['error_message_task']); // Clear the error message after displaying it
                }
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "You have 0 Tasklists";
        }
        echo "</div>";
        ?>
    <h1>Assigned Tasklists:</h1>
    <?php
        $sql_assigned = "SELECT tl.id, tl.title, tl.user_name 
                         FROM tasklists tl 
                         JOIN tasks t ON tl.id = t.tasklist_id 
                         WHERE t.assigned_to='$username' AND tl.user_name != '$username'
                         ORDER BY tl.id DESC";
        $result_assigned = $con->query($sql_assigned);
        echo "<div class='tasklist-container' id='assigned-tasklist-container'>";
        if ($result_assigned->num_rows > 0) {
            echo "<div class='tasklist'>";
            while ($row = $result_assigned->fetch_assoc()) {
                $tasklist_id = $row["id"];
                echo "<div class='tasklist-item' data-title='" . strtolower($row["title"]) . "'>";
                echo "<div class='tasklist-title'>" . $row["title"] . " (Created by: " . $row["user_name"] . ")</div>";
                echo "<input type='text' placeholder='Search tasks...' class='search-bar' onkeyup='filterTasks(this, $tasklist_id)'>";
                echo "<div class='task-container' id='task-container-$tasklist_id'>";
                    $sql_assigned_tasks = "SELECT * FROM tasks WHERE tasklist_id='$tasklist_id' AND assigned_to='$username'";
                    $result_assigned_tasks = $con->query($sql_assigned_tasks);
                    if ($result_assigned_tasks->num_rows > 0) {
                        while ($row_2 = $result_assigned_tasks->fetch_assoc()) {
                            echo "<div class='task'>" . 
                            "<div class='title'> Task name: " . $row_2["title"] . "</div>" . 
                            "<div><button class='info_button' onclick='info(". $count .")'>show info</button></div>" . 
                            "<div class='info' style='display: none;'>
                            <div class='date_time'><div>Datetime created:</div>" . $row_2["date_time"] . "</div>" . 
                            "<div class='status'><div>Current status:</div>" . $row_2["status"] . "</div></div>" .
                            "<form action='delete_task.php' method='POST' style='display:inline-block;'>
                                <input type='hidden' name='task_id' value='" . $row_2["id"] . "'>
                                <button type='submit'>Delete</button>
                             </form>
                             <form action='assigned_to.php' method='POST' style='display:inline-block; margin-top: 10px;'>
                                <input type='hidden' name='task_id' value='" . $row_2["id"] . "'>
                                <input type='text' name='assigned_to' placeholder='Assign to user' required>
                                <button type='submit'>Assign</button>
                             </form>
                             </div>";
                            $count++;
                        }
                    } else {
                        echo "<p>No tasks assigned to you in this list.</p>";
                    }
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "You have 0 Assigned Tasklists";
        }
        echo "</div>";
    include 'footer.php';
    ?>
</body>
</html>
