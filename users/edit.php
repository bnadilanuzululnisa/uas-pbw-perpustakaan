<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/database.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    if ($_POST['password'] != "") {
        $password = md5($_POST['password']);

        mysqli_query($conn, "UPDATE users SET 
            nama='$nama',
            username='$username',
            password='$password',
            role='$role'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($conn, "UPDATE users SET 
            nama='$nama',
            username='$username',
            role='$role'
            WHERE id='$id'
        ");
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            <h3>Edit User</h3>

            <form method="POST">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $row['username']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control">
                    <small>Kosongkan jika tidak ingin mengganti password.</small>
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                        <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User</option>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
