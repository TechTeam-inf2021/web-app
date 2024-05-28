<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <!-- <script src="navbar.js" defer></script>
    <link rel="stylesheet" href="dropdown_menu.css"> -->
</head>
<body>
    <nav>
        <label class="logo">
            Trello
        </label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="view_profile.php">profile</a></li>
            <li id="dropdown-menu">
                <a href="dashboard.php">dashboard</a>
                <ul id="dropdown-menu-items" style="display:none;">
                    <li><a href="tasklists.php">tasklists</a></li>
                    <li><a href="view_profile.php">view_profile</a></li>
                    <li><a href="create_and_delete_tasklist.php">create_and_delete tasklist</a></li>
                    <li><a href="view_tasks_tasklists.php">view_tasks_tasklist</a></li>
                    <li><a href="assigned_tasks.php">assigned_tasks</a></li>
                </ul>
            </li>
            <li><a href="help.php">Help</a></li>
        </ul>
    </nav>
</body>
</html>
