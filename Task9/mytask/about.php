<?php
session_start();
require_once('inc/header.php');
?>
<?php
    $user=file_get_contents("database/about.json");
    $user_convert=json_decode($user,true);


?>

<header class="py-5" style="background: linear-gradient(135deg, #ff9a9e, #fecfef); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5" style="background-color: rgba(255, 255, 255, 0.2); padding: 20px; border-radius: 10px;">
        <div class="text-center">
            <h1 class="display-4 fw-bolder" style="color: #3354;">About Us</h1>
            <p class="lead fw-normal" style="color: #3339;">With this shop about template</p>
        </div>
    </div>
</header>
<div class="container my-5 p-4">
        <div class="row">
            
        
        
            <section class="p-4">
                <form action="" class="border p-2">
                <div class="mb-3">
                    <h2 class="text-center"><?php echo $user_convert[0]['title'] ?></h2>
                </div>
                    <p><?php echo $user_convert[0]['des'] ?></p>
            </form>
        </section>


<section class="p-4">
                <form action="" class="border p-3">
                <div class="mb-3">
                    <h2 class="text-center"><?php echo $user_convert[1]['title'] ?></h2>
                </div>
                <div class="mb-3">
                    <p class="text-center"><?php echo $user_convert[1]['des'] ?></p>
                </div>
            </form>
</section>

<section class="p-4">
                <form action="" class="border p-3">
                    <h2 class="text-center p-2"><?php echo $user_convert[2]['title'] ?></h2>
                <div class="border p-2 my-3">
                    <h6><?php echo $user_convert[2]['des'] ?></h6>
                </div>
                <div class="border p-2 my-3">
                    <h6><?php echo $user_convert[2]['des'] ?></h6>
                </div>
                <div class="border p-2 my-3">
                    <h6><?php echo $user_convert[2]['des'] ?></h6>
                </div>
                <div class="border p-2 my-3">
                    <h6><?php echo $user_convert[2]['des'] ?></h6>
                </div>
                <div class="border p-2 my-3">
                    <h6><?php echo $user_convert[2]['des'] ?></h6>
                </div>
                <div class="border p-2 my-3">
                    <h6><?php echo $user_convert[2]['des'] ?></h6>
                </div>
            </form>
</section>

</div>
        </div>



<?php require_once('inc/footer.php'); ?>