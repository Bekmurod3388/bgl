@extends('adminpanel.master')
@section('title','Sotishlar jadvali')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> Qoshish
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Maxsulot</th>
                            <th>Kimga</th>
                            <th>Necha Somdan</th>
                            <th>kg</th>
                            <th>Jami Summa</th>
                            <th>Berilgan Summa</th>
                            <th>Qarzdorlik</th>
                            <th>Sanasi</th>
                            <th>Avto Raqam</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sells as $s)
                            <tr>
                                <td>{{$s->id}}</td>
                                <td>{{$s->productt->name}}</td>
                                <td>{{$s->kimga}}</td>
                                <td>{{$s->necha_somdan}}</td>
                                <td>{{$s->kg}}</td>
                                <td>{{number_format($s->jami_summ, 0,',',' ')}}</td>
                                <td>{{number_format($s->bergan_summ, 0,',',' ')}}</td>
                                <td>{{number_format($s->qarzdorlik, 0,',',' ')}}</td>
                                <td>{{$s->sanasi}}</td>
                                <td>{{$s->avto_raqam}}</td>

                                <td class="col-2">
                                    <form action="{{route('sells.destroy',$s->id)}}" method="POST">
                                        <button onclick="editing({{$s->id}})" type="button" class="btn btn-warning"
                                                data-toggle="modal" data-target="#modal-edit">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <a href="{{route('sells.destroy',$s->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button title="O'chirish" type="submit"
                                                    class="btn btn-danger active btn-md pl-3 pr-3 show_confirm"><span
                                                    class="btn-label">
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

                            @if ($sells->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $sells->links()}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sotish qoshish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('sells.store')}}" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="worker">Maxsulot tanlang</label>
                                <select class="custom-select" id="worker" name="maxsulot_id">
                                    @foreach($products as $p)
                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Kimga</label>
                                <input type="text" class="form-control" id="type" placeholder="Kimga" name="kimga">
                            </div>

                            <div class="form-group">
                                <label for="type">Necha Somdan</label>
                                <input type="number" class="form-control" id="type" placeholder="necha_somdan"
                                       name="necha_somdan">
                            </div>

                            <div class="form-group">
                                <label for="type"> KG </label>
                                <input type="number" class="form-control" id="type" placeholder="kg" name="kg">
                            </div>

                            <div class="form-group">
                                <label for="price">Jami Summma</label>
                                <input type="number" class="form-control" id="price" placeholder="Jami summa"
                                       name="jami_summ">
                            </div>
                            <div class="form-group">
                                <label for="price">Bergan Summma</label>
                                <input type="number" class="form-control" id="price" placeholder="Bergan summa"
                                       name="bergan_summ">
                            </div>

                            <div class="form-group">
                                <label for="price">Qarzdorlik</label>
                                <input type="number" class="form-control" id="price" placeholder="Qarzdorlik"
                                       name="qarzdorlik">
                            </div>

                            <div class="form-group">
                                <label for="date">Sana</label>
                                <input type="date" class="form-control" id="sanasi" placeholder="date" name="sanasi">
                            </div>

                            <div class="form-group">
                                <label for="price">Avto Raqam</label>
                                <input type="text" class="form-control" id="price" placeholder="Raqami"
                                       name="avto_raqam">
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tahrirlash</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('sells.update',$s->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <input type="hidden" name="id" id="edit_id">

                            <div class="form-group">
                                <label for="worker">Maxsulot tanlang</label>
                                <select class="custom-select" id="maxsulot_id_edit" name="maxsulot_id">
                                    @foreach($products as $p)
                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Kimga</label>
                                <input type="text" class="form-control" id="kimga_edit" placeholder="Kimga" name="kimga">
                            </div>

                            <div class="form-group">
                                <label for="type">Necha Somdan</label>
                                <input type="number" class="form-control" id="necha_somdan_edit" placeholder="necha_somdan"
                                       name="necha_somdan">
                            </div>

                            <div class="form-group">
                                <label for="type"> KG </label>
                                <input type="number" class="form-control" id="kg_edit" placeholder="kg" name="kg">
                            </div>

                            <div class="form-group">
                                <label for="price">Jami Summma</label>
                                <input type="number" class="form-control" id="price" placeholder="Jami summa"
                                       name="jami_summ">
                            </div>
                            <div class="form-group">
                                <label for="price">Bergan Summma</label>
                                <input type="number" class="form-control" id="bergan_summ_edit" placeholder="Bergan summa"
                                       name="bergan_summ">
                            </div>

                            <div class="form-group">
                                <label for="price">Qarzdorlik</label>
                                <input type="number" class="form-control" id="qarzdorlik_edit" placeholder="Qarzdorlik"
                                       name="qarzdorlik">
                            </div>

                            <div class="form-group">
                                <label for="date">Sana</label>
                                <input type="date" class="form-control" id="sanasi_edit" placeholder="date"
                                       name="sanasi">
                            </div>

                            <div class="form-group">
                                <label for="price">Avto Raqam</label>
                                <input type="text" class="form-control" id="avto_raqam_edit" placeholder="Raqami"
                                       name="avto_raqam">
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                        </div>

                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection


@section('custom-scripts')

    <script>
        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif

        {{--let ishs =@json($ishs);--}}
        console.log(ishs)

        function editing(id) {
            // console.log(id);
            var ish = sel[id];
            document.getElementById('edit_id').value = id;
            document.getElementById('maxsulot_id_edit').value = ish['maxsulot_id'];
            document.getElementById('kimga_edit').value = ish['kimga'];
            document.getElementById('necha_somdan_edit').value = ish['necha_somdan'];
            document.getElementById('kg_edit').value = ish['kg'];
            document.getElementById('jami_summ_edit').value = ish['jami_summ'];
            document.getElementById('bergan_summ_edit').value = ish['bergan_summ'];
            document.getElementById('qarzdorlik_edit').value = ish['qarzdorlik'];
            document.getElementById('sanasi_edit').value = ish['sanasi'];
            document.getElementById('avto_raqam_edit').value = ish['avto_raqam'];
        }

    </script>

@endsection

