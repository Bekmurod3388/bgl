@extends('master')
@section('title','Mahsulot')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                        <i class="fa fa-plus"></i> Qo'shish
                    </button>

                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Mahsulot yaratish</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('products.store')}}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mahsulot nomini kiriting:</label>
                                                <input type="text" name="name" class="form-control"
                                                       id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Minimum narxni kiriting:</label>
                                                <input type="number" name="minimum_price" class="form-control"
                                                       id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Maskimum narxni kiriting:</label>
                                                <input type="number" name="maximum_price" class="form-control"
                                                       id="exampleInputEmail1">
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
                    <!-- /.modal -->
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nomi</th>
                            <th>Minimum narx</th>
                            <th>Maximum narx</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{number_format($product->minimum_price,2,',',' ')}}</td>
                                <td>{{number_format($product->maximum_price,2,',',' ')}}</td>
                                <td class="d-flex">

                                    <button type="button" onclick="edit({{$product->id}})" class="btn btn-warning m-1"
                                            data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>

                                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-1 show_confirm"><i
                                                class="fa fa-trash"></i></button>
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
                                <h4 class="modal-title">Mahsulot yaratish</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('products.update',1)}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="edit_id">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="edit_name">Mahsulot nomini kiriting:</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mahsulot minimum narxini kiriting:</label>
                                            <input type="number" name="minimum_price" class="form-control"
                                                   id="minimum_price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mahsulot maksimum narxini kiriting:</label>
                                            <input type="number" name="maximum_price" class="form-control"
                                                   id="maximum_price">
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
        let firmes =@json($products);

        function edit(id) {

            var firms = firmes[id];

            document.getElementById('name').value = firms['name'];
            document.getElementById('minimum_price').value = firms['minimum_price'];
            document.getElementById('maximum_price').value = firms['maximum_price'];
            document.getElementById('edit_id').value = id;

        }
    </script>

@endsection

