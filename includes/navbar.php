<div class="nav-container">
    <nav class="navbar">
        <div class="logo-wrapper">
            <a href="index.php">
                <img src="/img/logo.png" alt="App Logo"/>
            </a>
        </div>
        <div class="nav-links">
            <?php if (!isLoggedIn()) : ?>
                <a href="../login.php">
                    <button class="button-nav button-red">Login</button>
                </a>
                <a href="../register.php">
                    <button class="button-nav button-white">Sign Up</button>
                </a>
            <?php else : ?>
                <div class="text-secondary" style="font-weight: bold;"><?php echo $_SESSION['user']['name'] ?></div>

                <a  href="../user_vehicles.php">
                    <button class="button-nav button-red">My Vehicles</button>
                </a>

                <form action="../login.php" method="POST">
                    <button type="submit" name="logout" value="logout" class="button-nav button-white">Log Out</button>
                </form>
            <?php endif ?>
        </div>
    </nav>
</div>