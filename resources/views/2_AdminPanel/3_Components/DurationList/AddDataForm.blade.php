@php
    $DurationEdit = isset($duration) ?? 0;
    if ($DurationEdit):
        $route = 'EditDuration';
        $DurationId = $duration->id;
        $DurationDays = $duration->days;
        $DurationNights = $duration->nights;

        $DurationStatus = $duration->status;

        if ($DurationStatus == '1'):
            $Active = 'checked';
        else:
            $Inactive = 'checked';
        endif;

        $hidden = 'hidden' ?? null;
    else:
        $route = 'AddDuration';
    endif;

    if (isset($readonly)):
        $disabled = 'disabled' ?? null;
        $hide = 'hidden' ?? null;
    else:
    endif;
@endphp



<form class="forms-sample" action="{{ route($route) }}" method="post" id="CommonForm" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $DurationId ?? null }}">
    <div class="row g-3">
        <div class="col-6">
            <label for="days" class="form-label">Days</label>
            <input type="number" class="form-control" id="days" name="days" placeholder="Enter the days"
                value="{{ $DurationDays ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-6">
            <label for="nights" class="form-label">Nights</label>
            <input type="number" class="form-control" id="nights" name="nights" placeholder="Enter the nights"
                value="{{ $DurationNights ?? null }}" {{ $disabled ?? null }}>
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
