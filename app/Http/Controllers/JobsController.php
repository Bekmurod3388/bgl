<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Tur;
use App\Models\Work;
use App\Models\Worker;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::orderBy('created_at', 'desc')->paginate(4);
        $ishs = [];
        foreach ($jobs as $ish) {
            $ishs[$ish->id] = $ish;
        }
        $workers = Worker::all();
        $works = Work::all();

        return view('jobs.jobs', [
                'jobs' => $jobs,
                'ishs' => $ishs,
                'works' => $works,
                'workers' => $workers,
            ]
        );

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
//        dd($request);
        $request->validate([
            'worker_id'=>'required',
            'type_work_id'=>'required',
            'date'=>'required',
            'type'=>'required',
            'all_sum'=>'required'
        ]);
        $work = new Jobs();
        $work->worker_id = $request->worker_id;
        $work->type_work_id = $request->type_work_id;
        $work->date = $request->date;
        $work->type = $request->type;
        $work->all_sum = $request->all_sum;
        $work->save();
        return  redirect()->route('jobs.index')->with('success','ish Muffaqatli yaratildi');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Jobs $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Jobs $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobs $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jobs $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'worker_id'=>'required',
            'type_work_id'=>'required',
            'date'=>'required',
            'type'=>'required',
            'all_sum'=>'required'
        ]);
        $work = Jobs::find($id);
//        dd($request);
//        dd($work);
        $work->worker_id = $request->worker_id;
        $work->type_work_id = $request->type_work_id;
        $work->date = $request->date;
        $work->type = $request->type;
        $work->all_sum = $request->all_sum;
        $work->save();
        return  redirect()->route('jobs.index')->with('success','ish Muvoffaqtlatli tahrirlandi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Jobs $jobs
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        $jobs = Jobs::find($id);
        $jobs->delete();
      return  redirect()->route('jobs.index')->with('success','ish Muvoffaqtli ochirildi');

    }
}
