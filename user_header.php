<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php"><img src="images/logo-no-background.png" alt="cb-logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex me-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit"><img src="images/magnifying-glass.png"></button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <?php
                    if (isset($_SESSION["fname"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profilepage.php"><?php echo $_SESSION["fname"] . " " . $_SESSION["lname"] ?></a> <!-- towards profile -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="recipeupload.php">Share your Recipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="homepage.php">Home</a>
                        </li>

                        <li class="nav-item btn-group dropstart">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Settings
                            </a>
                            <ul class="dropdown-menu">
                                <form action="logout.php" method="POST">
                                    <a class="dropdown-item text-center" href="settings.php">Settings</a>
                                    <div class="text-center mt-3">
                                        <button type="submit" name="logout" class="btn btn-danger">Disconnect</button>
                                    </div>
                                </form>

                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item btn-group">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome! Create an account or login.
                            </a>
                            <ul class="dropdown-menu">
                                <form action="login.php" method="POST">
                                    <div class="text-center mt-3">
                                        <button type="submit" name="to_login" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                                <form action="register.php" method="POST">
                                    <div class="text-center mt-3">
                                        <button type="submit" name="to_register" class="btn btn-success">Register</button>
                                    </div>
                                </form>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>