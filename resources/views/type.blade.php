@extends('master')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Qo'shish
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tur nomi</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($type as $t)
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>{{$t->name}}</td>

                                <td class="col-2">
                                    <form action="{{route('type.destroy',$t->id)}}" method="POST">

                                        <button onclick="edit({{$t->id}})" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default2">

                                            <i class="fa fa-pen"></i>

                                        </button>

                                        <a href="{{route('type.destroy',$t->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button title="O'chirish" type="submit"
                                                    class="btn btn-danger active btn-sm"><span class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
{{--                    <div class="container">--}}
{{--                        <div class="row justify-content-center">--}}

{{--                            @if ($type->links())--}}
{{--                                <div class="mt-4 p-4 box has-text-centered">--}}
{{--                                    {{ $type->links() }}--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>





    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tur Qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('type.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
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
                    <form action="{{route('type.update',1)}}" method="post">

                        @method('put')
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                        <div class="card-body">
                            <div class="form-group">
                                <label for='name'>Name</label>
                                <input type="text" class="form-control" id="name_edit" placeholder="Name" name="name">
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
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
<script>
    let ishs=@json($ishs);
    console.log(ishs)
    function edit(id){
        var ish =ishs[id];
        console.log(ish);
        document.getElementById('name_edit').value=ish['name'];
        document.getElementById('edit_id').value=id;
        // document.getElementById('type_edit').value=ish['type'];
        // document.getElementById('price_edit').value=ish['price'];

    }
</script>
