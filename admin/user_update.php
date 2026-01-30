<?php
    include '../koneksi.php';

    $id       = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama     = $_POST['nama'];
    $status   = $_POST['status'];

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
    $d   = mysqli_fetch_assoc($cek);

    if($password == "" || empty($password)){
        $password_final = $d['password'];
    } else {
        $password_final = md5($password);
    }

    mysqli_query($koneksi, "UPDATE user SET 
        username    = '$username', password='$password_final',user_nama='$nama',user_status = '$status'
        WHERE user_id = '$id'
    ");

    echo "<script>alert('Data user berhasil diperbarui'); window.location.href='user.php'</script>";
?>