<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitas extends Model
{
        protected $table = 'fasilitas';

protected $fillable = [
    'kategori','nama_fasilitas','lokasi','long_lat','jumlah','gambar'
];
}