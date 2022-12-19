<div class="modal fade" id="cthd-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua Chi tiet hoa don</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="cthd-form_edit">
                    <div class="form-group">
                        <label for="maspcthd_edit">Ma SP</label>
                        <input name="maspcthd_edit" id="maspcthd_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="soluong_edit">So luong</label>
                        <input type="number" name="soluong_edit" id="soluong_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dongia_edit">Don gia</label>
                        <input type="number" name="dongia_edit" id="dongia_edit" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" id="cthd-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="cthd-hidden-data">
            </div>
        </div>
    </div>
</div>