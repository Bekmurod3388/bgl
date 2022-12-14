
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Firma kirim tahrirlash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('firm_incomes.update',1)}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_brutto">Brutto:</label>
                            <input type="number" name="brutto" class="form-control" id="edit_brutto">
                        </div>
                        <div class="form-group">
                            <label for="edit_tara">Tara:</label>
                            <input type="number" name="tara" class="form-control" id="edit_tara">
                        </div>
                        <div class="form-group">
                            <label for="edit_soil">Tuproqni kiriting(kg):</label>
                            <input type="number" name="soil" class="form-control" id="edit_soil">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                        <button type="button" class="btn btn-primary" onclick="validate('edit')">Saqlash</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
