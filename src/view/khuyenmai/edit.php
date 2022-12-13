<div class="modal fade" id="khuyenmai-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua khuyenmai
                    <input type="text" name="makm_edit" id="makm_edit" class="form-control w-25 border-0 fw-bold" style="font-size:1.75rem;" readonly>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="khuyenmai-form_edit">
                    <div class="form-group">
                        <label for="tenkm_edit">Ten khuyen mai</label>
                        <input type="text" name="tenkm_edit" id="tenkm_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgap_edit">Thoi gian ap dung</label>
                        <input type="date" name="tgap_edit" id="tgap_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgkt_edit">Thoi gian ket thuc</label>
                        <input type="date" name="tgkt_edit" id="tgkt_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="giatri_edit">Gia tri</label>
                        <input type="number" name="giatri_edit" id="giatri_edit" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" id="khuyenmai-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="khuyenmai-hidden-data">
            </div>
        </div>
    </div>
</div>