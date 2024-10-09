<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
            background-color: rgb(196, 184, 193);
            height: 100vh;
            display: flex; 
            justify-content: center; 
            align-items: flex-start; /* Align items at the top */
        }

        .form-container {
            width: 350px; 
            background: rgba(0, 0, 0, 0.08);
            border-radius: 15px;
            padding: 20px;
            position: relative; 
            margin-top: 100px;  /* Increase space from the top */
            margin-left: 50px; /* Move right (reduce left margin) */
        }

        img[alt="User"] {
            width: 80px;
            height: 80px;
            display: block;
            margin: auto;
            border-radius: 50%;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            
        }

        h2 {
            color: #000;
            text-align: center;
            margin-top: 60px;
            font-size: 24px;
        }

        input {
            outline: none;
            border: none;
            width: 100%; 
            height: 40px;
            border-bottom: 2px solid #000;
            padding: 5px;
            margin: 10px 0;
            background: none;
            font-size: 16px;
        }

        input[type="submit"] {
            background: #0077ff;
            border: none;
            outline: none;
            color: white;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        p {
            text-align: center;
            color: #000;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
        }

        p:hover {
            color: #0077ff;
        }

        .side-image {
            width: 100%; 
            height: auto;
            border-radius: 15px; 
            /* margin-bottom: 30px;  */
            margin-top: 30px;
        }

        .text-danger {
            font-size: 14px;
            margin-top: -8px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="image/4346990.webp" alt="Side Image" class="side-image">
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <img src="image/online-shopping-is-it-really-worth-it.jpg" alt="User">
                    <h2>Login</h2>
                    <form action="actions/do-login.php" method="POST" class="p-3">
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email">
                            <?php if (isset($_SESSION['errors']['email'])): ?>
                                <span class="text-danger"><?= $_SESSION['errors']['email']; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            <?php if (isset($_SESSION['errors']['password'])): ?>
                                <span class="text-danger"><?= $_SESSION['errors']['password']; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Login" class="form-control btn btn-primary">
                        </div>
                    </form>
                    <p>Forget password?</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<?php unset($_SESSION['errors']); ?>
