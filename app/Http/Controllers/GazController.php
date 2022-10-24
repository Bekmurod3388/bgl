<?php

namespace App\Http\Controllers;

use App\Models\Gaz;
use Illuminate\Http\Request;

class GazController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('gaz');
        $gazs=Gaz::orderBy('created_at','desc')->paginate(4);

//        dd($gazs);
        $ishs=[];
        foreach ($gazs as $ish){
            $ishs[$ish->id]=$ish;
        }

        return view('gaz.gaz',compact('gazs','ishs'));
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
        $gaz=new Gaz();
        $gaz->pakazaniya=$request->pakazaniya;
        $gaz->money_paid=$request->money_paid;
        $gaz->date=$request->date;
        $gaz->save();
        return redirect()->route('gaz.index')->with('success','Gaz yaratildi');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaz  $gaz
     * @return \Illuminate\Http\Response
     */
    public function show(Gaz $gaz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaz  $gaz
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaz $gaz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gaz  $gaz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'pakazaniya'=>'required',
            'money_paid'=>'required'
        ]);
        $gaz=Gaz::find($id);
        $gaz->pakazaniya=$request['pakazaniya'];
        $gaz->money_paid=$request['money_paid'];
        $gaz->date=$request['date'];
        $gaz->save();


        return redirect()->route('gaz.index')->with('success','Gaz yaratildi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaz  $gaz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gaz=Gaz::find($id);
        $gaz->delete();
        return redirect()->route('gaz.index')->with('success','Gaz ochirildi');

    }
}
