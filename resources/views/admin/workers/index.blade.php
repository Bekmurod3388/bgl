@extends('master')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title"> Ishchilar </h1></div>
                    <div class="col-md-2">
                        <a class="btn btn-primary" href="{{route('admin.workers.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                           Ishchi qo'shish
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">#</th>
                            <th class="" scope="col">Ismi</th>
                            <th class="" scope="col">Summa</th>
                            <th class="w-25" scope="col">Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workers as $w)
                            <tr>
                                <th scope="row" class="col-1">{{$w->id}}</th>
                                <td>{{$w->name}}</td>
                                <td>{{$w->summ}}</td>

                                <td class="col-2">
                                    <form action="{{route('admin.workers.destroy',$w->id)}}" method="POST">

                                        <a title="Tahrirlash" class="btn btn-warning btn-sm active"
                                           href="{{route('admin.workers.edit',$w->id)}}">
                                                <span class="btn-label">
                                        <i class="fa fa-pen"></i>
                                                </span>

                                        </a>
                                        <a href="{{route('admin.workers.destroy',$w->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button title="O'chirish" type="submit"
                                                    class="btn btn-danger active btn-sm"><span class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row justify-content-center">

                            @if ($workers->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $workers->links() }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
