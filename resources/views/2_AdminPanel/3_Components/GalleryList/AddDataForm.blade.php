<form class="forms-sample" action="{{ route('AddGallery') }}" method="post" id="CommonForm" enctype="multipart/form-data">
    <div class="row g-3">
        <div class="col-12">
            <label for="destination" class="form-label">Destination</label>
            <select class="form-select" id="destination" name="destination" {{ $disabled ?? null }}>
                <option value="">Select Destination</option>
                @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->place_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="">Choose Images</label>
            <input type="file" class="form-control" name="images[]" multiple id="upload-img" />
        </div>
        <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
    </div>
    <div class="col-12 mt-4">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" {{ $hide ?? null }}>Submit</button>
        </div>
    </div>
    </div>
</form>
