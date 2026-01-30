<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental Kendaraan</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #EFE6DB;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #3B2A20 0%, #2A1C15 100%);
            border: none;
            border-radius: 0;
            padding: 14px 0;
            box-shadow: 0 8px 22px rgba(43, 29, 21, 0.45);
        }

        .navbar-custom .navbar-brand {
            color: #F6EBDD !important;
            font-weight: 600;
            letter-spacing: 1.4px;
            font-size: 19px;
            text-transform: uppercase;
        }

        .navbar-custom .nav > li > a {
            color: #EADFCC !important;
            font-size: 14px;
            padding: 15px 22px;
            transition: all 0.3s ease;
        }

        .navbar-custom .nav > li > a:hover {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #FFFFFF !important;
            border-radius: 8px;
        }

        /* MENU AKTIF */
        .navbar-custom .nav > li.active > a {
            background: rgba(255, 255, 255, 0.18) !important;
            color: #FFFFFF !important;
            border-radius: 8px;
            font-weight: 600;
        }

        .navbar-custom .nav > li.active i {
            color: #FFD8A8;
        }

        .navbar-custom .navbar-right > li > p {
            color: #EDE2D2;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }

    $current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-custom">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                Insights | <i class="fas fa-moon"></i> The Lumora Co
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">
                    <a href="index.php"><i class="fa fa-th-large"></i> Dashboard</a>
                </li>

                <li class="<?= ($current_page == 'produk.php') ? 'active' : '' ?>">
                    <a href="produk.php"><i class="fa fa-flask"></i> Product</a>
                </li>

                <li class="<?= ($current_page == 'penjualan.php') ? 'active' : '' ?>">
                    <a href="penjualan.php">
                        <i class="glyphicon glyphicon-shopping-cart"></i> Transaction
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                </li>
                <li>
                    <p class="navbar-text" style="margin-right:15px;">
                        Hi, <b><?= $_SESSION['username']; ?></b>!
                    </p>
                </li>
            </ul>
        </div>

    </div>
</nav>

</body>
</html>
