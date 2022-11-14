<div class="card-header d-flex justify-content-between">
    <div>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>

                <a href="{{ route('sells.index') }}" class="btn btn-info">
                    <i class="fa fa-backward"></i> Orqaga
                </a>

        {{--        <a href="{{ route('firm_incomes.download',['id' => $id, 'from_date' => $from_date, 'to_date' => $to_date]) }}" class="btn btn-info">--}}
        {{--            <i class="fa fa-download"></i> Yuklash--}}
        {{--        </a>--}}
        {{--        <a href="{{ route('firm_incomes.view',['id' => $id, 'from_date' => $from_date, 'to_date' => $to_date]) }}" class="btn btn-info">--}}
        {{--            <i class="fa fa-eye"></i> Ko'rish--}}
        {{--        </a>--}}

    </div>

    <form action="{{ route('sell_incomes.index') }}" method="get"
          class="d-flex justify-content-around align-items-center">
        @csrf
        {{--        <input type="hidden" name="id" value="{{ $id }}">--}}
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
                    <h4 class="modal-title"> Sotish yaratish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('sell_incomes.store')}}">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="sell_id" value="{{ $id }}">

                            <div class="form-group">
                                <label for="car_number">Mashina raqamini kiriting:</label>
                                <input type="text" name="car_number" class="form-control" id="car_number" required>
                            </div>

                            <div class="form-group">
                                <label for="product_id">Mahsulot</label>
                                <select name="product_id" id="edit_product" onchange="tanladi(event)" class="form-control" required>
                                    @foreach($products as $product)
                                        <option value="0"></option>
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price" id="kgg" style="color: red;" > </label>
                                <label for="price" >Hajm (kg):</label>
                                <input type="number"  name="kg" class="form-control" id="price" required>
                            </div>

                            <div class="form-group">
                                <label for="price">1kg narxi:</label>
                                <input type="number" name="how_sum" class="form-control" id="price" required>
                            </div>

                            <div class="form-group">
                                <label for="date">Sana:</label>
                                <input type="date" name="date" class="form-control" id="date"
                                       value="<?php echo date("Y-m-d");?>" required>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish
                            </button>
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
