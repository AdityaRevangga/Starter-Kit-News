@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $berita->judul }}</h1>
    <div class="mb-3">
        <strong>Kategori:</strong> {{ $berita->kategori->nama ?? '-' }}<br>
        <strong>Status:</strong> {{ $berita->status }}<br>
        <strong>Penulis:</strong> {{ $berita->user->name ?? '-' }}<br>
        @if($berita->gambar)
            <img src="/{{ $berita->gambar }}" alt="Gambar Berita" width="300" class="my-3">
        @endif
    </div>
    <div>{!! nl2br(e($berita->isi)) !!}</div>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
