<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Perpustakaan</a>
        <div>
            <a href="books/index.php" class="btn btn-light btn-sm">Data Buku</a>
            <a href="users/index.php" class="btn btn-light btn-sm">Data User</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h3>Selamat Datang, <?= $_SESSION['nama']; ?></h3>
            <p>Ini adalah aplikasi perpustakaan sederhana.</p>
        </div>
    </div>
</div>

</body>
</html>