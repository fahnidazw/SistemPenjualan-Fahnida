<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Lumora</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --main-color: #C2B4A3;   
      --dark-color: #9E8F7D;    
      --bg-soft: #F5F1EB;      
      --text-dark: #4E443B;     
      --text-gray: #7A6F63;    
    }

    * {
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      margin: 0;
      background: var(--bg-soft);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .login-container {
      display: flex;
      width: 1000px;
      height: 600px;
      background: #fff;
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 30px 60px rgba(120, 100, 80, 0.35);
    }

    /* LEFT IMAGE */
    .image-side {
      position: relative;
      width: 50%;
      background: url('https://images.unsplash.com/photo-1602874801007-bd458bb1b8b6?auto=format&fit=crop&q=80&w=1000') center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-align: center;
    }

    .image-side::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(92, 74, 55, 0.45);
    }

    .image-content {
      position: relative;
      z-index: 1;
    }

    .image-content h1 {
      font-size: 3rem;
      letter-spacing: 4px;
      margin-bottom: 10px;
      text-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
    }

    .image-content p {
      font-size: 0.95rem;
      opacity: 0.9;
    }
    .form-side {
      width: 50%;
      padding: 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-header {
      margin-bottom: 35px;
    }

    .form-header h2 {
      margin: 0;
      font-size: 1.9rem;
      color: var(--text-dark);
    }

    .form-header p {
      margin-top: 6px;
      font-size: 0.9rem;
      color: var(--text-gray);
    }

    .input-group {
      margin-bottom: 25px;
      position: relative;
    }

    .input-group label {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 8px;
      display: block;
    }

    .input-group input {
      width: 100%;
      padding: 14px 15px 14px 45px;
      border-radius: 12px;
      border: 1.5px solid #D9CEC2;
      background: #FFFDF9;
      font-size: 0.9rem;
      outline: none;
      transition: 0.3s;
    }

    .input-group input:focus {
      border-color: var(--dark-color);
      background: #fff;
    }

    .input-group i {
      position: absolute;
      left: 16px;
      top: 43px;
      color: var(--text-gray);
    }

    .extra-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.85rem;
      color: var(--text-gray);
      margin-bottom: 30px;
    }

    .extra-options a {
      text-decoration: none;
      color: var(--text-gray);
    }

    .extra-options a:hover {
      text-decoration: underline;
    }

    .btn-login {
      width: 100%;
      padding: 15px;
      border-radius: 14px;
      border: none;
      background: var(--main-color);
      color: #fff;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 10px 25px rgba(158, 143, 125, 0.45);
    }

    .btn-login:hover {
      background: var(--dark-color);
      transform: translateY(-1px);
    }

    .footer-text {
      margin-top: 30px;
      text-align: center;
      font-size: 0.85rem;
      color: var(--text-gray);
    }

    .footer-text a {
      color: var(--dark-color);
      font-weight: 600;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    @media (max-width: 900px) {
      .login-container {
        flex-direction: column;
        height: auto;
      }

      .image-side {
        width: 100%;
        height: 220px;
      }

      .form-side {
        width: 100%;
        padding: 40px 25px;
      }
    }
  </style>
</head>

<body>

  <div class="login-container">

    <!-- IMAGE -->
    <div class="image-side">
      <div class="image-content">
        <h1>LUMORA</h1>
        <p>Each item is designed to bring warmth and peace into your space.</p>
      </div>
    </div>

    <!-- FORM -->
    <div class="form-side">
      <div class="form-header">
        <h2>Welcome Back</h2>
        <p>Masuk untuk menikmati ketenangan aroma</p>
      </div>

      <form action="login_cek.php" method="POST">

        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username" placeholder="Masukkan username" required>
          <i class="fa-solid fa-user"></i>
        </div>

        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password" placeholder="Masukkan password" required>
          <i class="fa-solid fa-lock"></i>
        </div>

        <button type="submit" class="btn-login">Login</button>
      </form>

    </div>

  </div>

</body>
</html>
