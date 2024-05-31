
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export SQL to XML</title>
</head>
<body>
    <?php include 'navbar.php'?>
    <h1>Export tasklists to XML file:</h1></br>
     <form method="post" action="exportXML_tasklists.php">
        <button type="submit" name="export" value="tasklists_tasks">Export Tasklists with Tasks</button>
    </form>
    <h1>Export assignments to XML file:</h1></br>
    <form method="post" action="exportXML_assignments.php">
        <button type="submit" name="export" value="assigned_tasklists">Export Assigned Tasklists with Tasks</button>
    </form>
    <?php include 'footer.php';?>
</body>
</html>