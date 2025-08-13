@extends('layouts.app')

@section('content')
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-in-out;
        }
        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        .card-hover {
            transition: all 0.3s ease-in-out;
        }

        .card-hover:hover {
            transform: scale(1.03);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
            background-position: right center;
        }

        .icon-circle {
            background: white;
            padding: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
        }
    </style>

    <div class="space-y-10 fade-in" id="dashboard-content">

        {{-- Header --}}
        <div class="flex justify-between items-center flex-wrap gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-indigo-700 flex items-center gap-3">
                    <i class="fa-solid fa-graduation-cap text-indigo-600 text-3xl"></i> Dashboard Siswa
                </h1>
                <p class="text-gray-500 mt-1 text-sm">Selamat datang kembali, <strong>{{ auth()->user()->name }}</strong> 👋</p>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
                 class="w-24 h-24 rounded-full border-4 border-indigo-300 shadow-md hover:scale-105 transition duration-300 bg-white"
                 alt="Siswa">
        </div>

        {{-- Kartu Statistik --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 fade-in">

            <div class="p-5 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-xl card-hover">
                <div class="flex items-center gap-4">
                    <div class="icon-circle text-blue-600">
                        <i class="fas fa-book text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Materi</h4>
                        <p class="text-3xl font-extrabold">{{ \App\Models\Materi::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="p-5 rounded-xl bg-gradient-to-br from-purple-500 to-purple-700 text-white shadow-xl card-hover">
                <div class="flex items-center gap-4">
                    <div class="icon-circle text-purple-600">
                        <i class="fas fa-brain text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Kuis</h4>
                        <p class="text-3xl font-extrabold">{{ \App\Models\Kuis::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="p-5 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-xl card-hover">
                <div class="flex items-center gap-4">
                    <div class="icon-circle text-orange-600">
                        <i class="fas fa-folder-open text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Tugas</h4>
                        <p class="text-3xl font-extrabold">{{ \App\Models\Tugas::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="p-5 rounded-xl bg-gradient-to-br from-teal-500 to-teal-700 text-white shadow-xl card-hover">
                <div class="flex items-center gap-4">
                    <div class="icon-circle text-teal-600">
                        <i class="fas fa-calendar-check text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Absensi</h4>
                        <p class="text-3xl font-extrabold">{{ \App\Models\Absensi::where('user_id', auth()->id())->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grafik --}}
        <div class="bg-white p-6 mt-10 rounded-xl shadow-xl fade-in">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                📊 Grafik Statistik Aktivitas
            </h2>
            <canvas id="statistikChart" height="100"></canvas>
        </div>

    </div>

    {{-- Chart.js --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.fade-in').forEach(el => {
                setTimeout(() => {
                    el.classList.add('show');
                }, 100);
            });

            const ctx = document.getElementById('statistikChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Materi', 'Kuis', 'Tugas', 'Absensi'],
                    datasets: [{
                        label: 'Total',
                        data: [
                            {{ \App\Models\Materi::count() }},
                            {{ \App\Models\Kuis::count() }},
                            {{ \App\Models\Tugas::count() }},
                            {{ \App\Models\Absensi::where('user_id', auth()->id())->count() }}
                        ],
                        backgroundColor: ['#3b82f6', '#a855f7', '#fb923c', '#14b8a6'],
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection

@section('sidebar')
    <nav class="space-y-2 text-sm mt-6 bg-white p-4 rounded shadow-md">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded bg-indigo-100 text-indigo-900 font-semibold">🏠 Dashboard</a>
        <a href="{{ route('materi.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">📚 Materi</a>
        <a href="{{ route('kuis.index') }}" class="block px-4 py-2 rounded hover:bg-purple-100">🧠 Kuis</a>
        <a href="{{ route('tugas.index') }}" class="block px-4 py-2 rounded hover:bg-orange-100">📂 Tugas</a>
        <a href="{{ route('absensi.hari_ini') }}" class="block px-4 py-2 rounded hover:bg-teal-100">📅 Absensi</a>
        <a href="{{ route('notifikasi.index') }}" class="block px-4 py-2 rounded hover:bg-yellow-100">🔔 Notifikasi</a>
    </nav>
@endsection
