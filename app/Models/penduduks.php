<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penduduks extends Model
{
                protected $table = 'penduduks';

    protected $fillable = [
        'jumlah_penduduk','jumlah_kk','laki_laki','perempuan'
    ];
}
