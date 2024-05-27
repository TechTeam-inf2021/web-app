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
        <h1>Καλώς ήρθατε!</h1>
        <p>Αυτή η πλατφόρμα σας επιτρέπει να διαχειρίζεστε προσωπικές λίστες εργασιών.</p>
    </header>
    <main>
        <section class="accordion" id="purpose">
            <h2 class="accordion-header">Σκοπός της Πλατφόρμας</h2>
            <div class="accordion-content">
                <p>Ο σκοπός αυτής της πλατφόρμας είναι να σας βοηθήσει να οργανώνετε τις εργασίες σας με μια απλή και αποτελεσματική διαχείριση λιστών εργασιών.</p>
            </div>
        </section>
    </main>
    <?php include 'footer.php';?>
    <i class="bi bi-brightness-high-fill" id="dark"></i>
</body>


</html>