<?php

session_start();
require './query.php';

$error = null;

function cekLogin(&$error) {
    $crud = new CRUD();
    [$email, $pass] = [$_POST['email'], $_POST['password']];

    if(empty(trim($email)) || empty(trim($pass))) {
        $error = "Data tidak boleh kosong";
        return;
    }

    if(!$user = $crud->loginUser($email, $pass)) {
        $error = "Username atau password salah";
        return;
    }

    $_SESSION['user'] = $user;
    header("Location: home.php");
}

if(isset($_POST['submit']))
    cekLogin($error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="row justify-content-center pt-4">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header text-center">
                    <h5>Login</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <?php if($error): ?>
                            <div class="alert alert-danger"><?= $error; ?></div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <p>Belum mempunyai akun? <a href="register.php">daftar</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
