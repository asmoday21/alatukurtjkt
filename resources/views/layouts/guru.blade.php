<!DOCTYPE html>
<html lang="id" x-data="{ open: false }">

<style>
/* Animasi ikon mengambang */
.icon-float {
  animation: float 3s ease-in-out infinite;
}
@keyframes float {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-8px) rotate(5deg); }
}

/* Efek teks gradien */
.text-gradient {
  background: linear-gradient(90deg, #4facfe, #00f2fe);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Animasi fade in */
.fade-in {
  animation: fadeIn 1.2s ease forwards;
  opacity: 0;
}
@keyframes fadeIn {
  to { opacity: 1; }
}
</style>



<head>
    <meta charset="UTF-8">
    <title>Guru - ePembelajaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- DearFlip CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dearflip/dist/jquery.flipbook.min.css">

    <!-- DearFlip JS & jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dearflip/dist/jquery.flipbook.min.js"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-white text-gray-800">

    <!-- HEADER -->
    <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold flex items-center gap-2">
            <i class="fas fa-chalkboard-teacher text-indigo-600"></i> Dashboard Guru
        </h1>
        <div class="text-right">
            <p class="text-sm text-gray-500">{{ now()->translatedFormat('l, d F Y') }}</p>
            <p class="text-sm font-bold text-indigo-600" id="liveClock"></p>
        </div>
    </header>

    <!-- MOBILE MENU -->
    <div x-show="open" class="md:hidden bg-white border-t shadow-md">
        <a href="{{ route('dashboard') }}" class="block px-6 py-3 hover:bg-gray-100">Dashboard</a>
        <a href="{{ route('profile.show') }}" class="block px-6 py-3 hover:bg-gray-100">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="block w-full text-left px-6 py-3 text-red-600 hover:bg-red-50">Logout</button>
        </form>
    </div>

    <div class="flex">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-gradient-to-b from-indigo-900 to-indigo-700 text-white p-6 hidden md:flex flex-col justify-between min-h-screen">
            <div>
             <h3 class="text-2xl font-bold mb-6">
  <i class="fas fa-graduation-cap text-primary mr-2"></i> E-Pembelajaran
</h3>

                <ul class="space-y-3 text-sm font-semibold">
                    <li><a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:bg-indigo-700 px-3 py-2 rounded"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="{{ route('materi.index') }}" class="flex items-center gap-2 hover:bg-indigo-600 px-3 py-2 rounded"><i class="fas fa-book-open"></i> Materi</a></li>
                    <li><a href="{{ route('kuis.index') }}" class="flex items-center gap-2 hover:bg-indigo-600 px-3 py-2 rounded"><i class="fas fa-lightbulb"></i> Kuis</a></li>
                    <li><a href="{{ route('tugas.index') }}" class="flex items-center gap-2 hover:bg-indigo-600 px-3 py-2 rounded"><i class="fas fa-tasks"></i> Tugas</a></li>
                    <li><a href="{{ route('absensi.index') }}" class="flex items-center gap-2 hover:bg-indigo-600 px-3 py-2 rounded"><i class="fas fa-calendar-check"></i> Absensi</a></li>
                    <li><a href="{{ route('statistik.index') }}" class="flex items-center gap-2 hover:bg-indigo-600 px-3 py-2 rounded"><i class="fas fa-chart-line"></i> Statistik</a></li>
                    <li><a href="{{ route('users.index') }}" class="flex items-center gap-2 hover:bg-indigo-600 px-3 py-2 rounded"><i class="fas fa-users"></i> Manajemen User</a></li>
                    <li><a href="{{ route('aktivitas.index') }}" class="flex items-center gap-2 hover:bg-indigo-600 px-3 py-2 rounded"><i class="fas fa-history"></i> Aktivitas</a></li>
                </ul>
            </div>
            <div class="text-xs text-center text-indigo-200 mt-4">&copy; {{ now()->year }} ePembelajaran</div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Live Clock Script -->
    <script>
        function updateClock() {
            const now = new Date();
            document.getElementById('liveClock').textContent =
                now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
