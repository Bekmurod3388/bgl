@extends('adminpanel.master')
@section('title', $name.' firmasiga kirim')
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
{{--                            <th>Firma nomi</th>--}}
                            <th>Mashina raqami</th>
                            <th>Brutto</th>
                            <th>Tara</th>
                            <th>Netto</th>
                            <th>Tuproq</th>
                            <th>Ildiz</th>
                            <th>1kg narxi</th>
                            <th>Jami narxi</th>
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($firm_incomes as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
{{--                                <td>{{$name}}</td>--}}
                                <td>{{$firm->car_number}}</td>
                                <td>{{ number_format($firm->brutto, 2, ',', ' ') }}</td>
                                <td>{{ number_format($firm->tara, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->netto, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->soil, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->weight, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->price, 2, ',',' ')}}</td>
                                <td>{{ number_format($firm->total_price, 2, ',',' ')}}</td>
                                <td>{{$firm->date}}</td>
                                <td class="d-flex">

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning"
                                            data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>


                                    <form action="{{route('firm_incomes.destroy', $firm->id)}}" method="post">
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
{{--                            <th></th>--}}
                            <th></th>
                            <th>{{ number_format($sum['brutto'],2,',',' ') }}</th>
                            <th>{{ number_format($sum['tara'],2,',',' ') }}</th>
                            <th>{{ number_format($sum['netto'],2,',',' ') }}</th>
                            <th>{{ number_format($sum['soil'],2,',',' ') }}</th>
                            <th>{{ number_format($sum['weight'],2,',',' ') }}</th>
                            <th></th>
                            <th>{{ number_format($sum['total_price'],2,',',' ') }}</th>
                            <th></th>
                            <th></th>
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

        function validate(page) {
            var count = 0;
            if (page == 'create') {
                var car_number = document.getElementById('car_number');
                var price = document.getElementById('price');
                var date = document.getElementById('date');
                var form = document.getElementById('form');
                var tara = document.getElementById('tara');
                var brutto = document.getElementById('brutto');

                if (car_number.value == "") {
                    car_number.style.border = "1px solid red";
                    car_number.placeholder = "Mashina raqami kiritilmadi";
                    count++;
                } else {
                    car_number.style.border = "1px solid green";
                }
                if (price.value == "") {
                    price.style.border = "1px solid red";
                    price.placeholder = "Narx kiritilmadi";
                    count++;
                } else {
                    price.style.border = "1px solid green";
                }
                if (date.value == "") {
                    date.style.border = "1px solid red";
                    date.placeholder = "Sana kiritilmadi";
                    count++;
                } else {
                    date.style.border = "1px solid green";
                }
            }
            if (page == 'edit') {
                var brutto = document.getElementById('edit_brutto');
                var tara = document.getElementById('edit_tara');
                var soil = document.getElementById('edit_soil');
                var form = document.getElementById('edit_form');
                if (soil.value == "") {
                    soil.style.border = "1px solid red";
                    soil.placeholder = "Tuproq kiritilmadi";
                    count++;
                } else if(parseInt(soil.value) > parseInt(brutto.value) - parseInt(tara.value)){
                    soil.style.border = "1px solid red";
                    var text = "Tuproq Nettodan katta bo'lishi mumkin emas";
                    toastr.error(text);
                    count++;
                } else {
                    soil.style.border = "1px solid green";
                }
            }
            if (brutto.value == "") {
                brutto.style.border = "1px solid red";
                brutto.placeholder = "Brutto kiritilmadi";
                count++;
            } else {
                brutto.style.border = "1px solid green";
            }
            if(tara.value == "") {
                tara.style.border = "1px solid red";
                tara.placeholder = "Tara kiritilmadi";
                count++;
            } else if (parseInt(tara.value) > parseInt(brutto.value)) {
                tara.style.border = "1px solid red";
                count++;
                var text = "Tara Bruttodan katta bo'lishi mumkin emas";
                toastr.error(text);
                // if (tara.value > brutto.value) {
                // }
            } else {
                tara.style.border = "1px solid green";
            }

            if (count == 0) {
                form.submit();
            }
        }


        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif

        let firmes =@json($firm_incomes);

        function edit(id) {
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('edit_soil').value = firms['soil'];
                    document.getElementById('edit_brutto').value = firms['brutto'];
                    document.getElementById('edit_tara').value = firms['tara'];
                    document.getElementById('edit_id').value = firms['id'];
                    break;
                }
            }
        }
    </script>
@endsection
