<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penduduks;
use App\Models\User;

class pendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $penduduk = penduduks::paginate(10);
        $admins = User::all();
        return view('admin.penduduk', compact('penduduk', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                $admins = User::all();
        return view('admin.tambahpenduduk', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
  {
$request->validate([
    'jumlah_kk'       => 'required',
    'laki_laki'       => 'required',
    'perempuan'       => 'required',
]);

$jumlah_penduduk=$request->laki_laki + $request->perempuan;

$penduduk = penduduks::create([
    'jumlah_penduduk' => $jumlah_penduduk,
    'jumlah_kk'       => $request->jumlah_kk,
    'laki_laki'       => $request->laki_laki,
    'perempuan'       => $request->perempuan,
]);

  

    return redirect()->route('admin.penduduk')
        ->with('success','penduduk berhasil ditambahkan');
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
         $penduduk = penduduks::findOrFail($id);
        $admins = User::all();
        return view('admin.editpenduduk', compact('penduduk','admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penduduk = penduduks::findOrFail($id);

$request->validate([
    'jumlah_kk'       => 'required',
    'laki_laki'       => 'required',
    'perempuan'       => 'required',
]);

$jumlah_penduduk=$request->laki_laki + $request->perempuan;


$penduduk->update([
    'jumlah_penduduk' => $jumlah_penduduk,
    'jumlah_kk'       => $request->jumlah_kk,
    'laki_laki'       => $request->laki_laki,
    'perempuan'       => $request->perempuan,
]);
      return redirect()->route('admin.penduduk')
        ->with('success', 'Penduduk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $penduduk = penduduks::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('admin.penduduk')->with('success','penduduk berhasil dihapus');
   
    }
}
