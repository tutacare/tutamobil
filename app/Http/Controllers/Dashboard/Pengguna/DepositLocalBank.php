<?php

namespace App\Http\Controllers\Dashboard\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Bank, App\Models\Deposit;
use Auth, Mail, Session, Redirect;
use Config;
use App\Models\RekeningTujuan;

class DepositLocalBank extends Controller
{
    public function index()
    {
      $from_bank = [''=>'--Pilih Bank--'] + Bank::pluck('name', 'name')->all();
      return view('dashboard.pengguna.deposit.local-bank.create', compact('from_bank'));
    }

    public function store(Request $request)
    {
      $deposit = new Deposit;
      $deposit->user_id = Auth::user()->id;
      $deposit->deposit = $request->money + mt_rand(000.00,999.00);
      $deposit->from_bank = $request->from_bank;
      $deposit->no_rekening = $request->no_rekening;
      $deposit->atas_nama = $request->atas_nama;
      $deposit->save();

      Session::flash('message', 'Deposit Berhasil!');
      return Redirect::to('dashboard/pengguna/deposit/invoice/' . $deposit->id);
    }

    //laporan untuk user Riwayat Deposit
    public function riwayatDeposit()
    {
      $report_deposit = Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
      return view('dashboard.pengguna.deposit.riwayat.index', compact('report_deposit'));
    }

    //menampilkan invoice setelah deposit dari user
    public function getInvoice($id)
    {
      $invoice = Deposit::where('id', $id)->first();
      $rekening_to = RekeningTujuan::find(1);
      return view('dashboard.pengguna.deposit.invoice.index', compact('invoice', 'rekening_to'));
    }

    public function konfirmasi($id)
    {
      $invoice = Deposit::find($id);
      $invoice->status = 1;
      $invoice->save();
      Mail::later(10, 'email.konfirmasi-deposit', ['deposit_id' => $id], function($m) {
              $m->to(Config::get('myemail.myemail_email_to'), Config::get('myemail.myemail_email_name'))
                ->subject('Konfirmasi Deposit');
        });
      Session::flash('message', 'Konfirmasi Anda telah diproses!');
      return Redirect::to('dashboard/pengguna/riwayat/deposit');
    }
}
