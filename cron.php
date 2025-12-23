<?php

echo "Cron executed at " . date('Y-m-d H:i:s') . "\n";

$data = [
    "app_id" => $_ENV['ONESIGNAL_APP_ID'],
    "included_segments" => ["All"],
    "headings" => ["en" => "Hello"],
    "contents" => ["en" => "testing cron jobs"],
];

$ch = curl_init("https://onesignal.com/api/v1/notifications");

curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Basic " . $_ENV['ONESIGNAL_API_KEY']
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => json_encode($data),
]);

curl_exec($ch);
curl_close($ch);

echo "Push sent successfully";
