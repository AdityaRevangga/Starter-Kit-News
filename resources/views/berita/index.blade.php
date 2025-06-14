@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Berita</h1>
    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beritas as $berita)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->kategori->nama ?? '-' }}</td>
                <td>{{ $berita->status }}</td>
                <td>{{ $berita->user->name ?? '-' }}</td>
                <td>
    <a href="{{ route('berita.show', $berita) }}" class="btn btn-info btn-sm">Lihat</a>
    <a href="{{ route('berita.edit', $berita) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ route('berita.destroy', $berita) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
    </form>
    @if(auth()->user()->role === 'editor' && $berita->status === 'draft')
        <form action="{{ route('berita.approve', $berita) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Approve berita ini?')">Approve</button>
        </form>
    @endif
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
