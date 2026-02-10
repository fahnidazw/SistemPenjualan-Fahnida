<?php include 'header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/produk-tambah.css">

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="main-card">
                <div class="card-header">
                    <h4><i class="fa fa-plus-circle"></i> TAMBAH PRODUK</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="produk_aksi.php">
                        <div class="form-group">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" placeholder="Contoh: Kopi Susu Gula Aren" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga Beli</label>
                                    <input type="number" class="form-control" name="beli" placeholder="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga Jual</label>
                                    <input type="number" class="form-control" name="jual" placeholder="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Stok Awal</label>
                            <input type="number" class="form-control" name="stok" placeholder="Masukkan jumlah stok.." required>
                        </div>

                        <button type="submit" class="btn btn-save">
                            <i class="fa fa-save"></i> SIMPAN PRODUK
                        </button>

                        <a href="produk.php" class="btn btn-block btn-default" style="margin-top:10px;">
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br>

<?php include 'footer.php'; ?>