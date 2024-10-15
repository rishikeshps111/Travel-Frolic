 @extends('2_AdminPanel.1_Layouts.1_Main')
 @section('content')
     <div class="page-content">
         <nav class="page-breadcrumb d-flex align-items-center justify-content-between">
             <ol class="breadcrumb mb-0">
                 <li class="breadcrumb-item"><a href="{{ route('DashboardView') }}">Dashboard</a></li>
                 <li class="breadcrumb-item active" aria-current="page">/ Gallery</li>
             </ol>
             <a href="adduser.html" id="AddDataModelToggle" class="btn btn-primary" data-bs-toggle="modal"
                 data-bs-target="#CommonModel">Add Images</a>
         </nav>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <div class="grid">
                             @if ($Images->isEmpty())
                                 <div class="d-flex justify-content-center align-items-center">
                                     <div class="alert alert-warning text-center mb-0" role="alert">
                                         No records found
                                     </div>
                                 </div>
                             @else
                                 @foreach ($Images as $Image)
                                     <div class="grid-item">
                                         <img src="{{ asset('storage/file_uploads/gallery/' . $Image->id . '/' . $Image->image) }}"
                                             alt="image" data-id="{{ $Image->id }}">
                                         <div class="tag"><h5>{{ $Image->destination_name }}</h5></div>
                                         <div class="button-container">
                                             <button class="view-button"><i class="ri-eye-fill"></i></button>
                                             <button class="delete-button"><i class="ri-delete-bin-line"></i></button>
                                         </div>
                                     </div>
                                 @endforeach
                             @endif
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Modal for viewing image -->
     <div class="GalleryModal" id="imageModal">
         <span class="close-button">&times;</span>
         <img class="GalleryModal-content" id="modalImage" alt="Modal Image">
         <div class="caption" id="caption"></div>
     </div>
 @endsection
