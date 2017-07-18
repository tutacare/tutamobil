<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureKeamananKelengkapan extends Model
{
  protected $table = 'feature_keamanan_kelengkapan';
  protected $fillable = [
      'spesifikasi_mobil_baru_id', 'keamanan_kelengkapan'
  ];
}
