<?php
session_start();
require_once('inc/header.php');
?>

<header class="py-5" style="background: linear-gradient(135deg, #ff9a9e, #fecfef); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5" style="background-color: rgba(255, 255, 255, 0.2); padding: 20px; border-radius: 10px;">
        <div class="text-center">
            <h1 class="display-4 fw-bolder" style="color: #3354;">Contact Us</h1>
            <p class="lead fw-normal" style="color: #3339;">With this shop can contact us</p>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <!-- عمود للصورة -->
        <div class="col-md-6">
            <img src="image/4841578.webp" alt="Product Image" class="img-fluid p-5 mb-5" style="border-radius: 20px; max-width: 100%; height: auto;">
        </div>

        <!-- عمود للنموذج -->
        <div class="col-md-6">
            <h1 class="text-center p-4">Contact Us</h1>
            <form action="actions/contact.php" method="POST" class="border p-3"> <!-- أضف 'mb-5' لزيادة المسافة بعد الفورم -->
            <div class="mb-3">
                    <?php if (isset($_SESSION['success'])):  ?>
                        <h2 class="text-success"><?php echo $_SESSION['success']; ?></h2>
                    <?php endif;  ?>
                </div>
            <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="enter your name">
                    <?php if (isset($_SESSION['errors']['name'])): ?>
                        <span class="text-danger p-2"><?= $_SESSION['errors']['name']; ?></span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="enter your email">
                    <?php if (isset($_SESSION['errors']['email'])): ?>
                        <span class="text-danger p-2"><?= $_SESSION['errors']['email']; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                    <?php if (isset($_SESSION['errors']['message'])): ?>
                        <span class="text-danger p-2"><?= $_SESSION['errors']['message']; ?></span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Send" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php unset($_SESSION['errors']) ?>
<?php unset($_SESSION['success']) ?>
<?php require_once('inc/footer.php'); ?>