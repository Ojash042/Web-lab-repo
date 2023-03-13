<nav class="navbar">
    <?session_start()?>
            <div class = "logo-container">
                <a href="./"> <img src="https://www.w3.org/html/logo/downloads/HTML5_Badge_256.png" alt="logo" height="32px" width="32px"> </a>
            </div>
            <div class = "account-controls">
                <?php 
                if (!($_SESSION['loggedin'] === true)){ ?>
                    <a href="./login.php">Login</a>
                    <a href = "./signup.php">Sign Up</a>
                    <?php } else{ ?>
                        <a href  = "./logout.php"> Welcome <?php echo $_SESSION['username']?></a>
                        <?php } ?>
        </div>
    <link rel = "stylesheet" href="./css/nav.css">
</nav>