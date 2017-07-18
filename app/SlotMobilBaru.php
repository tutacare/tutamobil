<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotMobilBaru extends Model
{
    protected $table = 'slot_mobil_baru';

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function merek()
    {
        return $this->belongsTo('App\Merek', 'merek_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
