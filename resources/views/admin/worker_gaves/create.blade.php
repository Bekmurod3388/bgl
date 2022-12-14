<div class="card-header">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
        <i class="fa fa-plus"></i> Qo'shish
    </button>
    <a href="{{ route('worker.index') }}" class="btn btn-info">
        <i class="fa fa-backward"></i> Orqaga
    </a>

    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ishchi oldi berdi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('worker_gaves.store')}}">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="worker_id" value="{{ $id }}">
{{--                            <div class="form-group">--}}
{{--                                <label for="worker_id">Ishchini tanlang:</label>--}}
{{--                                <select name="worker_id" id="worker_id" class="form-control">--}}
{{--                                    @foreach($workers as $firm)--}}
{{--                                        <option value="{{ $firm->id }}">{{ $firm->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="price">Berilgan_summa:</label>
                                <input type="number" name="price" class="form-control" id="price">
                            </div>
                            <div class="form-group">
                                <label for="date">Sana:</label>
                                <input type="date" name="date" class="form-control" id="date" value="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
