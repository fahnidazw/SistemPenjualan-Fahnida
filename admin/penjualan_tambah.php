<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body { 
    background-color: #f7f3ee;
    font-family: 'Inter', sans-serif;
    color: #4b3b36;
}

.main-card {
    background: #ffffff;
    border: none;
    border-radius: 18px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
    margin-top: 50px;
    margin-bottom: 50px;
    overflow: hidden;
}

.card-header {
    background: #f6b7c5;
    padding: 26px;
    color: #ffffff;
    border: none;
}

.card-header h4 {
    margin: 0;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-body {
    padding: 40px;
}

.form-label {
    font-weight: 600;
    color: #8b5e5a;
    margin-bottom: 8px;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-control {
    border-radius: 12px;
    border: 1px solid #e8dcd7;
    padding: 12px 15px;
    height: auto;
    transition: all 0.3s ease;
    background-color: #fff;
}

.form-control:focus {
    border-color: #f2a7b5;
    box-shadow: 0 0 0 3px rgba(242,167,181,.25);
}

.btn-back {
    background-color: #ffffff;
    color: #8b5e5a;
    border: none;
    border-radius: 20px;
    padding: 6px 14px;
    transition: all 0.3s;
}

.btn-back:hover {
    background-color: #fce4ea;
    color: #6f4742;
}

.btn-submit {
    background: #f2a7b5;
    color: #ffffff;
    border: none;
    padding: 16px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 15px;
    width: 100%;
    margin-top: 25px;
    box-shadow: 0 6px 18px rgba(242,167,181,.45);
    transition: all 0.3s;
}

.btn-submit:hover {
    background: #ec93a6;
    transform: translateY(-2px);
}

.table-custom {
    margin-top: 10px;
    border-collapse: separate;
    border-spacing: 0 12px;
}

.table-custom thead th {
    border: none;
    color: #8b5e5a;
    font-weight: 600;
    padding-bottom: 14px;
}

.table-custom tbody tr {
    background-color: #fffaf8;
}

.table-custom tbody tr td {
    border: none;
    padding: 15px;
    vertical-align: middle;
}

.table-custom tbody tr td:first-child {
    border-radius: 14px 0 0 14px;
}

.table-custom tbody tr td:last-child {
    border-radius: 0 14px 14px 0;
}

.alert-custom {
    background-color: #fff1f4;
    border-left: 5px solid #f2a7b5;
    border-radius: 12px;
    padding: 18px;
    margin-top: 25px;
    color: #7a4a46;
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
                    <h4><i class="fa fa-shopping-cart"></i> Tambah Transaksi</h4>
                </div>

                <div class="card-body">
                    <form method="post" action="penjualan_aksi.php">

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tgl_jual"
                                       value="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kasir</label>
                                <select class="form-control" name="user_id" required>
                                    <option value="">-- Pilih Kasir --</option>
                                    <?php
                                    $user = mysqli_query($koneksi,"SELECT * FROM user");
                                    while($u=mysqli_fetch_array($user)){
                                        echo "<option value='".$u['user_id']."'>".$u['user_nama']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <hr style="margin:35px 0; border-top:1px dashed #f3c6d0;">

                        <label class="form-label">Daftar Barang</label>

                        <div class="table-responsive">
                            <table class="table table-custom">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th width="25%">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $barang_data=[];
                                    $res=mysqli_query($koneksi,"SELECT * FROM barang WHERE stok>0");
                                    while($r=mysqli_fetch_array($res)){ $barang_data[]=$r; }

                                    function dropdown($data){
                                        echo "<option value=''>-- Pilih Barang --</option>";
                                        foreach($data as $b){
                                            echo "<option value='".$b['id_barang']."'>".$b['nama_barang']." (Stok ".$b['stok'].")</option>";
                                        }
                                    }

                                    for($i=0;$i<5;$i++){
                                    ?>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="nama_barang[]">
                                                <?php dropdown($barang_data); ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="jumlah_barang[]" min="1">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="alert alert-custom">
                            <small><i class="fa fa-info-circle"></i> Pastikan jumlah sesuai stok tersedia.</small>
                        </div>

                        <button type="submit" class="btn btn-submit">
                            <i class="fa fa-check-circle"></i> Simpan Transaksi
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>