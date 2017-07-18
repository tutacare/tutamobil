<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth, Session, Redirect, Hash;
use Storage, File, Image;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
      $profile = User::find(Auth::user()->id);
      return view('dashboard.pengaturan.profile.index', compact('profile'));
    }

    public function update(ProfileRequest $request, $id)
    {
      $profile = User::find($id);

      $data = $request->except(['password', 'foto']);
      if($request->has('password'))
      {
        $data = array_merge($data, ['password' => Hash::make($request->password)]);
      }
      if($request->hasFile('foto'))
      {
        $image = $request->file('foto');
        $name_of_image = uniqid('TUTAIMG') . str_random(5) . '.' . $image->getClientOriginalExtension();
        if($profile->foto <> 'no-foto.png')
        {
        Storage::delete('user/'.$profile->foto);
        }
        Storage::put('user/'.$name_of_image,  File::get($image));
        $img = Image::make(storage_path('app/user/' . $name_of_image));
        $img->resize(256, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save();
        $data = array_merge($data, ['foto' => $name_of_image]);
      }

      $profile->update($data);
      Session::flash('message', 'Profile telah di update!');
      return Redirect::to('dashboard/profile');
    }
}
