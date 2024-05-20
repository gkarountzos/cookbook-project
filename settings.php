<?php
session_start();
include 'connect.php';
$user = $_SESSION["id"];


if (isset($_POST['update-pfp'])) {

    $file_name = $_FILES['avatar']['name'];
    $tempname = $_FILES['avatar']['tmp_name'];
    $folder = 'profileImages/' . $file_name;

    $query = "UPDATE users SET avatar = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $file_name, $user);

    if (mysqli_stmt_execute($stmt)) {
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script> alert ('Your picture has been updated!')</script>";
        } else {
            echo "<script> alert ('An error occurred while updating your picture.')</script>";
        }
    } else {
        echo "<script> alert ('An error occurred while updating your picture.')</script>";
    }
}

if (isset($_POST['delete-pfp'])) {
    $updateQuery = "UPDATE users SET avatar = NULL WHERE id = '$user'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Avatar deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting avatar.');</script>";
    }
}

if (isset($_POST["update-info"])) {
    $old_pass = $_POST["old-pass"];
    $new_pass = $_POST["new-pass"];
    $conf_new_pass = $_POST["conf-new-pass"];

    if ($new_pass != $conf_new_pass) {
        echo "<script> alert ('Passwords do not match.')</script>";
    } else if ($_SESSION["id"]) {

        $sql_update = "UPDATE users SET password = '$new_pass' WHERE id='$user' AND password = '$old_pass'";
        $result = mysqli_query($conn, $sql_update);

        echo "<script> alert ('The change was successful.')</script>";
    } else {
        echo "<script> alert ('Password change failed.')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookbook - <?php echo $_SESSION["fname"] . " " . $_SESSION["lname"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <script src="script\script.js" defer></script>

</head>

<body>
    <?php
    include 'user_header.php';
    ?>

    <section id="update-form">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm8 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="text-center crossroad">
                                <p>What would you want to change?</p>
                            </div>
                            <!-- two options  -->
                            <div class="text-center">
                                <button type="button" id="togglePfp" class="btn btn-primary">Profile Picture</button>
                                <button type="button" id="toggleInfo" class="btn btn-success">Personal Information</button>
                            </div>

                            <!-- profile picture form -->
                            <div class="update-pfp" id="updatePfp">
                                <form action="settings.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" name="avatar">
                                        <div class="text-center mt-3">
                                            <button type="submit" name="update-pfp" class="btn btn-success">Update</button>
                                            <button type="submit" name="delete-pfp" class="btn btn-danger">Delete Avatar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- info form -->
                            <div class="update-info" id="updateInfo">
                                <form action="settings.php" method="POST">
                                    <label class="form-label">Change Password</label>
                                    <input type="password" name="old-pass" required class="form-control my-4 py-2" placeholder="Old Password *">
                                    <input type="password" name="new-pass" required class="form-control my-4 py-2" placeholder="New Password *">
                                    <input type="password" name="conf-new-pass" required class="form-control my-4 py-2" placeholder="Confirm New Password *">
                                    <div class="text-center mt-3">
                                        <button type="submit" name="update-info" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>

</html>