<div class="modal fade" id="sochamcong-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-25">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Them cong moi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sochamcong-form_add">
                    <div class="form-group">
                        <label for="manvcc_add">Ma nhan vien</label>
                        <select name="manvcc_add" id="manvcc_add" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="ngaydilam_add">Ngay di lam</label>
                        <input type="date" name="ngaydilam_add" id="ngaydilam_add" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="calam_add">Ca lam</label>
                        <select name="calam_add" id="calam_add" class="form-select">
                            <option selected>Chon ca</option>
                            <option value="S">S</option>
                            <option value="C">C</option>
                            <option value="T">T</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" id="sochamcong-btn_add">Add</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>