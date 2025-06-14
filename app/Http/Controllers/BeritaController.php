<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'wartawan') {
            $beritas = Berita::where('user_id', $user->id)->get();
        } else {
            $beritas = Berita::all();
        }
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('berita.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only(['judul', 'isi', 'kategori_id']);
        $data['user_id'] = auth()->id();
        $data['status'] = 'draft';
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time().'_'.$gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $namaGambar);
            $data['gambar'] = 'uploads/berita/'.$namaGambar;
        }
        Berita::create($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan (masih draft).');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        $kategoris = \App\Models\Kategori::all();
        return view('berita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only(['judul', 'isi', 'kategori_id']);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time().'_'.$gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $namaGambar);
            $data['gambar'] = 'uploads/berita/'.$namaGambar;
        }
        $berita->update($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Approve berita (khusus editor)
     */
    public function approve(Berita $berita)
    {
        $user = auth()->user();
        if ($user->role !== 'editor') {
            abort(403, 'Hanya editor yang dapat melakukan approval.');
        }
        $berita->update(['status' => 'publish']);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil di-approve dan dipublish.');
    }
}
