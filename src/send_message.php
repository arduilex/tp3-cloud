<?php
include 'redis.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer message</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="send_message.php">Envoyer message</a>
        <a href="list_message.php">Recevoir messages</a>
        <a href="list_all_message.php">Tous les messages</a>
    </div>

    <div class="container">
        <h1>Envoyer message</h1>
        <form method="post" action="send_message.php">
            <label for="recipient">Destinataire :</label>
            <input type="text" id="recipient" name="recipient" value="<?php echo isset($_POST['recipient']) ? htmlspecialchars($_POST['recipient']) : ''; ?>" required>
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
            <div class="button-container">
                <button class="btn add-btn" type="submit">Envoyer</button>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recipient = $_POST['recipient'];
            $message = $_POST['message'];
            $channel = 'canal_' . $recipient;
            sendMessage($channel, $message);
            echo "<p>Message publié pour $recipient : $message</p>";
        }
        ?>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Messagerie | Créé par Alexandre
    </div>

</body>

</html>
