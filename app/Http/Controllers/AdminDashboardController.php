<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalBerita = Berita::count();
        $totalKategori = Kategori::count();
        $beritaDraft = Berita::where('status', 'draft')->count();
        $beritaPublish = Berita::where('status', 'publish')->count();
        return view('admin.dashboard', compact('totalUser', 'totalBerita', 'totalKategori', 'beritaDraft', 'beritaPublish'));
    }
}
