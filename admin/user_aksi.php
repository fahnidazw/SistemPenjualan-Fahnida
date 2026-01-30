<?php
include '../koneksi.php';

$id       = $_POST['id'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama     = $_POST['nama'];
$status   = $_POST['status'];

mysqli_query($koneksi, "INSERT INTO user 
    (user_id, username, password, user_nama, user_status) 
    VALUES 
    ('$id','$username', '$password', '$nama', '$status')
");

echo "<script>
        alert('Data user berhasil ditambahkan');
        window.location.href='user.php';
      </script>";
?>