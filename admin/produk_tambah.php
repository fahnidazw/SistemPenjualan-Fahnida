<?php include 'header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; }
    .main-card {
        background: #ffffff;
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        margin-top: 50px;
    }
    .card-header {
        background: linear-gradient(135deg, #5d4037 0%, #8d6e63 100%);
        padding: 20px;
        color: white;
        border-radius: 16px 16px 0 0;
        text-align: center;
    }
    .card-header h4 { margin: 0; font-weight: 600; letter-spacing: 1px; }
    .card-body { padding: 30px; }
    .form-label { font-weight: 600; color: #5d4037; margin-bottom: 8px; font-size: 13px; text-transform: uppercase; }
    .form-control {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 12px;
        transition: all 0.3s;
    }
    .form-control:focus { border-color: #8d6e63; box-shadow: 0 0 0 3px rgba(141, 110, 99, 0.1); outline: none; }
    .btn-save {
        background: #5d4037;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        width: 100%;
        margin-top: 10px;
        transition: 0.3s;
    }
    .btn-save:hover { background: #4e342e; transform: translateY(-2px); color: white; }
</style>

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
                        <a href="produk.php" class="btn btn-block btn-default" style="margin-top:10px; border-radius:8px;">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br>

<?php include 'footer.php'; ?>