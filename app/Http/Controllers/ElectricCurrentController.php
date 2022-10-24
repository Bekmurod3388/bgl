<?php

namespace App\Http\Controllers;

use App\Models\Electric_Current;
use Illuminate\Http\Request;

class ElectricCurrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        dd('tttok');
        $electric_current=Electric_Current::orderBy('created_at','desc')->paginate(4);

//        dd($electric_current);
        $ishs=[];
        foreach ($electric_current as $ish){
            $ishs[$ish->id]=$ish;
        }

        return view('electric_current.electric_current',compact('electric_current','ishs'));
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
        $request->validate([
            'pakazaniya'=>'required',
            'money_paid'=>'required'
        ]);
        $gaz=new Electric_Current();
        $gaz->pakazaniya=$request->pakazaniya;
        $gaz->money_paid=$request->money_paid;
        $gaz->date=$request->date;
        $gaz->save();
        return redirect()->route('electric_current.index')->with('success','Elektr toki yaratildi');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electric_Current  $electric_Current
     * @return \Illuminate\Http\Response
     */
    public function show(Electric_Current $electric_Current)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electric_Current  $electric_Current
     * @return \Illuminate\Http\Response
     */
    public function edit(Electric_Current $electric_Current)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electric_Current  $electric_Current
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'pakazaniya'=>'required',
            'money_paid'=>'required'
        ]);
        $gaz=Electric_Current::find($id);
        $gaz->pakazaniya=$request['pakazaniya'];
        $gaz->money_paid=$request['money_paid'];
        $gaz->date=$request['date'];
        $gaz->save();


        return redirect()->route('electric_current.index')->with('success','Elektr toki tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electric_Current  $electric_Current
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gaz=Electric_Current::find($id);
        $gaz->delete();
        return redirect()->route('eletric_current')->with('success','Elektr toki ochirildi');
    }
}
