<?php require_once('config.php') ?>
<?php  include('scripts/authentication.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login - CarDeck</title>

    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>


<div class="auth-wrapper row">
    <div class="carbg-section col-md-6"></div>
    <div class="auth-form-section col-md-6">
        <div class="form-wrapper">
            <div class="form">
                <div class="form-header">
                    <span class="heading">Account Login</span>
                    <span class="info">If you are already a member, you can login with your email address and password.</span>
                </div>
                <form class="auth-form" action="login.php" method="POST">
                    <?php include('includes/errors.php'); ?>
                    <div class="form-input-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" />
                    </div>
                    <div class="form-input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" />
                    </div>

                    <div class="remember-me">
                        <input type="checkbox" name="rememberMe" value="1"/> Remember me
                    </div>

                    <div class="form-submit">
                        <input type="submit" name="login" class="button-forms button-red" value="Login" />
                    </div>

                    <div class="form-link">
                        <span>Don't have an account?</span> <a href="/register.php">Sign up here</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

