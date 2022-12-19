<div class="modal fade" id="account-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="account-form_add">
                    <div class="error text-danger"></div>
                    <div class="form-group">
                        <label for="username_add">User name</label>
                        <input type="text" name="username_add" id="username_add" class="form-control">
                        <span class="text-danger my-1" id="error-username_add"></span>
                    </div>
                    <div class="form-group">
                        <label for="password_add">Password</label>
                        <input type="password" name="password_add" id="password_add" class="form-control">
                        <span class="text-danger my-1" id="error-password_add"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" id="account-btn_add" style="background-color: #724e2c;">Submit</button>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
