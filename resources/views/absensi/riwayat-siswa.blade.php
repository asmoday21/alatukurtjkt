<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">📆 Riwayat Absensi</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        @forelse ($absensi as $data)
            <div class="border p-4 rounded shadow">
                <div><strong>Sesi:</strong> {{ $data->nama_sesi }}</div>
                <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d M Y') }}</div>
                <div>
                    <strong>Status:</strong>
                    @if ($data->kehadiran->count() > 0)
                        <span class="text-green-600 font-semibold">✅ Hadir</span>
                        <span class="ml-2 text-sm text-gray-600">({{ $data->kehadiran->first()->waktu_hadir }})</span>
                    @else
                        <span class="text-red-600 font-semibold">❌ Tidak Hadir</span>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada data absensi.</p>
        @endforelse
    </div>
</x-app-layout>
