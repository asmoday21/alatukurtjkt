@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded-2xl shadow-2xl animate-fade-in my-6">

    {{-- Header Materi --}}
    <div class="mb-6 flex flex-wrap justify-between items-center gap-3">
        <h2 class="text-4xl font-extrabold text-indigo-700 flex items-center gap-3 relative">
            <i class="fas fa-book-open text-indigo-500 animate-fly" style="--fly-delay: 0s;"></i>
            {{ $materi->judul }}
            <i class="fas fa-star text-indigo-400 animate-fly" style="--fly-delay: 0.3s;"></i>
            <i class="fas fa-feather-alt text-indigo-300 animate-fly" style="--fly-delay: 0.6s;"></i>
        </h2>
        <span class="text-sm text-gray-400 font-semibold tracking-wide">
            📅 {{ $materi->created_at->translatedFormat('d F Y') }}
        </span>
    </div>

    {{-- Info Kategori & Guru --}}
    <div class="mb-6 text-sm text-gray-600 flex flex-wrap items-center gap-5">
        @if ($materi->kategori)
            <span class="bg-indigo-100 text-indigo-800 px-4 py-1 rounded-full text-xs font-semibold shadow-sm">
                🏷️ {{ $materi->kategori->nama }}
            </span>
        @endif
        @if ($materi->user)
            <span class="italic text-indigo-600 font-medium">✍️ oleh {{ $materi->user->name }}</span>
        @endif
    </div>

    {{-- Deskripsi --}}
    @if($materi->deskripsi)
        <p class="text-gray-700 leading-relaxed mb-8 whitespace-pre-line text-lg tracking-wide">{{ $materi->deskripsi }}</p>
    @endif

    {{-- Preview File PDF/PPT --}}
    @if($materi->file_pdf && file_exists(public_path('storage/' . $materi->file_pdf)))
        @php
            $fileUrl = asset('storage/' . $materi->file_pdf);
            $extension = strtolower(pathinfo($materi->file_pdf, PATHINFO_EXTENSION));
        @endphp
        <div class="space-y-4 mb-10 rounded-xl border border-indigo-200 shadow-lg overflow-hidden">
            <h3 class="text-2xl font-semibold text-blue-700 flex items-center gap-3 bg-blue-50 px-6 py-4 rounded-t-xl">
                <i class="fas fa-file-alt animate-pulse"></i> Preview Materi
            </h3>

            @if($extension === 'pdf')
                <iframe src="{{ asset('pdfjs/web/viewer.html') }}?file={{ urlencode($fileUrl) }}"
                        class="w-full h-[600px] border-t border-indigo-100"></iframe>
            @elseif(in_array($extension, ['ppt', 'pptx']))
                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode($fileUrl) }}"
                        class="w-full h-[600px] border-t border-indigo-100"></iframe>
            @else
                <p class="text-yellow-600 italic p-6">⚠️ Format file tidak didukung untuk preview. Silakan unduh file.</p>
            @endif

            <div class="text-right bg-blue-50 p-4 rounded-b-xl">
                <a href="{{ $fileUrl }}" target="_blank"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow-lg transition">
                    📥 Download File
                </a>
            </div>
        </div>
    @endif

    {{-- Paragraf Materi --}}
    @if($materi->paragraf->count())
        <div class="space-y-10 mb-12">
            @foreach($materi->paragraf as $paragraf)
                <article class="p-6 border border-indigo-200 rounded-2xl bg-indigo-50 shadow-sm hover:shadow-md transition-shadow duration-300">
                    {{-- Teks --}}
                    @if($paragraf->teks)
                        <p class="text-indigo-900 leading-relaxed mb-4 whitespace-pre-line text-lg tracking-wide">{{ $paragraf->teks }}</p>
                    @endif

                    {{-- Gambar --}}
                    @if($paragraf->gambar && file_exists(public_path('storage/' . $paragraf->gambar)))
                        <figure class="mb-6 overflow-hidden rounded-xl shadow-lg hover:scale-105 transform transition-transform duration-300 cursor-pointer">
                            <img src="{{ asset('storage/' . $paragraf->gambar) }}" 
                                 alt="Gambar Paragraf" 
                                 class="max-w-full object-cover w-full h-auto" loading="lazy" />
                        </figure>
                    @endif

                    {{-- Video --}}
                    @if($paragraf->video)
                        @php
                            $videoUrl = $paragraf->video;
                            $embedVideo = $videoUrl;

                            if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $videoUrl, $matches)) {
                                $embedVideo = 'https://www.youtube.com/embed/' . $matches[1];
                            } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $videoUrl, $matches)) {
                                $embedVideo = 'https://www.youtube.com/embed/' . $matches[1];
                            }
                        @endphp
                        <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden shadow-lg">
                            <iframe src="{{ $embedVideo }}" frameborder="0" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    @endif
                </article>
            @endforeach
        </div>
    @endif

    {{-- Poin Penting --}}
    @if($materi->poin_penting)
        <section class="mb-12">
            <h3 class="text-2xl font-bold text-indigo-700 mb-4 border-b-2 border-indigo-400 pb-2">📌 Poin Penting</h3>
            <ul class="list-disc list-inside text-indigo-800 leading-relaxed whitespace-pre-line text-lg tracking-wide">
                @foreach(preg_split('/\r\n|\r|\n/', $materi->poin_penting) as $poin)
                    @if(trim($poin) !== '')
                        <li>{{ trim($poin) }}</li>
                    @endif
                @endforeach
            </ul>
        </section>
    @endif

    {{-- Kesimpulan --}}
    @if($materi->kesimpulan)
        <section class="mb-12">
            <h3 class="text-2xl font-bold text-green-700 mb-4 border-b-2 border-green-400 pb-2">✅ Kesimpulan</h3>
            <p class="text-green-900 leading-relaxed whitespace-pre-line text-lg tracking-wide">{{ $materi->kesimpulan }}</p>
        </section>
    @endif

    <hr class="my-12 border-indigo-300">

    {{-- Komentar --}}
    <section class="space-y-8">
        <h3 class="font-extrabold text-2xl text-gray-900 mb-4 flex items-center gap-3">
            💬 Diskusi & Komentar
            <i class="fas fa-comments text-blue-500 animate-bounce"></i>
        </h3>

        {{-- Form komentar --}}
        <form method="POST" action="{{ route('komentar.store', $materi->id) }}" class="space-y-4">
            @csrf
            <textarea name="isi" rows="4" 
                      class="w-full border border-gray-300 p-4 rounded-xl resize-none shadow-md focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" 
                      placeholder="Tulis komentar yang membangun..." required></textarea>
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl shadow-lg font-semibold transition transform hover:-translate-y-1 active:scale-95">
                💬 Kirim Komentar
            </button>
        </form>

        {{-- Daftar komentar --}}
        <div class="mt-8 max-h-96 overflow-y-auto space-y-5 scrollbar-thin scrollbar-thumb-indigo-400 scrollbar-track-indigo-100 pr-2">
            @forelse($materi->komentars()->latest()->get() as $komentar)
                <div class="p-5 border border-indigo-200 rounded-2xl bg-indigo-50 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex justify-between items-center mb-2">
                        <strong class="text-indigo-700 font-semibold">{{ $komentar->user->name }}</strong>
                        <time class="text-xs text-gray-400 italic" title="{{ $komentar->created_at->format('d M Y, H:i') }}">
                            {{ $komentar->created_at->diffForHumans() }}
                        </time>
                    </div>
                    <p class="text-indigo-900 whitespace-pre-line text-lg">{{ $komentar->isi }}</p>
                </div>
            @empty
                <p class="text-sm text-gray-500 italic">Belum ada komentar.</p>
            @endforelse
        </div>
    </section>
</div>

{{-- CSS tambahan --}}
<style>
    /* Fade in animation */
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fade-in 0.7s ease-out both; }

    /* Aspect ratio for iframe */
    .aspect-w-16 {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 */
    }
    .aspect-w-16 iframe {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        border-radius: 1rem;
    }

    /* Scrollbar custom for modern browsers */
    .scrollbar-thin {
        scrollbar-width: thin;
        scrollbar-color: #818cf8 #e0e7ff;
    }
    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    .scrollbar-thin::-webkit-scrollbar-track {
        background: #e0e7ff;
        border-radius: 10px;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background-color: #818cf8;
        border-radius: 10px;
        border: 2px solid #e0e7ff;
    }

    /* Icon fly animation */
    @keyframes fly {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        50% {
            transform: translateY(-12px) rotate(10deg);
            opacity: 0.7;
        }
        100% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
    }
    .animate-fly {
        animation: fly 3s ease-in-out infinite;
        animation-delay: var(--fly-delay, 0s);
    }
</style>
@endsection
