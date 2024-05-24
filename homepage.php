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
    // includes the user header php file which contains the navbar
    include 'user_header.php';
    ?>

    <section id="recipe_posts">
        <div class="container">
            <?php
            include 'connect.php';

            $query = "SELECT r.*, u.fname, u.lname, u.avatar FROM recipes r INNER JOIN users u ON r.user_id = u.id ORDER BY r.id DESC";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<h2 class='title-for-recipes'>User Recipes</h2>";
                echo "<div class='container cards'>";
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $recipeId = $row['id'];

                    echo "<div class='post-feed col-12 mb-4 m-auto'>";
                    echo "<div class='card'>";
                    echo "<img class='card-img-top fixed-size' src='uploadedImages/" . htmlspecialchars($row['rimage']) . "' alt='" . htmlspecialchars($row['rname']) . "'>";
                    echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>" . htmlspecialchars($row['rname']) . "</h3>";
                    echo "<p class='card-text'>" . htmlspecialchars($row['rdescription']) . "</p>";
                    echo "<p class='card-text'><small class='text-muted'>By " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</small></p>";
                    echo "<div class='like-section'>";
                    echo "<button class='btn btn-primary like-button' data-recipe-id='" . $row['id'] . "'>";
                    echo "Like (<span class='like-count'>" . $row['rlikes'] . "</span>)";
                    echo "</button>";
                    echo "</div>";

                    // Fetch and display comments
                    echo "<div class='comment-section'>";
                    $commentsQuery = "SELECT c.*, u.fname FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.recipe_id = $recipeId ORDER BY c.comment_date DESC";
                    $commentsResult = mysqli_query($conn, $commentsQuery);
                    if ($commentsResult && mysqli_num_rows($commentsResult) > 0) {
                        echo "<h5>Comments</h5>";
                        while ($comment = mysqli_fetch_assoc($commentsResult)) {
                            echo "<p><strong>" . htmlspecialchars($comment['fname']) . "</strong> on " . htmlspecialchars($comment['comment_date']) . ":</p>";
                            echo "<p>" . htmlspecialchars($comment['comment_text']) . "</p>";
                        }
                    } else {
                        echo "<p>No comments yet.</p>";
                    }

                    // Comment form
                    echo "<form action='post_comment.php' method='POST'>";
                    echo "<input type='hidden' name='recipe_id' value='$recipeId'>";
                    echo "<textarea name='comment_text' rows='4' cols='50' placeholder='Write your comment here'></textarea>";
                    echo "<button type='submit' class='btn btn-secondary'>Post Comment</button>";
                    echo "</form>";
                    echo "</div>"; // Close comment-section

                    echo "</div>"; // Close card-body
                    echo "</div>"; // Close card
                    echo "</div>"; // Close post-feed
                }
                echo "</div>";  // Close row
                echo "</div>";  // Close container
            } else {
                echo "<h3 class='text-center error-msg'> No recipes have been uploaded yet. Upload by loging in or registering!</h3>";
            }
            ?>




        </div>

    </section>





    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>