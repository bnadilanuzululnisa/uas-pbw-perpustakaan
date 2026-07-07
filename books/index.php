<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/database.php';

$result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="../dashboard.php">Perpustakaan</a>
        <div>
            <a href="../dashboard.php" class="btn btn-light btn-sm">Dashboard</a>
            <a href="index.php" class="btn btn-light btn-sm">Data Buku</a>
            <a href="../users/index.php" class="btn btn-light btn-sm">Data User</a>
            <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-body">
            <h3>Data Buku</h3>

            <a href="create.php" class="btn btn-primary mb-3">Tambah Buku</a>
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari data buku...">

            <table class="table table-bordered table-striped" id="dataTable">
                <tr class="table-primary">
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>

                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['judul']; ?></td>
                    <td><?= $row['penulis']; ?></td>
                    <td><?= $row['penerbit']; ?></td>
                    <td><?= $row['tahun']; ?></td>
                    <td><?= $row['kategori']; ?></td>
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
