<?php
session_start();
require_once('inc/header.php');
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);
?>

<?php
$user = file_get_contents("database/product.json");
$user_data = json_decode($user, true);
?>

<!-- Header -->
<header class="py-5" style="background: linear-gradient(135deg, #ff9a9e, #fecfef); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5" style="background-color: rgba(255, 255, 255, 0.2); padding: 20px; border-radius: 10px;">
        <div class="text-center">
            <h1 class="display-4 fw-bolder" style="color: #3354;">Home Page</h1>
            <p class="lead fw-normal" style="color: #3339;">With this shop homepage template</p>
        </div>
    </div>
</header>

<!-- Section -->
<section>
    <div class="container">
        <div class="row p-3">
            <?php if ($message): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php foreach ($user_data as $key => $value) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="image/<?php echo htmlspecialchars($value['url']); ?>" class="card-img-top" alt="Product Image" style="height: 500px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">Name: <?php echo htmlspecialchars($value['name']); ?></h5>
                            <p class="card-text">Price: $<?php echo htmlspecialchars($value['price']); ?></p>
                            <p class="card-text">Discount: <?php echo htmlspecialchars($value['discount']); ?>%</p>
                        </div>
                        <div class="card-footer">
                            <form action="actions/cart.php?id=<?php echo htmlspecialchars($value['id']); ?>" method="POST">
                                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($value['name']); ?>">
                                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($value['price']); ?>">
                                <input type="hidden" name="product_discount" value="<?php echo htmlspecialchars($value['discount']); ?>">
                                <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($value['url']); ?>">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($value['id']); ?>">
                                <input type="submit" value="Add To Cart" class="btn btn-primary btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>
