<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

$redis = new Redis();
$redis->connect('redis', 6379); // Utiliser le nom du service Docker pour Redis

$redis->psubscribe(['canal_*'], function ($redis, $pattern, $channel, $message) {
    echo "data: [$channel] $message\n\n";
    ob_flush();
    flush();
});
?>
