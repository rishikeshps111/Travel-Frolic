@php
    $DestinationEdit = isset($destination) ?? 0;
    if ($DestinationEdit):
        $route = 'EditDestination';
        $DestinationId = $destination->id;
        $DestinationPlacename = $destination->place_name;
        $DestinationState = $destination->state;
        $DestinationCountry = $destination->country;
        $DestinationImage = $destination->image;
        $DestinationDescription = $destination->description;

        $DestinationStatus = $destination->status;

        if ($DestinationStatus == '1'):
            $Active = 'checked';
        else:
            $Inactive = 'checked';
        endif;

        $hidden = 'hidden' ?? null;
    else:
        $route = 'AddDestination';
    endif;

    if (isset($readonly)):
        $disabled = 'disabled' ?? null;
        $hide = 'hidden' ?? null;
    else:
    endif;
@endphp



<form class="forms-sample" action="{{ route($route) }}" method="post" id="CommonForm"
    enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $DestinationId ?? null }}">
    <div class="row g-3">
        <div class="col-6">
            <label for="place_name" class="form-label">Place Name</label>
            <input type="text" class="form-control" id="place_name" name="place_name"
                placeholder="Enter the Place Name" value="{{ $DestinationPlacename ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-6">
            <label for="state" class="form-label">State</label>
            <select class="form-select" id="state" name="state" {{ $disabled ?? null }}>
                <option value="{{ $DestinationState ?? null }}">{{ $DestinationState ?? 'Select state' }}
                </option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu
                </option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
        </div>
        <div class="col-6">
            <label for="country" class="form-label">Country</label>
            <select class="form-select" id="country" name="country" {{ $disabled ?? null }}>
                <option value="{{ $DestinationCountry ?? null }}">{{ $DestinationCountry ?? 'Select Country' }}
                </option>
                <option value="India">India</option>
            </select>
        </div>
        <div class="col-6">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Enter the Place Name"
                value="{{ $DestinationImage ?? null }}" {{ $disabled ?? null }}>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter the description"
                value="" {{ $disabled ?? null }}>{{ $DestinationDescription ?? null }}</textarea>
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
