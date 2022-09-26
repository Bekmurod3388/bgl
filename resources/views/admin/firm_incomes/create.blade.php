<div class="card-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
        Qo'shish
    </button>

    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Firma kirim yaratish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('firm_incomes.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="firm_id">Firmani tanlang:</label>
                                <select name="firm_id" id="firm_id" class="form-control">
                                    @foreach($firms as $firm)
                                        <option value="{{ $firm->id }}">{{ $firm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="car_number">Mashina raqamini kiriting:</label>
                                <input type="text" name="car_number" class="form-control" id="car_number">
                            </div>
                            <div class="form-group">
                                <label for="brutto">Brutto:</label>
                                <input type="number" name="brutto" class="form-control" id="brutto">
                            </div>
                            <div class="form-group">
                                <label for="tara">Tara:</label>
                                <input type="number" name="tara" class="form-control" id="tara">
                            </div>
                            <div class="form-group">
                                <label for="price">1kg narxi:</label>
                                <input type="number" name="price" class="form-control" id="price">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
