<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="{{asset('assets log/rel_icon_helpmatch.png')}}" rel="icon">
  <!-- Menambahkan Google Fonts untuk Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Menambahkan Font Awesome untuk ikon mata -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden; /* Menghindari scroll vertikal */
}

body {
  font-family: 'Poppins';
  background: url('assets log/background_image.jpg') no-repeat center center fixed;
  background-size: cover;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center; /* Membuat form berada di tengah vertikal */
  align-items: center;
}

.logo-container {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 100%; /* Menjaga logo agar sesuai dengan layar */
}

.logo-container img:first-child {
      max-height: 60px; /* Ganti dengan ukuran yang diinginkan */
    }
    /* Menambahkan gaya khusus untuk logo2 */
    .logo-container img:nth-child(2) {
      max-height: 80px; /* Ganti dengan ukuran yang diinginkan */
      padding-right: 20px;
    }
    /* Menambahkan gaya khusus untuk logo3 */
    .logo-container img:nth-child(3) {
      max-height: 40px; /* Ganti dengan ukuran yang diinginkan */
    }

    .login-container {
  background-color: #fff;
  border-radius: 10px;
  padding: 20px;
  width: 100%;
  max-width: 400px; /* Memastikan lebar form tidak terlalu lebar */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  margin-top: 20px;
  overflow-y: auto; /* Memastikan konten tidak terpotong */
}

.login-container h3 {
  margin-bottom: 12px; /* Mengurangi margin bawah */
  font-weight: bold;
  color: #333;
  font-size: 18px; /* Mengurangi ukuran font judul */
}

.form-label {
  text-align: left;
  width: 100%;
  display: block;
  margin-bottom: 5px;
  font-size: 13px; /* Mengurangi ukuran font label */
}

.form-control {
  font-size: 13px; /* Mengurangi ukuran font input */
}

.btn-login {
  background-color: #ff5722;
  color: #fff;
  border: none;
  font-size: 13px; /* Mengurangi ukuran font tombol */
  padding: 8px 15px; /* Mengurangi padding tombol */
}

.btn-login:hover {
  background-color: #e64a19;
}

footer {
  position: fixed;
  bottom: 20px;
  width: 100%;
  text-align: center;
  color: #ccc;
  font-size: 12px;
}

.input-group-append {
  cursor: pointer;
}

input[type="text"], input[type="email"], input[type="password"] {
  font-size: 13px; /* Mengurangi ukuran font input */
  padding: 8px; /* Mengurangi padding input */
}

@media (max-width: 480px) {
  .logo-container img {
    max-height: 30px; /* Menurunkan ukuran logo lebih lanjut pada layar kecil */
  }

  .login-container {
    max-width: 90%; /* Lebar form lebih fleksibel pada perangkat kecil */
  }

  .btn-login {
    font-size: 12px; /* Ukuran tombol lebih kecil di perangkat kecil */
  }
}
  </style>
</head>
<body>
  <div class="logo-container mt-2">
    <img style="visibility: hidden;" src="{{ asset('assets log/logo1.png') }}" alt="Matrix Gym Logo">
    <img src="{{ asset('assets log/rel_icon_helpmatch.png') }}" alt="X Logo" class="mx-2">
    <img style="visibility: hidden;" src="{{ asset('assets log/logo3.png') }}" alt="Iron Labs Logo">
  </div>

  <!-- Perubahan pada login-container agar posisinya rata tengah -->
  <div class="login-container">
    <h3>Register</h3>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <!-- Username -->
      <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" value="{{ old('name') }}" required autofocus autocomplete="name">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="username">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required autocomplete="new-password">
          <span class="input-group-text" id="show-password-btn">
            <i class="fas fa-eye"></i> <!-- Ikon mata -->
          </span>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
          <span class="input-group-text" id="show-password-btn">
            <i class="fas fa-eye"></i> <!-- Ikon mata -->
          </span>
        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <button type="submit" class="btn btn-login w-100">Register</button>
    </form>

    <p class="mt-3">
      <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
    </p>
  </div>

  <footer>
    <small>Copyright &copy;2025 HelpMatch</small>
  </footer>

  <script>
    document.getElementById('show-password-btn').addEventListener('click', function () {
      const passwordField = document.getElementById('password');
      const icon = this.querySelector('i');

      // Toggle between password and text
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