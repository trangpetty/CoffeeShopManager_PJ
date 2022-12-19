<div class="modal fade" id="cthd-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Chi tiet hoa don</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="cthd-form_add">
                    <div class="form-group">
                        <label for="maspcthd_add">Ma SP</label>
                        <select name="maspcthd_add" id="maspcthd_add" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="soluong_add">So luong</label>
                        <input type="number" name="soluong_add" id="soluong_add" class="form-control">
                        <span class="error text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="dongia_add">Don gia</label>
                        <input type="number" name="dongia_add" id="dongia_add" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark bg-brown" id="cthd-btn_add">Add</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>