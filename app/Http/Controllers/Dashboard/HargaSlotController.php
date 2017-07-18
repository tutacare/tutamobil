<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HargaSlot;
use Redirect, Session;

class HargaSlotController extends Controller
{
    public function index()
    {
      $harga_slot = HargaSlot::find(1);
      return view('dashboard.pengaturan.harga-slot.index', compact('harga_slot'));
    }

    public function update(Request $request, $id)
    {
      $harga_slot = HargaSlot::find($id);
      $harga_slot->update($request->all());
      Session::flash('message', 'Mengatur Harga Slot Sukses!');
      return Redirect::to('dashboard/harga-slot');
    }
}
