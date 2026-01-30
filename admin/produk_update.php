<?php
	include '../koneksi.php';
	$id    = $_POST['id'];
	$nama  = $_POST['nama'];
	$beli  = $_POST['beli'];
	$jual  = $_POST['jual'];
	$stok  = $_POST['stok'];

	mysqli_query($koneksi, "update barang set id_barang='$id', nama_barang='$nama', harga_beli='$beli', harga_jual='$jual', stok='$stok' where id_barang='$id'");

	echo "<script>alert('Data anda sudah diubah'); window.location.href='produk.php'</script>";
?>

<?php include 'footer.php'; ?>