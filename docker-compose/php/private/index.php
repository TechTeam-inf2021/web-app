<?php
session_start();
// Ελέγχουμε εάν ο χρήστης είναι συνδεδεμένος
if (!isset($_SESSION['username'])) {
    // Αν δεν είναι συνδεδεμένος, τον ανακατευθύνουμε στη σελίδα σύνδεσης
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Πλατφόρμα Διαχείρισης Λιστών Εργασιών</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="../script.js" defer></script>

</head>
<body>
    <?php include 'navbar.php'?>
    <header>
        
            <?php
            
            if(isset($_SESSION['username'])) {
                echo "<h1>Καλώς ήρθες, " . $_SESSION['username'] . "!</h1>";
                echo '<a href="logout.php">Αποσύνδεση</a>'; 
                echo "</p>";
                echo '<p>Αυτή η πλατφόρμα σας επιτρέπει να διαχειρίζεστε προσωπικές λίστες εργασιών.</p>';
            } else {
                echo '';
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
    <?php include "footer.php"; ?>
</body>


</html>