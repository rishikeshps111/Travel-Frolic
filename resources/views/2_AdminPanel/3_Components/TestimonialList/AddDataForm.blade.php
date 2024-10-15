@php
    $TestimonialEdit = isset($testimonial) ?? 0;
    if ($TestimonialEdit):
        $route = 'EditTestimonial';
        $TestimonialId = $testimonial->id;
        $TestimonialName = $testimonial->user_name;
        $TestimonialImage = $testimonial->image;
        $TestimonialMessage = $testimonial->message;


        $TestimonialStatus = $testimonial->status;

        if ($TestimonialStatus == '1'):
            $Active = 'checked';
        else:
            $Inactive = 'checked';
        endif;

        $hidden = 'hidden' ?? null;
    else:
        $route = 'AddTestimonial';
    endif;

    if (isset($readonly)):
        $disabled = 'disabled' ?? null;
        $hide = 'hidden' ?? null;
    else:
    endif;
@endphp



<form class="forms-sample" action="{{ route($route) }}" method="post" id="CommonForm" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $TestimonialId ?? null }}">
    <div class="row g-3">
        <div class="col-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter the name"
                value="{{ $TestimonialName ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-6">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Enter the image"
                value="{{ $TestimonialImage ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-12">
            <label for="message" class="form-label">Message</label>
            <textarea type="file" class="form-control" id="message" name="message" placeholder="Enter the message"
                {{ $disabled ?? null }}>{{ $TestimonialMessage ?? null }}</textarea>
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
