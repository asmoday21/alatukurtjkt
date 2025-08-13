<!DOCTYPE html>
<html lang="id" x-data="{ open: false, profileDropdown: false }" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Guru</title>

  <!-- AlpineJS, ChartJS, Tailwind, FontAwesome -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fade-in 0.5s ease-out; }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.6; }
    }
    .animate-pulse { animation: pulse 2s infinite; }

    .sidebar-expand { width: 4rem; transition: width 0.3s ease; }
    .sidebar-expand:hover { width: 16rem; }
    .sidebar-expand:hover .nav-text { display: inline; }
    .nav-text { display: none; }

    .dark body { background: #1e293b; color: #f1f5f9; }
    .dark .bg-white { background-color: #334155 !important; }
    .dark .text-gray-800 { color: #e2e8f0 !important; }
    .dark .text-gray-500 { color: #94a3b8 !important; }
  </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-white min-h-screen text-gray-800 dark:text-gray-100 transition-all duration-300">

  <!-- Header -->
  <header class="bg-white/80 backdrop-blur shadow-md px-6 py-4 flex justify-between items-center sticky top-0 z-50 transition dark:bg-slate-800/80">
    <div class="flex items-center gap-4">
      <button @click="open = !open" class="md:hidden text-indigo-600 text-2xl hover:text-indigo-800 transition">
        <i class="fas fa-bars"></i>
      </button>
      <div>
        <h1 class="text-2xl font-bold flex items-center gap-2">
          <i class="fas fa-chalkboard-teacher text-indigo-600 animate-pulse"></i>
          Dashboard Guru
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-300">
          Selamat datang, <span class="text-indigo-600 font-semibold">{{ auth()->user()->name }}</span>
        </p>
      </div>
    </div>

    <div class="flex items-center gap-6">
      <label class="flex items-center cursor-pointer">
        <input type="checkbox" id="dark-mode-toggle" class="hidden">
        <div class="w-10 h-5 bg-gray-300 dark:bg-slate-600 rounded-full relative transition-colors duration-300"></div>
        <i class="fas fa-moon ml-2 text-gray-600 dark:text-gray-200"></i>
      </label>

      <div class="text-right hidden sm:block">
        <p class="text-sm text-gray-500 dark:text-gray-300">{{ now()->translatedFormat('l, d F Y') }}</p>
        <p id="liveClock" class="text-sm font-bold text-indigo-600 dark:text-indigo-400"></p>
      </div>

      <div class="relative">
        <button @click="profileDropdown = !profileDropdown" class="flex items-center gap-2 hover:text-indigo-700 transition">
          <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff" class="w-8 h-8 rounded-full shadow">
          <i class="fas fa-caret-down text-indigo-600"></i>
        </button>
        <div x-show="profileDropdown" @click.away="profileDropdown = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-700 text-gray-800 dark:text-white rounded-md shadow z-50 transition-all duration-200">
          <!-- <a href="{{ route('profile.show') }}" class="block px-4 py-3 text-sm hover:bg-gray-100 dark:hover:bg-slate-600"><i class="fas fa-user mr-2"></i> Profil</a> -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-100 dark:hover:bg-red-500/20">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Sidebar + Main Content -->
  <div class="flex">
    <!-- Sidebar -->
    <aside class="sidebar-expand hidden md:flex flex-col bg-indigo-900 text-white min-h-screen px-3 py-6 transition-all duration-300 shadow-lg">
      <!-- <h3 class="text-xl font-bold mb-6 pl-2">Navigasi</h3> -->
      <ul class="space-y-3 text-sm font-medium">
        <li><a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-home"></i><span class="nav-text">Dashboard</span></a></li>
        <li><a href="{{ route('materi.index') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-book-open"></i><span class="nav-text">Materi</span></a></li>
        <li><a href="{{ route('kuis.index') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-lightbulb"></i><span class="nav-text">Kuis</span></a></li>
        <li><a href="{{ route('tugas.index') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-tasks"></i><span class="nav-text">Tugas</span></a></li>
        <li><a href="{{ route('absensi.index') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-calendar-check"></i><span class="nav-text">Absensi</span></a></li>
        <li><a href="{{ route('statistik.index') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-chart-line"></i><span class="nav-text">Statistik</span></a></li>
        <li><a href="{{ route('users.index') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-users"></i><span class="nav-text">User</span></a></li>
        <li><a href="{{ route('aktivitas.index') }}" class="flex items-center gap-3 py-2 px-3 rounded hover:bg-indigo-800 transition"><i class="fas fa-history"></i><span class="nav-text">Aktivitas</span></a></li>
      </ul>
      <div class="mt-auto text-xs text-indigo-300 text-center pt-6">&copy; {{ now()->year }} ePembelajaran</div>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-6">
      <div class="bg-white rounded-xl shadow p-6 mb-6 animate-fade-in">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Halo 👋, <span class="text-indigo-600">{{ auth()->user()->name }}</span></h2>
        <p class="text-sm text-gray-500 dark:text-gray-300">Kelola kegiatan pembelajaran Anda di sini.</p>
      </div>

     <!-- Komponen Card Ringkasan Full Interaktif -->
<div 
  x-data="{
    cards: [
      { label: 'Total Materi', icon: 'book-open', color: 'indigo', value: {{ $materiCount }} },
      { label: 'Total Kuis', icon: 'lightbulb', color: 'pink', value: {{ $kuisCount }} },
      { label: 'Total Tugas', icon: 'tasks', color: 'teal', value: {{ $tugasCount }} },
      { label: 'Total Absensi', icon: 'calendar-check', color: 'yellow', value: {{ $absensiCount }} },
      { label: 'Total User', icon: 'users', color: 'purple', value: {{ $userCount }} }
    ]
  }" 
  class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8"
>
  <!-- Loop Card -->
  <template x-for="(card, index) in cards" :key="index">
    <div 
      class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300"
      x-data="{ count: 0 }"
      x-init="
        let start = 0;
        const step = Math.ceil(card.value / 30);
        let interval = setInterval(() => {
          if (start >= card.value) {
            count = card.value;
            clearInterval(interval);
          } else {
            start += step;
            count = start;
          }
        }, 30);
      "
    >
      <div class="absolute inset-0" :class='`bg-${card.color}-100`' style="opacity: 0.1;"></div>
      <div class="p-5 relative z-10">
        <div class="flex items-center justify-between mb-3">
          <div class="text-sm font-medium text-gray-500 dark:text-gray-400" x-text="card.label"></div>
          <i 
            :class='`fas fa-${card.icon} text-${card.color}-500`'
            class="text-2xl transform transition-transform duration-300 group-hover:scale-110"
          ></i>
        </div>
        <div 
          :class='`text-${card.color}-600 dark:text-${card.color}-400`'
          class="text-4xl font-extrabold"
          x-text="count"
        ></div>
      </div>
    </div>
  </template>

  <!-- Card Login Terakhir -->
  <div 
    class="relative overflow-hidden bg-white dark:bg-slate-800 rounded-xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300"
  >
    <div class="absolute inset-0 bg-red-100 opacity-10 hover:opacity-20 transition"></div>
    <div class="p-5 relative z-10">
      <div class="flex items-center justify-between mb-3">
        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Login Terakhir</div>
        <i class="fas fa-clock text-red-500 text-2xl animate-spin-slow"></i>
      </div>
      <div class="text-base font-medium text-red-500">
        {{ auth()->user()->last_login_at ? auth()->user()->last_login_at->diffForHumans() : 'Baru Saja' }}
      </div>
    </div>
  </div>
</div>


      <!-- Grafik -->
      <canvas id="statsChart" class="max-w-2xl mx-auto mt-10"></canvas>
    </main>
  </div>

  <!-- JS -->
  <script>
    function updateClock() {
      const now = new Date();
      document.getElementById('liveClock').textContent = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}:${now.getSeconds().toString().padStart(2, '0')}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    document.getElementById('dark-mode-toggle').addEventListener('change', () => {
      document.documentElement.classList.toggle('dark');
    });

    new Chart(document.getElementById('statsChart').getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['Materi', 'Kuis', 'Tugas', 'Absensi', 'User'],
        datasets: [{
          data: [{{ $materiCount }}, {{ $kuisCount }}, {{ $tugasCount }}, {{ $absensiCount }}, {{ $userCount }}],
          backgroundColor: ['#6366F1','#A855F7','#EC4899','#14B8A6','#4B5563'],
        }]
      },
      options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });
  </script>
</body>
</html>
