@extends('layouts.app')

@section('head')
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animate On Scroll CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-TbdU3rpYoBz7cQSbXcJD8+fZUkPKUNMraVZyJYtgyY+r7v0dpeQWfS6EvKjCzV3kIuMY4X4nKKH8HHjMmZFVkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            scroll-behavior: smooth;
            background-color: #f8f9fa;
        }

        .materi-header {
            background: linear-gradient(90deg, #e0eaff, #ffffff, #eaf0ff);
            border-radius: 20px;
        }

        .materi-card {
            transition: all 0.3s ease-in-out;
            border-radius: 1rem;
            overflow: hidden;
            background: #ffffff;
        }

        .materi-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
        }

        .rounded-pill-small {
            font-size: 0.75rem;
            padding: 0.4rem 0.8rem;
        }

        .text-primary:hover {
            color: #0a58ca !important;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }

        .card-title a {
            transition: color 0.2s ease;
        }

        .card-title a:hover {
            color: #0d6efd;
            text-decoration: underline;
        }

        .placeholder-box {
            background-color: #f1f3f5;
            border-radius: 1rem;
            padding: 60px 20px;
        }

        @media (max-width: 576px) {
            .materi-header h2 {
                font-size: 1.75rem;
            }

            .fs-5 {
                font-size: 1rem !important;
            }
        }
    </style>
@endsection

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="p-5 materi-header shadow-sm text-center mb-5" data-aos="zoom-in">
        <h2 class="display-5 fw-bold text-primary mb-3">
            <i class="fas fa-book-reader me-2 text-info"></i> Materi Pembelajaran
        </h2>
        <p class="text-muted fs-5">Temukan materi terbaru dan pelajari dengan semangat setiap harinya! 📚</p>
    </div>

    <!-- Daftar Materi -->
    @if($materi->count() > 0)
        <div class="row g-4">
            @foreach($materi as $index => $m)
            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="card materi-card border-0 shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                          {{-- Icon --}}
                        <div class="materi-icon">
                            @if(!empty($m->icon))
                                <img src="{{ asset('storage/' . $m->icon) }}" alt="Icon Materi">
                            @elseif(!empty(optional($m->kategori)->icon))
                                <i class="{{ $m->kategori->icon }}"></i>
                            @else
                                <i class="fas fa-book"></i>
                            @endif
                        </div>
                        <!-- Judul Materi -->
                        <div>
                            <h5 class="card-title fw-bold text-primary mb-2">
                                <a href="{{ route('materi.show', $m->id) }}" class="text-decoration-none text-primary">
                                    {{ $m->judul }}
                                </a>
                            </h5>

                            <!-- Informasi Materi -->
                            <ul class="list-unstyled text-muted small mt-3">
                                <li class="mb-1">
                                    <i class="fas fa-calendar-alt me-2 text-secondary"></i>
                                    {{ $m->created_at->translatedFormat('d F Y') }}
                                </li>
                               <li class="mb-1 d-flex align-items-center gap-2">
    @php
        $iconClass = ($m->kategori && $m->kategori->icon) ? trim($m->kategori->icon) : 'fas fa-tag';
    @endphp
    



                                <li>
                                    <i class="fas fa-user me-2 text-success"></i>
                                    {{ $m->user->name ?? '(Guru tidak ditemukan)' }}
                                </li>
                            </ul>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="text-end mt-4">
                            <a href="{{ route('materi.show_siswa', $m->id) }}" class="btn btn-outline-primary rounded-pill">
                                <i class="fas fa-book-open me-1"></i> Baca Materi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <!-- Jika tidak ada materi -->
        <div class="placeholder-box text-center text-muted py-5" data-aos="fade-up">
            <i class="fas fa-inbox fa-5x mb-4 text-secondary"></i>
            <p class="fs-4 mb-0">Belum ada materi yang tersedia saat ini.</p>
            <p class="fs-6">Silakan cek kembali nanti ya 😊</p>
        </div>
    @endif
</div>
@endsection

@section('scripts')
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
@endsection
