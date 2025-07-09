<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }
        .register-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
        }
        button {
            width: 100%;
            background-color: #10b981;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #059669;
        }
        .footer-text {
            margin-top: 15px;
            text-align: center;
            font-size: 0.9rem;
        }
        .footer-text a {
            color: #10b981;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Daftar Akun Baru</h2>
        <form action="/register" method="POST">
            <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Ulangi Kata Sandi</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit">Daftar</button>

            <div class="footer-text">
                Sudah punya akun? <a href="/login">Masuk di sini</a>
            </div>
        </form>
    </div>
</body>
</html>