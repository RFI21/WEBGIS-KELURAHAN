<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bansos;
use App\Models\User;

class bansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
    $bansos = bansos::orderByRaw("
        CAST(REPLACE(rw, 'RW ', '') AS UNSIGNED) ASC
    ")->paginate(10);
        $admins = User::all();
        return view('admin.bansos', compact('bansos', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                        $admins = User::all();
        return view('admin.tambahbansos', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'rw'=>'required',
        'pkh'=>'required',
        'bpnt'=>'required',
        'bpjs'=>'required',
    ]);

    $total = $request->pkh + $request->bpnt + $request->bpjs;

    bansos::create([
        'rw'=>$request->rw,
        'pkh'=>$request->pkh,
        'bpnt'=>$request->bpnt,
        'bpjs'=>$request->bpjs,
        'total'=>$total,
    ]);

    return redirect()->route('admin.bansos')
        ->with('success','bansos berhasil ditambahkan');
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
                        $bansos = bansos::findOrFail($id);
        $admins = User::all();
        return view('admin.editbansos', compact('bansos','admins'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $bansos = bansos::findOrFail($id);

    $request->validate([
        'rw'=>'required',
        'pkh'=>'required',
        'bpnt'=>'required',
        'bpjs'=>'required',
    ]);

    $total = $request->pkh + $request->bpnt + $request->bpjs;

    $bansos->update([
        'rw'=>$request->rw,
        'pkh'=>$request->pkh,
        'bpnt'=>$request->bpnt,
        'bpjs'=>$request->bpjs,
        'total'=>$total,
    ]);

    return redirect()->route('admin.bansos')
        ->with('success', 'bansos berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bansos = bansos::findOrFail($id);
        $bansos->delete();

        return redirect()->route('admin.bansos')->with('success','bansos berhasil dihapus');
    }
}
