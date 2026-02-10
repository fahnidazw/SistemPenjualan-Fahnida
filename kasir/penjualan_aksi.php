<?php
include '../koneksi.php';

$tgl_jual = $_POST['tgl_jual'];
$user_id = $_POST['user_id'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang = $_POST['jumlah_barang'];

for ($i = 0; $i < count($nama_barang); $i++) {

    $id_barang = (int)$nama_barang[$i];
    $jumlah = (int)$jumlah_barang[$i];

    if ($id_barang > 0 && $jumlah > 0) {

        $query = mysqli_query($koneksi, "
            SELECT harga_jual, stok 
            FROM barang 
            WHERE id_barang = '$id_barang'
        ");

        if (mysqli_num_rows($query) > 0) {

            $barang = mysqli_fetch_assoc($query);

            if ($barang['stok'] >= $jumlah) {

                $total_harga = $barang['harga_jual'] * $jumlah;
                $stok_baru = $barang['stok'] - $jumlah;

                mysqli_query($koneksi, "
                    UPDATE barang 
                    SET stok = '$stok_baru' 
                    WHERE id_barang = '$id_barang'
                ");

                mysqli_query($koneksi, "
                    INSERT INTO penjualan 
                    (tgl_jual, user_id, id_barang, jumlah, total_harga, status) 
                    VALUES 
                    ('$tgl_jual', '$user_id', '$id_barang', '$jumlah', '$total_harga', 'Selesai')
                ");

            }
        }
    }
}

header("Location: penjualan.php");
exit;
?>