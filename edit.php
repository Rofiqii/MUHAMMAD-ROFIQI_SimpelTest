<?php

session_start();
require './query.php';

$id = $_GET['id'];
$crud = new CRUD;

if(isset($_POST['register'])) {
    [$name, $email, $pass] = [$_POST['name'], $_POST['email'], $_POST['password']];

    $crud->updateData($email, $pass, $name, $id);
    header("Location: home.php");
}

$user = $crud->getDataById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="row justify-content-center pt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6>Edit User</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $user->user_fullname ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $user->user_email ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?= $user->user_password ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="home.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" name="register" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
