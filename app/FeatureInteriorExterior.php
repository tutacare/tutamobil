<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureInteriorExterior extends Model
{
    protected $table = 'feature_interior_exterior';
    protected $fillable = [
        'spesifikasi_mobil_baru_id', 'interior_exterior'
    ];
}
