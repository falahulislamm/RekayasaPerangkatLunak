<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="{{asset('assets log/rel_icon_helpmatch.png')}}" rel="icon">
  <!-- Menambahkan Google Fonts untuk Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Menambahkan Font Awesome untuk ikon mata -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    /* Mengatur font seluruh halaman menjadi Poppins */
    body {
      font-family: 'Poppins';
      background: url('assets log/background_image.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .logo-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 15px;
    }
    .logo-container img {
      max-height: 60px;
      margin: 0 10px;
    }
    .logo-container img:first-child {
      max-height: 90px; /* Ganti dengan ukuran yang diinginkan */
    }
    /* Menambahkan gaya khusus untuk logo2 */
    .logo-container img:nth-child(2) {
      max-height: 80px; /* Ganti dengan ukuran yang diinginkan */
      margin-right: 40px;
    }
    /* Menambahkan gaya khusus untuk logo3 */
    .logo-container img:nth-child(3) {
      max-height: 60px; /* Ganti dengan ukuran yang diinginkan */
    }
    .login-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .login-container h3 {
      margin-bottom: 20px;
      font-weight: bold;
      color: #333;
    }
    /* Style label agar rata kiri dan input form */
    .form-label {
      text-align: left;
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }
    .form-control {
      width: 100%;
    }
    .btn-login {
      background-color: #ff5722;
      color: #fff;
      border: none;
    }
    .btn-login:hover {
      background-color: #e64a19;
    }
    footer {
      text-align: center;
      margin-top: 10px;
      color: #ccc;
      font-size: 14px;
    }
    .input-group-append {
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Logo di luar tabel login -->
  <div class="logo-container">
    <img style="visibility: hidden;" src="assets log/logo1.png" alt="Matrix Gym Logo">
    <img src="assets log/rel_icon_helpmatch.png" alt="X Logo" class="mr-5">
    <img style="visibility: hidden;" src="assets log/logo3.png" alt="Iron Labs Logo">
  </div>

  <!-- Tabel login -->
  <div class="login-container">
    <h3>Login</h3>
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
<div class="mb-3">
  <label for="email" class="form-label">{{ __('Email') }}</label>
  <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email"/>
  <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mb-3">
  <label for="password" class="form-label">{{ __('Password') }}</label>
  <div class="input-group">
    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
    <span class="input-group-text" id="show-password-btn">
      <i class="fas fa-eye"></i>
    </span>
  </div>
  <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>


      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
        </label>
      </div>

      <!-- Login Button -->
      <button type="submit" class="btn btn-login w-100">Sign in</button>

      <!-- Forgot Password Link -->
      @if (Route::has('password.request'))
        <p class="mt-3">
          <small>Forgot your password? <a href="{{ route('password.request') }}">Reset it</a></small>
          <br>
          <small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
        </p>
        
      @endif
    </form>
  </div>

  <!-- Copyright di luar tabel -->
  <footer>
    <small>Copyright &copy;2025 HelpMatch</small>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JavaScript untuk menangani show/hide password dengan ikon mata
    document.getElementById('show-password-btn').addEventListener('click', function () {
      const passwordField = document.getElementById('password');
      const icon = this.querySelector('i');

      // Toggle antara password dan text
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash'); // Ganti ikon mata menjadi mata tertutup
      } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye'); // Ganti ikon mata menjadi mata terbuka
      }
    });
  </script>
</body>
</html>