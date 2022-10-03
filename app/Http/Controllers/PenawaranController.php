<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Penawaran;
use App\Http\Controllers\HelpersController as Helpers;
use Illuminate\Support\Facades\Session;

use App\Models\ItemPenawaran;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function apigetdatauser(){
        $db = ItemPenawaran::get();
        $datas = [];
    	foreach($db as $key => $dbb){
    		$datas[$key] = [
                $dbb->nama_item, $dbb->quantity, $dbb->harga,$dbb->item_id
            ];
            }
        return response()->json(['data' => $datas, 'status' => '200'], 200);

    }

    public function index()
    {

    	$this->access = Helpers::checkaccess('penawaran', 'view');
        if(!$this->access) {
            Session::flash('message', "you don't have permission to access");
            return redirect('/dashboard');  
        }

        return view('penawaran.index');
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
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function show($id, Penawaran $penawaran)
    {
        $datas = ItemPenawaran::where('item_id', $id)->first();
        // dd($datas);

        return response()->json(['data' => $datas, 'status' => '200'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function beli($id, Request $request, Penawaran $penawaran)
    {
        // dd($id);
        ItemPenawaran::where('item_id', $id)->delete();
        $db = new ItemPenawaran;
        $db->item_id = $id;
        $db->nama_item = $request->item;
        $db->harga = $request->harga;
        $tampung = $request->jumlah;
        $hasil = $tampung - $request->beli;
        $db->quantity = $hasil;
        $db->save();
       
        return response()->json(['data' => ['success'], 'status' => '200'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penawaran $penawaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penawaran $penawaran)
    {
        //
    }
}
