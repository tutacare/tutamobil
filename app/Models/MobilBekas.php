<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobilBekas extends Model
{
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

  public function user()
  {
      return $this->belongsTo('App\User', 'user_id');
  }
}
