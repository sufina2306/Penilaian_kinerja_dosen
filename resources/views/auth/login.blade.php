<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #A3BFFA;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .logo {
            text-align: left;
            margin-bottom: 40px;
            width: 100%;
            margin-left: 250px;
        }
        .logo h1 {
            font-size: 36px;
            font-weight: 600;
            margin: 0;
        }
        .logo p {
            font-size: 18px;
            color: #6B7280;
            margin: 0;
        }
        .logo span{
            color: #0cce56;
            text-shadow: #E5E7EB;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        .login-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #E5E7EB;
            border-radius: 5px;
            font-size: 14px;
        }
        .input-group .forgot {
            text-align: right;
            font-size: 14px;
            color: #3B82F6;
            text-decoration: none;
        }
        .input-group .forgot:hover {
            text-decoration: underline;
        }
        .input-group .password-container {
            position: relative;
        }
        .input-group .password-container input {
            padding-right: 40px;
        }
        .input-group .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9CA3AF;
        }
        .login-button {
            background-color: #6366F1;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        .login-button:hover {
            background-color: #4F46E5;
        }
        .signup-link {
            margin-top: 20px;
            font-size: 14px;
        }
        .signup-link a {
            color: #3B82F6;
            text-decoration: none;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <h1>Penilaian<span>.</span></h1>
        <p>Kinerja Dosen</p>
    </div>
    <div class="container">
        <div class="login-title">Login to your account</div>
        
        <!-- Menampilkan pesan error jika ada -->
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="input-group">
                <label for="password">Password </label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <i class="fas fa-eye toggle-password"></i>
                </div>
                <a href="#" class="forgot pt-3" style="float: right;">Lupa Password?</a> <!-- Perubahan di sini -->
            </div>
            <button class="login-button">Login</button>
        </form>
        
        <div class="signup-link">
            Don't Have An Account? <a href="#">Sign Up</a>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
