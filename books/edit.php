<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/database.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM books WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];

    mysqli_query($conn, "UPDATE books SET 
        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun='$tahun',
        kategori='$kategori'
        WHERE id='$id'
    ");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            <h3>Edit Buku</h3>

            <form method="POST">

                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" value="<?= $row['judul']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="<?= $row['penulis']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="<?= $row['penerbit']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="<?= $row['tahun']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="<?= $row['kategori']; ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
