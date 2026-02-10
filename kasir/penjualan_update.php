<?php
include '../koneksi.php';

$id_jual  = $_POST['id_jual'];
$tgl_jual = $_POST['tgl_jual'];
$user_id  = $_POST['user_id'];
$id_barang = $_POST['id_barang1'];
$jumlah    = $_POST['jumlah1'];

$query = "UPDATE penjualan SET 
            tgl_jual='$tgl_jual',
            user_id='$user_id',
            id_barang='$id_barang',
            jumlah='$jumlah'
          WHERE id_jual='$id_jual'";

if(mysqli_query($koneksi, $query)){
    echo "<script>alert('Data berhasil diupdate');window.location='penjualan.php';</script>";
}else{
    echo "Error: ".mysqli_error($koneksi);
}
?>
