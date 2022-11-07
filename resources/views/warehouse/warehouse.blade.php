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
                        @foreach($warehouses as $key=>$warehous)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$warehous->products->name}}</td>
{{--                                <td>{{$warehous->date}}</td>--}}
                                <td> {{number_format($warehous->weight,2,',',' ')}}</td>

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

@endsection
@section('custom-scripts')
    <script>
        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif


        {{--let ishs =@json($ishs);--}}

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
