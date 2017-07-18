<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use Validator, Response;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bank = Bank::all();
      return view('dashboard.pengaturan.bank.index', compact('bank'));
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
      $rules     = array(
                        'name'   => 'required|unique:banks'
                        );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $bank = Bank::create([
          'name' => $request->name
      ]);


      return response()->json([
             'success'  => true,
             'data' => $bank
             ]);
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
      $bank = Bank::find($id);
      return Response::json($bank);
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
      $rules = array(
                  'name'   => 'required|unique:banks,name,' . $id,
                    );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $bank = Bank::findOrFail($id);
      $bank->update($request->all());

      return response()->json([
             'success'  => true,
             'data' => $bank
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
      Bank::destroy($id);
      return response()->json([
             'success' => true,
             ]);
    }
}
