<?php 
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = trim(htmlspecialchars($_POST['user_name']));
    $user_email = trim(htmlspecialchars($_POST['user_email']));
    $user_password = trim(htmlspecialchars($_POST['user_password']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $type = trim(htmlspecialchars($_POST['type']));



    if (empty($user_name)) {
        $errors['user_name'] = "User name is required";
    } elseif (strlen($user_name) < 3) {
        $errors['user_name'] = "User name must be at least 3 characters";
    } elseif (strlen($user_name) > 8) {
        $errors['user_name'] = "User name must be a maximum of 8 characters";
    }

    
    if (empty($user_email)) {
        $errors['user_email'] = "User email is required";
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors['user_email'] = "User email is invalid";
    }

    if (empty($user_password)) {
        $errors['user_password'] = "User password is required";
    } elseif (strlen($user_password) < 6) {
        $errors['user_password'] = "User password must be at least 8 characters";
    } elseif (strlen($user_password) > 16) {
        $errors['user_password'] = "User password must be a maximum of 16 characters";
    }   
    
    
    if (empty($phone)) {     
 
        $errors['phone'] = "Phone is required";
    } elseif (!preg_match('/^01[0125][0-9]{8}$/', $phone)) {   
        $errors['phone'] = "Phone is invalid";
    }

    
    if ($type == '') {
        $errors['type'] = "Type is required";
    }

    if (empty($errors)) {
        //$_SESSION['success'] = "User created successfully";

        $users=
        [
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_password' =>sha1( $user_password),
            'phone' => $phone,
            'type' => $type
        ];

        $user_data=fopen("../database/signup.csv","a+");

        fputcsv($user_data, $users);

        header('Location: ../home.php');
        exit();

    } 
    else {
        $_SESSION['errors'] = $errors;
        header('Location: ../index.php');
        exit();
    }
}
