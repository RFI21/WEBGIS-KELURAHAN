<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class potensi extends Model
{
            protected $table = 'potensis';

protected $fillable = [
    'kategori',
    'nama',
    'lokasi',
    'lat_long',
    'gambar'
];
}
