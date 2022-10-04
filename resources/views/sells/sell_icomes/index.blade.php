@extends('adminpanel.master')
@section('title','Sotish kirim')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("firm.firm_incomes.create")
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
                            <th></th>
                            <th>{{ number_format($how_sum,2,',',' ') }}</th>
                            <th>{{ number_format($total_sum,2,',',' ') }}</th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
                @include("firm.firm_incomes.edit")
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

        let firmes =@json($sell_incomes);

        function edit(id) {
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('edit_soil').value = firms['soil'];
                    document.getElementById('edit_brutto').value = firms['brutto'];
                    document.getElementById('edit_tara').value = firms['tara'];
                    document.getElementById('edit_id').value = id;
                    break;
                }
            }
        }
    </script>
@endsection
