@extends('layouts.guru')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-indigo-800 flex items-center gap-3">
                <i class="fas fa-chart-pie text-indigo-500 animate-pulse"></i> Statistik Interaktif
            </h2>
            <p class="text-sm text-gray-500">Visualisasi perbandingan data <strong>Materi</strong>, <strong>Tugas</strong>, dan <strong>Kuis</strong>.</p>
        </div>
    </div>

    {{-- Chart Container --}}
    <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-3xl shadow-xl p-8">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            {{-- Chart --}}
            <div class="relative">
                <canvas id="statistikChart" class="w-full max-w-md mx-auto"></canvas>
            </div>

            {{-- Legend Custom --}}
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-gray-800">📌 Keterangan Statistik</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 bg-blue-500 rounded-full shadow-md"></span> Jumlah Materi: <strong>{{ $data['materi'] }}</strong>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 bg-yellow-400 rounded-full shadow-md"></span> Jumlah Tugas: <strong>{{ $data['tugas'] }}</strong>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 bg-purple-600 rounded-full shadow-md"></span> Jumlah Kuis: <strong>{{ $data['kuis'] }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statistikChart').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Materi', 'Tugas', 'Kuis'],
            datasets: [{
                label: 'Jumlah Data',
                data: [{{ $data['materi'] }}, {{ $data['tugas'] }}, {{ $data['kuis'] }}],
                backgroundColor: ['#3b82f6', '#facc15', '#8b5cf6'],
                borderColor: '#fff',
                borderWidth: 2,
                hoverOffset: 20,
            }]
        },
        options: {
            responsive: true,
            cutout: '55%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#1e293b',
                    titleColor: '#f8fafc',
                    bodyColor: '#cbd5e1',
                    bodyFont: {
                        weight: 'bold'
                    },
                    callbacks: {
                        label: context => `${context.label}: ${context.raw} data`
                    }
                }
            }
        }
    });
</script>
@endsection
