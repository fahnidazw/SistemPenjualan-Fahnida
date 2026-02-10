<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/penjualan-tambah.css">

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