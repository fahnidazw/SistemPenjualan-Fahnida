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

<style>
body{
    background:#f7f3ee;
    font-family:'Inter', sans-serif;
    color:#5a3b33;
}

.main-card{
    background:#ffffff;
    border-radius:18px;
    box-shadow:0 14px 35px rgba(0,0,0,.06);
    margin:50px 0;
    overflow:hidden;
}

.card-header{
    background:#f6b7c5;
    padding:22px 26px;
    color:#ffffff;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.card-header h4{
    margin:0;
    font-weight:600;
    letter-spacing:.5px;
}

.card-body{
    padding:38px;
}

.form-label{
    font-weight:600;
    color:#8b5e5a;
    font-size:12px;
    text-transform:uppercase;
    margin-bottom:6px;
}

.form-control{
    border-radius:12px;
    border:1px solid #ead9d3;
    padding:11px 14px;
    transition:.3s;
}

.form-control:focus{
    border-color:#f2a7b5;
    box-shadow:0 0 0 3px rgba(242,167,181,.25);
}

.btn-back{
    background:rgba(255,255,255,.35);
    color:#ffffff;
    border:none;
    padding:7px 16px;
    border-radius:20px;
    font-size:13px;
}

.btn-back:hover{
    background:#ffffff;
    color:#8b5e5a;
    text-decoration:none;
}

.table-custom{
    margin-top:20px;
    border-collapse:separate;
    border-spacing:0 12px;
}

.table-custom thead th{
    border:none;
    color:#8b5e5a;
    font-size:12px;
    padding:12px 14px;
}

.table-custom tbody tr{
    background:#fff7f3;
    border-radius:14px;
    box-shadow:0 6px 16px rgba(0,0,0,.05);
}

.table-custom tbody td{
    border:none;
    padding:14px;
}

.table-custom tbody tr td:first-child{
    border-radius:14px 0 0 14px;
}

.table-custom tbody tr td:last-child{
    border-radius:0 14px 14px 0;
}

.alert-soft{
    background:#fff1ec;
    border-left:4px solid #f2a7b5;
    color:#8b5e5a;
    padding:14px 18px;
    border-radius:12px;
    margin-top:18px;
}

.btn-update{
    background:#f2a7b5;
    color:#ffffff;
    border:none;
    padding:14px;
    border-radius:30px;
    font-weight:600;
    width:100%;
    margin-top:26px;
    box-shadow:0 8px 22px rgba(242,167,181,.45);
    transition:.3s;
}

.btn-update:hover{
    background:#ec93a6;
}

.form-control{
    height:48px;
    padding:10px 16px;
    line-height:1.4;
    font-size:14px;
    border-radius:14px;
    border:1px solid #ead9d3;
    display:flex;
    align-items:center;
}

select.form-control{
    padding-right:40px;
    line-height:normal;
}

input[type="date"].form-control{
    line-height:normal;
}
</style>

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