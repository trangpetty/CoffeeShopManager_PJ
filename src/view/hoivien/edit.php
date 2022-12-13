<div class="modal fade" id="hoivien-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua hoivien
                    <input type="text" name="sothe_edit" id="sothe_edit" class="form-control w-25 border-0 fw-bold" style="font-size:1.75rem;" readonly>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="hoivien-form_edit">
                    <div class="form-group my-2">
                        <label for="tenhv_edit">Ten hoi vien</label>
                        <input type="text" name="tenhv_edit" id="tenhv_edit" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="ngaysinhhv_edit">Ngay sinh</label>
                        <input type="date" name="ngaysinhhv_edit" id="ngaysinhhv_edit" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diachihv_edit">Dia chi</label>
                        <input type="text" name="diachihv_edit" id="diachihv_edit" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="sdthv_edit">SO dien thoai</label>
                        <input type="text" name="sdthv_edit" id="sdthv_edit" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="scccdhv_edit">So can cuoc cong dan</label>
                        <input type="text" name="scccdhv_edit" id="scccdhv_edit" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diemtl_edit">Diem tich luy</label>
                        <input type="text" name="diemtl_edit" id="diemtl_edit" class="form-control">
                    </div>
                    <div class="form-group my-2 d-flex align-items-center">
                        <label for="loaihv_edit">Loai hoivien</label>
                        <select name="loaihv_edit" id="loaihv_edit" class="form-select w-50 ms-2">
                            <option selected>Chon loai hoi vien</option>
                            <option value="VIP1">VIP1</option>
                            <option value="VIP2">VIP2</option>
                            <option value="VIP3">VIP3</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" id="hoivien-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="hoivien-hidden-data">
            </div>
        </div>
    </div>
</div>