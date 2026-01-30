<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

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
        padding: 25px;
        color: white;
        border: none;
    }

    .card-header h4 {
        margin: 0;
        font-weight: 600;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-body {
        padding: 40px;
    }

    .form-label {
        font-weight: 600;
        color: #5d4037;
        margin-bottom: 8px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 12px 15px;
        height: auto;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #8d6e63;
        box-shadow: 0 0 0 3px rgba(141, 110, 99, 0.1);
    }

    .btn-back {
        background-color: rgba(255,255,255,0.2);
        color: white;
        border: 1px solid rgba(255,255,255,0.4);
        border-radius: 6px;
        transition: all 0.3s;
    }

    .btn-back:hover {
        background-color: white;
        color: #5d4037;
    }

    .btn-submit {
        background: #5d4037;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 16px;
        width: 100%;
        margin-top: 20px;
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.3);
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background: #4e342e;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(93, 64, 55, 0.4);
    }

    .table-custom {
        margin-top: 10px;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table-custom thead th {
        border: none;
        color: #8d6e63;
        font-weight: 600;
        padding-bottom: 15px;
    }

    .table-custom tbody tr {
        background-color: #fafafa;
        transition: all 0.2s;
    }

    .table-custom tbody tr td {
        border: none;
        padding: 15px;
        vertical-align: middle;
    }

    .table-custom tbody tr td:first-child { border-radius: 8px 0 0 8px; }
    .table-custom tbody tr td:last-child { border-radius: 0 8px 8px 0; }

    .alert-custom {
        background-color: #f3f0ef;
        border-left: 4px solid #5d4037;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="main-card">
                <div class="card-header">
                    <a href="penjualan.php" class="btn btn-sm btn-back pull-right">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <h4><i class="fa fa-shopping-cart"></i> Transaksi Baru</h4>
                </div>
                
                <div class="card-body">
                    <form method="post" action="penjualan_aksi.php">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" name="tgl_jual" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Petugas Kasir</label>
                                    <select class="form-control" name="user_id" required>
                                        <option value="">- Pilih Kasir -</option>
                                        <?php
                                        $user = mysqli_query($koneksi, "SELECT * FROM user");
                                        while($u = mysqli_fetch_array($user)){
                                            echo "<option value='".$u['user_id']."'>".$u['user_nama']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr style="margin: 30px 0; border-top: 1px solid #eee;">

                        <div class="section-title">
                            <label class="form-label"><i class="fa fa-list"></i> Item Belanja</label>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-custom">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th width="25%">Jumlah Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $barang_data = [];
                                    $res = mysqli_query($koneksi, "SELECT * FROM barang WHERE stok > 0");
                                    while($row = mysqli_fetch_array($res)) { $barang_data[] = $row; }
                                    
                                    function buat_dropdown($data) {
                                        echo "<option value=''>Cari & Pilih Barang...</option>";
                                        foreach($data as $b) {
                                            echo "<option value='".$b['id_barang']."'>".$b['nama_barang']." — (Tersedia: ".$b['stok'].")</option>";
                                        }
                                    }

                                    // Render 5 baris input
                                    for ($i = 0; $i < 5; $i++) {
                                    ?>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="nama_barang[]">
                                                <?php buat_dropdown($barang_data); ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="jumlah_barang[]" placeholder="0" min="0">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="alert alert-custom">
                            <small><i class="fa fa-info-circle"></i> Pastikan stok barang mencukupi sebelum menyimpan transaksi.</small>
                        </div>

                        <button type="submit" class="btn btn-submit">
                            <i class="fa fa-check-circle"></i> SIMPAN TRANSAKSI SEKARANG
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>