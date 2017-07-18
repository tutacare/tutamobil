<?php

namespace App\Http\Controllers\Dashboard\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\RequestAdmin;
use Mytuta, Mail, Auth;
use Session, Redirect;

class RequestAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req_admin = RequestAdmin::all();
        return view('dashboard.pengguna.req-admin.index', compact('req_admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengguna.req-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request_admin = new RequestAdmin;
      $request_admin->user_id = Auth::user()->id;
      $request_admin->title = $request->title;
      $request_admin->request = $request->pesan;

      // process upload berkas
      if($request->hasFile('berkas')) {
        $upload = (Mytuta::Uploadfile($request->file('berkas'),'berkasrequest'));
        $request_admin->berkas = $upload['name'];
      }
      $request_admin->save();

      Mail::later(10, 'email.admin-request', ['id' => $request_admin->id, 'title' => $request_admin->title], function($m) {
            $m->to(Config::get('myemail.myemail_email_to'), Config::get('myemail.myemail_email_name'))
                ->subject('Pengguna mengirimkan request');
        });

      Session::flash('message', 'request anda telah terkirim, terima kasih!');
      return Redirect::to('dashboard/pengguna/req-admin');
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
