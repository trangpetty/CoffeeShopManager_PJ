<div class="modal fade" id="sanpham-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog w-50">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua sanpham
                    <input type="text" name="masp_edit" id="masp_edit" class="form-control w-25 border-0 fw-bold" style="font-size:1.75rem;" readonly>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sanpham-form_edit">
                    <div class="form-group mb-2">
                        <label for="tensp_edit">Ten san pham</label>
                        <input type="text" name="tensp_edit" id="tensp_edit" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="gia_edit">Gia</label>
                        <input type="number" name="gia_edit" id="gia_edit" class="form-control">
                    </div>
                    <table class="w-75">
                        <tr class="form-group align-items-center">
                            <td><label for="size_edit" class="me-2">Size</label></td>
                            <td><select name="size_edit" id="size_edit" class="form-select">
                                    <option selected value="">Chon Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select></td>
                        </tr>
                        <tr class="form-group align-items-center">
                            <td><label for="nhomloai_edit" class="me-2">Nhom loai</label></td>
                            <td><select name="nhomloai_edit" id="nhomloai_edit" class="form-select">
                                    <option selected>Chon Nhom loai</option>
                                    <option value="Coffe">Coffe</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Juice">Juice</option>
                                </select></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" id="sanpham-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="sanpham-hidden-data">
            </div>
        </div>
    </div>
</div>