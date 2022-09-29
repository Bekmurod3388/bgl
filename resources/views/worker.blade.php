@extends('master')
@section('title','Ishchilar')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                        <i class="fa fa-plus"></i>   Qo'shish
                    </button>

                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ishchi yaratish</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('worker.store')}}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ishchi nomini kiriting:</label>
                                                <input type="text" name="name" class="form-control"
                                                       id="exampleInputEmail1">
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Saqlash</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ishchi nomi</th>
                            <th>Jami summa</th>
                            <th>Qarzdorlik</th>
                            <th>To'langan summa</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php  $ind=0;$allsum=0;$indeb=0;$given=0; @endphp
                        @foreach($workers as $worker)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$worker->name}}</td>
                                <td>{{number_format($worker->all_sum,2,',',' ')}}</td>
                                <td>{{number_format($worker->indebtedness,2,',',' ')}}</td>
                                <td>{{number_format($worker->given_sum,2,',',' ')}}</td>
                                @php  $ind+=1;$allsum+=$worker->all_sum;$indeb+=$worker->indebtedness;$given+=$worker->given_sum; @endphp
                                <td class="d-flex">
                                    <a href="{{ route("jobs.index",['id' => $worker->id]) }}" class="btn btn-success m-1">
                                        <i class="fa fa-car"></i>
                                    </a>
                                    <a href="{{ route("worker_gaves.index",['id' => $worker->id]) }}" class="btn btn-info m-1">
                                        <i class="fa fa-clipboard-list"></i>
                                    </a>
                                    <button type="button" onclick="edit({{$worker->id}})" class="btn btn-warning m-1" data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>

                                    <form action="{{route('worker.destroy', $worker->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-1"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
{{--                                <td class="d-flex justify-content-end">--}}

{{--                                    <button type="button" onclick="edit({{$worker->id}})" class="btn btn-warning"--}}
{{--                                            data-toggle="modal" data-target="#modal-edit">--}}
{{--                                        <i class="fa fa-pen"></i>--}}
{{--                                    </button>--}}


{{--                                    <form action="{{route('worker.destroy', $worker->id)}}" method="post">--}}
{{--                                        @method('DELETE')--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class="btn btn-danger show_confirm"><i class="fa fa-trash"></i>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}

{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>

                        <tr>
                            <th>Jami:</th>
                            <th>                                @php echo  $ind." ta ishchi"; @endphp
                            </th>
                            <th>                                @php echo number_format($allsum, 2, ',',' ') @endphp
                            </th>
                            <th>                                @php echo number_format($indeb, 2, ',',' ')  @endphp
                            </th>
                            <th>                                @php echo number_format($given, 2, ',',' ')  @endphp
                            </th>
                            <th></th>

                        </tr>
                        </tfoot>
                    </table>
                </div>


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
                                @if(\App\Models\Worker::all()->count()>0)
                                <form method="post" action="{{route('worker.update',\App\Models\Worker::first()) }}">
                                    @method('PUT')

                                    @csrf
                                    <input type="hidden" name="id" id="edit_id">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="edit_name">Ishchi nomi:</label>
                                            <input type="text" name="name" class="form-control" id="edit_name">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Saqlash</button>
                                    </div>
                                </form>
                                @endif
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>

@endsection
@section('custom-scripts')

    <script>

        //     toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        //     toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        //     toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        //     toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')

       {{--            @if(session()->has('ok'))--}}
        {{--        toastr.success("{{session()->get('ok')}}");--}}
        {{--        @endif--}}
        @if(session('success'))
           toastr.options =
           {
               "closeButton" : true,
               "progressBar" : true
           }
        toastr.success("{{ session()->get('success') }}");
        @endif

        @if(session('error'))
        session.error("{{$message}}");
           @endif

        let workers =@json($workers_obj);

        function edit(id) {
            var worker = workers[id];

            document.getElementById('edit_name').value = worker['name'];
            document.getElementById('edit_id').value = id;
        }

    </script>
@endsection
