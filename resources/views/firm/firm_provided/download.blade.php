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
<h3>{{ $name }} firmasi hisob-kitobi @if($from_date && $to_date) ({{ $from_date }} dan {{ $to_date }} gacha )@endif</h3>
<br>
<table border="1" class="table table-hover">
    <thead>
    <tr>
        <th>id</th>
{{--        <th>Firma nomi</th>--}}
        <th>Berilgan summasi</th>
        <th>Sana</th>
    </tr>
    </thead>
    <tbody>
    @foreach($firm_provided as $firm)
        <tr>
            <td>{{$loop->index +1}}</td>
{{--            <td>{{$name}}</td>--}}
            <td>{{ number_format($firm->price, 0, ',', ' ') }}</td>
            <td>{{$firm->date}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Jami</th>
{{--        <th></th>--}}
        <th>{{ number_format($sum['price'],0,',',' ') }}</th>
        <th></th>
    </tr>
    </tfoot>
</table>
</body>
</html>

