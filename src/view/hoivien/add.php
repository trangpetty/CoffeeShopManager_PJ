<div class="modal fade" id="hoivien-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="hoivien-form_add">
                    <div class="form-group my-2">
                        <label for="sothe_add">Ma hoi vien</label>
                        <input type="text" name="sothe_add" id="sothe_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="tenhv_add">Ten hoi vien</label>
                        <input type="text" name="tenhv_add" id="tenhv_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="ngaysinhhv_add">Ngay sinh</label>
                        <input type="date" name="ngaysinhhv_add" id="ngaysinhhv_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diachihv_add">Dia chi</label>
                        <input type="text" name="diachihv_add" id="diachihv_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="sdthv_add">SO dien thoai</label>
                        <input type="text" name="sdthv_add" id="sdthv_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="scccdhv_add">So can cuoc cong dan</label>
                        <input type="text" name="scccdhv_add" id="scccdhv_add" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diemtl_add">Diem tich luy</label>
                        <input type="text" name="diemtl_add" id="diemtl_add" class="form-control">
                    </div>
                    <div class="form-group my-2 d-flex align-items-center">
                        <label for="loaihv_add">Loai</label>
                        <select name="loaihv_add" id="loaihv_add" class="form-select w-50 ms-2">
                            <option selected>Chon loai hoi vien</option>
                            <option value="VIP1">VIP1</option>
                            <option value="VIP2">VIP2</option>
                            <option value="VIP3">VIP3</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark bg-brown" id="hoivien-btn_add">Add</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>