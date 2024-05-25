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
    include 'user_header.php'; // includes the user header php file which contains the navbar
    ?>

    <section id="recipe_posts">
        <div class="container">
            <?php
            include 'connect.php';


            $query = "SELECT r.*, u.fname, u.lname, u.avatar FROM recipes r INNER JOIN users u ON r.user_id = u.id ORDER BY r.id DESC"; // query to fetch recipes and user details
            $result = mysqli_query($conn, $query);


            if ($result && mysqli_num_rows($result) > 0) { // checks if the query returned any results
                echo "<h2 class='title-for-recipes'>User Recipes</h2>";
                echo "<div class='container cards'>";
                echo "<div class='row'>";


                while ($row = mysqli_fetch_assoc($result)) { // loops as many times to create cards as many rows exist
                    $recipeId = $row['id'];

                    echo "<div class='post-feed col-12 mb-4 m-auto'>";
                    echo "<div class='card'>";
                    echo "<img class='card-img-top fixed-size' src='uploadedImages/" . htmlspecialchars($row['rimage']) . "' alt='" . htmlspecialchars($row['rname']) . "'>";
                    echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>" . htmlspecialchars($row['rname']) . "</h3>"; // displays the recipe name
                    echo "<p class='card-text'>" . htmlspecialchars($row['rdescription']) . "</p>"; // displays the description
                    // displays the name of the user who made the psot
                    echo "<p class='card-text'><small class='text-muted'>By " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</small></p>";

                    echo "<div class='like-section'>";
                    echo "<button class='btn btn-primary like-button' data-recipe-id='" . $row['id'] . "'>"; // display the like button and stores the recipe id
                    echo "Like (<span class='like-count'>" . $row['rlikes'] . "</span>)"; // displays the current like count for the recipe id fetched from the table
                    echo "</button>";
                    echo "</div>";

                    echo "<div class='comment-section'>";
                    // query to fetch comments for the existing recipes
                    $commentsQuery = "SELECT c.*, u.fname FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.recipe_id = $recipeId ORDER BY c.comment_date DESC";
                    $commentsResult = mysqli_query($conn, $commentsQuery);                                                                                              //^

                    if ($commentsResult && mysqli_num_rows($commentsResult) > 0) { // checks if there are any comments                                                       //^
                        echo "<h5>Comments</h5>";                                                                                                                            //^
                        while ($comment = mysqli_fetch_assoc($commentsResult)) { // loops through each comment and displays it in descending ordered based by the comment date ^
                            echo "<p><strong>" . htmlspecialchars($comment['fname']) . " says: </strong> " . htmlspecialchars($comment['comment_text']) . "</p>";
                        }
                    } else {
                        echo "<p>No comments yet.</p>"; // if no comments exist, it displays this message
                    }

                    echo "<form action='post_comment.php' method='POST'>";
                    echo "<input type='hidden' name='recipe_id' value='$recipeId'>"; // hidden input field to store the recipe id
                    echo "<textarea name='comment_text' rows='4' cols='50' placeholder='Write your comment here'></textarea>";
                    echo "<button type='submit' class='btn btn-secondary'>Post Comment</button>";
                    echo "</form>";
                    echo "</div>"; // closes comment-section

                    echo "</div>"; // closes card-body
                    echo "</div>"; // closes card
                    echo "</div>"; // closes post-feed
                }
                echo "</div>";  // closes row
                echo "</div>";  // closes container
            } else {
                echo "<h3 class='text-center error-msg'> No recipes have been uploaded yet. Upload by logging in or registering!</h3>"; // if no recipes are found, it displays this message
            }
            ?>





        </div>

    </section>





    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>