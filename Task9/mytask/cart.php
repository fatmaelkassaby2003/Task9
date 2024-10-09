<?php
session_start();
require_once('inc/header.php'); 
?>

<?php
if (file_exists("database/cart.json")) {
    $user = file_get_contents("database/cart.json");
    $user_data = json_decode($user, true);
} 
?>

<header class="py-5" style="background: linear-gradient(135deg, #ff9a9e, #fecfef); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5" style="background-color: rgba(255, 255, 255, 0.2); padding: 20px; border-radius: 10px;">
        <div class="text-center">
            <h1 class="display-4 fw-bolder" style="color: #3354;">All Carts</h1>
            <p class="lead fw-normal" style="color: #3339;">With this shop can show all carts</p>
        </div>
    </div>
</header>


<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
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
                                $itemTotal = ($item['price'] * $item['discount'])/100; 
                                $totalPrice += $itemTotal;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $key + 1; ?></th>
                                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                                    <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                                    <td><?php echo htmlspecialchars($item['discount']); ?>%</td>
                                    <td>
                                        <input type="number" value="1"> 
                                    </td>
                                    <td>$<?php echo number_format($itemTotal, 2); ?></td>
                                    
                                    <td>
                                        <a href="actions/delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                    
                                </tr>
                                <?php
                            }
                        ?>
                        <tr>
                            <td colspan="3"><strong>Total Price</strong></td>
                            <td colspan="2"><h3>$<?php echo number_format($totalPrice, 2); ?></h3></td>
                            <td>    
                                <form action="actions/checkout.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="name_product" value="<?php echo $item['name']; ?>">
                                <input type="hidden" name="discount" value="<?php echo $item['discount']; ?>">
                                <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
                                <input type="hidden" name="count" value="<?php echo count($user_data); ?>">
                                <input type="hidden" name="itemTotal" value="<?php echo $itemTotal; ?>";>
                                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                                <input type="submit" value="Checkout" class="form-control btn btn-primary mt-auto">
                                </form>
                            </td>
                            <td>
                                    <a href="actions/deleteAll.php" class="btn btn-danger">delete all</a>
                            </td>
                        </tr>
                        
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>
