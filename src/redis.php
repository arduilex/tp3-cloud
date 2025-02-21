<?php
// Connexion à Redis
function connectRedis()
{
    $redis = new Redis();
    $redis->connect('redis', 6379); // Utiliser le nom du service Docker pour Redis
    if (!$redis->ping()) {
        die("Échec de la connexion à Redis.\n");
    }
    return $redis;
}

// Fonction pour envoyer un message sur Redis
function sendMessage($channel, $message)
{
    $redis = connectRedis();
    $redis->publish($channel, $message);
}
?>
