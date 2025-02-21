<?php
// Connexion à la base de données
$servername = getenv('DB_HOST'); // Valeur par défaut : 'db'
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$database = getenv('MYSQL_DATABASE');

function connectDB()
{
    global $servername, $username, $password, $database;

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    return $conn;
}
?>