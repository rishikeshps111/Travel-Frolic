<form class="forms-sample" action="{{ route('EditAdminProfile') }}" method="post" id="CommonForm"
    enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
    <div class="row g-3">
        <div class="col-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter the name"
                value="{{ Auth::user()->name }}">
        </div>
        <div class="col-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter the email"
                value="{{ Auth::user()->email }}">
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter the phone"
                value="{{ Auth::user()->phone }}">
        </div>
        <div class="col-6">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="col-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
