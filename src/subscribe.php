<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

$redis = new Redis();
$redis->connect('redis', 6379); // Utiliser le nom du service Docker pour Redis

$recipient = isset($_GET['recipient']) ? $_GET['recipient'] : '';
$channel = 'canal_' . $recipient;

$redis->subscribe([$channel], function ($redis, $channel, $message) {
    echo "data: $message\n\n";
    ob_flush();
    flush();
});
?>
