<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../auth/login.php");
    exit();
}

include '../../connDB.php';
$username = $_SESSION['username'];

// Function to convert query result to XML
function queryToXML($tasklists, $tasks) {
    $xml = new SimpleXMLElement("<Tasklists/>");

    foreach ($tasklists as $tasklist) {
        $tasklistElement = $xml->addChild("Tasklist");
        $tasklistElement->addChild("ID", htmlspecialchars($tasklist['id']));
        $tasklistElement->addChild("Title", htmlspecialchars($tasklist['title']));
        $tasklistElement->addChild("UserName", htmlspecialchars($tasklist['user_name']));

        if (isset($tasks[$tasklist['id']])) {
            foreach ($tasks[$tasklist['id']] as $task) {
                $taskElement = $tasklistElement->addChild("Task");
                $taskElement->addChild("ID", htmlspecialchars($task['id']));
                $taskElement->addChild("Title", htmlspecialchars($task['title']));
                $taskElement->addChild("DateTime", htmlspecialchars($task['date_time']));
                $taskElement->addChild("Status", htmlspecialchars($task['status']));
                $taskElement->addChild("AssignedTo", htmlspecialchars($task['assigned_to']));
            }
        }
    }

    return $xml->asXML();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['export'] === 'assigned_tasklists') {
    // Fetch assigned tasklists
    $sql_assigned = "SELECT DISTINCT tl.id, tl.title, tl.user_name 
                     FROM tasklists tl 
                     JOIN tasks t ON tl.id = t.tasklist_id 
                     WHERE t.assigned_to='$username' AND tl.user_name != '$username'
                     ORDER BY tl.id DESC";
    $result_assigned = $con->query($sql_assigned);

    $tasklists = [];
    $tasklist_ids = [];
    if ($result_assigned->num_rows > 0) {
        while ($row = $result_assigned->fetch_assoc()) {
            $tasklists[] = $row;
            $tasklist_ids[] = $row['id'];
        }
    }

    // Fetch tasks for the assigned tasklists
    $tasks = [];
    if (!empty($tasklist_ids)) {
        $tasklist_ids_str = implode(',', $tasklist_ids);
        $sql_tasks = "SELECT * FROM tasks WHERE tasklist_id IN ($tasklist_ids_str) AND assigned_to='$username' ORDER BY date_time DESC";
        $result_tasks = $con->query($sql_tasks);

        if ($result_tasks->num_rows > 0) {
            while ($row = $result_tasks->fetch_assoc()) {
                $tasks[$row['tasklist_id']][] = $row;
            }
        }
    }

    $xmlContent = queryToXML($tasklists, $tasks);
    $fileName = "assignments.xml";

    // Clear the output buffer to avoid any pre-output
    ob_clean();

    header('Content-Type: application/xml');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    echo $xmlContent;

    // Ensure no further output is sent
    exit();
}

$con->close();
?>
