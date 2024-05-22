<?php
session_start();
include 'connect.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($_SESSION['id'])) {
    $recipeId = $data['id'];
    $userId = $_SESSION['id'];

    // Check if the user has already liked this recipe
    $checkQuery = "SELECT COUNT(*) AS like_count FROM recipe_likes WHERE user_id = $userId AND recipe_id = $recipeId";
    $checkResult = mysqli_query($conn, $checkQuery);
    $likeCount = mysqli_fetch_assoc($checkResult)['like_count'];

    if ($likeCount > 0) {
        // User has already liked the recipe, so remove the like
        $deleteQuery = "DELETE FROM recipe_likes WHERE user_id = $userId AND recipe_id = $recipeId";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            // Decrement the like count in the recipes table
            $updateQuery = "UPDATE recipes SET rlikes = rlikes - 1 WHERE id = $recipeId";
        } else {
            echo json_encode(['success' => false, 'message' => 'Error removing like.']);
            exit;
        }
    } else {
        // User has not liked the recipe yet, so add the like
        $insertQuery = "INSERT INTO recipe_likes (user_id, recipe_id) VALUES ($userId, $recipeId)";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            // Increment the like count in the recipes table
            $updateQuery = "UPDATE recipes SET rlikes = rlikes + 1 WHERE id = $recipeId";
        } else {
            echo json_encode(['success' => false, 'message' => 'Error inserting like.']);
            exit;
        }
    }

    // Update the like count in the recipes table
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Get the updated like count
        $newLikeCountQuery = "SELECT rlikes FROM recipes WHERE id = $recipeId";
        $newLikeCountResult = mysqli_query($conn, $newLikeCountQuery);
        $newLikeCount = mysqli_fetch_assoc($newLikeCountResult)['rlikes'];

        echo json_encode(['success' => true, 'liked' => $likeCount == 0, 'newLikeCount' => $newLikeCount]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating like count.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Login or register to interact with our content.']);
}
