<?php
echo "Cron executed at " . date('Y-m-d H:i:s') . "\n";

$playerId = "8065122c-9619-4d81-b01c-595e73f54f8f";
$ch = curl_init("https://onesignal.com/api/v1/players/$playerId?app_id=" . $_ENV['ONESIGNAL_APP_ID']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic " . $_ENV['ONESIGNAL_API_KEY']
]);
$resp = curl_exec($ch);
curl_close($ch);
print_r(json_decode($resp, true));

