@extends('adminpanel.master')
@section('title','Chiqimlar')
@section('content')

    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                        <i class="fa fa-plus"></i> Qo'shish
                    </button>
                    {{-- <a href="{{ route('outlay.index') }}" class="btn btn-info">
                        <i class="fa fa-backward"></i> Orqaga
                    </a> --}}
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Chiqimlar</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('outlay.store')}}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="outlay_name">Chiqim nomini kiriting:</label>
                                                <input type="text" name="outlay_name" class="form-control"
                                                       id="outlay_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="from_date">Sanani kiriting:</label>
                                                <input type="date" name="from_date" class="form-control"
                                                       id="from_date">
                                            </div>
                                            <div class="form-group">
                                                <label for="summ">Summasini kiriting:</label>
                                                <input type="number" name="summ" class="form-control"
                                                       id="summ">
                                            </div>
                                            <div class="form-group">
                                                <label for="one_summ"> Donasini kiriting:</label>
                                                <input type="number" name="one_summ" class="form-control"
                                                       id="one_summ">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="all_summ">Jami summasini kiriting:</label>
                                                <input type="number" name="all_summ" class="form-control"
                                                       id="all_summ">
                                            </div> --}}

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Bekor
                                                qilish
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
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Sana</th>

                            <th>Chiqim nomi</th>
                            <th>Summasi</th>
                            <th>Donasi</th>
                            <th>Jami Summa</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($outlay as $out)
                            <tr>
                                <td>{{$out->id}}</td>
                                <td>{{$out->from_date}}</td>

                                <td>{{$out->outlay_name}}</td>
                                <td>{{$out->summ}}</td>
                                <td>{{$out->one_summ}}</td>

                                <td>{{number_format($out->all_summ, 0,',',' ')}}</td>
                                <td class="col-2">
                                    <form action="{{route('outlay.destroy',$out->id)}}" method="POST">
                                        <button onclick="edit({{$out->id}})" type="button" class="btn btn-warning"
                                                data-toggle="modal" data-target="#modal-edit">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <a href="{{route('outlay.destroy',$out->id)}}">
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
                    <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('outlay.update',1)}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" id="edit_id">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="edit_outlay_name">Chiqim nomini kiriting:</label>
                                                <input type="text" name="outlay_name" class="form-control"
                                                       id="edit_outlay_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_from_date">Sanani kiriting:</label>
                                                <input type="date" name="from_date" class="form-control"
                                                       id="edit_from_date">
                                            </div>
                                            {{--                                        <div class="form-group">--}}
                                            {{--                                            <label for="edit_to_date">Sanani kiriting:</label>--}}
                                            {{--                                            <input type="date" name="to_date" class="form-control"--}}
                                            {{--                                                   id="edit_to_date">--}}
                                            {{--                                        </div>--}}
                                            <div class="form-group">
                                                <label for="edit_summ">Summasini kiriting:</label>
                                                <input type="number" name="summ" class="form-control"
                                                       id="edit_summ">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_one_summ"> Donasini kiriting:</label>
                                                <input type="number" name="one_summ" class="form-control"
                                                       id="edit_one_summ">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Bekor
                                                qilish
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
                    {{-- table --}}

                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>

@endsection
@section('custom-scripts')
    <script>
        @if(session('success'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.success("{{ session()->get('success') }}");
        @endif

        @if(session('error'))
        session.error("{{$message}}");
        @endif
        let firmes = @json($productes);

        function edit(id) {
            var firms = firmes[id];
            console.log(firms);
            document.getElementById('edit_outlay_name').value = firms['outlay_name'];
            document.getElementById('edit_from_date').value = firms['from_date'];
            document.getElementById('edit_summ').value = firms['summ'];
            document.getElementById('edit_one_summ').value = firms['one_summ'];
            document.getElementById('edit_id').value = id;
        }
    </script>
@endsection
