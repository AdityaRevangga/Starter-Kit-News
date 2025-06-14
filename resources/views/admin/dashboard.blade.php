@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard Admin</h1>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Total User</h5>
                    <p class="card-text display-6 fw-bold">{{ $totalUser }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-info shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-newspaper"></i> Total Berita</h5>
                    <p class="card-text display-6 fw-bold">{{ $totalBerita }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-check-circle"></i> Berita Publish</h5>
                    <p class="card-text display-6 fw-bold">{{ $beritaPublish }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-hourglass-half"></i> Berita Draft</h5>
                    <p class="card-text display-6 fw-bold">{{ $beritaDraft }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card text-bg-secondary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-list"></i> Total Kategori</h5>
                    <p class="card-text display-6 fw-bold">{{ $totalKategori }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
