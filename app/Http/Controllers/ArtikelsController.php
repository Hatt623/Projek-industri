<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;

class ArtikelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $artikel = Artikel::all();
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_artikel' => 'required|string|max:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi' => 'required',
        ],
    
        [
            'nama_artikel.required' => 'Nama artikel wajib diisi',
            'nama_artikel.string' => 'Nama artikel harus berupa string',
            'nama_artikel.max' => 'Nama artikel maksimal 30 karakter',
            'kategori_id.required' => 'kategori wajib diisi',
            'kategori_id.exists' => 'kategori tidak ditemukan',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg',
            'image.max' => 'Ukuran gambar maksimal 2048 KB',
            'isi.required' => 'isi artikel wajib diisi'
        ]
        );

        $artikel = new Artikel;
        //Nama yang di tabel         nama yang di form
        $artikel->nama_artikel             = $request->nama_artikel;
        $artikel->kategori_id              = $request->kategori_id;
        $artikel->isi                      = $request->isi;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->image = $name;
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Data artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        return view('artikel.show', compact('artikel','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        return view('artikel.edit', compact('artikel','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_artikel' => 'required|string|max:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi' => 'required',
        ],
    
        [
            'nama_artikel.required' => 'Nama artikel wajib diisi',
            'nama_artikel.string' => 'Nama artikel harus berupa string',
            'nama_artikel.max' => 'Nama artikel maksimal 30 karakter',
            'kategori_id.required' => 'kategori wajib diisi',
            'kategori_id.exists' => 'kategori tidak ditemukan',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg',
            'image.max' => 'Ukuran gambar maksimal 2048 KB',
            'isi.required' => 'isi artikel wajib diisi'
        ]
        );

        $artikel = Artikel::findOrfail($id);
        //Nama yang di tabel         nama yang di form
        $artikel->nama_artikel             = $request->nama_artikel;
        $artikel->kategori_id              = $request->kategori_id;
        $artikel->isi                      = $request->isi;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->image = $name;
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Data artikel berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artikel::destroy($id);
        return redirect()->route('artikel.index')->with('success', 'Data artikel berhasil dihapus');

    }
}
