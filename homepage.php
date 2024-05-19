<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookbook - Your Social Cooking Site.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">

    <script src="script\script.js" defer></script>
</head>

<body>
    <div class="backdrop"></div>
    <?php
    include 'user_header.php';
    ?>

    <?php

    include 'connect.php';
    // Fetch all recipes along with user information
    $post_query = "SELECT recipes.rname, recipes.rdescription, recipes.rimage, users.fname, users.lname, users.avatar 
                    FROM recipes 
                    JOIN users 
                    ON recipes.user_id = users.ID";

    $result = mysqli_query($conn, $post_query);

    // Display the recipes
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='recipe'>";
        echo "<h2>" . $row['rname'] . "</h2>";
        echo "<p>" . $row['rdescription'] . "</p>";
        echo "<img src='uploadedImages/" . $row['rimage'] . "' alt='" . $row['rname'] . "'>";
        echo "<div class='user-info'>";
        echo "<img src='upload/" . $row['avatar'] . "' alt='" . $row['fname'] . " " . $row['lname'] . "' class='avatar'>";
        echo "<p>By: " . $row['fname'] . " " . $row['lname'] . "</p>";
        echo "</div>";
        echo "</div>";
    }

    ?>


    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>