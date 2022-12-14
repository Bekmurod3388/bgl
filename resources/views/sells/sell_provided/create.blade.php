<div class="card-header d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>
        <a href="{{ route('sells.index') }}" class="btn btn-info">
            <i class="fa fa-backward"></i> Orqaga
        </a>
    </div>
    <form action="{{ route('sell_provided.index') }}" method="get" class="d-flex justify-content-around align-items-center">
        @csrf
        <input type="hidden" name="id" value="{{ $sell_id }}">
{{--        <input type="date" name="from_date" class="form-control" id="from_date" style="margin-left: 1rem" value="{{ $from_date }}">--}}
{{--        <label for="from_date" style="margin-left: 0.5rem">dan</label>--}}
{{--        <input type="date" name="to_date" class="form-control" id="to_date" style="margin-left: 1rem" value="{{ $to_date }}">--}}
{{--        <label for="to_date" style="margin-left: 0.5rem">gacha</label>--}}
{{--        <button type="submit" class="btn btn-primary" style="margin-left: 1rem">Saqlash</button>--}}
    </form>
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sotish berdi </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('sell_provided.store')}}">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="sell_id" value="{{ $sell_id }}">

                            <div class="form-group">
                                <label for="price">Bergan summa:</label>
                                <input type="number" name="given_sum" class="form-control" id="price">
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
