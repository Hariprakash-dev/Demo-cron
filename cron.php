<?php

echo "Cron executed at " . date('Y-m-d H:i:s') . "\n";


$db_server = "127.0.0.1:3306";
$db_user = "root";
$db_pass = "";
$db_name = "360clouderp";
$conn = "";
try {
    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    if ($conn) {
    echo "You are connected !";
    
}else {
    echo "Could not connect";
}
} catch (\Throwable $th) {
    echo "not print";
}


