<?php 
session_start();

$errors=[];

if(isset($_SERVER["REQUEST_METHOD"])=="POST")
{
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    if(empty($email))
    {
        $errors['email']= 'Email is Required' ;
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $errors['email']= 'Email is Invalid' ;
    }

    if(empty($password))
    {
        $errors['password']= 'Password is Required' ;
    }
    elseif(strlen($password)<6)
    {
        $errors['password']= 'Password is mini' ;
    }
    elseif(strlen($password)>12)
    {
        $errors['password']= 'Password is max' ;
    }

    
    if(empty($errors))
    {
        // $_SESSION['success'] = "Data Is Good";

        $data_file=fopen("../database/signup.csv","a+");

        while($row = fgetcsv($data_file))
        {
            if ($email == $row[1] && sha1($password)== $row[2])
            {
                $_SESSION['auth']=$row;
                break;
            }
        }

        if(!isset($_SESSION['auth']))
        {
            $_SESSION['errors']['email']="email or password Not correct";
        }

        header("location:../home.php");
        exit;
    }
    else
    {
        $_SESSION['errors'] = $errors;
        header("location:../login.php");
        exit;
    }
}