<?php
	include '../koneksi.php';
	$id = $_GET['id_barang'];
	mysqli_query($koneksi,"delete from barang where id_barang='$id'");
	echo "<script>alert('Data akan dihapus?'); window.location.href='produk.php'</script>";
?>