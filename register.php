<?php

if (isset($_POST["to_login"])) {
    header("Location:login.php");
}

if (isset($_POST["register"])) {
    //establish connection
    include "connect.php";

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    //email duplicate check
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    //email duplicate check
    if ($result->num_rows > 0) {
        echo "<script> alert ('The given email is already registered')</script>";
    } else {
        //register user
        $sql_register = "INSERT INTO users(fname,lname,email,password)
                        VALUES('$fname','$lname','$email','$pass');";
        $result_reg = $conn->query($sql_register);
        //redirect to login
        header("Location:login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookbook - Your Social Cooking Site.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
</head>

<body>

    <?php
    include 'user_header.php';
    ?>

    <section id="register-form">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm8 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="text-center logo-form">
                                <img src="images\cookbook-logo.png">
                            </div>
                            <form action="register.php" method="POST">
                                <input type="text" name="fname" required id="inputFname1" class="form-control my-4 py-2" placeholder="Name *">
                                <input type="text" name="lname" required id="inputLname1" class="form-control my-4 py-2" placeholder="Surname *">
                                <input type="email" name="email" required id="inputEmail" class="form-control my-4 py-2" placeholder="Email *">
                                <input type="password" name="pass" required id="inputPassword" class="form-control my-4 py-2" placeholder="Password *">

                                <div class="text-center mt-3 but">
                                    <button type="submit" name="register" value="Submit" class="btn btn-success">Register</button>
                                    <a href="login.php" class="nav-link">Already have an account? Login!</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>