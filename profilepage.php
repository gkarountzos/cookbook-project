<?php
session_start();

include 'connect.php';

$user = $_SESSION["id"]; // gets the user id from the session

$query = "SELECT avatar FROM users WHERE id = '$user'"; // query to the database to fetch the users avatar
$result = mysqli_query($conn, $query);


if ($result && mysqli_num_rows($result) > 0) { // checks if the query was successful and if there are any rows returned
    $row = mysqli_fetch_assoc($result); // fetches the row containing the avatar filename
    $avatar = $row['avatar']; // assigns the avatar filename to the $avatar variable
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookbook - <?php echo $_SESSION["fname"] . " " . $_SESSION["lname"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
</head>

<body>
    <?php
    include 'user_header.php';
    ?>

    <div class="pfp">
        <img src="profileImages/<?php echo $avatar; ?>" class="img-fluid" alt="Avatar">
    </div>
    <br>
    <div class="name">
        <h1><?php echo $_SESSION["fname"] . " " . $_SESSION["lname"] ?></h1>
    </div>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>