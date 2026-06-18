<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasilitas;
use App\Models\potensi;
use App\Models\bansos;
use App\Models\kelompoktani;
use App\Models\penduduks;


class usercontroller extends Controller
{
    //home
    public function index()
    {
        $jumlahUmkm = Potensi::where('kategori', 'umkm')->count();
        $jumlahWisata = Potensi::where('kategori', 'wisata')->count();
        $data = penduduks::first();
        
        return view('user.index', compact('data','jumlahUmkm', 'jumlahWisata'));
        
        }
        
        public function login()
        {
        return view('user.login');
        }



  
public function administrasi(Request $request)
{
    $filter = $request->filter ?? 'administrasi';

    $fasilitass = fasilitas::all();
    $potensis = potensi::all();

    return view('user.administrasi', compact(
        'fasilitass',
        'potensis',
        'filter'
    ));
}
    

    public function fasilitas()
    {
        $fasilitass=fasilitas::all();

    return view('user.fasilitas', compact(
        'fasilitass',
    ));
    }


    public function potensi()
    {
        $potensi=potensi::all();

    return view('user.potensi', compact(
        'potensi',
    ));
    }

   public function bansos()
    {
      $bansos = bansos::orderByRaw("CAST(REPLACE(rw, 'RW ', '') AS UNSIGNED) ASC")->get();

    return view('user.bansos', compact(
        'bansos',
    ));
    }

       public function kelompoktani(Request $request)
    {
        $query = kelompoktani::query();

    if ($request->rw) {
        $query->where('rw', $request->rw);
    }

    $kelompoktani = $query
        ->orderByRaw("CAST(REPLACE(rw, 'RW ', '') AS UNSIGNED) ASC")
        ->paginate(5)
        ->withQueryString();

    return view('user.kelompoktani', compact('kelompoktani'));
    }
    
  
    
    public function profil()
    {

        return view('user.profil');
    }
      

    public function penduduk()
    {
        $penduduk=penduduks::all();

        $data = penduduks::first();

        return view('user.penduduk', compact('penduduk','data'));
    }



        }
