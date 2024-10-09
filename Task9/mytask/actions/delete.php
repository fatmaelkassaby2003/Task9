<?php
session_start();


$cartFilePath = "../database/cart.json";
if (file_exists($cartFilePath)) {
    $cartData = file_get_contents($cartFilePath);
    $cartItems = json_decode($cartData, true);
}


if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    foreach ($cartItems as $key => $item) {
        if ($item['id'] == $productId) {
            unset($cartItems[$key]);
            break;
        }
    }

    
    file_put_contents($cartFilePath, json_encode(array_values($cartItems), JSON_PRETTY_PRINT));

    
    header('Location: ../cart.php');
    exit;
} else {
    echo "Invalid request!";
}
