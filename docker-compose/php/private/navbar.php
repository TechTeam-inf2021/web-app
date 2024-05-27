<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <nav>
        <label class="logo">
            Trello
        </label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="tasklists.php">tasklists</a></li>
            <li>
                <ul id="tasks"><a href="tasks.php">tasks</a>
                    <li><a href="view_profile.php">view_profile</a></li>
                    <li><a href="create_and_delete_tasklist.php">create_and_delete_tasklist</a></li>
                    <li><a href="view_tasks_tasklists.php">view_tasks_tasklist</a></li>
                    <li><a href="assigned_tasks.php">assigned_tasks</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</body>
</html>
