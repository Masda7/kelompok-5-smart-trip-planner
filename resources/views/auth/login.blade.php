@extends('layouts.app')

@section('title', 'Masuk — Smart Trip Planner Aceh')

@section('content')
<section style="min-height: calc(100vh - 140px); display:flex; align-items:center; background:#f8faf9; padding:40px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="card border-0 shadow-sm" style="border-radius:16px;">
                    <div class="card-body p-4 p-md-5">

                        {{-- Logo / Header --}}
                        <div class="text-center mb-4">
                            <div style="width:52px; height:52px; background:#1a7a4a; border-radius:12px;
                                        display:flex; align-items:center; justify-content:center; margin:0 auto 14px;">
                                <i class="bi bi-map-fill text-white" style="font-size:24px"></i>
                            </div>
                            <h4 class="fw-700 mb-1" style="font-size:1.4rem">Selamat Datang Kembali</h4>
                            <p class="text-secondary" style="font-size:0.9rem">Masuk untuk mulai merencanakan perjalananmu</p>
                        </div>

                        {{-- Alert Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger d-flex align-items-start gap-2" style="border-radius:10px; font-size:0.875rem;">
                                <i class="bi bi-exclamation-circle-fill mt-1"></i>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Form Login --}}
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-600" style="font-size:0.875rem">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-envelope text-secondary"></i>
                                    </span>
                                    <input type="email"
                                           name="email"
                                           class="form-control border-start-0 ps-0"
                                           placeholder="nama@email.com"
                                           value="{{ old('email') }}"
                                           required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-600" style="font-size:0.875rem">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-lock text-secondary"></i>
                                    </span>
                                    <input type="password"
                                           name="password"
                                           class="form-control border-start-0 ps-0"
                                           placeholder="Masukkan password"
                                           required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label text-secondary" for="remember" style="font-size:0.85rem">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2" style="border-radius:10px; font-weight:600">
                                Masuk
                            </button>
                        </form>

                        <p class="text-center text-secondary mt-4 mb-0" style="font-size:0.875rem">
                            Belum punya akun?
                            <a href="{{ url('/register') }}" class="text-decoration-none fw-600" style="color:#1a7a4a">
                                Daftar sekarang
                            </a>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
