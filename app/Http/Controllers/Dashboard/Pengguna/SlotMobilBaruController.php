<?php

namespace App\Http\Controllers\Dashboard\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SlotMobilBaru, App\City;
use App\HargaSlot, App\User;
use Auth, Session, Redirect, Carbon;
use App\Models\CashBook;

class SlotMobilBaruController extends Controller
{
    public function index()
    {
      $slot_mobil_baru = SlotMobilBaru::where('user_id', Auth::user()->id)->get();
      return view('dashboard.pengguna.slot-mobilbaru.index', compact('slot_mobil_baru'));
    }

    public function create()
    {
      $city = [''=>'--Pilih Kota--'] + City::orderBy('city', 'asc')->pluck('city', 'id')->all();
      return view('dashboard.pengguna.slot-mobilbaru.create', compact('city'));
    }

    public function store(Request $request)
    {
      //cek saldo
      $total_harga = $request->durasi * HargaSlot::find(1)->harga_slot;
      if(Auth::user()->balance < $total_harga)
      {
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'Maaf saldo anda tidak cukup untuk melakukan transaksi ini!');
            return Redirect::to('dashboard/pengguna/slot/mobil-baru/create');
      } else {
            $find_slot = SlotMobilBaru::where('city_id', $request->city_id)->where('merek_id', $request->merek)->first();
            if($find_slot) {
              Session::flash('alert-class', 'alert-danger');
              Session::flash('message', 'Slot ini telah terisi!');
              return Redirect::to('dashboard/pengguna/slot/mobil-baru/create');
            } else {
              $smb = new SlotMobilBaru;
              $smb->user_id = Auth::user()->id;
              $smb->city_id = $request->city_id;
              $smb->merek_id = $request->merek;
              $smb->order_start_at = Carbon::now();
              $smb->order_finish_at = Carbon::now()->addMonth();
              $smb->save();
              //kurangi saldo user
                $buyer = User::find(Auth::user()->id);
                $buyer->balance = $buyer->balance - $total_harga;
                $buyer->save();
              //simpan cashbook
              $cash_book = new CashBook;
              $cash_book->user_id = Auth::user()->id;
              $cash_book->cash_code = 'ORDER-SLOT' . $smb->id;
              $cash_book->description = 'Order Slot - No. Order: ' . $smb->id;
              $cash_book->cash_out = $total_harga;
              $cash_book->balance = $buyer->balance;
              $cash_book->save();
              Session::flash('message', 'Slot Mobil Baru Telah Ditambah!');
              return Redirect::to('dashboard/pengguna/slot/mobil-baru');
            }
      }
    }
}
