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
                                                <input type="text" name="firma_name" class="form-control" id="exampleInputEmail1" >
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
                       @foreach($firms as $firm)
                       <tr>
                           <td>{{$loop->index +1}}</td>
<td>{{$firm->firma_name}}</td>
                           <td>{{$firm->jami_summa}}</td>
                           <td>{{$firm->qarzdorlik}}</td>
                           <td>{{$firm->berilgan_summa}}</td>
                           <td>
                               <button class="btn btn-warning">edit</button></td>
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
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
