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
    body { 
        background-color: #f8f9fa; 
        font-family: 'Inter', sans-serif;
        color: #333;
    }
    
    .main-card {
        background: #ffffff;
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        margin-top: 50px;
        margin-bottom: 50px;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #5d4037 0%, #8d6e63 100%);
        padding: 20px 25px;
        color: white;
        border: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h4 { margin: 0; font-weight: 600; display: flex; align-items: center; gap: 10px; }

    .card-body { padding: 40px; }

    .form-label {
        font-weight: 600;
        color: #5d4037;
        margin-bottom: 8px;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
        transition: all 0.3s ease;
        height: auto;
    }

    .form-control:focus {
        border-color: #8d6e63;
        box-shadow: 0 0 0 3px rgba(141, 110, 99, 0.1);
        outline: none;
    }

    .btn-back {
        background: rgba(255,255,255,0.2);
        color: white;
        border: 1px solid rgba(255,255,255,0.4);
        padding: 6px 15px;
        border-radius: 6px;
        font-size: 13px;
        transition: 0.3s;
    }

    .btn-back:hover { background: white; color: #5d4037; text-decoration: none; }

    .btn-update {
        background: #5d4037;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 10px;
        font-weight: 600;
        width: 100%;
        margin-top: 25px;
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.2);
        transition: 0.3s;
    }

    .btn-update:hover { background: #4e342e; transform: translateY(-2px); color: white; }

    .table-custom { margin-top: 15px; border: 1px solid #eee; border-radius: 10px; overflow: hidden; }
    .table-custom thead { background: #fdfaf7; }
    .table-custom thead th { border: none; color: #5d4037; padding: 15px; font-size: 13px; }
    .table-custom tbody td { padding: 12px; vertical-align: middle; border-top: 1px solid #f5f5f5; }

    .alert-soft {
        background: #fdfaf7;
        border-left: 4px solid #8d6e63;
        color: #5d4037;
        padding: 15px;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="main-card">
                <div class="card-header">
                    <h4><i class="fa fa-edit"></i> Edit Penjualan</h4>
                    <a href="penjualan.php" class="btn-back"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                                        <?php
                                        foreach($kasir as $k){
                                            $sel = ($k['user_id'] == $p['user_id']) ? "selected" : "";
                                            echo "<option value='{$k['user_id']}' $sel>{$k['user_nama']}</option>";
                                        }
                                        ?>
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
                                        $selected_id = isset($details[$i]['id_barang']) ? $details[$i]['id_barang'] : '';
                                        $jumlah = isset($details[$i]['jumlah']) ? $details[$i]['jumlah'] : '';
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