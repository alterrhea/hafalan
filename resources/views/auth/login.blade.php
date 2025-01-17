<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Hafalan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            padding: 30px;
            text-align: center;
            box-sizing: border-box;
        }

        .login-container h2 {
            font-size: 28px;
            color: #1d4ed8;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .login-container p {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: 500;
            color: #374151;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        .input-field:focus {
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        .login-btn {
            background: #3b82f6;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
        }

        .login-btn:hover {
            background: #2563eb;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
        }

        .footer {
            font-size: 12px;
            margin-top: 20px;
            color: #9ca3af;
        }

        .footer a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsivitas */
        @media (max-width: 480px) {
            .login-container {
                padding: 20px;
                width: 90%;
            }

            .login-container h2 {
                font-size: 24px;
            }

            .input-group label {
                font-size: 13px;
            }

            .input-field, .login-btn {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Silahkan Log In</h2>
        <p>Masukkan email dan password Anda</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}" class="input-field" autofocus>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required class="input-field">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Login Button -->
            <button type="submit" class="login-btn">Login</button>
        </form>
        <div class="footer">
            <p>Belum memiliki akun? <a href="#">Hubungi admin</a></p>
        </div>
    </div>
</body>
</html>
