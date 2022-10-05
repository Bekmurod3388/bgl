@extends('adminpanel.master')
@section('title','Sotish kirim')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("sells\sell_icomes\create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Haridor nomi</th>
                            <th>Mashina raqami</th>
                            <th>Mahsulot</th>
                            <th>Hajm ( kg )</th>
                            <th>1 kg narxi</th>
                            <th>Jami summa</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sell_incomes as $sell)
                            <tr>
                                <td>{{$sell->index +1}}</td>
                                <td>{{$sell->selll->whom}}</td>
                                <td>{{$sell->car_number}}</td>
                                <td>{{$sell->productt->name}}</td>
                                <td>{{ number_format($sell->kg, 2, ',', ' ') }}</td>
                                <td>{{ number_format($sell->how_sum, 2, ',', ' ') }}</td>
                                <td>{{ number_format($sell->total_sum, 2, ',', ' ') }}</td>

                                <td class="d-flex">

                                    <button type="button" onclick="edit({{$sell->id}})" class="btn btn-warning"
                                            data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>


                                    <form action="{{route('sell_incomes.destroy', $sell->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger show_confirm"><i
                                                class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Jami</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>{{ number_format($kg,2,',',' ') }}</th>
                            <th></th>
                            <th>{{ number_format($total_sum,2,',',' ') }}</th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
                @include("sells.sell_icomes.edit")
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

        let sells =@json($sell_incomes); // firmes jsondan olib kelgan
        function edit(id) {

            for (let i = 0; i < sells.length; i++) {
                if (id == sells[i]["id"]) {
                    var sell = sells[i];
                    console.log(sell);
                    document.getElementById('edit_idi').value = id;
                    document.getElementById('edit_car').value = sell['car_number'];
                    document.getElementById('edit_product').value = sell['product_id'];
                    document.getElementById('edit_kg').value = sell['kg'];
                    document.getElementById('edit_priace').value = sell['how_sum'];
                    break;
                }
            }
        }
    </script>
@endsection
