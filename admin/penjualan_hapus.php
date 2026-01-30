<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_jual='$id'");

echo "<script>alert('Data transaksi berhasil dihapus!'); window.location.href='penjualan.php';</script>";
?>
