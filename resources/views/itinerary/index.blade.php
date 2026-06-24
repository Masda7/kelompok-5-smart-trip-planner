@extends('layouts.app')

@section('title', 'Itinerary Saya — Smart Trip Planner Aceh')

@section('content')

@php
// MOCK DATA — nanti diganti dengan $itineraries dari Controller
$itineraries = [
    [
        'id' => 1,
        'title' => 'Liburan Banda Aceh 2 Hari',
        'created_at' => '2025-04-01',
        'items' => [
            ['destination_name' => 'Masjid Raya Baiturrahman', 'visit_date' => '2025-04-10'],
            ['destination_name' => 'Museum Tsunami Aceh', 'visit_date' => '2025-04-10'],
            ['destination_name' => 'Pantai Lhoknga', 'visit_date' => '2025-04-11'],
        ],
        'total_cost' => 10000,
    ],
    [
        'id' => 2,
        'title' => 'Weekend Trip Pantai',
        'created_at' => '2025-04-05',
        'items' => [
            ['destination_name' => 'Pantai Lampuuk', 'visit_date' => '2025-04-20'],
            ['destination_name' => 'Pantai Lhoknga', 'visit_date' => '2025-04-20'],
        ],
        'total_cost' => 20000,
    ],
];
@endphp

{{-- HEADER --}}
<section style="background:linear-gradient(135deg, #111827 0%, #1a3d2b 100%); padding:48px 0 40px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="text-white fw-700 mb-1" style="font-size:1.8rem">
                    <i class="bi bi-journal-bookmark me-2" style="color:#4ade80"></i>
                    Itinerary Saya
                </h1>
                <p class="text-secondary mb-0" style="font-size:0.9rem">
                    Kelola rencana perjalanan wisatamu ke Aceh
                </p>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary px-4 py-2"
                        style="border-radius:10px; font-weight:600"
                        data-bs-toggle="modal" data-bs-target="#modalBuatItinerary">
                    <i class="bi bi-plus-circle me-2"></i>Buat Itinerary
                </button>
            </div>
        </div>
    </div>
</section>

{{-- KONTEN --}}
<section class="py-5">
    <div class="container">

        @if(count($itineraries) > 0)
            <div class="row g-4">
                @foreach($itineraries as $itin)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
                            <div class="card-body p-4">

                                {{-- Header card --}}
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div style="width:44px; height:44px; background:#e8f5ee; border-radius:10px;
                                                display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-map" style="color:#1a7a4a; font-size:20px"></i>
                                    </div>
                                    <span class="badge" style="background:#e8f5ee; color:#1a7a4a; font-size:0.75rem; border-radius:20px; padding:4px 10px">
                                        {{ count($itin['items']) }} destinasi
                                    </span>
                                </div>

                                {{-- Judul --}}
                                <h5 class="fw-700 mb-1" style="font-size:1rem">{{ $itin['title'] }}</h5>
                                <small class="text-secondary d-block mb-3">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    Dibuat {{ $itin['created_at'] }}
                                </small>

                                {{-- Daftar destinasi --}}
                                <div class="mb-3">
                                    @foreach(array_slice($itin['items'], 0, 3) as $item)
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <i class="bi bi-geo-alt-fill" style="color:#1a7a4a; font-size:0.75rem"></i>
                                            <span style="font-size:0.82rem; color:#475569">
                                                {{ $item['destination_name'] }}
                                            </span>
                                        </div>
                                    @endforeach
                                    @if(count($itin['items']) > 3)
                                        <small class="text-secondary">
                                            +{{ count($itin['items']) - 3 }} destinasi lainnya
                                        </small>
                                    @endif
                                </div>

                                {{-- Estimasi biaya --}}
                                <div class="p-2 mb-3" style="background:#f8faf9; border-radius:8px;">
                                    <small class="text-secondary">Estimasi Biaya</small>
                                    <div class="fw-700" style="color:#1a7a4a; font-size:0.95rem">
                                        Rp {{ number_format($itin['total_cost'], 0, ',', '.') }}
                                    </div>
                                </div>

                                {{-- Tombol --}}
                                <div class="d-flex gap-2">
                                    <a href="{{ url('/itinerary/' . $itin['id']) }}"
                                       class="btn btn-primary btn-sm flex-fill"
                                       style="border-radius:8px; font-size:0.85rem; font-weight:600">
                                        <i class="bi bi-eye me-1"></i>Lihat Detail
                                    </a>
                                    <button class="btn btn-outline-danger btn-sm"
                                            style="border-radius:8px; font-size:0.85rem">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            {{-- EMPTY STATE --}}
            <div class="text-center py-5">
                <i class="bi bi-journal-x" style="font-size:4rem; color:#cbd5e1"></i>
                <h5 class="mt-3 text-secondary">Belum ada itinerary</h5>
                <p class="text-secondary" style="font-size:0.875rem">
                    Buat itinerary pertamamu dan mulai rencanakan perjalanan ke Aceh!
                </p>
                <button class="btn btn-primary mt-2"
                        style="border-radius:10px; font-weight:600"
                        data-bs-toggle="modal" data-bs-target="#modalBuatItinerary">
                    <i class="bi bi-plus-circle me-2"></i>Buat Itinerary Pertama
                </button>
            </div>
        @endif

    </div>
</section>

{{-- MODAL BUAT ITINERARY --}}
<div class="modal fade" id="modalBuatItinerary" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px; border:none;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-700">Buat Itinerary Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-3">
                <form action="{{ url('/itinerary') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-600" style="font-size:0.875rem">Judul Itinerary</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Contoh: Liburan Banda Aceh 3 Hari"
                               style="border-radius:10px"
                               required>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-outline-secondary"
                                style="border-radius:10px" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary"
                                style="border-radius:10px; font-weight:600">
                            Buat Itinerary
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection