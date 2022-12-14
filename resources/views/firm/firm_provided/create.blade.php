<div class="card-header d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>
        <a href="{{ route('firms.index') }}" class="btn btn-info">
            <i class="fa fa-backward"></i> Orqaga
        </a>
        <a href="{{ route('firm_provided.download',['id' => $id, 'from_date' => $from_date, 'to_date' => $to_date, 'page' => 'download']) }}" class="btn btn-info">
            <i class="fa fa-download"></i> Yuklash
        </a>
        <a href="{{ route('firm_provided.download',['id' => $id, 'from_date' => $from_date, 'to_date' => $to_date, 'page' => 'view']) }}" class="btn btn-info">
            <i class="fa fa-eye"></i> Ko'rish
        </a>
    </div>
    <form action="{{ route('firm_provided.index') }}" method="get" class="d-flex justify-content-around align-items-center" id="date_form_validate">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="date" name="from_date" class="form-control" id="from_date" style="margin-left: 1rem" value="{{ $from_date }}" required>
        <label for="from_date" style="margin-left: 0.5rem">dan</label>
        <input type="date" name="to_date" class="form-control" id="to_date" style="margin-left: 1rem" value="{{ $to_date }}" required>
        <label for="to_date" style="margin-left: 0.5rem">gacha</label>
        <button type="button" onclick="datevalidate()" class="btn btn-primary" style="margin-left: 1rem">Saqlash</button>
    </form>
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Firma oldi berdi yaratish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('firm_provided.store')}}">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="firm_id" value="{{ $id }}">
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="price">Berilgan summa:</label>
                                    <p class="text-danger">Jami qarzdorlik: {{ number_format($indebtedness,2,',',' ') }}</p>
                                </div>
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
