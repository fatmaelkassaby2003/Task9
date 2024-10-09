<?php 

session_start();

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $name_product = trim(htmlspecialchars($_POST['name_product']));
    $discount = trim(htmlspecialchars($_POST['discount']));
    $price = trim(htmlspecialchars($_POST['price']));
    $itemTotal = trim(htmlspecialchars($_POST['itemTotal']));
    $totalPrice = trim(htmlspecialchars($_POST['totalPrice']));
    
    if (empty($name)) {
        $errors['name'] = "Name is required";
    } elseif (strlen($name) < 3) {
        $errors['name'] = "Name must be at least 3 characters";
    } elseif (strlen($name) > 16) {
        $errors['name'] = "Name must be a maximum of 8 characters";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email is invalid";
    }

    if (empty($phone)) {
        $errors['phone'] = "Phone is required";
    } elseif (strlen($phone) < 10) {
        $errors['phone'] = "Phone must be at least 10 characters";
    } elseif (strlen($phone) > 12) {
        $errors['phone'] = "Phone must be a maximum of 12 characters";
    }

    if (empty($errors)) 
    {
        $_SESSION['success'] = "User Send successfully";
        file_put_contents('database/cart.json', json_encode([]));

    }


    else
    {
        $_SESSION['errors'] = $errors;
    }

    header("Location:../checkout.php");
    exit();
}