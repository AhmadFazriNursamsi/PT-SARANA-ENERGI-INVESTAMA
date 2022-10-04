<?php

namespace App\Http\Controllers;

use App\Models\Top;
use App\Http\Controllers\HelpersController as Helpers;
use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Top.index');
    }
    public function getdata()
    {
        $datas = Top::get();
        return response()->json(['data' => $datas, 'status' => '200'], 200);
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
        $datas = new Top;
        $datas->judul = $request->judul;
        $datas->genre = $request->genre;
        $datas->descrip = $request->descrip;
        $datas->duration = $request->duration;
        $datas->created_at = date('Y-m-d H:i:s');

        $judul=  $datas->judul;
        $idd =   $datas->created_at; 

       $datas->img = Helpers::generateKodekaryawan($judul, $idd);                            
       $helperuntukupload = Helpers::uploadImage($request, $datas->img); 
    
       
        $datas->img = $helperuntukupload;

       $datas->save();
       
        return response()->json(['data' => ['success'], 'status' => '200'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Top  $top
     * @return \Illuminate\Http\Response
     */

     
    public function show(Top $top)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Top  $top
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Top $top)
    {
        $datas = Top::where('id', $id)->first();
      
        return response()->json(['data' => $datas, 'status' => '200'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Top  $top
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Top $top)
    {
        // dd($request);
        $datas = Top::where('id', $id)->first();
        $datas->judul = $request->judul;
        $datas->genre = $request->genre;
        $datas->descrip = $request->descrip;
        $datas->duration = $request->duration;
        $datas->created_at = date('Y-m-d H:i:s');


        $judul=  $datas->judul;
        $idd =   $datas->created_at;
        $datas->img = Helpers::generateKodekaryawan($judul, $idd);                            
       $helperuntukupload = Helpers::uploadImage($request, $datas->img); 
    
       
        $datas->img = $helperuntukupload;
        $datas->save();
        return response()->json(['data' => ['success'], 'status' => '200'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Top  $top
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Top $top)
    {
        Top::where('id', $id)->delete();

        return response()->json(['data' => ['success'], 'status' => '200'], 200);
    }
}
