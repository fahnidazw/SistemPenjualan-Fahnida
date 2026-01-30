<?php
session_start();

include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$data     = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$user     = mysqli_fetch_array($data);
  
if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";

        header("Location: admin/index.php");
        exit();
    } else {
        header("Location: index.php?pesan=gagal");
        exit();
    }
} else {
    header("Location: index.php?pesan=gagal");
    exit();
}
?>
