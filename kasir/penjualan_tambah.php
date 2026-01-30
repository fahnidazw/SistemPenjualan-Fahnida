<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<style>
    body { background-color: #fdfaf7; }
    .panel { border: 1px solid #d7ccc8; border-radius: 8px; margin-top: 30px; }
    .panel-heading { background-color: #5d4037 !important; color: #fff !important; }
    .btn-info { background-color: #8d6e63; border-color: #795548; }
    .btn-primary { background-color: #5d4037; border: none; width: 100%; font-weight: bold; padding: 10px; }
    .alert-info { background-color: #efebe9; border: 1px solid #d7ccc8; color: #4e342e; }
    label { color: #5d4037; font-weight: bold; }
</style>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><i class="fa fa-shopping-cart"></i> Transaksi Baru</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="penjualan.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <div class="clearfix"></div>
                <br/>

                <form method="post" action="penjualan_aksi.php">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tgl_jual" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <div class="form-group alert alert-info">
                        <label>Kasir</label>
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

                    <label>Daftar Belanja</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background: #f5f5f5;">
                                <th>Nama Produk</th>
                                <th width="20%">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $barang_data = [];
                            $res = mysqli_query($koneksi, "SELECT * FROM barang WHERE stok > 0");
                            while($row = mysqli_fetch_array($res)) { $barang_data[] = $row; }
                            function buat_dropdown($data) {
                                echo "<option value=''>- Pilih Barang -</option>";
                                foreach($data as $b) {
                                    echo "<option value='".$b['id_barang']."'>".$b['nama_barang']." (Stok: ".$b['stok'].")</option>";
                                }
                            }
                            ?>

                            <tr>
                                <td><select class="form-control" name="nama_barang[]"><?php buat_dropdown($barang_data); ?></select></td>
                                <td><input type="number" class="form-control" name="jumlah_barang[]" placeholder="0"></td>
                            </tr>
                            <tr>
                                <td><select class="form-control" name="nama_barang[]"><?php buat_dropdown($barang_data); ?></select></td>
                                <td><input type="number" class="form-control" name="jumlah_barang[]" placeholder="0"></td>
                            </tr>
                            <tr>
                                <td><select class="form-control" name="nama_barang[]"><?php buat_dropdown($barang_data); ?></select></td>
                                <td><input type="number" class="form-control" name="jumlah_barang[]" placeholder="0"></td>
                            </tr>
                            <tr>
                                <td><select class="form-control" name="nama_barang[]"><?php buat_dropdown($barang_data); ?></select></td>
                                <td><input type="number" class="form-control" name="jumlah_barang[]" placeholder="0"></td>
                            </tr>
                            <tr>
                                <td><select class="form-control" name="nama_barang[]"><?php buat_dropdown($barang_data); ?></select></td>
                                <td><input type="number" class="form-control" name="jumlah_barang[]" placeholder="0"></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary">SIMPAN TRANSAKSI</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>