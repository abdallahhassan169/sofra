<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records=Offer::whereHas('restaurant',function($q) use($request){
            if($request->has('name')){
                $q->where('name','like','%'.$request->name.'%');}

        })->orWhereHas('meal',function($q) use($request){
            if($request->has('name')){
                $q->where('name','like','%'.$request->name.'%');}

        })
            ->orWhere(function($q) use($request){
                if($request->has('name')){
                    $q->where('text','like','%'.$request->name.'%');}

            })->paginate(10);
        return view('admin/offers/list',compact('records'));
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
        $record=Offer::findOrFail($id);
        return view('admin/offers/show',compact('record'));
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
        $record=Offer::findOrFail($id);
        $record->delete();
        return route('offers.index');
    }
}
