<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Deposit, App\User;
use Mail, Session, Redirect;
use App\Models\CashBook;

class DepositPengguna extends Controller
{
    public function index()
    {
      $deposit_konfirmasi = Deposit::where('status', 1)->get();
      $deposit_sudah_dibayar = Deposit::where('status', 2)->get();
      $deposit_belum_dibayar = Deposit::where('status', 0)->get();
      return view('dashboard.keuangan.deposit.index', compact('deposit_konfirmasi', 'deposit_sudah_dibayar', 'deposit_belum_dibayar'));
    }

    public function prosesBayar($id)
    {
      $invoice = Deposit::find($id);
      $invoice->status = 2;
      $invoice->save();

      //tambahkan saldo user
      $user_deposit = User::find($invoice->user_id);
      $user_deposit->balance = $invoice->user->balance + $invoice->deposit;
      $user_deposit->save();

      //masukan ke buku kas user
      $cash_book = new CashBook;
      $cash_book->user_id = $invoice->user_id;
      $cash_book->cash_code = 'DEPOSIT' . $invoice->id;
      $cash_book->description = 'Deposit - No. Deposit: ' . $invoice->id;
      $cash_book->cash_in = $invoice->deposit;
      $cash_book->balance = $user_deposit->balance;
      $cash_book->save();

      Mail::later(10, 'email.proses-deposit', ['deposit_id' => $id, 'deposit' => $invoice->deposit, 'invoice' => $invoice], function($m) use ($invoice) {
            $m->to($invoice->user->email, $invoice->user->name)
                ->subject('Deposit Sudah Diproses');
        });
      Session::flash('message', 'Deposit telah diproses!');
      return Redirect::to('dashboard/deposit-pengguna');
    }
}
