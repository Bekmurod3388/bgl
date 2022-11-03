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
    public function index(Request $request)
    {
        $id = $request['id'];
        $jobs = Jobs::orderBy('created_at', 'desc')->where('worker_id', $id)->paginate(4);
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
                'id' => $id,
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

        $id=$request['worker_idd'];

        $request->validate([
            'worker_idd'=>'required',
            'type_work_id'=>'required',
            'date'=>'required',
            'type'=>'required'
        ]);

        $price = Work::find($request['type_work_id']);

        $work = new Jobs();
        $work->worker_id = $request->worker_idd;
        $work->type_work_id = $request->type_work_id;
        $work->date = $request->date;
        $work->type = $request->type;
        $work->all_sum = $price['price'] * $request['type'];
        $work->save();
        $worker=Worker::find($id);

        $worker['all_sum']+=$work['all_sum'];
        $worker['indebtedness']=$worker['all_sum']-$worker['given_sum'];
        $worker->save();
        return  redirect()->back()->with('success','ish Muffaqatli yaratildi');


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

        $id =$request['id'];
        $request->validate([
            'worker_id'=>'required',
            'type_work_id'=>'required',
            'date'=>'required',
            'type'=>'required',
        ]);
        $work = Jobs::find($id);
        $avvalgi_price=$work->all_sum;
        $price = Work::find($request['type_work_id']);

        $work->worker_id = $request->worker_id;

        $work->date = $request->date;
        $work->type = $request->type;
      $work->all_sum = $price['price'] * $request['type'];
        $work->save();
        $new_price=$work->all_sum;
        $id=$request['worker_id'];
        $worker=Worker::find($id);
        $worker['all_sum']+=$new_price-$avvalgi_price;
        $worker['indebtedness']=$worker['all_sum']-$worker['given_sum'];
        $worker->save();





        return  redirect()->back()->with('success','ish Muvoffaqtlatli tahrirlandi');

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
//        dd($jobs);
        $id=$jobs['worker_id'];
        $all_sum=$jobs['all_sum'];
        $worker=Worker::find($id);
        $worker['all_sum']-=$all_sum;
        $worker['indebtedness']-=$all_sum;
        $worker->save();
        $jobs->delete();
      return  redirect()->back()->with('success','ish Muvoffaqtli ochirildi');

    }
}
