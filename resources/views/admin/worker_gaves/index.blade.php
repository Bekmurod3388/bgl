@extends('master')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.worker_gaves.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Ishchi</th>
                            <th>Berilgan summa</th>
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($worker_gaves as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$firm->worker->name}}</td>
                                <td>{{$firm->price}}</td>
                                <td>{{$firm->date}}</td>
                                <td>

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>


                                    <form action="{{route('worker_gaves.destroy', $firm->id)}}" method="post">
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
                @include("admin.worker_gaves.edit")
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
    <script>
        let firmes=@json($worker_gaves);
        function edit(id){
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]){
                    var firms=firmes[i];
                    console.log(firms);
                    document.getElementById('edit_price').value=firms['price'];
                    document.getElementById('worker_name').innerHTML=firms['worker']['name'];
                    document.getElementById('edit_id').value=id;
                    break;
                }
            }
        }
    </script>
@endsection
