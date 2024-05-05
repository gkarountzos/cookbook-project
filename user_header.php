<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header('Location:homepage.php');
}
?>



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
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo "Hi " . $_SESSION["fname"] . " " . $_SESSION["lname"] ?></a> <!-- towards profile -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                    </li>

                    <li class="nav-item btn-group dropstart">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu">
                            <form action="" method="POST">
                                <a class="dropdown-item" href="">Settings</a>
                                <div class="text-center mt-3">
                                    <button type="submit" name="logout" class="btn btn-danger">Disconnect</button>
                                </div>
                            </form>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>