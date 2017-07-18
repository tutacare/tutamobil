<?php

namespace App\Http\Controllers\Dashboard\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\CashBook;

class CashBook extends Controller
{
    public function index()
    {
      $cashbook = CashBook::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
      return view('dashboard.pengguna.deposit.cashbook.index', compact('cashbook'));
    }
}
