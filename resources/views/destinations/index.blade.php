@extends('layouts.app')

@section('title', 'Destinasi Wisata — Smart Trip Planner Aceh')

@section('content')

{{-- HERO SECTION --}}
<section style="background: linear-gradient(135deg, #111827 0%, #1a3d2b 100%); padding: 60px 0 50px;">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7">
                <span class="badge mb-3" style="background:#1a7a4a; font-size:0.8rem; padding:6px 14px; border-radius:20px;">
                    <i class="bi bi-geo-alt-fill me-1"></i> Wisata Aceh
                </span>
                <h1 class="fw-700 text-white mb-3" style="font-size:2.2rem; line-height:1.3">
                    Temukan Destinasi Wisata <br>
                    <span style="color:#4ade80">Terbaik di Aceh</span>
                </h1>
                <p class="text-secondary mb-4" style="font-size:1rem">
                    Jelajahi keindahan alam, budaya, dan kuliner Aceh. Susun itinerary perjalananmu dengan mudah.
                </p>

                {{-- SEARCH BAR --}}
                <form action="{{ url('/destinations') }}" method="GET">
                    <div class="d-flex gap-2 justify-content-center">
                        <div class="input-group" style="max-width: 480px;">
                            <span class="input-group-text bg-white border-0">
                                <i class="bi bi-search text-secondary"></i>
                            </span>
                            <input type="text"
                                   name="search"
                                   class="form-control border-0 shadow-none"
                                   placeholder="Cari destinasi wisata..."
                                   value="{{ request('search') }}"
                                   style="font-size:0.95rem">
                            <button class="btn btn-primary px-4" type="submit">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

{{-- FILTER KATEGORI --}}
<section class="py-4" style="background:#fff; border-bottom: 1px solid #e5e7eb;">
    <div class="container">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="text-secondary me-2" style="font-size:0.875rem; font-weight:600">Filter:</span>

            <a href="{{ url('/destinations') }}"
               class="btn btn-sm {{ !request('category_id') ? 'btn-primary' : 'btn-outline-secondary' }}"
               style="border-radius:20px; font-size:0.8rem">
                Semua
            </a>

            {{-- Loop kategori — nanti dari $categories (controller) --}}
            @php
                $categories = [
                    ['id' => 1, 'name' => 'Pantai'],
                    ['id' => 2, 'name' => 'Pegunungan'],
                    ['id' => 3, 'name' => 'Sejarah & Budaya'],
                    ['id' => 4, 'name' => 'Taman & Alam'],
                    ['id' => 5, 'name' => 'Kuliner'],
                ];
            @endphp

            @foreach($categories as $cat)
                <a href="{{ url('/destinations') }}?category_id={{ $cat['id'] }}"
                   class="btn btn-sm {{ request('category_id') == $cat['id'] ? 'btn-primary' : 'btn-outline-secondary' }}"
                   style="border-radius:20px; font-size:0.8rem">
                    {{ $cat['name'] }}
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- DAFTAR DESTINASI --}}
<section class="py-5">
    <div class="container">

        {{-- Info hasil --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-600 mb-0" style="font-size:1.1rem">
                    @if(request('search'))
                        Hasil pencarian: <span class="text-success">"{{ request('search') }}"</span>
                    @else
                        Semua Destinasi Wisata
                    @endif
                </h5>
                <small class="text-secondary">Menampilkan destinasi wisata di Aceh</small>
            </div>
        </div>

        {{-- MOCK DATA — nanti diganti dengan $destinations dari controller --}}
        @php
            $destinations = [
                ['id'=>1,'name'=>'Pantai Lhoknga','description'=>'Pantai berpasir putih dengan ombak yang cocok untuk surfing.','image_url'=>'/images/lhoknga.jpg','location'=>'Aceh Besar','category'=>'Pantai','entry_fee'=>10000],
                ['id'=>2,'name'=>'Pantai Lampuuk','description'=>'Pantai indah dengan pasir putih dan air jernih.','image_url'=>'/images/lampuuk.jpg','location'=>'Aceh Besar','category'=>'Pantai','entry_fee'=>10000],
                ['id'=>3,'name'=>'Masjid Raya Baiturrahman','description'=>'Ikon kota Banda Aceh dengan arsitektur megah.','image_url'=>'/images/baiturrahman.jpg','location'=>'Banda Aceh','category'=>'Sejarah & Budaya','entry_fee'=>0],
                ['id'=>4,'name'=>'Museum Tsunami Aceh','description'=>'Museum peringatan bencana tsunami 2004.','image_url'=>'/images/tsunami.jpg','location'=>'Banda Aceh','category'=>'Sejarah & Budaya','entry_fee'=>0],
                ['id'=>5,'name'=>'Gunung Seulawah Agam','description'=>'Gunung berapi aktif yang populer untuk pendakian.','image_url'=>'/images/seulawah.jpg','location'=>'Aceh Besar','category'=>'Pegunungan','entry_fee'=>25000],
                ['id'=>6,'name'=>'Taman Sari Gunongan','description'=>'Taman bersejarah peninggalan Kerajaan Aceh.','image_url'=>'/images/gunongan.jpg','location'=>'Banda Aceh','category'=>'Sejarah & Budaya','entry_fee'=>5000],
                ['id'=>7,'name'=>'Hutan Mangrove Langsa','description'=>'Kawasan hutan mangrove dengan jembatan kayu 2 km.','image_url'=>'/images/mangrove.jpg','location'=>'Langsa','category'=>'Taman & Alam','entry_fee'=>15000],
                ['id'=>8,'name'=>'Mie Aceh Razali','description'=>'Warung mie Aceh legendaris yang sudah berdiri puluhan tahun.','image_url'=>'/images/mieaceh.jpg','location'=>'Banda Aceh','category'=>'Kuliner','entry_fee'=>0],
            ];
        @endphp

        @if(count($destinations) > 0)
            <div class="row g-4">
                @foreach($destinations as $dest)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card card-destinasi h-100">

                            {{-- Gambar --}}
                            <div style="position:relative">
                                <img src="{{ $dest['image_url'] ?? 'https://picsum.photos/600/400?grayscale' }}"
                                     class="card-img-top"
                                     alt="{{ $dest['name'] }}">
                                {{-- Badge gratis --}}
                                @if($dest['entry_fee'] == 0)
                                    <span class="position-absolute top-0 end-0 m-2 badge"
                                          style="background:#1a7a4a; border-radius:20px; font-size:0.7rem">
                                        Gratis
                                    </span>
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column">
                                {{-- Kategori --}}
                                <span class="badge-category mb-2 d-inline-block">
                                    {{ $dest['category'] }}
                                </span>

                                {{-- Nama --}}
                                <h6 class="fw-700 mb-1" style="font-size:0.95rem">
                                    {{ $dest['name'] }}
                                </h6>

                                {{-- Lokasi --}}
                                <small class="text-secondary mb-2">
                                    <i class="bi bi-geo-alt me-1"></i>{{ $dest['location'] }}
                                </small>

                                {{-- Deskripsi --}}
                                <p class="text-secondary mb-3" style="font-size:0.82rem; line-height:1.5;
                                   display:-webkit-box; -webkit-line-clamp:2;
                                   -webkit-box-orient:vertical; overflow:hidden">
                                    {{ $dest['description'] }}
                                </p>

                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    {{-- Harga --}}
                                    <span style="font-size:0.85rem; font-weight:700; color:#1a7a4a">
                                        @if($dest['entry_fee'] == 0)
                                            Gratis
                                        @else
                                            Rp {{ number_format($dest['entry_fee'], 0, ',', '.') }}
                                        @endif
                                    </span>

                                    {{-- Tombol detail --}}
                                    <a href="{{ url('/destinations/' . $dest['id']) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       style="font-size:0.8rem; border-radius:8px">
                                        Detail <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        @else
            {{-- EMPTY STATE --}}
            <div class="text-center py-5">
                <i class="bi bi-search" style="font-size:3rem; color:#cbd5e1"></i>
                <h5 class="mt-3 text-secondary">Destinasi tidak ditemukan</h5>
                <p class="text-secondary" style="font-size:0.875rem">
                    Coba kata kunci lain atau hapus filter kategori
                </p>
                <a href="{{ url('/destinations') }}" class="btn btn-outline-primary mt-2">
                    Lihat semua destinasi
                </a>
            </div>
        @endif

    </div>
</section>

@endsection
