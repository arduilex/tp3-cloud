<?php
include 'redis.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des messages</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="send_message.php">Envoyer un message</a>
        <a href="list_message.php">Liste des messages</a>
    </div>

    <div class="container">
        <h1>Liste des messages</h1>
        <ul id="messages">
            <!-- Les messages seront affichés ici -->
        </ul>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Messagerie | Créé par Alexandre
    </div>

    <script>
        const eventSource = new EventSource('subscribe.php');
        eventSource.onmessage = function(event) {
            const messageList = document.getElementById('messages');
            const newMessage = document.createElement('li');
            newMessage.textContent = event.data;
            messageList.appendChild(newMessage);
        };
    </script>

</body>

</html>
