<?php 

session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 

    $name = trim(htmlspecialchars($_POST['name']));     
    $email = trim(htmlspecialchars($_POST['email']));
    $message = trim(htmlspecialchars($_POST['message']));

    if (empty($name))                               
    {                                                   
        $errors['name'] = "Name is required";
    }
    elseif (strlen($name) < 3)
    {   
        $errors['name'] = "Name is minimum";
    }
    elseif (strlen($name) > 8)
    {   
        $errors['name'] = "Name is maximum";
    }

    if (empty($email))
    {           
        $errors['email'] = "Email is required";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {   
        $errors['email'] = "Email is invalid";
    }

    if (empty($message))                              
    {                                                   
        $errors['message'] = "Message is required";
    }

    if (empty($errors))
    {
        $_SESSION['success'] = "Message Sent successfully";
    }
    else           
    {
        $_SESSION['errors'] = $errors;
    }

    header('Location: ../contact.php');
    exit();
}