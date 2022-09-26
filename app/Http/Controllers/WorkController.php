<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Tur;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $works=Work::orderBy('created_at','desc')->paginate(6);
        $ishs=[];
        foreach ($works as $ish){
            $ishs[$ish->id]=$ish;
        }
        dd($ish);



        $create=Tur::all();
        return view('work',compact('works','ishs','create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


//        return  view('ishturi',compact('create'));
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
                'type'=>'required',
                'price'=>'required'
            ]
        );
      $ish=new Work();
      $ish->name=$request->name;
      $ish->type=$request->type;
      $ish->price=$request->price;
   $ish->save();
return redirect()->route('work.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $ishturi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $result=$request->validate(
            [
                'name'=>'required',
                'type'=>'required',
                'price'=>'required'
            ]
        );
        $ish=new Work();
        $ish->name=$request->name;
        $ish->type=$request->type;
        $ish->price=$request->price;
        $ish->save();
        return  redirect()->route('work.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $ishturi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $works=Work::find($id);
        $works->delete();
        return redirect()->route('work.index');
    }
}
