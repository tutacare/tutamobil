<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpesifikasiMobilBaru extends Model
{
    protected $table = 'spesifikasi_mobil_baru';

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function merek()
    {
        return $this->belongsTo('App\Merek', 'merek_id');
    }

    public function design()
    {
        return $this->belongsTo('App\Design', 'design_id');
    }

    public function tipe()
    {
        return $this->belongsTo('App\Tipe', 'tipe_id');
    }
}
