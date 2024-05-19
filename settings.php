<?php
session_start();

$user = $_SESSION["id"];
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
                            <div class="text-center">
                                <button type="button" id="togglePfp" class="btn btn-primary">Profile Picture</button>
                                <button type="button" id="toggleInfo" class="btn btn-success">Personal Information</button>
                            </div>
                            <div class="update-info" id="updateInfo" style="display: none;">
                                <form action="settings.php" method="POST">
                                    <input type="password" name="old-pass" required class="form-control my-4 py-2" placeholder="Παλιός κωδικός *">
                                    <input type="password" name="new-pass" required class="form-control my-4 py-2" placeholder="Νέος κωδικός *">
                                    <input type="password" name="conf-new-pass" required class="form-control my-4 py-2" placeholder="Επιβεβαίωση νέου κωδικού *">
                                    <div class="text-center mt-3">
                                        <button type="submit" name="update-info" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="update-pfp" id="updatePfp" style="display: none;">
                                <form action="settings.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" name="avatar">
                                        <img src="upload/<?php echo $user['avatar']; ?>" class="rounded-circle">
                                        <input type="text" hidden name="old_pfp" value="<?php echo $user['avatar']; ?>">
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" name="update-pfp" class="btn btn-success">Update</button>
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