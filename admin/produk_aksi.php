<?php 
include '../koneksi.php';

$nama = $_POST['nama'];
$beli = $_POST['beli'];
$jual = $_POST['jual'];
$stok = $_POST['stok'];

mysqli_query($koneksi, "INSERT INTO barang (nama_barang, harga_beli, harga_jual, stok) 
                        VALUES ('$nama', '$beli', '$jual', '$stok')");

echo "<script>alert('Data anda telah tersimpan dengan baik!'); window.location.href='produk.php'</script>";
?>