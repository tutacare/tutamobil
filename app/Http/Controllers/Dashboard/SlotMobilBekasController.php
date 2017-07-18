<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MobilBekas;
use Session, Redirect;

class SlotMobilBekasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil_bekas = MobilBekas::all();
        return view('dashboard.slot.mobil-bekas.index', compact('mobil_bekas'));
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
        //
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
      $mobil_bekas = MobilBekas::find($id);
      return view('dashboard.slot.mobil-bekas.edit', compact('mobil_bekas'));
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
      $mobil_bekas = MobilBekas::find($id);
      $mobil_bekas->title = $request->title;
      $mobil_bekas->description = $request->description;
      $mobil_bekas->status = $request->status;
      $mobil_bekas->save();
      Session::flash('message', 'Audit Mobil Bekas Sukses!');
      return Redirect::to('dashboard/slot/mobil-bekas');
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
