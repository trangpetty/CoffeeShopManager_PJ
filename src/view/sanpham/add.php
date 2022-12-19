<div class="modal fade" id="sanpham-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-50">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Them san pham</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sanpham-form_add">
                    <div class="form-group mb-2">
                        <label for="masp_add">Ma san pham</label>
                        <input type="text" name="masp_add" id="masp_add" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tensp_add">Ten san pham</label>
                        <input type="text" name="tensp_add" id="tensp_add" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="gia_add">Gia</label>
                        <input type="number" name="gia_add" id="gia_add" class="form-control">
                    </div>
                    <table class="w-75">
                        <tr class="form-group align-items-center">
                            <td><label for="size_add" class="me-2">Size</label></td>
                            <td><select name="size_add" id="size_add" class="form-select">
                                    <option selected value="">Chon Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select></td>
                        </tr>
                        <tr class="form-group align-items-center">
                            <td><label for="nhomloai_add" class="me-2">Nhom loai</label></td>
                            <td><select name="nhomloai_add" id="nhomloai_add" class="form-select">
                                    <option selected>Chon Nhom loai</option>
                                    <option value="Coffee">Coffee</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Juice">Juice</option>
                                </select></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-brown btn-dark" id="sanpham-btn_add">Add</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>