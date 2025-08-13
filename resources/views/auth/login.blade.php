<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | ePembelajaran</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=fallback" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #4facfe, #00f2fe);
    }
    .login-logo img {
      width: 100px;
      animation: spin 10s linear infinite;
    }
    @keyframes spin {
      from {transform: rotate(0deg);}
      to {transform: rotate(360deg);}
    }
    /* Tombol Registrasi Estetik */
    .btn-register {
      background: linear-gradient(45deg, #ff7eb3, #ff758c);
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 50px;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      transition: all 0.4s ease;
    }
    .btn-register:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(255, 120, 150, 0.7);
    }
    /* Ikon bergerak */
    .icon-animate {
      animation: floatIcon 2s ease-in-out infinite;
    }
    @keyframes floatIcon {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }
  </style>
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <!-- Logo -->
  <div class="login-logo">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNg0be14ESZF_YQwFcfM_AJ8JTAPy4cUtRdA&s" alt="Logo Sekolah" class="img-circle elevation-3 mb-2">
    <br>
    <a href="#"><b>e</b>Pembelajaran</a>
  </div>

  <!-- Login Card -->
  <div class="card shadow">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk ke akun Anda untuk melanjutkan</p>

      @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope text-primary icon-animate"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-primary icon-animate"></span>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">Ingat saya</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>

      <div class="text-center mt-3">
        <a href="{{ route('register.siswa.form') }}" class="btn-register">
          <i class="fas fa-user-plus me-1 icon-animate"></i> Daftar Siswa
        </a>
      </div>

      @if (Route::has('password.request'))
        <p class="mt-3 text-center">
          <a href="{{ route('password.request') }}">Lupa Password?</a>
        </p>
      @endif

    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Efek klik tombol -->
<script>
  document.querySelectorAll('.btn-register').forEach(btn => {
    btn.addEventListener('click', function() {
      this.style.transform = 'scale(0.9)';
      setTimeout(() => this.style.transform = 'scale(1)', 150);
    });
  });
</script>

</body>
</html>
