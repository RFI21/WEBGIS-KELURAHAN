<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\fasilitas;
use Illuminate\Support\Facades\Storage;
use App\Models\penduduks;
use App\Models\potensi;
use App\Models\bansos;
use App\Models\kelompoktani;

class admincontroller extends Controller
{
    //dashboard
    public function index()
    {
        $jumlahPenduduk = penduduks::sum('jumlah_penduduk');

        $jumlahPotensi = potensi::count();

        $jumlahBansos = bansos::sum('total'); 

        $jumlahKelompokTani = kelompoktani::count();
        $admins = User::all(); 
        return view('admin.index', compact(
            'admins',    
            'jumlahPenduduk',
            'jumlahPotensi',
            'jumlahBansos',
            'jumlahKelompokTani'));
    }



    //adminaccount
    public function admin()
    {
        $admins = User::all(); // Ambil semua data dari tabel admins
        return view('admin.admin', compact('admins'));
    }
    // hapus admin
    public function hapusadmin($id)
{
    $admin = User::findOrFail($id);
    $admin->delete();

    return redirect()->route('admin.admin')->with('success', 'Admin berhasil dihapus');
}

 

}