<?php 
session_start();

$errors=[];

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name =trim(htmlspecialchars($_POST['name']));
    $price =trim(htmlspecialchars($_POST['price']));
    $discount =trim(htmlspecialchars($_POST['discount']));
    $url =trim(htmlspecialchars($_POST['url']));

    if(empty($name))
    {
        $errors['name']="Name is required";
    }
    elseif(strlen($name)<3)
    {
        $errors['name']="Name is minimum";
    }
    elseif(strlen($name)>16)
    {
        $errors['name']="Name is maximum";
    }
    
    if(empty($price))
    {
        $errors['price']="Price is required";
    }
    elseif(strlen($price)>4)
    {
        $errors['price']="price is maximum";
    }

    if(empty($url))
    {
        $errors['url']="Url is required";
    }

    
    
    if (empty($errors)) 
    {
        
        $file_path = "../database/product.json";
        if (file_exists($file_path)) 
        {
            $user_data = json_decode(file_get_contents($file_path), true);
        } else 
        {
            $user_data = [];
        }
    
        $user_data[] = [
            "name" => $name,
            "price" => $price,
            "discount" => $discount,
            "url" => $url,
            "id" => uniqid()
        ];
    
        file_put_contents($file_path, json_encode($user_data, JSON_PRETTY_PRINT));
        $_SESSION['message'] = "Product created successfully";
        header("location:../home.php");
        exit();
    } 
    else {
        $_SESSION['errors'] = $errors;
        header("location:../add-product.php");
        exit();
    }
    
    

}