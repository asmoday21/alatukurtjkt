<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Siswa | ePembelajaran</title>

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
    .register-logo img {
      width: 100px;
      animation: spin 10s linear infinite;
    }
    @keyframes spin {
      from {transform: rotate(0deg);}
      to {transform: rotate(360deg);}
    }
  </style>
</head>
<body class="hold-transition register-page">

<div class="register-box">
  <!-- Logo -->
  <div class="register-logo">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNg0be14ESZF_YQwFcfM_AJ8JTAPy4cUtRdA&s" alt="Logo Sekolah" class="img-circle elevation-3 mb-2">
    <br>
    <a href="#"><b>e</b>Pembelajaran</a>
  </div>

  <!-- Register Card -->
  <div class="card shadow">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrasi Akun Siswa</p>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register.siswa') }}" method="POST">
        @csrf

        <!-- Nama Lengkap -->
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user text-primary"></span></div>
          </div>
        </div>

        <!-- Email -->
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope text-primary"></span></div>
          </div>
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock text-primary"></span></div>
          </div>
        </div>

        <!-- Konfirmasi Password -->
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock text-primary"></span></div>
          </div>
        </div>

        <!-- Button -->
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Daftar</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1 text-center">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
      </p>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
