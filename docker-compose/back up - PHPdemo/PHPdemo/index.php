<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Πλατφόρμα Διαχείρισης Λιστών Εργασιών</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="scripts.js" defer></script>
</head>

<body>
    <header>
        <h1>Καλώς ήρθατε!</h1>
        <p>Αυτή η πλατφόρμα σας επιτρέπει να διαχειρίζεστε προσωπικές λίστες εργασιών.</p>
    </header>
    <div class="navbar">
        <div class="navbar-right">
            <?php
            session_start();
            if(isset($_SESSION['username'])) {
                echo "Καλώς ήρθες, " . $_SESSION['username'] . "!";
                echo '<a href="logout.php">Αποσύνδεση</a>'; 
                echo "</p>";
                echo '<a href="view_profile.php">εμφάνιση στοιχείων</a>';
                echo "</p>";
                echo '<a href="create_and_delete_tasklist.php">Δημιουργία και διαγραφή taskslists</a>';
                echo "</p>";
                echo '<a href="assigned_tasks.php"> επεξεργασία tasks</a>';
                echo "</p>";
                echo '<a href="view_tasks_tasklists.php">εμφάνιση tasks</a>';
            } else {
                echo '<a href="login.php">Σύνδεση</a>';
            }
            ?>
        </div>
    </div>
    <main>
        <section class="accordion" id="purpose">
            <h2 class="accordion-header">Σκοπός της Πλατφόρμας</h2>
            <div class="accordion-content">
                <p>Ο σκοπός αυτής της πλατφόρμας είναι να σας βοηθήσει να οργανώνετε τις εργασίες σας με μια απλή και αποτελεσματική διαχείριση λιστών εργασιών.</p>
            </div>
        </section>
        <section class="accordion" id="help">
            <h2 class="accordion-header">Βοήθεια</h2>
            <div class="accordion-content">
                <p>Για βασική βοήθεια σχετικά με τη χρήση της πλατφόρμας, δείτε την παρακάτω ενότητα.</p>
            </div>
        </section>
        <a href="register.html">Εγγραφή</a>
    </main>
    <footer>
        <p>&copy; 2024 Πλατφόρμα Διαχείρισης Λιστών Εργασιών</p>
    </footer>
    <i class="bi bi-brightness-high-fill" id="dark"></i>
</body>


</html>