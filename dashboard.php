<?php
$file = 'data.txt';
$lines = file_exists($file) ? file($file) : [];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم زيتا 😈</title>
    <style>
        body { background: #111; color: #0f0; font-family: monospace; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #0f0; padding: 8px; text-align: left; }
        th { background: #222; }
        .count { color: #f00; font-size: 24px; }
        .refresh { background: #0f0; color: #000; padding: 10px 20px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>👁️ لوحة تحكم ألفا</h1>
    <p>عدد الزيارات: <span class="count"><?= count($lines) ?></span></p>
    <button class="refresh" onclick="location.reload()">🔄 تحديث</button>
    <hr>
    <table>
        <tr><th>#</th><th>الوقت</th><th>IP</th><th>المتصفح</th><th>النظام</th><th>اللغة</th><th>الشاشة</th></tr>
        <?php $i = 1; foreach(array_reverse($lines) as $line): 
            $d = json_decode($line, true); if(!$d) continue; ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $d['time'] ?? '' ?></td>
            <td><?= $d['ip'] ?? '' ?></td>
            <td><?= $d['ua'] ?? '' ?></td>
            <td><?= $d['platform'] ?? '' ?></td>
            <td><?= $d['language'] ?? '' ?></td>
            <td><?= $d['screen'] ?? '' ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>