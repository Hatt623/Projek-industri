<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Artikel;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('welcome', compact('artikel'));
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        $allnews = Artikel::all();
        return view('new.show', compact('artikel', 'kategori','allnews'));
    }
}
