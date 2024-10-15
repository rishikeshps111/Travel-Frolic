@php
    $UserEdit = isset($user) ?? 0;
    if ($UserEdit):
        $UserId = $user->id;
    else:
    endif;
@endphp

<form class="forms-sample" action="{{ route('ChangePassword') }}" method="post" id="CommonForm"
    enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $UserId ?? null }}">
    <div class="row g-3">

        <div class="col-6">
            <label for="password" class="form-label">Password</label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter the password" value="" />
                <button
                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button" id="password-addon" data-target="c_password"><i
                        class="ri-eye-fill align-middle"></i></button>
            </div>
        </div>
        <div class="col-6">
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
