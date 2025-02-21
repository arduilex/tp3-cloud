<?php
include 'redis.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un message</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="send_message.php">Envoyer un message</a>
        <a href="list_message.php">Liste des messages</a>
    </div>

    <div class="container">
        <h1>Envoyer un message</h1>
        <form method="post" action="send_message.php">
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
            <div class="button-container">
                <button class="btn add-btn" type="submit">Envoyer</button>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $_POST['message'];
            $channel = 'mon_canal';
            sendMessage($channel, $message);
            echo "<p>Message publié : $message</p>";
        }
        ?>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Messagerie | Créé par Alexandre
    </div>

</body>

</html>
