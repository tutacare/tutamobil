<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Validator, Response;

class CategoryController extends Controller
{

    public function index()
    {
      $category = Category::all();
      return view('dashboard.post.category.index', compact('category'));
    }


    public function store(Request $request)
    {
      $rules = array(
            'category' => 'required|unique:categories'
                    );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $category = Category::create([
          'category' => $request->category,
          'slug' => str_slug($request->category, "-"),
      ]);


      return response()->json([
             'success'  => true,
             'data' => $category
             ]);
    }

    public function edit($id)
    {
      $category = Category::find($id);
      return Response::json($category);
    }

    public function update(Request $request, $id)
    {
      $rules = array(
                  'category'   => 'required|unique:categories,category,' . $id,
                    );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $category = Category::findOrFail($id);
      $category->update([
          'category' => $request->category,
          'slug' => str_slug($request->category, "-"),
      ]);

      return response()->json([
             'success'  => true,
             'data' => $category
             ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Category::destroy($id);
      return response()->json([
             'success' => true,
             ]);
    }


}
