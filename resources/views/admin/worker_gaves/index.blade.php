@extends('adminpanel.master')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.worker_gaves.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Ishchi</th>
                            <th>Berilgan summa</th>
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($worker_gaves as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$firm->worker->name}}</td>
                                <td>{{ number_format($firm->price, 2, ',' ,' ')}}</td>
                                <td>{{$firm->date}}</td>
                                <td class="d-flex">

                                    <form action="{{route('worker_gaves.destroy', $firm->id)}}" method="post">
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
                @include("admin.worker_gaves.edit")
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
