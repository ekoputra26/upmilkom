<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLain extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'attribute',
        'value'
    ];
}
