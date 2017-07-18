<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SosialMedia;
use Session, Redirect;

class SosialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosmed = SosialMedia::find(1);
        return view('dashboard.pengaturan.sosial-media.index', compact('sosmed'));
    }

    public function update(Request $request, $id)
    {
      $sosmed = SosialMedia::find($id);
      $sosmed->update($request->all());
      Session::flash('message', 'Mengatur Sosial Media Sukses!');
      return Redirect::to('dashboard/sosmed');
    }

}
