<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    $entry = [
        'time' => date('Y-m-d H:i:s'),
        'ip' => $ip,
        'ua' => $user_agent,
        'platform' => $data['platform'] ?? 'unknown',
        'language' => $data['language'] ?? 'unknown',
        'screen' => $data['screen'] ?? 'unknown'
    ];
    $line = json_encode($entry) . PHP_EOL;
    file_put_contents('data.txt', $line, FILE_APPEND | LOCK_EX);
    echo 'ok';
}
?>