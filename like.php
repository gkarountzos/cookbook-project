<?php
session_start();

include 'connect.php';

// sets the content type header to json
header('Content-Type: application/json');

// decodes json data from the request body into an associative array
$data = json_decode(file_get_contents('php://input'), true);

// checks if the recipe id and the user session id are set
if (isset($data['id']) && isset($_SESSION['id'])) {
    // gets the recipe id and user session id
    $recipeId = $data['id'];
    $userId = $_SESSION['id'];

    // query to the database to check if the user has already liked the recipe
    $checkQuery = "SELECT COUNT(*) AS like_count FROM recipe_likes WHERE user_id = $userId AND recipe_id = $recipeId";
    $checkResult = mysqli_query($conn, $checkQuery);
    $likeCount = mysqli_fetch_assoc($checkResult)['like_count'];

    // checks if the user has liked the recipe or not
    if ($likeCount > 0) {
        // if the user has already liked the recipe, it removes the like
        $deleteQuery = "DELETE FROM recipe_likes WHERE user_id = $userId AND recipe_id = $recipeId";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        // checks if the like deletion was successful
        if ($deleteResult) {
            // if it was successful, it reduces the like count in the recipes table
            $updateQuery = "UPDATE recipes SET rlikes = rlikes - 1 WHERE id = $recipeId";
        } else {
            // if there was an error deleting the like, it returns an error message
            echo json_encode(['success' => false, 'message' => 'Error removing like.']);
            exit;
        }
    } else {
        // if the user hasnt liked the recipe yet, add the like
        $insertQuery = "INSERT INTO recipe_likes (user_id, recipe_id) VALUES ($userId, $recipeId)";
        $insertResult = mysqli_query($conn, $insertQuery);

        // checks if the like insertion was successful
        if ($insertResult) {
            // if it was successful, add the like in the recipes table
            $updateQuery = "UPDATE recipes SET rlikes = rlikes + 1 WHERE id = $recipeId";
        } else {
            // if there was an error inserting the like, it returns an error message
            echo json_encode(['success' => false, 'message' => 'Error inserting like.']);
            exit;
        }
    }

    // updates the like count in the recipes table
    $updateResult = mysqli_query($conn, $updateQuery);

    // checks if the like count update was successful
    if ($updateResult) {
        // if it was successful, query the updated like count
        $newLikeCountQuery = "SELECT rlikes FROM recipes WHERE id = $recipeId";
        $newLikeCountResult = mysqli_query($conn, $newLikeCountQuery);
        $newLikeCount = mysqli_fetch_assoc($newLikeCountResult)['rlikes'];

        // returns a JSON response with success status, like status, and the updated like count
        echo json_encode(['success' => true, 'liked' => $likeCount == 0, 'newLikeCount' => $newLikeCount]);
    } else {
        // if there was an error updating the like count, it returns an error message
        echo json_encode(['success' => false, 'message' => 'Error updating like count.']);
    }
} else {
    // if the recipe or user id is not set, it returns an error message to login or register
    echo json_encode(['success' => false, 'message' => 'Login or register to interact with our content.']);
}
