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
    public function index(Request $request)
    {
        $id = $request['id'];
        $worker_gaves = WorkerGave::orderby('date' , 'DESC')-> where('worker_id', $id)->get();
        $sum_price = 0;
        foreach ($worker_gaves as $date)
            $sum_price += $date['price'];
        return view("admin.worker_gaves.index", compact("id", "worker_gaves", "sum_price"));
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
        $price = $request['price'];
        $id = $request['worker_id'];
        $worker = new WorkerGave();
        $worker['worker_id'] = $request['worker_id'];
        $worker['price'] = $request['price'];
        $worker['date'] = $request['date'];
        $worker->save();
        $firm = Worker::find($id);
        $firm['given_sum'] += $price;
        $firm['indebtedness'] = $firm['all_sum'] - $firm['given_sum'];
        $firm->save();
        return redirect()->back()->with("success", "Ishchi oldi berdi muvaffaqqiyatli yaratildi");
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
        $worker_gaves = WorkerGave::find($id);
        $firm_id = $worker_gaves['worker_id'];
        $price = $worker_gaves['price'];
        $firm = Worker::find($firm_id);
        $firm['indebtedness'] += $price;
        $firm['given_sum'] -= $price;
        $firm->save();
        $worker_gaves->delete();
        return redirect()->back()->with("success", "Ishchi oldi berdi muvaffaqqiyatli yaratildi");
    }
}
