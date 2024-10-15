 @extends('1_WebFrontend.1_Layouts.1_Main')
 @section('content')
     <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(1_WebFrontend/images/bg/bg9.jpg);">
         <div class="section-shape section-shape1 top-inherit bottom-0"
             style="background-image: url(1_WebFrontend/images/shape8.png);">
         </div>
         <div class="breadcrumb-outer">
             <div class="container">
                 <div class="breadcrumb-content text-center">
                     <h1 class="mb-3">Destination List</h1>
                     <nav aria-label="breadcrumb" class="d-block">
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('IndexView') }}">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Destination Lists</li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
         <div class="dot-overlay"></div>
     </section>


     <section class="trending pb-0 pt-6">
         <div class="container">
             <div class="section-title mb-6 w-50 mx-auto text-center">
                 <h4 class="mb-1 theme1">Top Destinations</h4>
                 <h2 class="mb-1">Explore <span class="theme">Top Destinations</span></h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
             </div>
             <div class="row align-items-center">
                 @foreach ($destinations as $destination)
                     <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                         <div class="trend-item1">
                             <div class="trend-image position-relative rounded">
                                 <img src="/storage/file_uploads/destination/{{ $destination->id }}/{{ $destination->image }}"
                                     alt="image">
                                 <div
                                     class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                     <div class="trend-content-title">
                                         <h5 class="mb-0 theme1">{{ $destination->state }}</h5>
                                         <h3 class="mb-0 white">{{ $destination->place_name }}</h3>
                                     </div>
                                     <span class="white bg-theme p-1 px-2 rounded">{{ $destination->packages_count }}
                                         Tours</span>
                                 </div>
                                 <div class="color-overlay"></div>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
     </section>
 @endsection
