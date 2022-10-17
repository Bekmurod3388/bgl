@extends('adminpanel.master')
@section('title','Omborxona')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Mahsulot</th>
                            <th>kg</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($warehouses as $warehous)
                            <tr>
                                <td>{{$warehous->id}}</td>
                                <td>{{$warehous->products->name}}</td>
{{--                                <td>{{$warehous->date}}</td>--}}
                                <td>{{$warehous->weight}}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div class="container">
                        <div class="row justify-content-center">

                            @if ($warehouses->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $warehouses  ->links()}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>





{{--    <div class="modal fade" id="modal-default">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Tayyor mahsulot qoshish</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="{{route('warehouses.store')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="card-body">--}}
{{--                            <input type="hidden" name="id" id="edit_id">--}}
{{--                            <input type="hidden" value="{{ $id }}" name="product_id">--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="product_id">Mahsulot</label>--}}
{{--                                <select class="custom-select" id="product_id" name="product_id">--}}
{{--                                    @foreach($products as $work)--}}
{{--                                        <option value="{{$work->id}}">{{$work->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="date">Sana</label>--}}
{{--                                <input type="date" class="form-control" id="date" placeholder="date"--}}
{{--                                       value="<?php echo date("Y-m-d");?>" name="date">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="type">kg</label>--}}
{{--                                <input type="number" class="form-control" id="type" placeholder="kg"--}}
{{--                                       name="weight">--}}
{{--                            </div>--}}


{{--                            <div class="modal-footer justify-content-between">--}}
{{--                                <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>--}}
{{--                                <button type="submit" class="btn btn-primary">Saqlash</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}

{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.modal-content -->--}}
{{--        </div>--}}
{{--        <!-- /.modal-dialog -->--}}
{{--    </div>--}}
    <!-- /.modal -->



{{--    <div class="modal fade" id="modal-edit">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Tahrirlash</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    <form action="{{route('jobs.update',1)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <div class="card-body">--}}
{{--                            <input type="hidden" name="id" id="edit_idd">--}}

{{--                            <input type="hidden" id="worker_id_edit" value="{{$id}}" name="worker_id">--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="product_id_edit">Ishchi</label>--}}
{{--                                <select class="custom-select" id="product_id_edit" name="product_id">--}}
{{--                                    @foreach($products as $worker)--}}

{{--                                        <option value="{{$worker->id}}">{{$worker->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="date">Sana</label>--}}
{{--                                <input type="date" class="form-control" id="date" placeholder="date"--}}
{{--                                       value="<?php echo date("Y-m-d");?>" name="date">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="type_edit">kg</label>--}}
{{--                                <input type="number" class="form-control" id="type_edit"--}}
{{--                                       placeholder="kg" name="weight">--}}
{{--                            </div>--}}


{{--                            <div class="modal-footer justify-content-between">--}}
{{--                                <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>--}}
{{--                                <button type="submit" class="btn btn-primary">Saqlash</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}

{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.modal-content -->--}}
{{--        </div>--}}
{{--        <!-- /.modal-dialog -->--}}
{{--    </div>--}}
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
            document.getElementById('product_id_edit').value = ish['product_id'];
            document.getElementById('edit_idd').value = id;
            // console.log(document.getElementById('edit_id'));
            // document.getElementById('type_work_id_edit').value = ish['type_work_id'];
            // document.getElementById('type_edit').value = ish['type'];

            // document.getElementById('all_sum_edit').value=ish['all_sum'];
        }
    </script>
@endsection
