@extends('adminpanel.master')
@section('title','Sotish  berdi')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("sells.sell_provided.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Haridor nomi</th>
                            <th>Bergan summasi</th>
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sell_provided as $key=>$sel)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$sel->selll->whom}}</td>
                                <td>{{ number_format($sel->given_sum, 2, ',' ,' ')}}</td>
                                <td>{{$sel->date}}</td>
                                <td class="d-flex">

                                    <form action="{{route('sell_provided.destroy', $sel->id)}}" method="post"
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
                            <th>{{ number_format($all_sum, 2, ',' ,' ')}}</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
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

    </script>
@endsection
