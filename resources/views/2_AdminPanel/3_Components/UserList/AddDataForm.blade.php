@php
    $UserEdit = isset($user) ?? 0;
    if ($UserEdit):
        $route = 'EditUser';
        $UserId = $user->id;
        $UserName = $user->name;
        $UserEmail = $user->email;
        $UserPhone = $user->phone;

        $UserStatus = $user->status;

        if ($UserStatus == '1'):
            $Active = 'checked';
        else:
            $Inactive = 'checked';
        endif;

        $hidden = 'hidden' ?? null;
    else:
        $route = 'AddUser';
    endif;

    if (isset($readonly)):
        $disabled = 'disabled' ?? null;
        $hide = 'hidden' ?? null;
    else:
    endif;
@endphp



<form class="forms-sample" action="{{ route($route) }}" method="post" id="CommonForm" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $UserId ?? null }}">
    <div class="row g-3">
        <div class="col-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter the name"
                value="{{ $UserName ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter the email"
                value="{{ $UserEmail ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter the phone"
                value="{{ $UserPhone ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-6" {{ $hidden ?? null }}>
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
        <div class="col-6" {{ $hidden ?? null }}>
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
        <div class="col-6">
            <label class="form-label">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1"
                        {{ $Active ?? 'checked' }} {{ $disabled ?? null }}>
                    <label class="form-check-label" for="inlineRadio1">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0"
                        {{ $Inactive ?? null }} {{ $disabled ?? null }}>
                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" {{ $hide ?? null }}>Submit</button>
            </div>
        </div>
    </div>
</form>
