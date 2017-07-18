<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $fillable = [
      'city', 'slug'
  ];

  // public function spesifikasi_mobil_baru()
  //   {
  //       return $this->hasMany('App\SpesifikasiMobilBaru', 'city_id');
  //   }

}
