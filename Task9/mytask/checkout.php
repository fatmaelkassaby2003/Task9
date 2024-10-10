<?php
session_start();
require_once('inc/header.php');

// Check if the cart file exists and retrieve cart data
if (file_exists("database/cart.json")) {
    $user = file_get_contents("database/cart.json");
    $user_data = json_decode($user, true);
} else {
    $user_data = [];
}

// Check if the cart is empty
$isCartEmpty = empty($user_data);
?>

<header class="py-5" style="background: linear-gradient(135deg, #ff9a9e, #fecfef); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5" style="background-color: rgba(255, 255, 255, 0.2); padding: 20px; border-radius: 10px;">
        <div class="text-center">
            <h1 class="display-4 fw-bolder" style="color: #3354; font-size: 3rem;">Checkout</h1>
            <p class="lead fw-normal" style="color: #3339; font-size: 1.5rem;">With this shop you can checkout products</p>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto" style="margin-top: 50px;"> 
            <form action="actions/checkout.php" method="POST" class="border p-5 mb-5" style="background-color: #f9f9f9; border-radius: 10px;">
                <div class="mb-4">
                    <?php if (isset($_SESSION['success'])): ?>
                        <h2 class="text-success text-center"><?php echo $_SESSION['success']; ?></h2>
                        <div class="text-center mt-4">
                            <a href="home.php" class="btn btn-primary btn-lg">العودة إلى الصفحة الرئيسية</a>
                        </div>
                    <?php else: ?>
                        <!-- Display form inputs only if the cart is not empty -->
                        <?php if (!$isCartEmpty): ?>
                            <div class="mb-4">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter your name" style="font-size: 1.2rem;">
                                <?php if (isset($_SESSION['errors']['name'])): ?>
                                    <span class="text-danger p-2"><?= $_SESSION['errors']['name']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" style="font-size: 1.2rem;">
                                <?php if (isset($_SESSION['errors']['email'])): ?>
                                    <span class="text-danger p-2"><?= $_SESSION['errors']['email']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4">
                                <input type="phone" name="phone" class="form-control form-control-lg" placeholder="Enter your phone" style="font-size: 1.2rem;">
                                <?php if (isset($_SESSION['errors']['phone'])): ?>
                                    <span class="text-danger p-2"><?= $_SESSION['errors']['phone']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4">
                                <table class="table table-bordered text-center" style="font-size: 1.2rem;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $totalPrice = 0;
                                        foreach ($user_data as $key => $item) {
                                            $itemTotal = ($item['price'] * $item['discount']) / 100;
                                            $totalPrice += $itemTotal;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $key + 1; ?></th>
                                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                                <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                                                <td><?php echo htmlspecialchars($item['discount']); ?>%</td>
                                                <td><input type="number" class="form-control" value="1"></td>
                                                <td>$<?php echo number_format($itemTotal, 2); ?></td>
                                                <td><a href="actions/delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    <tr>
                                        <td colspan="3"><strong>Total Price</strong></td>
                                        <td colspan="2"><h3>$<?php echo number_format($totalPrice, 2); ?></h3></td>
                                        <td><a href="actions/deleteAll.php" class="btn btn-danger">Delete All</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-4">
                                <input type="submit" value="Send" class="form-control btn btn-primary btn-lg" style="font-size: 1.2rem;">
                            </div>
                        <?php else: ?>
                            <!-- Display message if the cart is empty -->
                            <div class="alert alert-danger text-center" role="alert">
                                Your cart is empty! Please add items to the cart before checking out.
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['success']); ?>
<?php require_once('inc/footer.php'); ?>
