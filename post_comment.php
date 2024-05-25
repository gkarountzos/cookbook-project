<?php
session_start(); // includes the database connection
include 'connect.php';

if (isset($_POST['comment_text']) && isset($_POST['recipe_id']) && isset($_SESSION['id'])) { // checks if the required POST data and session variable are set

    $commentText = mysqli_real_escape_string($conn, $_POST['comment_text']); // converts special PHP characters into harmless versions for security reasons
    $recipeId = $_POST['recipe_id'];

    $userId = $_SESSION['id']; // gets the user id from the session

    $query = "INSERT INTO comments (recipe_id, user_id, comment_text, comment_date) 
              VALUES ($recipeId, $userId, '$commentText', NOW())"; // sql query to insert the comment into the database


    $result = mysqli_query($conn, $query); // executes the query


    if ($result) { // checks if the query was successful
        header("Location: homepage.php"); // redirects the user to the homepage where the recipes are
    } else {
        echo "<script>alert('Error posting comment');</script>"; // displays an error message if the query has failed
    }
} else {
    echo "<script>alert('Login or register to interact with our content.');</script>"; // displays a message prompting the user to login or register if required data is missing
}
