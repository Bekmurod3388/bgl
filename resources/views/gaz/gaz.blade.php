@extends('adminpanel.master')
@section('title','Gaz')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i>Qoshish
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Pokazaniya</th>
                            <th>Tolangan summa</th>
                            <th>date</th>

                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gazs as $work)
                            <tr>
                                <td>{{$work->id}}</td>
                                <td>{{$work->pakazaniya}}</td>
                                <td>{{$work->money_paid}}</td>
                                <td>{{$work->date}}</td>
                                <td class="col-2">
                                    <form action="{{route('gaz.destroy',$work->id)}}" method="POST">
                                        <button onclick="edit({{$work->id}})" type="button" class="btn btn-warning"
                                                data-toggle="modal" data-target="#modal-default2">

                                            <i class="fa fa-pen"></i>

                                        </button>

                                        <a href="{{route('gaz.destroy',$work->id)}}">
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
                        <tfoot>
                        <tr>
                            <th>Jami</th>
                            <th> </th>

                            <th>{{number_format($all_sum,2,',',' ')}}</th>
<th></th>
{{--                            <th>{{number_format($sum_price,2,',',' ')}}</th>--}}
{{--                            <th>{{number_format($sum_indebtedness,2,',',' ')}}</th>--}}
{{--                            <th>{{number_format($sum_given,2,',',' ')}}</th>--}}
{{--                            <th></th>--}}
                        </tr>
                        </tfoot>
                    </table>
                    <div class="container">
                        <div class="row justify-content-center">

                            @if ($gazs->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $gazs->links() }}
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
                    <h4 class="modal-title">Gaz </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('gaz.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pakazaniya">Pakazaniya</label>
                                <input type="number" class="form-control" id="pakazaniya" placeholder="Pakazaniya" name="pakazaniya">
                            </div>
                            <div class="form-group">
                                <label for="money_paid">To'langan summa</label>
                                <input type="number" class="form-control" id="money_paid" placeholder="Tolangan pul" name="money_paid">
                            </div>

                            <div class="form-group">
                                <label for="date">Vaqt</label>
                                <input type="date" class="form-control" id="date"  value="<?php echo date("Y-m-d");?>" placeholder="Sana" name="date">
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



    <div class="modal fade" id="modal-default2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tahrirlash</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('gaz.update',1)}}" method="post">

                        @method('put')
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="pakazaniya">Pakazaniya</label>
                                <input type="number" class="form-control" id="pakazaniya_edit" placeholder="Pakazaniya" name="pakazaniya">
                            </div>
                            <div class="form-group">
                                <label for="money_paid">To'langan summa</label>
                                <input type="number" class="form-control" id="money_paid_edit" placeholder="Tolangan pul" name="money_paid">
                            </div>

                            <div class="form-group">
                                <label for="date">Vaqt</label>
                                <input type="date" class="form-control" id="date" value="<?php echo date("Y-m-d");?>" placeholder="Sana" name="date">
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
            // console.log(id);
            var ish = ishs[id];

            document.getElementById('pakazaniya_edit').value = ish['pakazaniya'];
            document.getElementById('money_paid_edit').value =ish['money_paid'];
            document.getElementById('edit_id').value =ish['id'];

// console.log(document.getElementById('edit_id'));
        }
    </script>
@endsection
