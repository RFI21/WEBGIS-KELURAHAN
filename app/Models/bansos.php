<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bansos extends Model
{
        protected $table = 'bansos';

protected $fillable = [
    'rw',
    'pkh',
    'bpnt',
    'bpjs',
    'total'
];
}
