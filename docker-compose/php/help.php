<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help | Trello</title>
    <link rel="icon" href="https://bxp-content-static.prod.public.atl-paas.net/img/favicon.ico">
    
    <!-- CSS styles (main theme, help) -->
    <link rel="stylesheet" href="./styles/theme.css">
    <link rel="stylesheet" href="./styles/help-public.css">

    <!-- js script (dark-light mode)-->
    <script src="./scripts/dark_light_mode.js" defer></script>
</head>
<body>
    <?php include './include/navbar.php';?>
    <header>
        <h1>Συχνές Ερωτήσεις</h1>
    </header>
    <section id="help-section">
        <div class="accordion">
          <div class="accordion-item">
                <button class="accordion-header">Πώς κάνω εγγραφή στο site;<span><img src='../assets/arrows.svg'></span></button>
                <div class="accordion-content">
                    <p>Για να κάνετε εγγραφή στο site, αρχικά πατάτε την επιλογή "sign-up", έπειτα συμπληρώνεται τα απαραίτητα πεδία, το username σας πρέπει να είναι έως 12 χαρακτήρες και ο κωδικός σας έως 16.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">Πώς χρησιμοποιώ το SimplePush key; <span><img src='../assets/arrows.svg'></span></button>
                <div class="accordion-content">
                    <p>Κατά την εγγραφή σας θα πρέπει να συμπληρώσετε το πεδίο "Simplepush.io Key", το Simplepush.io Key είναι ο αριθμός από την εφαρμογή SimplePush, κατεβάζοντας την εφαρμογή σε android ή ios σύστημα, σας δίνεται η δυνατότητα να λαμβάνεται μήνυμα επιβεβαίωσης κατά την διάρκεια που χρησιμοποιείτε τις δυνατότητες του site.</p>
                </div>
            </div>
        </div>
    </section>
    <?php include './include/footer.php'; ?>
</body>
</html>