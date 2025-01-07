<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // protected $primaryKey = 'nip';
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = ['nama'];
}
