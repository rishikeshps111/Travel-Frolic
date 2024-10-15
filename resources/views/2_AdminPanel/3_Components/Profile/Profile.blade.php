 <div class="row">
     <div class="col-lg-4">
         <div class="card mb-4">
             <div class="card-body text-center pb-0">
                 @if (Auth::user()->image)
                     <img class="rounded-circle img-fluid" style="width: 150px;"
                         src="{{ asset('storage/file_uploads/profile_img/' . Auth::user()->id . '/' . Auth::user()->image) }}"
                         alt="avatar">
                 @else
                     <img class="rounded-circle img-fluid" style="width: 150px;"
                         src="{{ asset('1_WebFrontend/images/user-dummy-img.jpg') }}" alt="avatar">
                 @endif
                 <h5 class="my-3">{{ Auth::user()->name }}</h5>
             </div>
         </div>
     </div>
     <div class="col-lg-8">
         <div class="card mb-4">
             <div class="card-body">
                 <div class="row">
                     <div class="col-sm-3">
                         <p class="mb-0">Name</p>
                     </div>
                     <div class="col-sm-9">
                         <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                     </div>
                 </div>
                 <hr>
                 <div class="row">
                     <div class="col-sm-3">
                         <p class="mb-0">Email</p>
                     </div>
                     <div class="col-sm-9">
                         <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                     </div>
                 </div>
                 <hr>
                 <div class="row">
                     <div class="col-sm-3">
                         <p class="mb-0">Phone</p>
                     </div>
                     <div class="col-sm-9">
                         <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                     </div>
                 </div>
                 <hr>
             </div>
         </div>
     </div>
     <div class="col-12">
         <div class="hstack gap-2 justify-content-end">
             <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
         </div>
     </div>
 </div>
 </div>
