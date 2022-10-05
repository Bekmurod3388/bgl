
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sotish  tahrirlash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sell_incomes.update',1)}}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit_idi">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="edit_brutto">Mashina raqami:</label>
                            <input type="text" name="car_number" class="form-control" id="edit_car">
                        </div>

                        <div class="form-group">
                            <label for="product_id">Mahsulot</label>
                            <select name="product_id" id="edit_product" class="form-control">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">x kg mavjud </label>
                            <label for="price">Hajm (kg):</label>
                            <input type="number" name="kg" class="form-control" id="edit_kg">
                        </div>

                        <div class="form-group">
                            <label for="price">1kg narxi:</label>
                            <input type="number" name="how_sum" class="form-control" id="edit_priace">
                        </div>


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
