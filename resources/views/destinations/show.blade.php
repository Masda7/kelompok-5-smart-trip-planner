@extends('layouts.app')

@section('title', 'Detail Destinasi — Smart Trip Planner Aceh')

@push('styles')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map {
        height: 320px;
        border-radius: 14px;
        z-index: 0;
    }
</style>
@endpush

@section('content')

@php
$destinations = [
    1 => ['id'=>1,'name'=>'Pantai Lhoknga','description'=>'Pantai berpasir putih dengan ombak yang cocok untuk surfing.','image_url'=>'/images/lhoknga.jpg','location'=>'Aceh Besar','latitude'=>5.4707,'longitude'=>95.2366,'category'=>'Pantai','entry_fee'=>10000],
    2 => ['id'=>2,'name'=>'Pantai Lampuuk','description'=>'Pantai indah dengan pasir putih dan air jernih.','image_url'=>'/images/lampuuk.jpg','location'=>'Aceh Besar','latitude'=>5.5100,'longitude'=>95.2320,'category'=>'Pantai','entry_fee'=>10000],
    3 => ['id'=>3,'name'=>'Masjid Raya Baiturrahman','description'=>'Ikon kota Banda Aceh dengan arsitektur megah sejak abad ke-17.','image_url'=>'/images/baiturrahman.jpg','location'=>'Banda Aceh','latitude'=>5.5535,'longitude'=>95.3178,'category'=>'Sejarah & Budaya','entry_fee'=>0],
    4 => ['id'=>4,'name'=>'Museum Tsunami Aceh','description'=>'Museum peringatan bencana tsunami 2004.','image_url'=>'/images/tsunami.jpg','location'=>'Banda Aceh','latitude'=>5.5483,'longitude'=>95.3174,'category'=>'Sejarah & Budaya','entry_fee'=>0],
    5 => ['id'=>5,'name'=>'Gunung Seulawah Agam','description'=>'Gunung berapi aktif yang populer untuk pendakian.','image_url'=>'/images/seulawah.jpg','location'=>'Aceh Besar','latitude'=>5.4477,'longitude'=>95.6318,'category'=>'Pegunungan','entry_fee'=>25000],
    6 => ['id'=>6,'name'=>'Taman Sari Gunongan','description'=>'Taman bersejarah peninggalan Kerajaan Aceh.','image_url'=>'/images/gunongan.jpg','location'=>'Banda Aceh','latitude'=>5.5547,'longitude'=>95.3194,'category'=>'Sejarah & Budaya','entry_fee'=>5000],
    7 => ['id'=>7,'name'=>'Hutan Kota BNI','description'=>'Hutan kota BNI.','image_url'=>'/images/hutankota.jpg','location'=>'Banda Aceh','latitude'=>4.4689,'longitude'=>97.9674,'category'=>'Taman & Alam','entry_fee'=>15000],
    8 => ['id'=>8,'name'=>'Mie Aceh Razali','description'=>'Warung mie Aceh legendaris yang sudah berdiri puluhan tahun.','image_url'=>'/images/mierajali.jpg','location'=>'Banda Aceh','latitude'=>5.5490,'longitude'=>95.3190,'category'=>'Kuliner','entry_fee'=>0],
];

$id = request()->segment(2); // ambil ID dari URL
$destination = $destinations[$id] ?? $destinations[1]; // fallback ke ID 1
@endphp

{{-- FOTO BESAR --}}
<div style="width:100%; height:420px; overflow:hidden; position:relative;">
    <img src="{{ $destination['image_url'] ?? 'https://picsum.photos/seed/default/1200/420' }}"
         alt="{{ $destination['name'] }}"
         style="width:100%; height:100%; object-fit:cover;">
    {{-- Overlay gelap di bawah --}}
    <div style="position:absolute; bottom:0; left:0; right:0; height:160px;
                background:linear-gradient(to top, rgba(0,0,0,0.6), transparent);">
    </div>
    {{-- Nama destinasi di atas foto --}}
    <div style="position:absolute; bottom:28px; left:0; right:0;" class="container">
        <span class="badge mb-2" style="background:#1a7a4a; font-size:0.8rem; padding:5px 12px; border-radius:20px;">
            {{ $destination['category'] }}
        </span>
        <h1 class="text-white fw-700 mb-0" style="font-size:2rem; text-shadow:0 2px 8px rgba(0,0,0,0.4)">
            {{ $destination['name'] }}
        </h1>
        <small class="text-white-50">
            <i class="bi bi-geo-alt me-1"></i>{{ $destination['location'] }}
        </small>
    </div>
</div>

{{-- KONTEN UTAMA --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            {{-- KOLOM KIRI — Info utama --}}
            <div class="col-lg-8">

                {{-- Deskripsi --}}
                <div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
                    <div class="card-body p-4">
                        <h5 class="fw-700 mb-3">
                            <i class="bi bi-info-circle me-2" style="color:#1a7a4a"></i>
                            Tentang Destinasi
                        </h5>
                        <p class="text-secondary" style="line-height:1.8; font-size:0.95rem">
                            {{ $destination['description'] }}
                        </p>
                    </div>
                </div>

                {{-- PETA LEAFLET --}}
                <div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
                    <div class="card-body p-4">
                        <h5 class="fw-700 mb-3">
                            <i class="bi bi-map me-2" style="color:#1a7a4a"></i>
                            Lokasi di Peta
                        </h5>
                        <div id="map"></div>
                        <small class="text-secondary mt-2 d-block">
                            <i class="bi bi-geo-alt me-1"></i>
                            {{ $destination['location'] }}
                            — Koordinat: {{ $destination['latitude'] }}, {{ $destination['longitude'] }}
                        </small>
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN — Info singkat & aksi --}}
            <div class="col-lg-4">

                {{-- Card Info --}}
                <div class="card border-0 shadow-sm mb-4" style="border-radius:14px; position:sticky; top:90px;">
                    <div class="card-body p-4">

                        <h5 class="fw-700 mb-3">Informasi</h5>

                        {{-- Harga tiket --}}
                        <div class="d-flex align-items-center gap-3 mb-3 p-3"
                             style="background:#e8f5ee; border-radius:10px;">
                            <div style="width:40px; height:40px; background:#1a7a4a; border-radius:10px;
                                        display:flex; align-items:center; justify-content:center;">
                                <i class="bi bi-ticket-perforated text-white"></i>
                            </div>
                            <div>
                                <div class="text-secondary" style="font-size:0.75rem">Harga Tiket Masuk</div>
                                <div class="fw-700" style="color:#1a7a4a; font-size:1.1rem">
                                    @if($destination['entry_fee'] == 0)
                                        Gratis
                                    @else
                                        Rp {{ number_format($destination['entry_fee'], 0, ',', '.') }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div class="d-flex align-items-center gap-3 mb-3 p-3"
                             style="background:#f8faf9; border-radius:10px;">
                            <div style="width:40px; height:40px; background:#e2e8f0; border-radius:10px;
                                        display:flex; align-items:center; justify-content:center;">
                                <i class="bi bi-geo-alt" style="color:#64748b"></i>
                            </div>
                            <div>
                                <div class="text-secondary" style="font-size:0.75rem">Lokasi</div>
                                <div class="fw-600" style="font-size:0.9rem">{{ $destination['location'] }}</div>
                            </div>
                        </div>

                        {{-- Kategori --}}
                        <div class="d-flex align-items-center gap-3 mb-4 p-3"
                             style="background:#f8faf9; border-radius:10px;">
                            <div style="width:40px; height:40px; background:#e2e8f0; border-radius:10px;
                                        display:flex; align-items:center; justify-content:center;">
                                <i class="bi bi-tag" style="color:#64748b"></i>
                            </div>
                            <div>
                                <div class="text-secondary" style="font-size:0.75rem">Kategori</div>
                                <div class="fw-600" style="font-size:0.9rem">{{ $destination['category'] }}</div>
                            </div>
                        </div>

                        {{-- Tombol tambah ke itinerary --}}
                        @auth
                            <button class="btn btn-primary w-100 py-2 mb-2" style="border-radius:10px; font-weight:600">
                                <i class="bi bi-plus-circle me-2"></i>Tambah ke Itinerary
                            </button>
                        @endauth

                        @guest
                            <a href="{{ url('/login') }}" class="btn btn-primary w-100 py-2 mb-2"
                               style="border-radius:10px; font-weight:600">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login untuk Tambah ke Itinerary
                            </a>
                        @endguest

                        <a href="{{ url('/destinations') }}" class="btn btn-outline-secondary w-100 py-2"
                           style="border-radius:10px; font-weight:600; font-size:0.9rem">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
{{-- Leaflet.js --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Koordinat destinasi
    const lat = {{ $destination['latitude'] }};
    const lng = {{ $destination['longitude'] }};
    const name = "{{ $destination['name'] }}";

    // Inisialisasi peta
    const map = L.map('map').setView([lat, lng], 14);

    // Tile layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Marker lokasi destinasi
    L.marker([lat, lng])
        .addTo(map)
        .bindPopup(`<b>${name}</b>`)
        .openPopup();
</script>
@endpush