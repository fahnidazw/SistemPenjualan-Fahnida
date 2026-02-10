<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir - Lumora Aromatherapy</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

  <div class="login-card">
    <div class="brand-side">
      <h1>Lumora</h1>
      <p>Aromatherapy & Co.</p>
    </div>

    <div class="form-side">
      <div class="header-text">
        <h2>Sistem Transaksi Lumora</h2>
        <p>Silahkan login untuk mengelola pesanan.</p>
        <div class="line"></div>
      </div>

      <form action="login_cek.php" method="POST" style="position: relative; z-index: 1;">
        <div class="input-box">
          <input type="text" name="username" required>
          <label>Username</label>
          <i class="fa-solid fa-user-tag"></i>
          <span class="focus-border"></span>
        </div>

        <div class="input-box">
          <input type="password" name="password" required>
          <label>Password</label>
          <i class="fa-solid fa-lock"></i>
          <span class="focus-border"></span>
        </div>

        <button type="submit" class="btn-submit">
          <span>   MASUK  </span>
          <i class="fa-solid fa-arrow-right"></i>
        </button>
      </form>
    </div>
  </div>

</body>
</html>