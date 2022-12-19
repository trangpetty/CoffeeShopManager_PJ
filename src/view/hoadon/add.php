<div class="modal fade" id="hoadon-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hoa don moi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="hoadon-form_add">
                    <div class="form-group">
                        <label for="manvhd_add">Ma NV</label>
                        <select name="manvhd_add" id="manvhd_add" class="form-select"></select>
                        <div class="error text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="hv_add">Hoi vien</label>
                        <select name="hv_add" id="hv_add" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="makmhd_add">Ma KM</label>
                        <select name="makmhd_add" id="makmhd_add" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="mabanhd_add">Ma Ban</label>
                        <select name="mabanhd_add" id="mabanhd_add" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="chuthich_add">Chu thich</label>
                        <input name="chuthich_add" id="chuthich_add" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="hidden-mahd">
                <button type="submit" class="btn btn-dark" id="hoadon-btn_add">Add</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>