<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrumen extends Model
{
    protected $fillable = [
        'bagian',
        'nomor',
        'instrumen',
        'jenis'
    ];

    public $timestamps = false;
}
