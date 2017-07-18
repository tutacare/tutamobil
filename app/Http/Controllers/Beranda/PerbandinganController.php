<?php

namespace App\Http\Controllers\Beranda;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SosialMedia;
use App\City, App\SlotMobilBaru;
use TutaComp, App\SpesifikasiMobilBaru;
use App\PriceMobilBaru, App\Mesin;
use App\Transmisi, App\Dimensi;
use App\Kaki;

class PerbandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $city = SlotMobilBaru::select('city_id')->orderBy('city_id', 'asc')->distinct()->get();
      $sosmed = SosialMedia::find(1);
      return view('beranda.perbandingan.index', compact('sosmed', 'city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $sosmed = SosialMedia::find(1);
      //form1
      $city_form1 = $request->city_form1;
      $merek_form1 = $request->merek_form1;
      $design_form1 = $request->design_form1;
      $tipe_form1 = $request->tipe_form1;
      //form2
      $city_form2 = $request->city_form2;
      $merek_form2 = $request->merek_form2;
      $design_form2 = $request->design_form2;
      $tipe_form2 = $request->tipe_form2;
      //detail1
      $mobil_baru_slug1 = TutaComp::getSlugMobilBaru($merek_form1, $design_form1, $tipe_form1);
      $mobil_baru1 = SpesifikasiMobilBaru::where('slug', $mobil_baru_slug1)->first();
      $spec1 = SlotMobilBaru::where('city_id', $city_form1)->first();
      $price1 = PriceMobilBaru::where('city_id', $city_form1)->where('merek_id', $merek_form1)
                  ->where('design_id', $design_form1)->where('tipe_id', $tipe_form1)->first();
      $mesin1 = Mesin::where('spesifikasi_mobil_baru_id', $mobil_baru1->id)->first();
      $transmisi1 = Transmisi::where('spesifikasi_mobil_baru_id', $mobil_baru1->id)->first();
      $dimensi1 = Dimensi::where('spesifikasi_mobil_baru_id', $mobil_baru1->id)->first();
      $kaki1 = Kaki::where('spesifikasi_mobil_baru_id', $mobil_baru1->id)->first();
      $city1 = City::where('id', $city_form1)->first();
      //detail2
      $mobil_baru_slug2 = TutaComp::getSlugMobilBaru($merek_form2, $design_form2, $tipe_form2);
      $mobil_baru2 = SpesifikasiMobilBaru::where('slug', $mobil_baru_slug2)->first();
      $spec2 = SlotMobilBaru::where('city_id', $city_form2)->first();
      $price2 = PriceMobilBaru::where('city_id', $city_form2)->where('merek_id', $merek_form2)
                  ->where('design_id', $design_form2)->where('tipe_id', $tipe_form2)->first();
      $mesin2 = Mesin::where('spesifikasi_mobil_baru_id', $mobil_baru2->id)->first();
      $transmisi2 = Transmisi::where('spesifikasi_mobil_baru_id', $mobil_baru2->id)->first();
      $dimensi2 = Dimensi::where('spesifikasi_mobil_baru_id', $mobil_baru2->id)->first();
      $kaki2 = Kaki::where('spesifikasi_mobil_baru_id', $mobil_baru2->id)->first();
      $city2 = City::where('id', $city_form2)->first();
      return view('beranda.perbandingan.result', compact('sosmed', 'mobil_baru1', 'spec1', 'price1', 'mesin1', 'transmisi1',
                  'dimensi1', 'kaki1', 'city1', 'mobil_baru2', 'spec2', 'price2', 'mesin2', 'transmisi2',
                              'dimensi2', 'kaki2', 'city2'
                  ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
