<?php

session_start();
require './query.php';

$user = $_SESSION['user'];
$crud = new CRUD();
$users = [];

$result = $crud->getData();

if($result)
    $users = $result->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a href="" class="navbar-brand">CRUD OOP</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row pt-4 ps-3 justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center">Selamat Datang <?= $user->user_fullname; ?></h3>

            <div class="card">
                <div class="card-header">
                    <h5>Daftar User</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?= $user->user_fullname ?></td>
                                    <td><?= $user->user_email ?></td>
                                    <td>
                                        <a class="me-2" href="edit.php?id=<?= $user->id ?>">edit</a>
                                        <a href="hapus.php?id=<?= $user->id ?>">hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
