<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        $workers_obj=[];
        foreach ($workers as $worker) {
            $workers_obj[$worker->id]=$worker;
        }
        $workers_obj=(object)$workers_obj;

        return view('worker.worker', ['workers' => $workers,'workers_obj'=>$workers_obj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:workers'
        ]);
        $worker = new Worker();
        $worker->name = $request->name;
        $worker->save();

        return redirect()->route('worker.index')->with('success'    ,'Yangi ishchi yaratildi');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $worker =Worker::find($request->id);
        $worker->name = $request->name;
        $worker->save();

        return redirect()->route('worker.index')->with('success'    ,'Tahrirlandi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Worker $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $worker)
    {
        $worker = Worker::find($worker);
        $worker->delete();
        return redirect()->route('worker.index')->with('success'    ,'Muvaffiqiyatli o`chirildi');

    }
}
