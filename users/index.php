<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/database.php';

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="../dashboard.php">Perpustakaan</a>
        <div>
            <a href="../dashboard.php" class="btn btn-light btn-sm">Dashboard</a>
            <a href="../books/index.php" class="btn btn-light btn-sm">Data Buku</a>
            <a href="index.php" class="btn btn-light btn-sm">Data User</a>
            <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-body">
            <h3>Data User</h3>

            <a href="create.php" class="btn btn-primary mb-3">Tambah User</a>
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari data user...">

            <table class="table table-bordered table-striped" id="dataTable">
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>

                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                        <a href="delete.php?id=<?= $row['id']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirmDelete()"
                           Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>

            </table>
        </div>
    </div>

</div>
<script src="../assets/js/script.js"></script>
</body>
</html>
