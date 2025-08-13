<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | ePembelajaran</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <!-- Font Awesome 4.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.awesome-markers/2.0.4/leaflet.awesome-markers.css" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f6f9;
      margin: 0;
    }
    .navbar {
      background-color: #0f4c81;
    }
    .navbar .nav-link, .navbar .btn {
      color: white !important;
    }
    .navbar .btn-warning {
      font-weight: 600;
      color: #000 !important;
    }
    .section-title {
      font-size: 2rem;
      font-weight: 700;
      position: relative;
      margin-bottom: 2rem;
    }
    .section-title::after {
      content: "";
      display: block;
      width: 60px;
      height: 4px;
      background: #ffc107;
      position: absolute;
      bottom: -10px;
      left: 0;
    }
    .small-box {
      border-radius: 12px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      color: white;
    }
    .small-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .small-box .icon {
      font-size: 2.5rem;
    }
    .btn-warning {
      font-weight: 600;
    }
    .form-control, .btn {
      border-radius: 8px;
    }
    footer {
      background-color: #0f4c81;
      color: white;
      padding: 1rem 0;
    }
    #map {
      width: 100%;
      height: 400px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    @media (max-width: 768px) {
      .display-4 {
        font-size: 1.8rem;
      }
    }
.logo-animasi {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  border: 4px solid #fff;
  box-shadow:
    0 0 10px rgba(255, 255, 255, 0.6),
    0 0 20px rgba(255, 255, 255, 0.4),
    0 0 30px rgba(0, 123, 255, 0.7); /* glow biru lembut */

  /* animation: muter 12s linear infinite; animasi putar lambat */

  transition: transform 0.5s ease, box-shadow 0.3s ease;
  cursor: pointer;
}

/* Hover efek: zoom dan glow lebih terang */
.logo-animasi:hover {
  transform: scale(1.1) rotate(10deg);
  box-shadow:
    0 0 15px rgba(255, 255, 255, 0.9),
    0 0 35px rgba(0, 123, 255, 0.9),
    0 0 50px rgba(0, 123, 255, 1);
}

/* Animasi putar */
@keyframes muter {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


@keyframes muter {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#"><i class="fa fa-graduation-cap me-2"></i>ePembelajaran</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
        <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
        <li class="nav-item"><a class="btn btn-warning ms-3" href="/login">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="py-5 text-center text-white" style="background: linear-gradient(to right, #1f4037, #99f2c8);">
  <div class="container">
 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNg0be14ESZF_YQwFcfM_AJ8JTAPy4cUtRdA&s" 
     alt="Logo Sekolah" 
     class="logo-animasi mb-3">

    <h1 class="display-4 fw-bold">Selamat Datang di Sistem Pembelajaran SMK 8 Negeri Padang</h1>
    <p class="lead">Belajar Lebih Cerdas, Interaktif, dan Kolaboratif Bersama Guru Terbaik.</p>
    <a href="#fitur" class="btn btn-warning mt-3">Jelajahi Sekarang</a>
  </div>
</section>

<!-- Fitur -->
<section id="fitur" class="py-5">
  <div class="container">
    <h2 class="section-title">Fitur Unggulan</h2>
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="small-box bg-info p-3 text-center">
          <div class="inner">
            <h5>Materi</h5>
            <p>Pelajaran interaktif</p>
          </div>
          <div class="icon"><i class="fa fa-book"></i></div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="small-box bg-success p-3 text-center">
          <div class="inner">
            <h5>Kuis</h5>
            <p>Kuis online otomatis</p>
          </div>
          <div class="icon"><i class="fa fa-question-circle"></i></div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="small-box bg-warning p-3 text-center">
          <div class="inner">
            <h5>Tugas</h5>
            <p>Penilaian cepat dan adil</p>
          </div>
          <div class="icon"><i class="fa fa-tasks"></i></div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="small-box bg-danger p-3 text-center">
          <div class="inner">
            <h5>Absensi</h5>
            <p>Absensi digital akurat</p>
          </div>
          <div class="icon"><i class="fa fa-calendar-check-o"></i></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Kontak -->
<section id="kontak" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title">Hubungi Kami</h2>
    <div class="row">
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nama">
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email">
          </div>
          <div class="mb-3">
            <textarea class="form-control" rows="4" placeholder="Pesan"></textarea>
          </div>
          <button type="submit" class="btn btn-warning text-dark">Kirim Pesan</button>
        </form>
      </div>
      <div class="col-md-6">
        <div id="map"></div>
      </div>
    </div>
  </div>
</section>

<!-- Penilaian -->
<section id="penilaian" class="py-5">
  <div class="container">
    <h2 class="section-title">Penilaian Website</h2>
    <form>
      <div class="mb-3">
        <label for="rating">Beri Penilaian</label>
        <select class="form-control" id="rating">
          <option selected>Pilih nilai</option>
          <option value="1">1 - Sangat Buruk</option>
          <option value="2">2 - Buruk</option>
          <option value="3">3 - Cukup</option>
          <option value="4">4 - Baik</option>
          <option value="5">5 - Sangat Baik</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="kritik">Kritik dan Saran</label>
        <textarea class="form-control" id="kritik" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>
</section>

<!-- Footer -->
<footer class="text-center">
  <strong>&copy; <span id="year"></span> SMK 8 Negeri Padang</strong> | All rights reserved.
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.awesome-markers/2.0.4/leaflet.awesome-markers.js"></script>

<script>
  // Tahun dinamis
  document.getElementById("year").textContent = new Date().getFullYear();

  // Inisialisasi peta
  var map = L.map('map').setView([-0.9495473780898953, 100.42088028571416], 17);
  L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Maxar, Earthstar Geographics',
    maxZoom: 19
  }).addTo(map);
  L.marker([-0.9495473780898953, 100.42088028571416])
    .addTo(map)
    .bindPopup(`
      <strong>Lokasi Tujuan</strong><br>
      Koordinat: -0.9499967, 100.415581<br>
      <a href="https://www.google.com/maps/dir/?api=1&destination=-0.9499967,100.415581" target="_blank" style="color:blue;">
        Klik untuk navigasi di Google Maps
      </a>
    `)
    .openPopup();
</script>

</body>
</html>
