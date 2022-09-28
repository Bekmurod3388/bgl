@extends('master')
@section('title','Firma kirim')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.firm_incomes.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Firma nomi</th>
                            <th>Mashina raqami</th>
                            <th>Brutto</th>
                            <th>Netto</th>
                            <th>Tara</th>
                            <th>Tuproq</th>
                            <th>1kg narxi</th>
                            <th>Jami narxi</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($firm_incomes as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$firm->firm->name}}</td>
                                <td>{{$firm->car_number}}</td>
                                <td>{{ number_format($firm->brutto, 2, ',', ' ') }}</td>
                                <td>{{ number_format($firm->netto, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->tara, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->soil, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->price, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->total_price, 2, ',',' ')}}</td>
                                <td class="d-flex">

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>


                                    <form action="{{route('firm_incomes.destroy', $firm->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger show_confirm"><i class="fa fa-trash"></i></button>
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
                            <th>{{ number_format($sum_brutto,2,',',' ') }}</th>
                            <th>{{ number_format($sum_netto,2,',',' ') }}</th>
                            <th>{{ number_format($sum_tara,2,',',' ') }}</th>
                            <th>{{ number_format($sum_soil,2,',',' ') }}</th>
                            <th></th>
                            <th>{{ number_format($sum_total_price,2,',',' ') }}</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                @include("admin.firm_incomes.edit")
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

        let firmes=@json($firm_incomes);
        function edit(id){
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]){
                    var firms=firmes[i];
                    console.log(firms);
                    document.getElementById('edit_soil').value=firms['soil'];
                    document.getElementById('edit_id').value=id;
                    break;
                }
            }
        }
    </script>
@endsection
