<?php 

session_start();

echo $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name =trim(htmlspecialchars($_POST['product_name']));
    $product_price =trim(htmlspecialchars($_POST['product_price'])) ;
    $product_discount =trim(htmlspecialchars($_POST['product_discount']));    
    $product_id =trim(htmlspecialchars($_POST['product_id']));
    
    
    $file_path = "../database/cart.json";
        if (file_exists($file_path)) 
        {
            $products = json_decode(file_get_contents($file_path), true);
        } else 
        {
            $products = [];
        }
    
        $products[]=[
            'name'=>$product_name,
            'price'=>$product_price, 
            'discount'=>$product_discount,  
            'id'=>$product_id
        ];

        
    
        file_put_contents($file_path, json_encode($products, JSON_PRETTY_PRINT));

        $_SESSION['message'] = "Product '{$product['name']}' added to cart successfully!";

        header("location:../home.php");
    exit();
    
    } 
    
    


