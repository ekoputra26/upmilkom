<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Authenticatable
{
    use Notifiable;
    protected $table = 'tb_download_evaluasi';
}
