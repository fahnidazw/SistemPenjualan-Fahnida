<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<?php
$id = $_GET['id'];
$jual = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id_jual='$id'");
$p = mysqli_fetch_assoc($jual);

$kasir = [];
$u = mysqli_query($koneksi, "SELECT * FROM user");
while($x = mysqli_fetch_assoc($u)){ $kasir[] = $x; }

$barang = [];
$q = mysqli_query($koneksi, "SELECT * FROM barang");
while($b = mysqli_fetch_assoc($q)){ $barang[] = $b; }

$details = [];
$d = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id_jual='$id'");
while($row = mysqli_fetch_assoc($d)){ $details[] = $row; }

function dropdown_barang($barang, $selected){
    echo "<option value=''>- Pilih Barang -</option>";
    foreach($barang as $b){
        $sel = ($b['id_barang'] == $selected) ? "selected" : "";
        echo "<option value='{$b['id_barang']}' $sel>{$b['nama_barang']} (Stok: {$b['stok']})</option>";
    }
}
?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/penjualan-edit.css">

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="main-card">
                <div class="card-header">
                    <h4><i class="fa fa-edit"></i> Edit Penjualan</h4>
                    <a href="penjualan.php" class="btn-back">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="penjualan_update.php">
                        <input type="hidden" name="id_jual" value="<?= $p['id_jual']; ?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Transaksi</label>
                                    <input type="date" name="tgl_jual" class="form-control" value="<?= $p['tgl_jual']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kasir Terpilih</label>
                                    <select name="user_id" class="form-control" required>
                                        <option value="">- Pilih Kasir -</option>
                                        <?php foreach($kasir as $k){
                                            $sel = ($k['user_id'] == $p['user_id']) ? "selected" : "";
                                            echo "<option value='{$k['user_id']}' $sel>{$k['user_nama']}</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-custom">
                                <thead>
                                    <tr>
                                        <th>NAMA PRODUK</th>
                                        <th width="20%">JUMLAH</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<6; $i++):
                                        $selected_id = $details[$i]['id_barang'] ?? '';
                                        $jumlah = $details[$i]['jumlah'] ?? '';
                                    ?>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="id_barang<?= $i+1; ?>">
                                                <?php dropdown_barang($barang, $selected_id); ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="jumlah<?= $i+1; ?>" value="<?= $jumlah; ?>" placeholder="0">
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="alert alert-soft">
                            <small><i class="fa fa-info-circle"></i> Biarkan kosong jika barang tidak ingin ditambahkan.</small>
                        </div>

                        <button type="submit" class="btn btn-update">
                            <i class="fa fa-save"></i> SIMPAN PERUBAHAN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>