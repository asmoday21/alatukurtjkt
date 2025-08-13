<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
            🔔 Notifikasi
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            @forelse ($notifikasi as $notif)
                <div class="bg-white border-l-4 border-blue-500 shadow-sm rounded-lg p-5 transition hover:shadow-md">
                    <div class="flex items-start gap-3">
                        <div class="text-blue-500 text-xl">
                            <i class="fas fa-bell animate-pulse"></i>
                        </div>
                        <div>
                            <p class="text-gray-800 text-base">
                                {{ $notif->data['pesan'] ?? '[Pesan kosong]' }}
                            </p>
                            <span class="text-sm text-gray-500">
                                {{ $notif->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-10 text-gray-500">
                    <i class="fas fa-inbox text-4xl mb-2"></i>
                    <p class="text-lg">Tidak ada notifikasi ditemukan.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
