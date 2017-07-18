<?php

namespace App\Http\Controllers\Dashboard\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use TutaComp, Auth, Session, Redirect;
use App\PriceMobilBaru, App\SpesifikasiMobilBaru;

class PenggunaMobilBaru extends Controller
{
    public function index()
    {
      $mobil_baru = TutaComp::slotMobilBaruPengguna(Auth::user()->id);
      return view('dashboard.pengguna.mobil-baru.index', compact('mobil_baru'));
    }

    public function edit($id)
    {
       $mobil_baru = TutaComp::slotMobilBaruPenggunaEdit($id);
       return view('dashboard.pengguna.mobil-baru.edit', compact('mobil_baru'));
    }

    public function update(Request $request, $id)
    {
       $mobil_baru = SpesifikasiMobilBaru::find($id); //TutaComp::slotMobilBaruPenggunaEdit($id);
       $find_or_create = TutaComp::cariHarga($request->cityid, $mobil_baru->merek_id, $mobil_baru->design_id, $mobil_baru->tipe_id);
       if($find_or_create)
       {
         $price = PriceMobilBaru::find($find_or_create->id);
         $price->harga = $request->harga;
         $price->save();
         Session::flash('message', 'Harga telah di update!');
         return Redirect::to('dashboard/pengguna/mobil-baru');
       }
       $price = new PriceMobilBaru;
       $price->city_id = $request->cityid;
       $price->merek_id = $mobil_baru->merek_id;
       $price->design_id = $mobil_baru->design_id;
       $price->tipe_id = $mobil_baru->tipe_id;
       $price->harga = $request->harga;
       $price->save();
       Session::flash('message', 'Harga telah di update!');
       return Redirect::to('dashboard/pengguna/mobil-baru');
    }
}
