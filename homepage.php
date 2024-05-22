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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="script\script.js" defer></script>
</head>

<body>
    <div class="backdrop"></div>

    <?php
    include 'user_header.php';
    ?>

    <section id="recipe_posts">
        <div class="container">
            <?php
            include 'connect.php';

            $query = "SELECT r.*, u.fname, u.avatar FROM recipes r INNER JOIN users u ON r.user_id = u.id ORDER BY r.id DESC";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<h2 class='title-for-recipes'>User Recipes</h2>";
                echo "<div class='container cards'>";  // Added a container
                echo "<div class='row'>";  // Added a row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 mb-4'>";  // Full width column
                    echo "<div class='card'>";
                    echo "<img class='card-img-top fixed-size' src='uploadedImages/" . $row['rimage'] . "' alt='" . $row['rname'] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h3 class='card_title'>" . $row['rname'] . "</h3>";
                    echo "<p class='card_text'>" . $row['rdescription'] . "</p>";
                    echo "<p class='card_text'><small class='text-muted'>Recipe by: " . $row['fname'] . "</small></p>";
                    echo "<div class='like-section'>";
                    echo "<button class='btn btn-primary like-button' data-recipe-id='" . $row['id'] . "'>";
                    echo "Like (<span class='like-count'>" . $row['rlikes'] . "</span>)";
                    echo "</button>";
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";  // Close row
                echo "</div>";  // Close container
            } else {
                echo "<p class='error-msg'> No recipes uploaded.</p>";
            }
            ?>


        </div>

    </section>





    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>