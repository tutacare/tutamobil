<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SpesifikasiMobilBaru, App\HargaSlot;
use App\SlotMobilBaru;
use TutaComp;

class ApiController extends Controller
{
    public function getMerek($city)
    {
      $merek = TutaComp::getMerek($city);
        echo "<option>--Pilih Merek--</option>";
      foreach($merek as $value)
      {
        echo "<option value={$value->id}>{$value->merek}</option>";
      }
    }

    public function getDesign($city, $merek)
    {
      $design = TutaComp::getDesign($city, $merek);
        echo "<option value=''>--Pilih Model--</option>";
      foreach($design as $value)
      {
        echo "<option value={$value->id}>{$value->design}</option>";
      }
    }

    public function getTipe($city, $merek, $design)
    {
      $tipe= TutaComp::getTipe($city, $merek, $design);
        echo "<option>--Pilih Tipe--</option>";
      foreach($tipe as $value)
      {
        echo "<option value={$value->id}>{$value->tipe}</option>";
      }
    }

    public function getMerekSlot()
    {
      $merek = SpesifikasiMobilBaru::select('merek_id')->orderBy('merek_id', 'asc')->distinct()->get();
        echo "<option value=''>--Pilih Merek--</option>";
      foreach($merek as $value)
      {
        echo "<option value=$value->merek_id>{$value->merek->merek}</option>";
      }
    }

    public function getDesignSlot($merek)
    {
      $design = SpesifikasiMobilBaru::where('merek_id', $merek)->groupBy('merek_id')->get();
        echo "<option value=''>--Pilih Model--</option>";
      foreach($design as $value)
      {
        echo "<option value=$value->design_id>{$value->design->design}</option>";
      }
    }

    public function getTipeSlot($merek, $design)
    {
      $tipe= SpesifikasiMobilBaru::where('merek_id', $merek)->where('design_id', $design)->get();
        echo "<option>--Pilih Tipe--</option>";
      foreach($tipe as $value)
      {
        echo "<option value=$value->tipe_id>{$value->tipe->tipe}</option>";
      }
    }

    public function getResponSlot($city, $merek)
    {
        $find_slot = SlotMobilBaru::where('city_id', $city)->where('merek_id', $merek)->first();
        if($find_slot){
          echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Slot ini sudah terisi
                </div>';
        } else {
          echo '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Slot Tersedia
                </div>';
        }
    }
    public function getTotalHarga(Request $request)
    {
        $total_harga = $request->durasi * HargaSlot::find(1)->harga_slot;
        return number_format($total_harga, 0, ',', '.');
    }

  

}
