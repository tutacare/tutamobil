<?php

namespace App\Http\Controllers\Dashboard\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MobilBekas;
use App\Merek, App\Design, App\City;
use Storage, Image, File, Auth;
use Session, Redirect, Validator, Carbon;
use Mail;

class MobilBekasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mobil_bekas = MobilBekas::all();
        return view('dashboard.pengguna.mobil-bekas.index', compact('mobil_bekas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $city = [''=>'--Pilih Kota--'] + City::orderBy('city', 'asc')->pluck('city', 'id')->all();
      $merek = [''=>'--Pilih Merek--'] + Merek::orderBy('merek', 'asc')->pluck('merek', 'id')->all();
      $design = [''=>'--Pilih Model--'] + Design::orderBy('design', 'asc')->pluck('design', 'id')->all();
        return view('dashboard.pengguna.mobil-bekas.create', compact('city', 'merek', 'design'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(!$request->hasFile('foto1'))
      {
          $rules = array(
          'foto1' => 'required|mimes:jpeg,bmp,png',
          );
          $messages = [
            'foto1.required' => 'Harap masukan Gambar Utama',
          ];
          $validator = Validator::make($request->all(), $rules, $messages);
          if ($validator->fails())
          {
             return Redirect::to('dashboard/pengguna/mobil-bekas/create')
            ->withErrors($validator);
          }
      }


      $mobil_bekas = new MobilBekas;
      $mobil_bekas->user_id = Auth::user()->id;
      $mobil_bekas->city_id = $request->city_id;
      $mobil_bekas->merek_id = $request->merek_id;
      $mobil_bekas->design_id = $request->design_id;
      $mobil_bekas->transmisi = $request->transmisi;
      $mobil_bekas->tahun = $request->tahun;
      $mobil_bekas->title = $request->judul;
      $mobil_bekas->description = $request->product_description;
      $mobil_bekas->product_price = str_replace(['+', '-'], '', filter_var($request->harga, FILTER_SANITIZE_NUMBER_INT));
      if ($request->nego === 'true') {
        $mobil_bekas->nego = true;
      } else {
        $mobil_bekas->nego = false;
      }
      $mobil_bekas->sundul_at = Carbon::now();
      $mobil_bekas->status = 'mod';


      // process upload foto1
      if($request->hasFile('foto1')) {
        $file = $request->file('foto1');
        $fileName = uniqid('FT1') . str_random(10) . '.' . $file->getClientOriginalExtension();
        Storage::put('mobilbekas/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/mobilbekas/' . $fileName));
        $img->resize(890, 600, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('mytuta/img/watermark.png', 'bottom-right');
        $mobil_bekas->foto1 = $fileName;
        $img->resizeCanvas(890, 600, 'center', false, '#D9534F');
        $img->save();
      }
      // process upload foto2
      if($request->hasFile('foto2')) {
        $file = $request->file('foto2');
        $fileName = 'FT2' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('mobilbekas/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/mobilbekas/' . $fileName));
        $img->resize(890, 600, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('mytuta/img/watermark.png', 'bottom-right');
        $mobil_bekas->foto2 = $fileName;
        $img->resizeCanvas(890, 600, 'center', false, '#D9534F');
        $img->save();
      }
      // process upload foto3
      if($request->hasFile('foto3')) {
        $file = $request->file('foto3');
        $fileName = 'FT3' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('mobilbekas/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/mobilbekas/' . $fileName));
        $img->resize(890, 600, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('mytuta/img/watermark.png', 'bottom-right');
        $mobil_bekas->foto3 = $fileName;
        $img->resizeCanvas(890, 600, 'center', false, '#D9534F');
        $img->save();
      }
      // process upload foto4
      if($request->hasFile('foto4')) {
        $file = $request->file('foto4');
        $fileName = 'FT4' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('mobilbekas/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/mobilbekas/' . $fileName));
        $img->resize(890, 600, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('mytuta/img/watermark.png', 'bottom-right');
        $mobil_bekas->foto4 = $fileName;
        $img->resizeCanvas(890, 600, 'center', false, '#D9534F');
        $img->save();
      }
      // process upload foto5
      if($request->hasFile('foto5')) {
        $file = $request->file('foto5');
        $fileName = 'FT5' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('mobilbekas/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/mobilbekas/' . $fileName));
        $img->resize(890, 600, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('mytuta/img/watermark.png', 'bottom-right');
        $mobil_bekas->foto5 = $fileName;
        $img->resizeCanvas(890, 600, 'center', false, '#D9534F');
        $img->save();
      }

        $mobil_bekas->save();
        $slug = MobilBekas::find($mobil_bekas->id);
        $search_slug = MobilBekas::where('slug', str_slug($mobil_bekas->title, "-"))->first();
        if($search_slug)
        {
          $slug->slug = str_slug($mobil_bekas->title, "-") . '-' . $mobil_bekas->id;
        } else {
          $slug->slug = str_slug($mobil_bekas->title, "-");
        }
        $slug->save();

        Mail::later(10, 'email.admin-notif', ['id' => $mobil_bekas->id, 'product_title' => $mobil_bekas->product_title], function($m) {
              $m->to(Config::get('myemail.myemail_email_to'), Config::get('myemail.myemail_email_name'))
                  ->subject('Mobil Bekas sedang menunggu proses moderasi');
          });

        Session::flash('message', 'Data Mobil Bekas Anda telah kami terima, dan sedang dalam proses moderasi, produk Anda akan tampil setelah kami proses, terima kasih!');
        return Redirect::to('dashboard/pengguna/mobil-bekas');
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
