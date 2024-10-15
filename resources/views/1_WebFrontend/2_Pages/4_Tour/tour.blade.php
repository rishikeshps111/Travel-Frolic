 @extends('1_WebFrontend.1_Layouts.1_Main')
 @section('content')
     <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(1_WebFrontend/images/bg/bg9.jpg);">
         <div class="section-shape section-shape1 top-inherit bottom-0"
             style="background-image: url(1_WebFrontend/images/shape8.png);">
         </div>
         <div class="breadcrumb-outer">
             <div class="container">
                 <div class="breadcrumb-content text-center">
                     <h1 class="mb-3">Tour Grid</h1>
                     <nav aria-label="breadcrumb" class="d-block">
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('IndexView') }}">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Tour Grid Rightside</li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
         <div class="dot-overlay"></div>
     </section>


     <section class="trending pt-6 pb-0 bg-lgrey">
         <div class="container">
             <div class="row flex-row-reverse">
                 <div class="col-lg-12">
                     <div class="list-results d-flex align-items-center justify-content-between">
                         <div class="list-results-sort">
                             {{-- <p class="m-0">Showing 1-5 of 80 results</p> --}}
                         </div>
                         <div class="click-menu d-flex align-items-center justify-content-between">
                             <div class="sortby d-flex align-items-center justify-content-between ml-2">
                                 <select class="form-group" id="sort_by" name="sort_by">
                                     <option value="">Sort by</option>
                                     <option value="rating">Average rating</option>
                                     {{-- <option value="price_asc">Price: low to high</option>
                                     <option value="price_desc">Price: high to low</option> --}}
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row" id="PackageSection">
                     </div>
                 </div>
                 {{-- <div class="col-lg-4 pe-lg-4">
                     <div class="sidebar-sticky">
                         <div class="list-sidebar">
                             <div class="sidebar-item mb-4  ">
                                 <h3 class>Destination Type</h3>
                                 <select class="form-select js-choice" id="destination" name="destination">
                                     <option value="">filter by destination</option>
                                     @foreach ($destinations as $destination)
                                         <option value="{{ $destination->id }}">{{ $destination->place_name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="sidebar-item mb-4  ">
                                 <h3 class>Duration Type</h3>
                                 <select class="form-select js-choice" id="duration" name="duration">
                                     <option value="">filter by duration</option>
                                     @foreach ($durations as $duration)
                                         <option value="{{ $duration->id }}">
                                             {{ $duration->days . ' days / ' . $duration->nights . ' nights' }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="sidebar-item">
                                 <h3>Our Destinations</h3>
                                 <div class="sidebar-destination">
                                     <div class="row about-slider">
                                         <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                             <div class="trend-item1">
                                                 <div class="trend-image position-relative rounded">
                                                     <img src="1_WebFrontend/images/destination/destination17.jpg"
                                                         alt="image">
                                                     <div
                                                         class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                                         <div class="trend-content-title">
                                                             <h5 class="mb-0"><a href="tour-single.html"
                                                                     class="theme1">Italy</a></h5>
                                                             <h4 class="mb-0 white">Caspian Valley</h4>
                                                         </div>
                                                         <span class="white bg-theme p-1 px-2 rounded">18 Tours</span>
                                                     </div>
                                                     <div class="color-overlay"></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                             <div class="trend-item1">
                                                 <div class="trend-image position-relative rounded">
                                                     <img src="1_WebFrontend/images/destination/destination14.jpg"
                                                         alt="image">
                                                     <div
                                                         class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                                         <div class="trend-content-title">
                                                             <h5 class="mb-0"><a href="tour-single.html"
                                                                     class="theme1">Tokyo</a></h5>
                                                             <h4 class="mb-0 white">Japan</h4>
                                                         </div>
                                                         <span class="white bg-theme p-1 px-2 rounded">21 Tours</span>
                                                     </div>
                                                     <div class="color-overlay"></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div> --}}
             </div>
         </div>
     </section>
 @endsection
