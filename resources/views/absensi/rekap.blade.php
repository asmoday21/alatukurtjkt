<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">📊 Rekap Absensi</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Sesi</th>
                    <th class="px-4 py-2 border">Jumlah Hadir</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekap as $i => $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $i+1 }}</td>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                    <td class="px-4 py-2 border">{{ $item->nama_sesi }}</td>
                    <td class="px-4 py-2 border">{{ $item->kehadiran_count }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('absensi.detail', $item->id) }}" class="text-blue-600 underline">🔍 Lihat Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center text-gray-500">Tidak ada data absensi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4 flex gap-4">
    <a href="{{ route('absensi.export.excel') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">⬇️ Download Excel</a>
    <a href="{{ route('absensi.export.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">⬇️ Download PDF</a>
</div>

    </div>
</x-app-layout>
