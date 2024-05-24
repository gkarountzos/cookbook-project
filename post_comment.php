<?php
session_start();
// includes the database connection
include 'connect.php';

// checks if the required POST data and session variable are set
if (isset($_POST['comment_text']) && isset($_POST['recipe_id']) && isset($_SESSION['id'])) {

    // converts special PHP characters into harmless versions
    $commentText = mysqli_real_escape_string($conn, $_POST['comment_text']);

    // converts the recipe id to an integer
    $recipeId = intval($_POST['recipe_id']);

    // gets the user id from the session
    $userId = $_SESSION['id'];

    // sql query to insert the comment into the database
    $query = "INSERT INTO comments (recipe_id, user_id, comment_text, comment_date) 
              VALUES ($recipeId, $userId, '$commentText', NOW())";

    // executes the query
    $result = mysqli_query($conn, $query);

    // checks if the query was successful
    if ($result) {
        // redirects the user to the homepage where the recipes are
        header("Location: homepage.php");
    } else {
        // displays an error message if the query has failed
        echo "<script>alert('Error posting comment');</script>";
    }
} else {
    // displays a message prompting the user to login or register if required data is missing
    echo "<script>alert('Login or register to interact with our content.');</script>";
}
