<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'navbar.php'?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Πλατφόρμα Διαχείρισης Λιστών Εργασιών</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="../scripts.js" defer></script>
</head>

<body>
    <header>
        
            <?php
            
            if(isset($_SESSION['username'])) {
                echo "<h1>Καλώς ήρθες, " . $_SESSION['username'] . "!</h1>";
                echo '<a href="../private/logout.php">Αποσύνδεση</a>'; 
                echo "</p>";
                echo '<p>Αυτή η πλατφόρμα σας επιτρέπει να διαχειρίζεστε προσωπικές λίστες εργασιών.</p>';
            } else {
                echo '<a href="login.php">Σύνδεση</a>';
            }
            ?>
        </header>
    <main>
        <section class="accordion" id="purpose">
            <h2 class="accordion-header">Σκοπός της Πλατφόρμας</h2>
            <div class="accordion-content">
                <p>Ο σκοπός αυτής της πλατφόρμας είναι να σας βοηθήσει να οργανώνετε τις εργασίες σας με μια απλή και αποτελεσματική διαχείριση λιστών εργασιών.</p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Πλατφόρμα Διαχείρισης Λιστών Εργασιών</p>
    </footer>
    <i class="bi bi-brightness-high-fill" id="dark"></i>
</body>


</html>