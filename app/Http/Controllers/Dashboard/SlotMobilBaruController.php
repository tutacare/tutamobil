<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SlotMobilBaru, App\City;
use App\Merek, App\Design, App\Tipe;
use App\User, App\SpesifikasiMobilBaru;
use Session, Redirect, Carbon;

class SlotMobilBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $slot_mobil_baru = SlotMobilBaru::all();
      return view('dashboard.slot.mobil-baru.index', compact('slot_mobil_baru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $city = [''=>'--Pilih Kota--'] + City::orderBy('city', 'asc')->pluck('city', 'id')->all();
      $users = User::all();
      return view('dashboard.slot.mobil-baru.create', compact('city', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $find_slot = SlotMobilBaru::where('city_id', $request->city_id)->where('merek_id', $request->merek)->first();
        if($find_slot){
          Session::flash('alert-class', 'alert-danger');
          Session::flash('message', 'Slot ini telah terisi!');
          return Redirect::to('dashboard/slot/mobil-baru/create');
        } else {
          $smb = new SlotMobilBaru;
          $smb->user_id = $request->user_id;
          $smb->city_id = $request->city_id;
          $smb->merek_id = $request->merek;
          $smb->order_start_at = Carbon::now();
          $smb->order_finish_at = Carbon::now()->addMonth();
          $smb->save();
          Session::flash('message', 'Slot Mobil Baru Telah Ditambah!');
          return Redirect::to('dashboard/slot/mobil-baru');
        }
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
        $slotmobilbaru = SlotMobilBaru::find($id);
        $users = User::all();
        return view('dashboard.slot.mobil-baru.edit', compact('slotmobilbaru', 'users'));
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
