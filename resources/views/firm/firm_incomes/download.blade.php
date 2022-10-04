<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baraka Golden Licorice</title>
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body>

<h1>Baraka Golden Licorice</h1>
<h3>Firma kirim @if($from_date && $to_date) ({{ $from_date }} dan {{ $to_date }} gacha )@endif</h3>
<br>
<table border="1" class="table table-hover">
    <thead>
    <tr>
        <th>id</th>
        <th>Firma nomi</th>
        <th>Mashina raqami</th>
        <th>Brutto</th>
        <th>Tara</th>
        <th>Netto</th>
        <th>Tuproq</th>
        <th>Ildiz</th>
        <th>1kg narxi</th>
        <th>Jami narxi</th>
        <th>Sana</th>
    </tr>
    </thead>
    <tbody>
    @foreach($firm_incomes as $firm)
        <tr>
            <td>{{$loop->index +1}}</td>
            <td>{{$firm->firm->name}}</td>
            <td>{{$firm->car_number}}</td>
            <td>{{ number_format($firm->brutto, 0, ',', ' ') }}</td>
            <td>{{ number_format($firm->tara, 0, ',',' ')}}</td>
            <td>{{ number_format($firm->netto, 0, ',',' ')}}</td>
            <td>{{ number_format($firm->soil, 0, ',',' ')}}</td>
            <td>{{ number_format($firm->weight, 0, ',',' ')}}</td>
            <td>{{ number_format($firm->price, 0, ',',' ')}}</td>
            <td>{{ number_format($firm->total_price, 0, ',',' ')}}</td>
            <td>{{$firm->date}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Jami</th>
        <th></th>
        <th></th>
        <th>{{ number_format($sum_brutto,0,',',' ') }}</th>
        <th>{{ number_format($sum_tara,0,',',' ') }}</th>
        <th>{{ number_format($sum_netto,0,',',' ') }}</th>
        <th>{{ number_format($sum_soil,0,',',' ') }}</th>
        <th>{{ number_format($sum_weight,0,',',' ') }}</th>
        <th></th>
        <th>{{ number_format($sum_total_price,0,',',' ') }}</th>
        <th></th>
    </tr>
    </tfoot>
</table>
</body>
</html>

