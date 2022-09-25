
@extends('master')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Ishchilar</h1></div>
                    <div class="col-md-1">
{{--                        <a class="btn btn-primary" href="{{route('admin.bookings.create')}}">--}}
{{--                            <span class="btn-label">--}}
{{--                                admin.bookings.index--}}
{{--                                <i class="fa fa-plus"></i>--}}
{{--                            </span>--}}
{{--                            Mijoz qo'shish--}}
{{--                        </a>--}}
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">#</th>
                            <th class="" scope="col">Mijoz ismi</th>
                            <th class="" scope="col">Sartarosh Id</th>
                            <th class="" scope="col">Kuni</th>
                            <th class="" scope="col">Vaqti</th>

                            <th class="w-25" scope="col">Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($bookings as $booking)--}}
{{--                            <tr>--}}
{{--                                <th scope="row" class="col-1">{{$booking->id}}</th>--}}
{{--                                <td>{{$booking->client_name}}</td>--}}
{{--                                <td>{{$booking->barber_id}}</td>--}}
{{--                                <td>{{$booking->day}}</td>--}}
{{--                                <td>{{$booking->start_time}}</td>--}}

{{--                                <td class="col-2">--}}
{{--                                    <form action="{{route('admin.bookings.destroy',$booking->id)}}" method="POST">--}}
{{--                                        <a title="Ko'rish" class="btn btn-primary btn-sm active"--}}
{{--                                           href="{{route('admin.bookings.show',$booking->id)}}">--}}
{{--                                    <span class="btn-label">--}}
{{--                                        <i class="fa fa-eye"></i>--}}
{{--                                    </span>--}}

{{--                                        </a>--}}
{{--                                        <a title="Tahrirlash" class="btn btn-warning btn-sm active"--}}
{{--                                           href="{{route('admin.bookings.edit',$booking->id)}}">--}}
{{--                                    <span class="btn-label">--}}
{{--                                        <i class="fa fa-pen"></i>--}}

{{--                                    </span>--}}

{{--                                        </a>--}}
{{--                                        <a href="{{url('bookings',$booking->id)}}">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button title="O'chirish" type="submit"--}}
{{--                                                    class="btn btn-danger active btn-sm"><span class="btn-label">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </span></button>--}}
{{--                                        </a>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}

                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row justify-content-center">

{{--                            @if ($bookings->links())--}}
{{--                                <div class="mt-4 p-4 box has-text-centered">--}}
{{--                                    {{ $bookings->links() }}--}}
{{--                                </div>--}}
{{--                            @endif--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
