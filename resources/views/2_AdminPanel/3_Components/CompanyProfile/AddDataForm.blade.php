<form class="forms-sample" action="{{ route('EditProfile') }}" method="post" id="CommonForm" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $contact_info->id }}">
    <div class="row g-3">
        <div class="col-12">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name"
                placeholder="Enter the company name" value="{{ $contact_info->company_name }}">
        </div>
        <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter the address">{{ $contact_info->address }}</textarea>
        </div>
        <div class="mt-0">
            <h5 class="mt-3 mb-1">Main Contact</h5>
            <hr class="m-0">
        </div>
        <div class="col-6">
            <label for="email_1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_1" name="email_1" placeholder="Enter the email"
                value="{{ $contact_info->email_1 }}">
        </div>
        <div class="col-6">
            <label for="phone_1" class="form-label">phone</label>
            <input type="tel" class="form-control" id="phone_1" name="phone_1" placeholder="Enter the phone"
                value="{{ $contact_info->phone_1 }}">
        </div>
        <div class="mt-0">
            <h5 class="mt-3 mb-1">Sub Contact</h5>
            <hr class="m-0">
        </div>
        <div class="col-6">
            <label for="email_2" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_2" name="email_2" placeholder="Enter the email"
                value="{{ $contact_info->email_2 }}">
        </div>
        <div class="col-6">
            <label for="phone_2" class="form-label">phone</label>
            <input type="tel" class="form-control" id="phone_2" name="phone_2" placeholder="Enter the phone"
                value="{{ $contact_info->phone_2 }}">
        </div>
        <div class="col-12">
            <label for="location" class="form-label">Location</label>
            <input type="tel" class="form-control" id="location" name="location" placeholder="Enter the location"
                value="{{ $contact_info->location }}">
        </div>
        <div class="col-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </div>
</form>
