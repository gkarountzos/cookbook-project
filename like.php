<?php
session_start();

include 'connect.php';


header('Content-Type: application/json'); // sets the content type header to json


$data = json_decode(file_get_contents('php://input'), true); // decodes json data from the request body into an associative array


if (isset($data['id']) && isset($_SESSION['id'])) { // checks if the recipe id and the user session id are set
    // gets the recipe id and user session id
    $recipeId = $data['id'];
    $userId = $_SESSION['id'];


    $checkQuery = "SELECT COUNT(*) AS like_count FROM recipe_likes WHERE user_id = $userId AND recipe_id = $recipeId"; // query to the database to check if the user has already liked the recipe
    $checkResult = mysqli_query($conn, $checkQuery);
    $likeCount = mysqli_fetch_assoc($checkResult)['like_count'];


    if ($likeCount > 0) { // checks if the user has liked the recipe or not
        // if the user has already liked the recipe, it removes the like
        $deleteQuery = "DELETE FROM recipe_likes WHERE user_id = $userId AND recipe_id = $recipeId";
        $deleteResult = mysqli_query($conn, $deleteQuery);


        if ($deleteResult) { // checks if the like deletion was successful
            $updateQuery = "UPDATE recipes SET rlikes = rlikes - 1 WHERE id = $recipeId"; // if it was successful, it reduces the like count in the recipes table
        } else {
            echo json_encode(['success' => false, 'message' => 'Error removing like.']); // if there was an error deleting the like, it returns an error message
            exit;
        }
    } else {
        $insertQuery = "INSERT INTO recipe_likes (user_id, recipe_id) VALUES ($userId, $recipeId)"; // if the user hasnt liked the recipe yet, add the like
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) { // checks if the like insertion was successful
            $updateQuery = "UPDATE recipes SET rlikes = rlikes + 1 WHERE id = $recipeId"; // if it was successful, add the like in the recipes table
        } else {
            echo json_encode(['success' => false, 'message' => 'Error inserting like.']); // if there was an error inserting the like, it returns an error message
            exit;
        }
    }

    $updateResult = mysqli_query($conn, $updateQuery); // updates the like count in the recipes table


    if ($updateResult) {
        // if it was successful, query the updated like count
        $newLikeCountQuery = "SELECT rlikes FROM recipes WHERE id = $recipeId";
        $newLikeCountResult = mysqli_query($conn, $newLikeCountQuery);
        $newLikeCount = mysqli_fetch_assoc($newLikeCountResult)['rlikes'];

        echo json_encode(['success' => true, 'liked' => $likeCount == 0, 'newLikeCount' => $newLikeCount]); // returns a JSON response with success status, like status, and the updated like count
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating like count.']); // if there was an error updating the like count, it returns an error message
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Login or register to interact with our content.']); // if the recipe or user id is not set, it returns an error message to login or register
}
