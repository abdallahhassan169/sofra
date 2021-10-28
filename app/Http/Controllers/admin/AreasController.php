<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\Area;
use App\models\City;
use App\models\Type;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $areas=Area::all();
       return view('admin/areas/list',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        return view('admin/areas/create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=validator($request->all(),[
            'name'=>'required|min:3|max|50',
            'city_id'=>'required|exists:cities,id',
        ]);
        $type=Area::create($request->all());
        return redirect(route('areas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities=City::all();
        $record=Area::findOrFail($id);
        return view('admin/areas/edit',compact('record','cities'));
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
        $record=Area::findOrFail($id);
        $record->update($request->all());
        return redirect(route('areas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Area::findOrFail($id);
        $record->delete();
        return redirect(route('areas.index'));

    }
}
