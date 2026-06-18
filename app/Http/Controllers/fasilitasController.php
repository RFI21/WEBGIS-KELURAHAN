<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\fasilitas;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

class fasilitasController extends Controller
{
        public function index()
    {
        $fasilitass = fasilitas::paginate(10);
        $admins = User::all();
        return view('admin.fasilitas', compact('fasilitass', 'admins'));
    }

    public function create()
    {
        $admins = User::all();
        return view('admin.tambahfasilitas', compact('admins'));
    }

public function store(Request $request)
{
    $request->validate([
        'kategori'=>'required',
        'nama_fasilitas'=>'required',
        'lokasi'=>'required',
        'jumlah'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'gambar'=>'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Upload gambar
    $gambarPath = $request->file('gambar')->store('fasilitas', 'public');

    $koordinat = $request->latitude . ',' . $request->longitude;

    fasilitas::create([
        'kategori'=>$request->kategori,
        'nama_fasilitas'=>$request->nama_fasilitas,
        'lokasi'=>$request->lokasi,
        'jumlah'=>$request->jumlah,
        'long_lat'=>$koordinat,
        'gambar'=>$gambarPath,
    ]);

    return redirect()->route('admin.fasilitas')
        ->with('success','Fasilitas berhasil ditambahkan');
}

    public function edit($id)
    {
        $fasilitas = fasilitas::findOrFail($id);
        $admins = User::all();
        return view('admin.editfasilitas', compact('fasilitas','admins'));
    }



public function update(Request $request, $id)
{
    $fasilitas = fasilitas::findOrFail($id);

    $request->validate([
        'kategori'=>'required',
        'nama_fasilitas'=>'required',
        'lokasi'=>'required',
        'jumlah'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'gambar'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // gabungkan latitude longitude
    $koordinat = $request->latitude . ',' . $request->longitude;

    // default: pakai gambar lama
    $gambarPath = $fasilitas->gambar;

    // jika ada upload gambar baru
    if ($request->hasFile('gambar')) {

        // hapus gambar lama (jika ada)
        if ($fasilitas->gambar) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }

        // simpan gambar baru
        $gambarPath = $request->file('gambar')->store('fasilitas', 'public');
    }

    $fasilitas->update([
        'kategori'=>$request->kategori,
        'nama_fasilitas'=>$request->nama_fasilitas,
        'lokasi'=>$request->lokasi,
        'jumlah'=>$request->jumlah,
        'long_lat'=>$koordinat,
        'gambar'=>$gambarPath,
    ]);

    return redirect()->route('admin.fasilitas')
        ->with('success', 'Fasilitas berhasil diupdate');
}

    public function destroy($id)
    {
        $fasilitas = fasilitas::findOrFail($id);
        $fasilitas->delete();

        return redirect()->route('admin.fasilitas')->with('success','fasilitas berhasil dihapus');
    }
}
