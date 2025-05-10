<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';
    protected $primaryKey = 'id_kendaraan';
    public $timestamps = false;
    protected $guarded = [];
}
