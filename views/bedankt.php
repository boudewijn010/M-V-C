
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bedankt voor uw bestelling</title>
    <link rel="stylesheet" href="/M-V-C/styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
</head>
<body>
<?php
require_once __DIR__ . '/header.php';
HeaderView::render();
?>
<div class="thankyou-container">
    <div class="thankyou-message">Bedankt voor uw bestelling!</div>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>
<script>
    window.onload = function() {
        confetti({
            particleCount: 150,
            spread: 70,
            origin: { y: 0.6 }
        });
    };
</script>
</body>
</html>