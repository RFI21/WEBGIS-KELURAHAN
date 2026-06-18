<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\potensi;
use App\Models\User;

class potensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $potensi = potensi::paginate(10);
        $admins = User::all();
        return view('admin.potensi', compact('potensi', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                $admins = User::all();
        return view('admin.tambahpotensi', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([
        'kategori'=>'required',
        'nama'=>'required',
        'lokasi'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'gambar'=>'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $koordinat = $request->latitude . ',' . $request->longitude;

    // upload gambar
    $gambarPath = $request->file('gambar')->store('potensi', 'public');

    $potensi = potensi::create([
        'kategori'=>$request->kategori,
        'nama'=>$request->nama,
        'lokasi'=>$request->lokasi,
        'lat_long'=>$koordinat,
        'gambar'=>$gambarPath,
    ]);

    return redirect()->route('admin.potensi')
        ->with('success','potensi berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                $potensi = potensi::findOrFail($id);
        $admins = User::all();
        return view('admin.editpotensi', compact('potensi','admins'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $potensi = potensi::findOrFail($id);

    $request->validate([
        'kategori'=>'required',
        'nama'=>'required',
        'lokasi'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'gambar'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // gabungkan latitude longitude
    $koordinat = $request->latitude . ',' . $request->longitude;

    // default pakai gambar lama
    $gambarPath = $potensi->gambar;

    // kalau ada gambar baru
    if ($request->hasFile('gambar')) {

        // hapus gambar lama kalau ada
        if ($potensi->gambar) {
            Storage::disk('public')->delete($potensi->gambar);
        }

        // simpan gambar baru
        $gambarPath = $request->file('gambar')->store('potensi', 'public');
    }

    $potensi->update([
        'kategori' => $request->kategori,
        'nama' => $request->nama,
        'lokasi' => $request->lokasi,
        'lat_long' => $koordinat,
        'gambar' => $gambarPath,
    ]);

    return redirect()->route('admin.potensi')
        ->with('success', 'potensi berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $potensi = potensi::findOrFail($id);
        $potensi->delete();

        return redirect()->route('admin.potensi')->with('success','potensi berhasil dihapus');
    }
}
