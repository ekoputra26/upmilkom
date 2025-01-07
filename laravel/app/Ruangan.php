<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'disabled', 'nama', 'lokasi'
    ];
}
