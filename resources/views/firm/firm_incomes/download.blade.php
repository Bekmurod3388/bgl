<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baraka Golden Licorice</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>

<h1>Baraka Golden Licorice</h1>
<h3>{{ $name }} firmasiga kirim @if($from_date && $to_date) ({{ $from_date }} dan {{ $to_date }} gacha )@endif</h3>
<br>
<table border="1" class="table table-hover">
    <thead>
    <tr>
        <th>id</th>
{{--        <th>Firma nomi</th>--}}
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
{{--            <td>{{$name}}</td>--}}
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
{{--        <th></th>--}}
        <th></th>
        <th>{{ number_format($sum['brutto'],0,',',' ') }}</th>
        <th>{{ number_format($sum['tara'],0,',',' ') }}</th>
        <th>{{ number_format($sum['netto'],0,',',' ') }}</th>
        <th>{{ number_format($sum['soil'],0,',',' ') }}</th>
        <th>{{ number_format($sum['weight'],0,',',' ') }}</th>
        <th></th>
        <th>{{ number_format($sum['total_price'],0,',',' ') }}</th>
        <th></th>
    </tr>
    </tfoot>
</table>
</body>
</html>

