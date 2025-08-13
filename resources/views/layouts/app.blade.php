<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Siswa</title>

    <!-- Tailwind CSS + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- DearFlip Flipbook Styles and Script -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dearflip@2.1.1/dist/jquery.dearflip.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dearflip@2.1.1/dist/jquery.dearflip.min.js"></script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS (Animate on Scroll) JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800, // animasi 800ms
        once: true     // hanya animasi sekali saat scroll
    });
</script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes shake {
            0%, 100% { transform: rotate(0); }
            25% { transform: rotate(8deg); }
            50% { transform: rotate(-8deg); }
            75% { transform: rotate(8deg); }
        }
        .animate-shake {
            animation: shake 1s infinite;
        }
    </style>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        danger: '#ef4444',
                        info: '#3b82f6',
                    },
                    boxShadow: {
                        glow: '0 0 15px rgba(99, 102, 241, 0.5)',
                    }
                }
            }
        }
    </script>
    <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

@yield('head') <!-- Untuk custom CSS dari setiap halaman -->

</head>
<body class="bg-gradient-to-br from-indigo-50 to-white dark:from-gray-900 dark:to-gray-800 transition-all duration-300 text-gray-800 dark:text-gray-100 font-sans">

    <!-- HEADER -->
    <header class="bg-white/80 dark:bg-gray-900/80 backdrop-blur sticky top-0 z-50 border-b border-gray-200 dark:border-gray-700 px-6 py-4 flex justify-between items-center shadow-md">
        <div class="flex items-center gap-4">
            <button id="toggleSidebar" class="md:hidden text-primary text-2xl">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-xl font-extrabold text-primary flex items-center gap-2">
                <i class="fas fa-graduation-cap text-indigo-600 dark:text-indigo-400 text-2xl"></i>
                Sistem Pembelajaran
            </h1>
        </div>

        <div class="flex items-center gap-3 text-sm">
            <div class="hidden md:block text-right">
                <div id="tanggal" class="text-indigo-700 dark:text-indigo-300 font-semibold"></div>
                <div id="jam" class="text-gray-500 dark:text-gray-300 text-sm"></div>
            </div>

            <!-- Dark Mode -->
            <button onclick="document.documentElement.classList.toggle('dark')" class="bg-gray-200 dark:bg-gray-700 p-2 rounded-full hover:scale-105 transition">
                <i class="fas fa-moon text-yellow-500 dark:text-white"></i>
            </button>

            <!-- User Info -->
            <span class="hidden md:inline font-semibold">👋 {{ auth()->user()->name }}</span>
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" class="w-9 h-9 rounded-full border-2 border-indigo-500 dark:border-indigo-300" />

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button class="ml-2 px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition flex items-center gap-1">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </header>

    @php $jumlahNotif = auth()->user()->unreadNotifications()->count(); @endphp

    <!-- MAIN LAYOUT -->
    <div class="flex min-h-screen overflow-hidden">
        <!-- SIDEBAR -->
        <aside id="sidebar" class="fixed md:static top-0 left-0 w-64 bg-white dark:bg-gray-900 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300 shadow-md border-r border-gray-200 dark:border-gray-700 p-5 space-y-4">
            <div class="border-b pb-4 mb-4 flex items-center gap-2">
                <i class="fas fa-user-graduate text-indigo-600 dark:text-indigo-300 text-xl"></i>
                <span class="text-lg font-bold text-indigo-700 dark:text-indigo-300">Siswa Panel</span>
            </div>
            <nav class="space-y-2 text-sm font-medium">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded bg-primary text-white hover:bg-indigo-700 transition">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('materi.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-800">
                    <i class="fas fa-book text-green-500"></i> Materi
                </a>
                <a href="{{ route('kuis.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-800">
                    <i class="fas fa-lightbulb text-yellow-400"></i> Kuis
                </a>
                <a href="{{ route('tugas.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-800">
                    <i class="fas fa-folder-open text-blue-500"></i> Tugas
                </a>
                <a href="{{ route('absensi.hari_ini') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-800">
                    <i class="fas fa-calendar-check text-pink-500"></i> Absensi
                </a>
                <a href="{{ route('notifikasi.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100 dark:hover:bg-gray-800 relative">
                    <i class="fas fa-bell {{ $jumlahNotif > 0 ? 'text-red-500 animate-shake' : 'text-gray-400' }}"></i>
                    Notifikasi
                    @if ($jumlahNotif > 0)
                        <span class="absolute -top-1 -right-2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full animate-bounce">
                            {{ $jumlahNotif }}
                        </span>
                    @endif
                </a>
            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-4 md:p-6 overflow-y-auto transition-all">
            @yield('content')
        </main>
    </div>

    <!-- TANGGAL & JAM -->
    <script>
        const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        const hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

        function updateClock() {
            const now = new Date();
            const h = hari[now.getDay()];
            const t = now.getDate();
            const b = bulan[now.getMonth()];
            const y = now.getFullYear();
            const jam = now.toLocaleTimeString('id-ID', { hour12: false });

            document.getElementById('tanggal').innerText = `${h}, ${t} ${b} ${y}`;
            document.getElementById('jam').innerText = `🕒 ${jam}`;
        }

        setInterval(updateClock, 1000);
        updateClock();
    </script>

    <!-- SIDEBAR TOGGLE -->
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });
    </script>
    <!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

@yield('scripts') <!-- Untuk custom script dari setiap halaman -->

</body>
</html>
