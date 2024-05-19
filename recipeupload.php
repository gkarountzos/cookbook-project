<?php
session_start();
include 'connect.php';

if (isset($_POST['share'])) {
    $r_name = $_POST['rname'];
    $r_description = $_POST['rdescription'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'uploadedImages/' . $file_name;

    $query = mysqli_query($conn, "INSERT INTO recipes (rname, rdescription, rimage) 
                                       VALUES ('$r_name', '$r_description', '$file_name')");

    if (move_uploaded_file($tempname, $folder)) {
        echo "<script> alert ('Your recipe has been shared!')</script>";
    } else {
        echo "<script> alert ('An error occured while sharing your recipe.')</script>";
    }
}

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

    <div class="d-flex align-items-center justify-content-center upload">
        <form action="recipeupload.php" method="POST" class="row gx-3 gy-2 form-style" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="recipe-name" class="form-label">Name Your Recipe</label>
                <input type="text" class="form-control" name="rname" id="rname" placeholder="E.g. Grandma's secret sauce...">
            </div>
            <div class="mb-3">
                <label for="recipe-description" class="form-label">Recipe Instructions</label>
                <textarea class="form-control" name="rdescription" id="rdescription" rows="3"></textarea>
            </div>
            <input type="file" name="image">
            <div class="col-12">
                <button type="submit" name="share" class="btn btn-primary">Share!</button>
            </div>
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>