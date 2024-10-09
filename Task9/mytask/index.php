<?php session_start();  ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Signup Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        padding: 0;
        margin: 0;
        font-family: sans-serif;
        background-color: rgb(196, 189, 193);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        height: 100vh;
        display: flex; 
        justify-content: center;
        align-items: center; 
    }

    .form-container {
        background: rgba(196, 189, 193, 0.15);
        padding: 10px; 
        width: 350px; 
        position: relative; 
        z-index: 1; 
    }

    h2 {
        text-align: center;
        margin-bottom: 1px; 
        color: #000;
        font-size: 1.3rem; 
        font-weight: bold;
    }

    .form-control {
        border: none;
        outline: none;
        background: none; 
        border-bottom: 1px solid rgba(0, 0, 0, 0.5); 
        padding: 4px; 
        font-size: 14px; 
        width: 100%; 
    }

    .form-control:focus {
        border-bottom: 1px solid #0077ff; 
        transition: border-bottom 0.3s ease-in-out;
    }

    ::placeholder {
        color: #000;
        opacity: 1;
    }

    select.form-control {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding: 4px; 
        background: none; 
        width: 100%; 
    }

    input[type="submit"], .btn-secondary {
        background-color: #0077ff;
        border: none;
        color: white;
        cursor: pointer;
        width: 100%; 
        padding: 6px; 
        font-size: 14px; 
    }

    input[type="submit"]:hover, .btn-secondary:hover {
        background-color: #0056b3; 
    }

    .alert {
        margin-top: 5px; 
        font-size: 12px;
    }

    .signup-image {
        width: 100%; 
        height: auto; 
        border-radius: 15px; 
        margin-right: 50px; 
        margin-top: 100px; 
    }

    .image-column {
        flex: 1; 
        position: relative; 
    }

    .row {
        margin: 0; 
    }

    .alert {
            margin-top: 5px;
            font-size: 12px; 
            max-width: 300px;
            width: 100%; 
            margin-left: auto; 
            margin-right: auto; 
            padding: 5px;
        }

        .form-label {
    font-size: 12px; 
    color: #333; 
    font-weight: bold; 
}

</style>

</head>

<body>

<div class="container"> 
    <div class="row g-0">
        <div class="col-md-6 image-column">
            <img src="image/pngtree-online-registration-or-sign-up-login-for-account-on-smartphone-app-png-image_4740863.png" alt="Signup Image" class="signup-image">
        </div>

        <div class="col-md-6">
            <div class="form-container mx-auto">
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                <?php endif; ?>

                <form action="actions/signup.php" method="POST">
                    <h2>Sign Up</h2>

                    <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" id="username" name="user_name" class="form-control" placeholder="Enter your username"  >
                        <?php if(isset($_SESSION['errors']['user_name'])): ?>
                            <span class="alert alert-danger"><?php echo $_SESSION['errors']['user_name']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="user_email" class="form-control" placeholder="Enter your email">
                        <?php if(isset($_SESSION['errors']['user_email'])): ?>
                            <span class="alert alert-danger"><?php echo $_SESSION['errors']['user_email']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="user_password" class="form-control" placeholder="Enter your password">
                        <?php if(isset($_SESSION['errors']['user_password'])): ?>
                            <span class="alert alert-danger"><?php echo $_SESSION['errors']['user_password']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
                        <?php if(isset($_SESSION['errors']['phone'])): ?>
                            <span class="alert alert-danger"><?php echo $_SESSION['errors']['phone']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <?php if(isset($_SESSION['errors']['type'])): ?>
                            <span class="alert alert-danger"><?php echo $_SESSION['errors']['type']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Signup" class="btn btn-primary">
                    </div>
                    <div class="mb-3">
                        <h3 class="text-center">OR</h3>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-secondary" href="login.php" role="button">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['errors']); ?>
