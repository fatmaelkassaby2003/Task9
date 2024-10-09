<?php
session_start();
require_once('inc/header.php'); ?>

<header class="py-5" style="background: linear-gradient(135deg, #ff9a9e, #fecfef); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5" style="background-color: rgba(255, 255, 255, 0.2); padding: 20px; border-radius: 10px;">
        <div class="text-center">
            <h1 class="display-4 fw-bolder" style="color: #3354;">Add Product</h1>
            <p class="lead fw-normal" style="color: #3339;">With this shop you can add a product</p>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">

            <h1 class="text-center p-2">Add Product</h1>
            <form action="actions/store-add.php" method="POST" class="border p-3 mb-5"> 

                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter product name">
                    <?php if (isset($_SESSION['errors']['name'])): ?>
                        <span class="text-danger p-2"><?= $_SESSION['errors']['name']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <input type="number" name="price" class="form-control" placeholder="Enter product price">
                    <?php if (isset($_SESSION['errors']['price'])): ?>
                        <span class="text-danger p-2"><?= $_SESSION['errors']['price']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <input type="number" name="discount" class="form-control" placeholder="Enter product discount">
                    <?php if (isset($_SESSION['errors']['discount'])): ?>
                        <span class="text-danger p-2"><?= $_SESSION['errors']['discount']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label p-1">Photo of Product</label>
                    <input class="form-control" type="file" name="url">
                </div>

                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>


<?php unset($_SESSION['errors']) ?>
<?php require_once('inc/footer.php'); ?>
