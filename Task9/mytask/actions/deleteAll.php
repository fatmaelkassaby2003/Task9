<?php
session_start();


$cartFilePath = "../database/cart.json"; // تأكد أن المسار صحيح

if (file_exists($cartFilePath)) {
    
    file_put_contents($cartFilePath, json_encode([], JSON_PRETTY_PRINT));
}

header('Location: ../cart.php');
exit;
