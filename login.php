<?php
session_start(); // starts a session to manage user authentication

if (isset($_POST["login"])) { // checks if the login form has been submitted

    include 'connect.php'; // includes the file containing the database connection

    // retrieves email and password from the form
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'"; //query to select user with provided email and password
    $result = mysqli_query($conn, $sql); // executes the SQL query


    if (!$row = mysqli_fetch_assoc($result)) { // checks if there is a result returned from the query
        echo "<script> alert ('Wrong Credentials!')</script>"; // if no result is found, it displays an error message
    } else {
        // if a matching user is found, it sets session varables for users fname, lname, id
        $_SESSION["fname"] = $row["fname"];
        $_SESSION["lname"] = $row["lname"];
        $_SESSION["id"] = $row["id"];
        header("Location:homepage.php"); // redirects the user to the homepage after successful login
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
    include 'user_header.php'; //includes the user_header.php file which is the navbar
    ?>

    <section id="login-form">
        <div class="container mt-5 pt-5 ">
            <div class="row">
                <div class="col-12 col-sm8 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="text-center logo-form">
                                <img src="images/cookbook-logo.png">
                            </div>
                            <form class="login-form" action="login.php" method="POST">
                                <input type="email" name="email" required id="inputEmail" class="form-control my-4 py-2" placeholder="Email">
                                <input type="password" name="pass" id="inputLname" class="form-control my-4 py-2" placeholder="Password">
                                <div class="but text-center mt-3">
                                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                                    <a href="register.php" class="nav-link">New user? Create an account!</a>
                                </div>
                            </form>
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