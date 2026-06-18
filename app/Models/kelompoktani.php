<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompoktani extends Model
{
            protected $table = 'kelompoktani';

    protected $fillable = [
        'rw','nama_kelompok','ketua','jumlah','komoditas','status'
    ];
}
