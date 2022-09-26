<?php

namespace App\Http\Controllers;

use App\Models\Tur;
use App\Models\Work;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $type=Tur::all();
        $ishs=[];
        foreach ($type as $ish){
            $ishs[$ish->id]=$ish;
        }

        return view('type',compact('type','ishs'));
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
        $result=$request->validate(
            [
                'name'=>'required',
            ]
        );
        $type=new Tur();
        $type->name=$request->name;
        $type->save();
        return redirect()->route('type.index');
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
//        $types=Tur::find($id);
//        return view('type',compact('types'));
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
        $result=$request->validate(
            [
                'name'=>'required',
            ]
        );
//        dd($request);
        $type=Tur::find($request->id);
        $type->name=$request->name;
        $type->save();
        return  redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type=Tur::find($id);
        $type->delete();
        return redirect()->route('type.index');
    }
}
