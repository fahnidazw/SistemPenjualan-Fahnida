<?php
	include '../koneksi.php';
	$no = $_GET['id'];
	mysqli_query($koneksi,"delete from user where user_id='$no'");
	echo "<script>alert('Data akan dihapus?'); window.location.href='user.php'</script>";
?>