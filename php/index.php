<!DOCTYPE html>
<html lang="es">
<head>
    <title>TNP - Yahtzee!</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/favicon.ico">
</head>
<body>
    <div class="container">
        <h1>Bienvenido a The NullPointer's Yathzee!</h1>

        <div class="title-logo white-image">
            <img src="../images/logo.png" alt="The NullPointer's" width="10%" height="auto">
        </div>

        <div class="login-text">
            <h2>Login</h2>
            <form action="index.php" method="post">

                <input type="text" name="username" placeholder="Username" required>

                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" name="submit" class="button-27 button-changes" value="login">Login</button>
                <p id=login_error></p>

            </form>
        </div>

        <div class="signup-text">
            <h2>Signup</h2>
            <form action="index.php" method="post">

                <input type="text" name="username" placeholder="Username" required>

                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" name="submit" class="button-27 button-changes" value="signup">Signup</button>
                <p id=signup_error></p>

            </form>
        </div>

    </div>

    <?php
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])){

            require_once "processes/connect.php";
            

            if($_POST['submit'] == 'login'){
                require_once "processes/login.php";
            }
            else if($_POST['submit'] == 'signup'){
                require "processes/signup.php";
            }
            

            
        }
    ?> 

    <script src="../js/index.js"></script>
</body>
</html>