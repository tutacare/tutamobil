<?php
/**
 * Created by Irfan Mahfudz Guntur <mytuta.com>
 * Tuta Components
 */
namespace App\Components;
use DB, App\SpesifikasiMobilBaru;
use App\User, App\SlotMobilBaru;
use App\PriceMobilBaru, App\Post;
use App\SosialMedia;

class TutaComp {
  public function getMerek($city)
  {
    return DB::table('slot_mobil_baru')
          ->join('merek', 'merek.id', '=', 'slot_mobil_baru.merek_id')
          ->select('merek.*')
          ->where('slot_mobil_baru.city_id', $city)
          ->groupBy('merek.id')
          ->get();
  }
  public function getDesign($city, $merek)
  {
    return DB::table('spesifikasi_mobil_baru')
          ->join('design', 'design.id', '=', 'spesifikasi_mobil_baru.design_id')
          ->select('design.*')
          ->where('spesifikasi_mobil_baru.merek_id', $merek)
          ->groupBy('design.id')
          ->get();
  }
  public function getTipe($city, $merek, $design)
  {
    return DB::table('spesifikasi_mobil_baru')
          ->join('tipe', 'tipe.id', '=', 'spesifikasi_mobil_baru.tipe_id')
          ->select('tipe.*')
          ->where('spesifikasi_mobil_baru.design_id', $design)
          ->get();
  }
  public function getSlugMobilBaru($merek, $design, $tipe)
  {
    return DB::table('spesifikasi_mobil_baru')
          ->where('spesifikasi_mobil_baru.merek_id', $merek)
          ->where('spesifikasi_mobil_baru.design_id', $design)
          ->where('spesifikasi_mobil_baru.tipe_id', $tipe)
          ->first()->slug;
  }
  public function mobilBaruCount()
  {
    return SpesifikasiMobilBaru::count();
  }
  public function penggunaCount()
  {
    return User::count();
  }
  public function slotBaruCount()
  {
    return SlotMobilBaru::count();
  }
  public function slotMobilBaru()
  {
    return DB::table('slot_mobil_baru')
          ->join('merek', 'merek.id', '=', 'slot_mobil_baru.merek_id')
          ->join('spesifikasi_mobil_baru', 'merek.id', '=', 'spesifikasi_mobil_baru.merek_id')
          ->join('design', 'design.id', '=', 'spesifikasi_mobil_baru.design_id')
          ->join('tipe', 'tipe.id', '=', 'spesifikasi_mobil_baru.tipe_id')
          ->join('cities', 'cities.id', '=', 'slot_mobil_baru.city_id')
          ->join('users', 'users.id', '=', 'slot_mobil_baru.user_id')
          ->leftJoin('price_mobil_baru', function ($join)
                      {
                           $join->on('tipe.id', '=', 'price_mobil_baru.tipe_id');
                           $join->on('design.id', '=', 'price_mobil_baru.design_id');
                          //$join->where
                       })
          ->select('price_mobil_baru.harga', 'merek.merek', 'spesifikasi_mobil_baru.*',
           'cities.city', 'users.phone', 'users.name', 'tipe.tipe', 'design.design',
           'cities.slug as city_slug')->inRandomOrder()
           ->groupBy('merek.merek', 'tipe.tipe', 'design.design')
           ->take(16)
          ->get();
  }
  public function slotMobilBaruPengguna($user)
  {
    return DB::table('slot_mobil_baru')
          ->join('merek', 'merek.id', '=', 'slot_mobil_baru.merek_id')
          ->join('spesifikasi_mobil_baru', 'merek.id', '=', 'spesifikasi_mobil_baru.merek_id')
          ->join('design', 'design.id', '=', 'spesifikasi_mobil_baru.design_id')
          ->join('tipe', 'tipe.id', '=', 'spesifikasi_mobil_baru.tipe_id')
          ->join('cities', 'cities.id', '=', 'slot_mobil_baru.city_id')
          ->join('users', 'users.id', '=', 'slot_mobil_baru.user_id')
          ->leftJoin('price_mobil_baru', function ($join)
                      {
                           $join->on('tipe.id', '=', 'price_mobil_baru.tipe_id');
                           $join->on('design.id', '=', 'price_mobil_baru.design_id');
                          //$join->where
                       })
          //->leftJoin('price_mobil_baru', 'tipe.id', '=', 'price_mobil_baru.tipe_id')
          //->leftJoin('price_mobil_baru', 'design.id', '=', 'price_mobil_baru.design_id')
          ->select('price_mobil_baru.harga', 'price_mobil_baru.id as idprice', 'merek.merek', 'spesifikasi_mobil_baru.*', 'cities.city', 'users.phone', 'tipe.tipe', 'design.design')
          ->where('users.id', $user)
          ->groupBy('merek.merek', 'tipe.tipe', 'design.design')
          ->orderBy('cities.city', 'asc')
          ->get();
              // $mereknya = SlotMobilBaru::where('user_id', $user)->get();
              // return $mereknya;
  }
  public function slotMobilBaruPenggunaEdit($id)
  {
    return DB::table('slot_mobil_baru')
          ->join('merek', 'merek.id', '=', 'slot_mobil_baru.merek_id')
          ->join('spesifikasi_mobil_baru', 'merek.id', '=', 'spesifikasi_mobil_baru.merek_id')
          ->join('design', 'design.id', '=', 'spesifikasi_mobil_baru.design_id')
          ->join('tipe', 'tipe.id', '=', 'spesifikasi_mobil_baru.tipe_id')
          ->join('cities', 'cities.id', '=', 'slot_mobil_baru.city_id')
          ->join('users', 'users.id', '=', 'slot_mobil_baru.user_id')
          ->leftJoin('price_mobil_baru', function ($join)
                      {
                           $join->on('tipe.id', '=', 'price_mobil_baru.tipe_id');
                           $join->on('design.id', '=', 'price_mobil_baru.design_id');
                          //$join->where
                       })
          ->select('price_mobil_baru.harga', 'merek.merek', 'spesifikasi_mobil_baru.*',
           'cities.city', 'cities.id as cityid', 'users.phone', 'tipe.tipe', 'design.design',
           'cities.id as city_id', 'merek.id as merek_id', 'design.id as design_id', 'tipe.id as tipe_id')
          ->where('spesifikasi_mobil_baru.id', $id)
          ->groupBy('merek.merek', 'tipe.tipe', 'design.design')
          ->first();
  }
  public function cariHarga($city, $merek, $design, $tipe)
  {
      return PriceMobilBaru::where('city_id',$city)->where('merek_id', $merek)->where('design_id', $design)->where('tipe_id', $tipe)->first();
  }

  public function getImage($string)
  {
    if(substr($string,0,4) == 'TUTA' || substr($string,0,4) == 'no-f')
    {
      return '/img/user/' . $string;
    } else {
      return $string;
    }
  }

  public function getCountCategory($id)
  {
    return Post::where('category_id', $id)->count();
  }
  public function sosmed()
  {
    return SosialMedia::find(1);
  }

}
