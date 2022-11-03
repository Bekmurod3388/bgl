@extends('adminpanel.master')
@section('title','Ishlar nomi')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> Qo'shish
                    </button>
                    <a href="{{ route('worker.index') }}" class="btn btn-info">
                        <i class="fa fa-backward"></i> Orqaga
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Ishchi</th>
                            <th>Ish tur</th>
                            <th>Sana</th>

                            <th>vaqt yoki kg yoki dona</th>
                            <th>Jami Summa</th>


                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->id}}</td>
                                <td>{{$job->worker->name}}</td>
                                <td>{{$job->work->name}}</td>
                                <td>{{$job->date}}</td>
                                <td>{{$job->type}}</td>
                                <td>{{number_format($job->all_sum, 0,',',' ')}}</td>
                                <td class="col-2">
                                    <form action="{{route('jobs.destroy',$job->id)}}" method="POST">
                                        <button onclick="edit({{$job->id}})" type="button" class="btn btn-warning"
                                                data-toggle="modal" data-target="#modal-edit">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <a href="{{route('jobs.destroy',$job->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button title="O'chirish" type="submit"
                                                    class="btn btn-danger active btn-md pl-3 pr-3 show_confirm"><span
                                                        class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div class="container">
                        <div class="row justify-content-center">

                            @if ($jobs->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $jobs->links()}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>





    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ish nomi qoshish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('jobs.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="id" id="edit_id">
                            <input type="hidden" value="{{ $id }}" name="worker_idd">

                            <div class="form-group">
                                <label for="type_work_id">Ish turi</label>
                                <select class="custom-select" id="type_work_id" name="type_work_id">
                                    @foreach($works as $work)
                                        <option value="{{$work->id}}">{{$work->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Sana</label>
                                <input type="date" class="form-control" id="date" placeholder="date"
                                       value="<?php echo date("Y-m-d");?>" name="date">
                            </div>
                            <div class="form-group">
                                <label for="type"> Miqdorini kiriting </label>
                                <input type="text" class="form-control" id="type" placeholder=""
                                       name="type">
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tahrirlash</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('jobs.update',1)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <input type="hidden" name="id" id="edit_idd">

                            <input type="hidden" id="worker_id_edit" value="{{$id}}" name="worker_id">

                            <div class="form-group">
                                <label for="worker_id">Ishchi</label>
                                <select class="custom-select" id="worker_id_edit" name="worker_id">
                                    @foreach($workers as $worker)

                                        <option value="{{$worker->id}}">{{$worker->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type_work_id_edit">Ish turi</label>
                                <select class="custom-select" id="type_work_id_edit" name="type_work_id">
                                    @foreach($works as $work)

                                        <option value="{{$work->id}}">{{$work->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Sana</label>
                                <input type="date" class="form-control" id="date" placeholder="date"
                                       value="<?php echo date("Y-m-d");?>" name="date">
                            </div>
                            <div class="form-group">
                                <label for="type_edit">vaqt yoki kg yoki dona</label>
                                <input type="text" class="form-control" id="type_edit"
                                       placeholder="vaqt yoki kg yoki dona" name="type">
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('custom-scripts')
    <script>
        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif


        let ishs =@json($ishs);

        // console.log(ishs)
        function edit(id) {
            console.log(id);

            var ish = ishs[id];
            console.log(ish);
            document.getElementById('worker_id_edit').value = ish['worker_id'];
            document.getElementById('edit_idd').value = id;
            // console.log(document.getElementById('edit_id'));
            document.getElementById('type_work_id_edit').value = ish['type_work_id'];
            document.getElementById('type_edit').value = ish['type'];

            // document.getElementById('all_sum_edit').value=ish['all_sum'];
        }
    </script>
@endsection
