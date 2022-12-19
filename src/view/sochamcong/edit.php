<div class="modal fade" id="sochamcong-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua cong
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sochamcong-form_edit">
                    <div class="form-group">
                        <label for="manvcc_edit">Ma NV</label>
                        <input type="text" name="manvcc_edit" id="manvcc_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ngaydilam_edit">Ngay di lam</label>
                        <input type="date" name="ngaydilam_edit" id="ngaydilam_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="calam_edit">Ca lam</label>
                        <select name="calam_edit" id="calam_edit" class="form-select">
                            <option selected>Chon ca</option>
                            <option value="S">S</option>
                            <option value="C">C</option>
                            <option value="T">T</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark bg-brown" id="sochamcong-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="sochamcong-hidden-data">
            </div>
        </div>
    </div>
</div>