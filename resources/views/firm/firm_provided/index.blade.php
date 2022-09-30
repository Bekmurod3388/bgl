@extends('adminpanel.master')
@section('title','Firma oldi berdi')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("firm.firm_provided.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Firma nomi</th>
                            <th>Berilgan summasi</th>
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($firm_provided as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$firm->firm->name}}</td>
                                <td>{{ number_format($firm->price, 2, ',' ,' ')}}</td>
                                <td>{{$firm->date}}</td>
                                <td class="d-flex">

                                    {{--                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning m-1" data-toggle="modal" data-target="#modal-edit">--}}
                                    {{--                                        <i class="fa fa-pen"></i>--}}
                                    {{--                                    </button>--}}


                                    <form action="{{route('firm_provided.destroy', $firm->id)}}" method="post"
                                          class="m-1">
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
                            <th>{{ number_format($sum_price, 2, ',' ,' ')}}</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                {{--                @include("admin.firm_provided.edit")--}}
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

        {{--let firmes=@json($firm_incomes);--}}
        {{--function edit(id){--}}
        {{--    for (let i = 0; i < firmes.length; i++) {--}}
        {{--        if (id == firmes[i]["id"]){--}}
        {{--            var firms=firmes[i];--}}
        {{--            console.log(firms);--}}
        {{--            document.getElementById('edit_soil').value=firms['soil'];--}}
        {{--            document.getElementById('edit_id').value=id;--}}
        {{--            break;--}}
        {{--        }--}}
        {{--    }--}}
        {{--}--}}
    </script>
@endsection
