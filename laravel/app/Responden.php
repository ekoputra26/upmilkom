<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'respondent_number',
        'attribute',
        'value'
    ];
}
