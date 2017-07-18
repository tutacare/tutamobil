<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post, App\Category;
use Storage, File, Image, Session;
use Redirect, Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $post = Post::orderBy('id', 'desc')->get();
      return view('dashboard.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = [''=>'--Pilih Kategori--'] + Category::orderBy('category', 'asc')->pluck('category', 'id')->all();
        return view('dashboard.post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = new Post;
      $post->post_title = $request->post_title;
      $post->post_content = $request->post_content;
      $post->user_id = Auth::user()->id;
      $post->post_tag = $request->post_tag;
      $post->category_id = $request->category_id;
      if($request->button == 'Publish')
      {
        $post->post_status = 'Publish';
      } else {
        $post->post_status = 'Draft';
      }

      //untuk fotonya
      if($request->hasFile('post_foto')) {
        //$upload = Mytuta::uploadImage($request->file('foto'), 'mobil-baru', 890, null);

        $file = $request->file('post_foto');
        $fileName = uniqid('TUTAIMG') . str_random(5) . '.' . $file->getClientOriginalExtension();
        Storage::put('post/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/post/' . $fileName));
        $img->resize(890, 600, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        //$img->insert('betawaran/logo.png', 'bottom-right'); //watermark
        $post->post_foto = $fileName;
        $img->resizeCanvas(890, 600, 'center', false, '#D9534F');
        $img->save();

        //$mobil_baru->foto = $upload;
      }
      //untuk fotonya .end
      $post->save();

      $slug = Post::find($post->id);
      $search_slug = Post::where('post_slug', str_slug($post->post_title, "-"))->first();

      if($search_slug)
      {
          $slug->post_slug = str_slug($post->post_title, "-") . '-' . $post->id;

      } else {
        $slug->post_slug = str_slug($post->post_title, "-");
      }
      $slug->save();
      Session::flash('message', 'Menambah Posting Sukses!');
      return Redirect::to('dashboard/post/' . $post->id . '/edit');
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
      $post = Post::find($id);
      $category = [''=>'--Pilih Kategori--'] + Category::orderBy('category', 'asc')->pluck('category', 'id')->all();
      return view('dashboard.post.edit', compact(
                  'post', 'category'
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
      $post = Post::find($id);
      $post->post_title = $request->post_title;
      $post->post_content = $request->post_content;
      if($request->button == 'Publish')
      {
        $post->post_status = 'Publish';
      } else {
        $post->post_status = 'Draft';
      }

      //untuk fotonya
      if($request->hasFile('post_foto')) {
        //$upload = Mytuta::uploadImage($request->file('foto'), 'mobil-baru', 890, null);

        $file = $request->file('post_foto');
        $fileName = uniqid('TUTAIMG') . str_random(5) . '.' . $file->getClientOriginalExtension();
        Storage::put('post/'.$fileName,  File::get($file));
        Storage::delete('post/' . $post->post_foto);
        $img = Image::make(storage_path('app/post/' . $fileName));
        $img->resize(890, 600, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        //$img->insert('betawaran/logo.png', 'bottom-right'); //watermark
        $post->post_foto = $fileName;
        $img->resizeCanvas(890, 600, 'center', false, '#D9534F');
        $img->save();

        //$mobil_baru->foto = $upload;
      }
      //untuk fotonya .end
      $post->save();

      $slug = Post::find($post->id);
      $search_slug = Post::where('post_slug', str_slug($post->post_title, "-"))->whereNotIn('id', [$post->id])->first();

      if($search_slug)
      {
          $slug->post_slug = str_slug($post->post_title, "-") . '-' . $post->id;

      } else {
        $slug->post_slug = str_slug($post->post_title, "-");
      }
      $slug->save();
      Session::flash('message', 'Mengganti Posting Sukses!');
      return Redirect::to('dashboard/post/' . $post->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = post::find($id);
      $post->delete();
      Session::flash('message', 'Menghapus Posting Sukses!');
      return Redirect::to('dashboard/post');
    }
}
