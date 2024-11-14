<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rekam Medis Elektronik</title>
    <link rel="stylesheet" href="/assets/css/login.css"> <!-- Path ke file CSS -->
</head>
<body>
    <div class="login-container">
        <img src="/assets/images/logo.png" alt="Logo Unissula">
        <h1>Rekam Medis Elektronik</h1>
        <!-- Tampilkan pesan error jika ada -->
        <?php if (isset($error)): ?>
            <div style="color: red; margin-bottom: 15px; font-weight: bold; text-align: center;">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <form action="/login/authenticate" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <div class="footer">
            &copy; 2024 UTS Sistem Biomedis
        </div>
    </div>
</body>
</html>
