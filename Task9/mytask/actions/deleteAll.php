<?php
session_start();

// Check if the cart is empty
if (file_exists("../database/cart.json")) {
    $cart = file_get_contents("../database/cart.json");
    $cart_data = json_decode($cart, true);

    // If the cart is empty, set an error message and redirect back
    if (empty($cart_data)) {
        $_SESSION['error'] = "Your cart is already empty.";
        header("Location: ../allCarts.php");
        exit();
    }
}

// Clear the cart
file_put_contents("../database/cart.json", json_encode([]));

// Set a success message
$_SESSION['success'] = "All items have been deleted from your cart.";
header("Location: ../cart.php");
exit();
?>

