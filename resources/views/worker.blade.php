@extends('master')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                        Qo'shish
                    </button>

                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Firma yaratish</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('firms.store')}}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Firma nomini kiriting:</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" >
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                            <th>id</th>
                            <th>Firma nomi</th>
                            <th>Jami summa</th>
                            <th>Qarzdorlik</th>
                            <th>To'langan summa</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workers as $worker)
                            <tr>
                                <td>324342</td>
                                <td>

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>


                                    <form action="{{route('firms.destroy', $firm->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Jami</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>






                <div class="modal fade" id="modal-edit">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Firma yaratish</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('firms.update',1)}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="edit_id">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="edit_name">Firma nomini kiriting:</label>
                                            <input type="text" name="name" class="form-control" id="edit_name" >
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
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
    <script>

        function edit(id){
// console.log(id);
            var firms=firmes[id];

            document.getElementById('edit_name').value=firms['name'];
            document.getElementById('edit_id').value=id;

        }
    </script>
@endsection
