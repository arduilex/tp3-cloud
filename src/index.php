<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud - TP2</title>
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
        <h1>Messagerie</h1>
        <p>Bienvenue sur l'application de messagerie</p>
        <div class="button-container">
            <form action="list_message.php">
                <button class="btn" type="submit">Recevoir messages</button>
            </form>
            <form action="send_message.php">
                <button class="btn" type="submit">Envoyer message</button>
            </form>
        </div>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Messagerie | Créé par Alexandre
    </div>

</body>

</html>