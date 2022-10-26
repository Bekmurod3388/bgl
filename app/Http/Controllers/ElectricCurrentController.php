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
        $all_sum=0;
        $ishs=[];
        foreach ($electric_current as $ish){
            $ishs[$ish->id]=$ish;
            $all_sum+=$ish['money_paid'];
        }

        return view('electric_current.electric_current',compact('electric_current','ishs','all_sum'));
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
        $gaz['all_sum']=$request['money_paid'];
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

//        dd($request);
//        $idd=$request['id'];
        $request->validate([
            'pakazaniya'=>'required',
            'money_paid'=>'required'
        ]);

        $gaz=Electric_Current::find($id);
        $av=$gaz['all_sum'];
        $gaz->pakazaniya=$request['pakazaniya'];
        $gaz->money_paid=$request['money_paid'];
        $gaz['all_sum']=$av+$request['money_paid'];

        $gaz->date=$request['date'];
        $gaz->save();
//        $data=Electric_Current::find($idd);
//        $data['all_sum']=$av-$request['all_sum'];
//        $data->save();


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
        $avval=$gaz['all_sum'];
        $money=$gaz['money_paid'];
        $gazs=new Electric_Current();
        $gazs['all_sum']=$avval-$money;
        $gaz->delete();
        return redirect()->route('electric_current.index')->with('success','Elektr toki ochirildi');
    }
}
