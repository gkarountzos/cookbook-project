<head>
    <link rel="stylesheet" href="css\style.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php"><img src="images/logo-no-background.png" alt="cb-logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>/
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex me-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit"><img src="images/magnifying-glass.png"></button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome! Create an account or login.
                        </a>
                        <ul class="dropdown-menu">
                            <form action="" method="POST">
                                <div class="text-center mt-3">
                                    <button type="submit" name="to_login" class="btn btn-primary">Login</button>
                                    <button type="submit" name="to_register" class="btn btn-success">Register</button>
                                </div>
                            </form>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>