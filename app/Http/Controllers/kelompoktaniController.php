<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelompoktani;
use App\Models\User;

class kelompoktaniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $kelompoktani = kelompoktani::paginate(10);
        $admins = User::all();
        return view('admin.kelompoktani', compact('kelompoktani', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = User::all();
        return view('admin.tambahkelompoktani', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $request->validate([
        'rw'=>'required',
        'nama_kelompok'=>'required',
        'ketua'=>'required',
        'jumlah'=>'required',
        'komoditas'=>'required',
        'status'=>'required',
    ]);


    $kelompoktani = kelompoktani::create([
        'rw'=>$request->rw,
        'nama_kelompok'=>$request->nama_kelompok,
        'ketua'=>$request->ketua,
        'jumlah'=>$request->jumlah,
        'komoditas'=>$request->komoditas,
        'status'=>$request->status,

    ]);

  

    return redirect()->route('admin.kelompoktani')
        ->with('success','kelompoktani berhasil ditambahkan');
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
         $kelompoktani = kelompoktani::findOrFail($id);
        $admins = User::all();
        return view('admin.editkelompoktani', compact('kelompoktani','admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                 $kelompoktani = kelompoktani::findOrFail($id);

    $request->validate([
        'rw'=>'required',
        'nama_kelompok'=>'required',
        'ketua'=>'required',
        'jumlah'=>'required',
        'komoditas'=>'required',
        'status'=>'required',
    ]);



    $kelompoktani->update([
    'rw'=>$request->rw,
        'nama_kelompok'=>$request->nama_kelompok,
        'ketua'=>$request->ketua,
        'jumlah'=>$request->jumlah,
        'komoditas'=>$request->komoditas,
        'status'=>$request->status,
    ]);

 

    return redirect()->route('admin.kelompoktani')
        ->with('success', 'kelompok tani berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                $kelompoktani = kelompoktani::findOrFail($id);
        $kelompoktani->delete();

        return redirect()->route('admin.kelompoktani')->with('success','kelompoktani berhasil dihapus');
   
    }
}
