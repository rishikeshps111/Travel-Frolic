<form class="forms-sample" action="{{ route('ChangeAdminPassword') }}" method="post" id="CommonForm"
    enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $UserId ?? null }}">
    <div class="row g-3">
        <div class="col-12">
            <label for="current_password" class="form-label">Current password</label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password" class="form-control" id="current_password" name="current_password"
                    placeholder="Enter the password" value="" />
                <button
                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button" id="password-addon" data-target="c_password"><i
                        class="ri-eye-fill align-middle"></i></button>
            </div>
        </div>

        <div class="col-12">
            <label for="new_password" class="form-label">New Password</label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password" class="form-control" id="new_password" name="new_password"
                    placeholder="Enter the password" value="" />
                <button
                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button" id="password-addon" data-target="c_password"><i
                        class="ri-eye-fill align-middle"></i></button>
            </div>
        </div>
        <div class="col-12">
            <label for="confirm_password" class="form-label">Confirm password</label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                    placeholder="Confirm the password" value="" />
                <button
                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button" id="password-addon" data-target="c_password"><i
                        class="ri-eye-fill align-middle"></i></button>
            </div>
        </div>

        <div class="col-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
