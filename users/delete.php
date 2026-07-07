<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../config/database.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

header("Location: index.php");
exit;
?>
