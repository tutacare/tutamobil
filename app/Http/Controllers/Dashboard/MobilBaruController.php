<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SpesifikasiMobilBaru;
use App\Merek, App\Design, App\Tipe;
use App\Dimensi, App\Mesin;
use App\Transmisi, App\Kaki;
use Mytuta, Session, Redirect, Validator;
use App\FeatureInteriorExterior, App\FeatureKeamananKelengkapan;
use Response, Storage, File, Image;
use App\Gallery;
use App\Models\FeatureInteriorText, App\Models\KeamananText;

class MobilBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil_baru = SpesifikasiMobilBaru::all();
        return view('dashboard.mobil-baru.index', compact('mobil_baru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merek = [''=>'--Pilih Merek--'] + Merek::orderBy('merek', 'asc')->pluck('merek', 'id')->all();
        $design = [''=>'--Pilih Model--'] + Design::orderBy('design', 'asc')->pluck('design', 'id')->all();
        $tipe = [''=>'--Pilih Tipe--'] + Tipe::orderBy('tipe', 'asc')->pluck('tipe', 'id')->all();
        return view('dashboard.mobil-baru.create', compact('merek', 'design', 'tipe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $find_mobil_baru = SpesifikasiMobilBaru::where('merek_id', $request->merek_id)
                          ->where('design_id', $request->design_id)
                          ->where('tipe_id', $request->tipe_id)->first();
      if($find_mobil_baru)
      {
          Session::flash('alert-class', 'alert-danger');
          Session::flash('message', 'Mobil Baru ini sudah ada!');
          return back()->withInput();
      } else {
          $mobil_baru = new SpesifikasiMobilBaru;

          $mobil_baru->merek_id = $request->merek_id;
          $mobil_baru->design_id = $request->design_id;
          $mobil_baru->tipe_id = $request->tipe_id;
          $mobil_baru->negara_pembuat = $request->negara_pembuat;
          $mobil_baru->slug = str_slug(Merek::find($request->merek_id)->merek, '-') . '-' .
                              str_slug(Design::find($request->design_id)->design, '-') . '-' .
                              str_slug(str_replace(["+", "/"],["-plus-", "-or-"], Tipe::find($request->tipe_id)->tipe), '-');
          //untuk fotonya
          if($request->hasFile('foto')) {
            //$upload = Mytuta::uploadImage($request->file('foto'), 'mobil-baru', 890, null);

            $file = $request->file('foto');
            $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
            Storage::put('mobil-baru/'.$fileName,  File::get($file));
            $img = Image::make(storage_path('app/mobil-baru/' . $fileName));
            $img->resize(890, 600, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            });
            //$img->insert('betawaran/logo.png', 'bottom-right'); //watermark
            $mobil_baru->foto = $fileName;
            $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
            $img->save();

            //$mobil_baru->foto = $upload;
          }
          //untuk fotonya .end
          $mobil_baru->save();

          //dimensi
          $dimensi = new Dimensi;
          $dimensi->spesifikasi_mobil_baru_id = $mobil_baru->id;
          $dimensi->panjang = $request->panjang;
          $dimensi->lebar = $request->lebar;
          $dimensi->tinggi = $request->tinggi;
          $dimensi->jarak_sumbu_roda = $request->jarak_sumbu_roda;
          $dimensi->jarak_pijak_depan = $request->jarak_pijak_depan;
          $dimensi->jarak_pijak_belakang = $request->jarak_pijak_belakang;
          $dimensi->jarak_terendah_ke_tanah = $request->jarak_terendah_ke_tanah;
          $dimensi->radius_putar = $request->radius_putar;
          $dimensi->berat_kosong = $request->berat_kosong;
          $dimensi->save();
          //dimensi .end

          //mesin
          $mesin = new Mesin;
          $mesin->spesifikasi_mobil_baru_id = $mobil_baru->id;
          $mesin->jenis_mesin = $request->jenis_mesin;
          $mesin->kapasitas_silinder = $request->kapasitas_silinder;
          $mesin->daya_maksimum = $request->daya_maksimum;
          $mesin->torsi_maksimum = $request->torsi_maksimum;
          $mesin->perbandingan_kompresi = $request->perbandingan_kompresi;
          $mesin->sistem_pembakaran = $request->sistem_pembakaran;
          $mesin->bahan_bakar = $request->bahan_bakar;
          $mesin->kapasitas_bahan_bakar = $request->kapasitas_bahan_bakar;
          $mesin->save();
          //mesin .end

          //transmisi
          $transmisi = new Transmisi;
          $transmisi->spesifikasi_mobil_baru_id = $mobil_baru->id;
          $transmisi->kopling = $request->kopling;
          $transmisi->tipe_transmisi = $request->tipe_transmisi;
          $transmisi->sistem_kemudi = $request->sistem_kemudi;
          $transmisi->save();
          //transmisi .end

          //Kaki
          $kaki = new Kaki;
          $kaki->spesifikasi_mobil_baru_id = $mobil_baru->id;
          $kaki->tipe_rangka = $request->tipe_rangka;
          $kaki->suspensi_depan = $request->suspensi_depan;
          $kaki->suspensi_belakang = $request->suspensi_belakang;
          $kaki->rem_depan = $request->rem_depan;
          $kaki->rem_belakang = $request->rem_belakang;
          $kaki->velg = $request->velg;
          $kaki->ukuran_ban = $request->ukuran_ban;
          $kaki->save();
          //kaki .end

          Session::flash('message', 'Menambah Mobil Baru Sukses!');
          return Redirect::to('dashboard/mobil-baru');
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
      $merek = [''=>'--Pilih Merek--'] + Merek::orderBy('merek', 'asc')->pluck('merek', 'id')->all();
      $design = [''=>'--Pilih Model--'] + Design::orderBy('design', 'asc')->pluck('design', 'id')->all();
      $tipe = [''=>'--Pilih Tipe--'] + Tipe::orderBy('tipe', 'asc')->pluck('tipe', 'id')->all();
      $mobil_baru = SpesifikasiMobilBaru::find($id);
      $dimensi = Dimensi::where('spesifikasi_mobil_baru_id', $id)->first();
      $mesin = Mesin::where('spesifikasi_mobil_baru_id', $id)->first();
      $transmisi = Transmisi::where('spesifikasi_mobil_baru_id', $id)->first();
      $kaki = Kaki::where('spesifikasi_mobil_baru_id', $id)->first();
      return view('dashboard.mobil-baru.show', compact('merek', 'design', 'tipe',
                    'mobil_baru', 'dimensi', 'mesin', 'transmisi', 'kaki'
              ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $merek = [''=>'--Pilih Merek--'] + Merek::orderBy('merek', 'asc')->pluck('merek', 'id')->all();
      $design = [''=>'--Pilih Model--'] + Design::orderBy('design', 'asc')->pluck('design', 'id')->all();
      $tipe = [''=>'--Pilih Tipe--'] + Tipe::orderBy('tipe', 'asc')->pluck('tipe', 'id')->all();
      $mobil_baru = SpesifikasiMobilBaru::find($id);
      $dimensi = Dimensi::where('spesifikasi_mobil_baru_id', $id)->first();
      $mesin = Mesin::where('spesifikasi_mobil_baru_id', $id)->first();
      $transmisi = Transmisi::where('spesifikasi_mobil_baru_id', $id)->first();
      $kaki = Kaki::where('spesifikasi_mobil_baru_id', $id)->first();
      return view('dashboard.mobil-baru.edit', compact('merek', 'design', 'tipe',
                    'mobil_baru', 'dimensi', 'mesin', 'transmisi', 'kaki'
              ));
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
        $mobil_baru = SpesifikasiMobilBaru::find($id);
        $mobil_baru->merek_id = $request->merek_id;
        $mobil_baru->design_id = $request->design_id;
        $mobil_baru->tipe_id = $request->tipe_id;
        $mobil_baru->negara_pembuat = $request->negara_pembuat;
        $mobil_baru->slug = str_slug(Merek::find($request->merek_id)->merek, '-') . '-' .
                            str_slug(Design::find($request->design_id)->design, '-') . '-' .
                            str_slug(str_replace(["+", "/"],["-plus-", "-or-"], Tipe::find($request->tipe_id)->tipe), '-');

        //untuk fotonya
        if($request->hasFile('foto')) {
          //$upload = Mytuta::uploadImageEdit($request->file('foto'), 'mobil-baru', $mobil_baru->foto, 500, null);
          //$mobil_baru->foto = $upload;
          $file = $request->file('foto');
          $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
          Storage::put('mobil-baru/'.$fileName,  File::get($file));
          Storage::delete('mobil-baru/' . $mobil_baru->foto);
          $img = Image::make(storage_path('app/mobil-baru/' . $fileName));
          $img->resize(890, 600, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          });
          //$img->insert('betawaran/logo.png', 'bottom-right'); //watermark
          $mobil_baru->foto = $fileName;
          $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
          $img->save();
        }
        //untuk fotonya .end
        $mobil_baru->save();

        //dimensi
        $dimensi = Dimensi::where('spesifikasi_mobil_baru_id', $id)->first();
        $dimensi->panjang = $request->panjang;
        $dimensi->lebar = $request->lebar;
        $dimensi->tinggi = $request->tinggi;
        $dimensi->jarak_sumbu_roda = $request->jarak_sumbu_roda;
        $dimensi->jarak_pijak_depan = $request->jarak_pijak_depan;
        $dimensi->jarak_pijak_belakang = $request->jarak_pijak_belakang;
        $dimensi->jarak_terendah_ke_tanah = $request->jarak_terendah_ke_tanah;
        $dimensi->radius_putar = $request->radius_putar;
        $dimensi->berat_kosong = $request->berat_kosong;
        $dimensi->save();
        //dimensi .end

        //mesin
        $mesin = Mesin::where('spesifikasi_mobil_baru_id', $id)->first();
        $mesin->jenis_mesin = $request->jenis_mesin;
        $mesin->kapasitas_silinder = $request->kapasitas_silinder;
        $mesin->daya_maksimum = $request->daya_maksimum;
        $mesin->torsi_maksimum = $request->torsi_maksimum;
        $mesin->perbandingan_kompresi = $request->perbandingan_kompresi;
        $mesin->sistem_pembakaran = $request->sistem_pembakaran;
        $mesin->bahan_bakar = $request->bahan_bakar;
        $mesin->kapasitas_bahan_bakar = $request->kapasitas_bahan_bakar;
        $mesin->save();
        //mesin .end

        //transmisi
        $transmisi = Transmisi::where('spesifikasi_mobil_baru_id', $id)->first();
        $transmisi->kopling = $request->kopling;
        $transmisi->tipe_transmisi = $request->tipe_transmisi;
        $transmisi->sistem_kemudi = $request->sistem_kemudi;
        $transmisi->save();
        //transmisi .end

        //Kaki
        $kaki = Kaki::where('spesifikasi_mobil_baru_id', $id)->first();
        $kaki->tipe_rangka = $request->tipe_rangka;
        $kaki->suspensi_depan = $request->suspensi_depan;
        $kaki->suspensi_belakang = $request->suspensi_belakang;
        $kaki->rem_depan = $request->rem_depan;
        $kaki->rem_belakang = $request->rem_belakang;
        $kaki->velg = $request->velg;
        $kaki->ukuran_ban = $request->ukuran_ban;
        $kaki->save();
        //kaki .end

        Session::flash('message', 'Mengganti Mobil Baru Sukses!');
        return Redirect::to('dashboard/mobil-baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil_baru = SpesifikasiMobilBaru::find($id);
        $mobil_baru->delete();
        Session::flash('message', 'Menghapus Mobil Baru Sukses!');
        return Redirect::to('dashboard/mobil-baru');
    }

    public function feature($id)
    {

        $mobil_baru = SpesifikasiMobilBaru::find($id);
        $interior_text = FeatureInteriorText::all();
        $keamanan_text = KeamananText::all();
        //Session::set('ids', $id);
        session(['ids' => $id]);
        return view('dashboard.mobil-baru.feature.index', compact(
                      'mobil_baru', 'interior_text', 'keamanan_text'
                ));
    }

    //interior_exterior
    public function interior()
    {
        //$mobil_baru = SpesifikasiMobilBaru::find($id);
        $interior = FeatureInteriorExterior::where('spesifikasi_mobil_baru_id', session('ids'))->get();
        return view('dashboard.mobil-baru.interior.index', compact(
                      'interior'
                ));
    }
    public function interiorCreate()
    {
      return view('dashboard.mobil-baru.interior.create');
    }
    public function interiorStore(Request $request)
    {
      // ambil semua gambar
      $files = $request->file('images');
      // hitung jumlah semua gambar
      $file_count = count($files);
      // mulai untuk mengupload satu persatu
      // start count how many uploaded
    $uploadcount = 0;
        foreach($files as $file) {
          $rules = array('file' => 'required|mimes:png,gif,jpeg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){

            $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
            Storage::put('interior/'.$fileName,  File::get($file));
            $img = Image::make(storage_path('app/interior/' . $fileName));
            $img->resize(890, 600, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            });
            $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
            $img->save();

            //simpan data gambarnya ke Database
            $interior = new FeatureInteriorExterior;
            $interior->spesifikasi_mobil_baru_id = Session::get('ids');
            $interior->interior_exterior = $fileName;
            $interior->save();
            $uploadcount ++;
          }
        }
        if($uploadcount == $file_count){
          Session::flash('success', 'Upload successfully');
          return Redirect::to('dashboard/mobil-baru/interior');
        }
        else {
          return Redirect::to('dashboard/mobil-baru/interior')->withInput()->withErrors($validator);
        }
    }

    public function interiorEdit($id)
    {
      $interior = FeatureInteriorExterior::find($id);
      return view('dashboard.mobil-baru.interior.edit', compact(
                    'interior'
              ));
    }

    public function interiorUpdate(Request $request, $id)
    {

      $file = $request->file('image');
      $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
      Storage::put('interior/'.$fileName,  File::get($file));
      $img = Image::make(storage_path('app/interior/' . $fileName));
      $img->resize(890, 600, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
      $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
      $img->save();

      $interior = FeatureInteriorExterior::find($id);
      Storage::delete('interior/' . $interior->interior_exterior);
      $interior->interior_exterior = $fileName;
      $interior->save();
      Session::flash('success', 'Upload successfully');
      return Redirect::to('dashboard/mobil-baru/interior');
    }

    public function interiorDestroy($id)
    {
      $interior = FeatureInteriorExterior::find($id);
      $interior->delete();
      Session::flash('success', 'Upload successfully');
      return Redirect::to('dashboard/mobil-baru/interior');
    }
    // interior_exterior end

    // keamanan_kelengkapan
    public function keamanan()
    {
        $keamanan = FeatureKeamananKelengkapan::where('spesifikasi_mobil_baru_id', session('ids'))->get();
        return view('dashboard.mobil-baru.keamanan.index', compact(
                      'keamanan'
                ));
    }
    public function keamananCreate()
    {
      return view('dashboard.mobil-baru.keamanan.create');
    }
    public function keamananStore(Request $request)
    {
      // ambil semua gambar
      $files = $request->file('images');
      // hitung jumlah semua gambar
      $file_count = count($files);
      // mulai untuk mengupload satu persatu
      // start count how many uploaded
    $uploadcount = 0;
        foreach($files as $file) {
          $rules = array('file' => 'required|mimes:png,gif,jpeg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){

            $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
            Storage::put('keamanan/'.$fileName,  File::get($file));
            $img = Image::make(storage_path('app/keamanan/' . $fileName));
            $img->resize(890, 600, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            });
            $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
            $img->save();

            //simpan data gambarnya ke Database
            $keamanan = new FeatureKeamananKelengkapan;
            $keamanan->spesifikasi_mobil_baru_id = Session::get('ids');
            $keamanan->keamanan_kelengkapan = $fileName;
            $keamanan->save();
            $uploadcount ++;
          }
        }
        if($uploadcount == $file_count){
          Session::flash('success', 'Upload successfully');
          return Redirect::to('dashboard/mobil-baru/keamanan');
        }
        else {
          return Redirect::to('dashboard/mobil-baru/keamanan')->withInput()->withErrors($validator);
        }
    }

    public function keamananEdit($id)
    {
      $keamanan = FeatureKeamananKelengkapan::find($id);
      return view('dashboard.mobil-baru.keamanan.edit', compact(
                    'keamanan'
              ));
    }

    public function keamananUpdate(Request $request, $id)
    {
      $file = $request->file('image');
      $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
      Storage::put('keamanan/'.$fileName,  File::get($file));
      $img = Image::make(storage_path('app/keamanan/' . $fileName));
      $img->resize(890, 600, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
      $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
      $img->save();

      $keamanan = FeatureKeamananKelengkapan::find($id);
      Storage::delete('keamanan/' . $interior->interior_exterior);
      $keamanan->keamanan_kelengkapan = $fileName;
      $keamanan->save();
      Session::flash('success', 'Upload successfully');
      return Redirect::to('dashboard/mobil-baru/keamanan');
    }

    public function keamananDestroy($id)
    {
      $keamanan = FeatureKeamananKelengkapan::find($id);
      $keamanan->delete();
      Session::flash('success', 'Upload successfully');
      return Redirect::to('dashboard/mobil-baru/keamanan');
    }
    // keamanan_kelengkapan end

    // admin gallery
    public function gallery()
    {
        //$mobil_baru = SpesifikasiMobilBaru::find($id);
        $gallery = Gallery::where('spesifikasi_mobil_baru_id', session('ids'))->get();
        return view('dashboard.mobil-baru.gallery.index', compact(
                      'gallery'
                ));
    }
    public function galleryCreate()
    {
      return view('dashboard.mobil-baru.gallery.create');
    }
    public function galleryStore(Request $request)
    {
      // ambil semua gambar
      $files = $request->file('images');
      // hitung jumlah semua gambar
      $file_count = count($files);
      // mulai untuk mengupload satu persatu
      // start count how many uploaded
    $uploadcount = 0;
        foreach($files as $file) {
          $rules = array('file' => 'required|mimes:png,gif,jpeg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){
            // $destinationPath = 'uploads';
            // $filename = $file->getClientOriginalName();
            // $upload_success = $file->move($destinationPath, $filename);
            //$upload = Mytuta::uploadImage($file, 'gallery', 500, null);

            //$file = $request->file('foto');
            $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
            Storage::put('gallery/'.$fileName,  File::get($file));
            //Storage::delete('mobil-baru/' . $mobil_baru->foto);
            $img = Image::make(storage_path('app/gallery/' . $fileName));
            $img->resize(890, 600, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            });
            //$img->insert('betawaran/logo.png', 'bottom-right'); //watermark
            //$mobil_baru->foto = $fileName;
            $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
            $img->save();

            //simpan data gambarnya ke Database
            $gallery = new Gallery;
            $gallery->spesifikasi_mobil_baru_id = Session::get('ids');
            $gallery->gallery = $fileName;
            $gallery->save();

            $uploadcount ++;
          }
        }
        if($uploadcount == $file_count){
          Session::flash('success', 'Upload successfully');
          return Redirect::to('dashboard/mobil-baru/gallery');
        }
        else {
          return Redirect::to('dashboard/mobil-baru/gallery')->withInput()->withErrors($validator);
        }
    }

    public function galleryEdit($id)
    {
      $gallery = Gallery::find($id);
      return view('dashboard.mobil-baru.gallery.edit', compact(
                    'gallery'
              ));
    }

    public function galleryUpdate(Request $request, $id)
    {
      //$upload = Mytuta::uploadImage($request->file('image'), 'gallery', 500, null);

      $file = $request->file('image');
      $fileName = 'TUTA' . str_random(100) . '.' . $file->getClientOriginalExtension();
      Storage::put('gallery/'.$fileName,  File::get($file));
      //Storage::delete('mobil-baru/' . $mobil_baru->foto);
      $img = Image::make(storage_path('app/gallery/' . $fileName));
      $img->resize(890, 600, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
      //$img->insert('betawaran/logo.png', 'bottom-right'); //watermark
      //$mobil_baru->foto = $fileName;
      $img->resizeCanvas(890, 600, 'center', false, array(204, 204, 204, 0));
      $img->save();

      $gallery = Gallery::find($id);
      Storage::delete('gallery/' . $gallery->gallery);
      $gallery->gallery = $fileName;
      $gallery->save();
      Session::flash('success', 'Upload successfully');
      return Redirect::to('dashboard/mobil-baru/gallery');
    }

    public function galleryDestroy($id)
    {
      $gallery = Gallery::find($id);
      $gallery->delete();
      Session::flash('success', 'Upload successfully');
      return Redirect::to('dashboard/mobil-baru/gallery');
    }

    //interior_exterior text
    public function interiorStoreText(Request $request)
    {
      $rules     = array(
                  'interior_exterior' => 'required|unique:feature_interior_exterior'
                    );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $interior_exterior = FeatureInteriorText::create([
          'interior_exterior' => $request->interior_exterior,
          'spesifikasi_mobil_baru_id' => $request->spesifikasi_mobil_baru_id
      ]);


      return response()->json([
             'success'  => true,
             'data' => $interior_exterior
             ]);
    }

    public function interiorEditText($id)
    {
      $interior_exterior = FeatureInteriorText::find($id);
      return Response::json($interior_exterior);
    }
    public function interiorUpdateText(Request $request, $id)
    {
      $rules = array(
                  'interior_exterior'   => 'required|unique:feature_interior_exterior,interior_exterior,' . $id,
                    );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $feature_interior_exterior = FeatureInteriorText::findOrFail($id);
      $feature_interior_exterior->update($request->all());

      return response()->json([
             'success'  => true,
             'data' => $feature_interior_exterior
             ]);
    }

    public function interiorDestroyText($id)
    {
      FeatureInteriorText::destroy($id);
      return response()->json([
             'success' => true,
             ]);
    }
    // interior_exterior text end

    // keamanan_kelengkapan text
    public function keamananStoreText(Request $request)
    {
      $rules     = array(
                  'keamanan_kelengkapan' => 'required|unique:feature_keamanan_kelengkapan'
                    );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $keamanan_kelengkapan = KeamananText::create([
          'keamanan_kelengkapan' => $request->keamanan_kelengkapan,
          'spesifikasi_mobil_baru_id' => $request->spesifikasi_mobil_baru_id
      ]);


      return response()->json([
             'success'  => true,
             'data' => $keamanan_kelengkapan
             ]);
    }

    public function keamananEditText($id)
    {
      $keamanan_kelengkapan = KeamananText::find($id);
      return Response::json($keamanan_kelengkapan);
    }
    public function keamananUpdateText(Request $request, $id)
    {
      $rules = array(
                  'keamanan_kelengkapan'   => 'required|unique:feature_keamanan_kelengkapan,keamanan_kelengkapan,' . $id,
                    );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $feature_keamanan_kelengkapan = KeamananText::findOrFail($id);
      $feature_keamanan_kelengkapan->update($request->all());

      return response()->json([
             'success'  => true,
             'data' => $feature_keamanan_kelengkapan
             ]);
    }

    public function keamananDestroyText($id)
    {
      KeamananText::destroy($id);
      return response()->json([
             'success' => true,
             ]);
    }
    // keamanan_kelengkapan text end

}
