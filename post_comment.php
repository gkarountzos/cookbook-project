<?php
session_start();
include 'connect.php';

if (isset($_POST['comment_text']) && isset($_POST['recipe_id']) && isset($_SESSION['id'])) {
    $commentText = mysqli_real_escape_string($conn, $_POST['comment_text']);
    $recipeId = intval($_POST['recipe_id']);
    $userId = $_SESSION['id'];

    $query = "INSERT INTO comments (recipe_id, user_id, comment_text, comment_date) VALUES ($recipeId, $userId, '$commentText', NOW())";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: homepage.php"); // Adjust to the page where you display recipes
    } else {
        echo "<script>alert('Error posting comment');</script>";
    }
} else {
    echo "<script>alert('Login or register to interact with our content.');</script>";
}
