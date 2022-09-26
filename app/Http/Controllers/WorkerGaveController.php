<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\WorkerGave;
use Illuminate\Http\Request;

class WorkerGaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        $worker_gaves = WorkerGave::all();
        return view("admin.worker_gaves.index", compact("worker_gaves", "workers"));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'worker_id' => "required",
            'price' => "required",
            'date' => "required",
        ]);
        $worker = new WorkerGave();
        $worker['worker_id'] = $request['worker_id'];
        $worker['price'] = $request['price'];
        $worker['date'] = $request['date'];
        $worker->save();
        return redirect()->route("worker_gaves.index");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WorkerGave $workerGave
     * @return \Illuminate\Http\Response
     */
    public function show(WorkerGave $workerGave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WorkerGave $workerGave
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkerGave $workerGave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkerGave $workerGave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request['id'];
        $worker_gaves = WorkerGave::find($id);
        $worker_gaves['price'] = $request['price'];
        $worker_gaves->save();
        return redirect()->route("worker_gaves.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WorkerGave $workerGave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workerGave = WorkerGave::find($id)->delete();
        return redirect()->route("worker_gaves.index");
    }
}
