 @extends('1_WebFrontend.1_Layouts.1_Main')
 @section('preloader')
     <div id="preloader">
         <div id="status"></div>
     </div>
 @endsection
 @section('content')
     <section class="banner overflow-hidden">
         <div class="slider top50">
             <div class="swiper-container">
                 <div class="swiper-wrapper">
                     <div class="swiper-slide">
                         <div class="slide-inner">
                             <div class="slide-image" style="background-image:url(1_WebFrontend/images/slider/11.jpg)"></div>
                             <div class="swiper-content">
                                 <div class="entry-meta mb-2">
                                     <h5 class="entry-category mb-0 white">Amazing Places</h5>
                                 </div>
                                 <h1 class="mb-2"><a href="tour-single.html" class="white">Make Your Trip Fun &
                                         Noted</a>
                                 </h1>
                                 {{-- <p class="white mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                     eiusmod tempor incididunt ut labore et dolore magna aliqua</p> --}}
                                 <a href="{{ route('TourView') }}" class="nir-btn">Discover More</a>
                             </div>
                             <div class="dot-overlay"></div>
                         </div>
                     </div>
                     <div class="swiper-slide">
                         <div class="slide-inner">
                             <div class="slide-image" style="background-image:url(1_WebFrontend/images/slider/22.jpg)">
                             </div>
                             <div class="swiper-content">
                                 <div class="entry-meta mb-2">
                                     <h5 class="entry-category mb-0 white">Explore Travel</h5>
                                 </div>
                                 <h1 class="mb-2"><a href="tour-single.html" class="white">Start Planning Your
                                         Dream
                                         Trip</a></h1>
                                 {{-- <p class="white mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                     eiusmod tempor incididunt ut labore et dolore magna aliqua</p> --}}
                                 <div class="slider-button d-flex justify-content-center">
                                     <a href="{{ route('ContactView') }}" class="nir-btn me-4">Contact Us</a>
                                 </div>
                             </div>
                             <div class="dot-overlay"></div>
                         </div>
                     </div>
                     <div class="swiper-slide">
                         <div class="slide-inner">
                             <div class="slide-image" style="background-image:url(1_WebFrontend/images/slider/44.jpg)">
                             </div>
                             <div class="swiper-content">
                                 <div class="entry-meta mb-2">
                                     <h5 class="entry-category mb-0 white">Road To Travel</h5>
                                 </div>
                                 <h1 class="mb-2"><a href="tour-single.html" class="white">Begin your adventure
                                         with
                                         us</a></h1>
                                 {{-- <p class="white mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                     eiusmod tempor incididunt ut labore et dolore magna aliqua</p> --}}
                                 <a href="{{ route('DestinationView') }}" class="nir-btn">Destinations</a>
                             </div>
                             <div class="dot-overlay"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
     </section>


     <div class="form-main">
         <div class="section-shape top-0" style="background-image: url(images/shape-pat.png);"></div>
         <div class="container">
             <div class="row align-items-center form-content rounded position-relative ms-5 me-5">
                 <div class="col-lg-2 p-0">
                     <h4
                         class="form-title form-title1 text-center p-4 py-5 white bg-theme mb-0 rounded-start d-lg-flex align-items-center">
                         <i class="icon-location-pin fs-1 me-1"></i> Find Your Holidays
                     </h4>
                 </div>
                 <div class="col-lg-10 px-4">
                     <form action="{{ route('AddEnquiry') }}" class="form-content-in d-lg-flex align-items-center"
                         id="KnowYourPlans" method="post" enctype="multipart/form-data">
                         <div class="form-group me-2">
                             <div class="input-box">
                                 <span class="icon">
                                     <i class="bi bi-person-fill"></i>
                                 </span>
                                 <input type="text" name="name" placeholder="Enter your name">
                             </div>
                         </div>
                         <div class="form-group me-2">
                             <div class="input-box">
                                 <span class="icon">
                                     <i class="bi bi-phone-fill"></i>
                                 </span>
                                 <input type="text" name="phone" placeholder="Enter your phone">
                             </div>
                         </div>
                         <div class="form-group me-2">
                             <div class="input-box">
                                 <span class="icon">
                                     <i class="bi bi-envelope-fill"></i>
                                 </span>
                                 <input type="email" name="email_id" placeholder="Enter your email">
                             </div>
                         </div>

                         <div class="form-group mb-0 text-center">
                             <button type="submit" class="nir-btn w-100">Know Your Plans</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     <section class="trending bg-grey pt-17 pb-6">
         <div class="section-shape top-0" style="background-image: url(1_WebFrontend/images/shape8.png);"></div>
         <div class="container">
             <div class="row align-items-center justify-content-between mb-6 ">
                 <div class="col-lg-7">
                     <div class="section-title text-center text-lg-start">
                         <h4 class="mb-1 theme1">Top Pick</h4>
                         <h2 class="mb-1">Latest <span class="theme">Tour Packages</span></h2>
                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                             labore.</p>
                     </div>
                 </div>
                 <div class="col-lg-5">
                 </div>
             </div>
             <div class="trend-box">
                 <div class="row item-slider">
                     @foreach ($latest_packages as $latest_package)
                         <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                             <div class="trend-item rounded box-shadow bg-white">
                                 <div class="trend-image position-relative">
                                     @if ($latest_package->package_images->isNotEmpty())
                                         @foreach ($latest_package->package_images as $image)
                                             <img src="/storage/file_uploads/package/{{ $image->id }}/{{ $image->image }}"
                                                 alt="image" class="">
                                         @endforeach
                                     @else
                                         <img src="/1_WebFrontend/images/Dummy1.png" alt="image" class="">
                                     @endif
                                     <div class="color-overlay"></div>
                                 </div>
                                 <div class="trend-content p-4 pt-5 position-relative">
                                     <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                         <div class="entry-author">
                                             <i class="icon-calendar"></i>
                                             <span class="fw-bold"> {{ $latest_package->days }} Days Tours</span>
                                         </div>
                                     </div>
                                     <h5 class="theme mb-1"><i class="flaticon-location-pin"></i>
                                         {{ $latest_package->destination_name }}</h5>
                                     <h3 class="mb-1"><a
                                             href="{{ route('TourDetailView', ['id' => $latest_package->id]) }}">{{ $latest_package->package_name }}</a>
                                     </h3>
                                     <div class="rating-main d-flex align-items-center pb-2">
                                         <div class="rating">
                                             {{-- @for ($i = 1; $i <= 5; $i++)
                                                 @if ($i <= $latest_package->rating)
                                                     <span class="fa fa-star checked"></span>
                                                 @else
                                                     <span class="fa fa-star"></span>
                                                 @endif
                                             @endfor --}}
                                         </div>
                                         {{-- <span class="ms-2">(12)</span> --}}
                                     </div>
                                     <p class=" border-b pb-2 mb-2">{{ $latest_package->description }}</p>
                                     <div class="entry-meta">
                                         <div class="entry-author d-flex align-items-center">
                                             {{-- <p class="mb-0"><span class="theme fw-bold fs-5">
                                                     ₹{{ $latest_package->price }}</span> | Per
                                                 person
                                             </p> --}}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </section>

     <section class="testimonial pt-10 pb-20" style="background-image: url(1_WebFrontend/images/bg/bg8.jpg);">
         <div class="container">
             <div class="testimonial-in">
                 <div class="row align-items-center">
                     <div class="col-lg-5">
                         <div class="section-title">
                             <h4 class="mb-1 theme1">Our Testimonails</h4>
                             <h2 class="mb-1 white">Good Reviews By <span class="theme">Clients</span></h2>
                             <p class="mb-0 white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                 eiusmod tempor incididunt ut labore.</p>
                         </div>
                     </div>
                     <div class="col-lg-7">
                         <div class="row about-slider">
                             @foreach ($testimonials as $testimonial)
                                 <div class="col-sm-4 item">
                                     <div class="testimonial-item1">
                                         <div class="details d-flex">
                                             <i class="fa fa-quote-left fs-1 mb-0"></i>
                                             <div class="author-content ms-4">
                                                 <p class="mb-4 white fs-5 fw-normal">{{ $testimonial->message }}</p>
                                                 <div class="author-info d-flex align-items-center">
                                                     <img src="/storage/file_uploads/testimonial/{{ $testimonial->id }}/{{ $testimonial->image }}"
                                                         alt>
                                                     <div class="author-title ms-3">
                                                         <h5 class="m-0 theme1">{{ $testimonial->user_name }}</h5>
                                                         <span class="white">Client</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="dot-overlay"></div>
     </section>


     <section class="trending pb-3 pt-3">
         <div class="container">
             <div class="section-title mb-6 w-50 mx-auto text-center">
                 <h4 class="mb-1 theme1">Top Destinations</h4>
                 <h2 class="mb-1">Explore <span class="theme">Top Destinations</span></h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                 </p>
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
                                         <h5 class="mb-0 theme1">{{ $destination->state }}
                                         </h5>
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
     </section>
 @endsection
