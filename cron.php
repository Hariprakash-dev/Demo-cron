<?php
echo "Cron executed at " . date('Y-m-d H:i:s') . "\n";

$ch = curl_init("https://tropologic-reece-nonodorously.ngrok-free.dev/testCron.php");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
]);
$response = curl_exec($ch);
curl_close($ch);

$playerIds = json_decode($response, true);

print_r($playerIds);

if (!$playerIds || count($playerIds) === 0) {
    echo "No notifications to send.\n";
    exit;
}



$data = [
    "app_id" => $_ENV['ONESIGNAL_APP_ID'],
    "include_player_ids" => [$playerIds],
    "headings" => ["en" => "Hello"],
    "contents" => ["en" => "testing ngork"],
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

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP: $httpCode\n";
echo "Response: $response\n";


echo "Push sent successfully";
