<?php
include 'redis.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recevoir messages</title>
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
        <h1>Recevoir messages</h1>
        <form method="get" action="list_message.php">
            <label for="recipient">Destinataire :</label>
            <input type="text" id="recipient" name="recipient" value="<?php echo isset($_GET['recipient']) ? htmlspecialchars($_GET['recipient']) : ''; ?>" required>
            <div class="button-container">
                <button class="btn add-btn" type="submit">Afficher les messages</button>
            </div>
        </form>
        <ul id="messages">
            <!-- Les messages seront affichés ici -->
        </ul>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Messagerie | Créé par Alexandre
    </div>

    <script>
        <?php if (isset($_GET['recipient'])): ?>
        const recipient = "<?php echo $_GET['recipient']; ?>";
        const eventSource = new EventSource('subscribe.php?recipient=' + recipient);
        eventSource.onmessage = function(event) {
            const messageList = document.getElementById('messages');
            const newMessage = document.createElement('li');
            newMessage.textContent = event.data;
            messageList.appendChild(newMessage);
        };
        <?php endif; ?>
    </script>

</body>

</html>
