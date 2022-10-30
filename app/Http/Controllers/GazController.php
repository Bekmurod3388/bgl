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
    public function index(Request $request)
    {
//        dd('gaz');
        $gazs=Gaz::orderBy('created_at','desc')->paginate(4);
$all_sum=0;

        $ishs=[];
        foreach ($gazs as $ish){
            $ishs[$ish->id]=$ish;
            $all_sum+=$ish['money_paid'];

        }



        return view('gaz.gaz',compact('gazs','ishs','all_sum'));
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
//        dd($request);
        $request->validate([
            'pakazaniya'=>'required',
            'money_paid'=>'required'
        ]);
        $gaz=Gaz::find($id);

        $av=$gaz['all_sum'];
        $gaz->pakazaniya=$request['pakazaniya'];
        $gaz->money_paid=$request['money_paid'];
//        $gaz['all_sum']=$av+$request['money_paid'];

        $gaz->date=$request['date'];
//        dd($gaz);
        $gaz->save( );
        $data=Gaz::find($id);
        $data['all_sum']=$av-$request['all_sum'];

        return redirect()->route('gaz.index')->with('success','Gaz Tahrirlandi');

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
        $avval=$gaz['all_sum'];
        $money=$gaz['money_paid'];
        $gazs=new Gaz();
        $gazs['all_sum']=$avval-$money;
        $gaz->delete();
        return redirect()->route('gaz.index')->with('success','Gaz ochirildi');

    }
}
