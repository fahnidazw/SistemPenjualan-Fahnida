<?php
include '../koneksi.php';

$tgl_jual = $_POST['tgl_jual'];
$user_id = $_POST['user_id'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang = $_POST['jumlah_barang'];

for($i = 0; $i < count($nama_barang); $i++) {
    if($nama_barang[$i] != "" && (int)$jumlah_barang[$i] > 0){
        $q = mysqli_query($koneksi, "SELECT harga_jual, stok FROM barang WHERE id_barang='".$nama_barang[$i]."'");
        $b = mysqli_fetch_array($q);
        $jumlah = (int)$jumlah_barang[$i];
        $total_harga = $b['harga_jual'] * $jumlah;
        $stok_baru = $b['stok'] - $jumlah;
        mysqli_query($koneksi, "UPDATE barang SET stok='$stok_baru' WHERE id_barang='".$nama_barang[$i]."'");
        mysqli_query($koneksi, "INSERT INTO penjualan(tgl_jual, user_id, id_barang, jumlah, total_harga, status) VALUES(
            '$tgl_jual', '$user_id', '".$nama_barang[$i]."', '$jumlah', '$total_harga', 'Selesai'
        )");
    }
}

header("location:penjualan.php");
?>
