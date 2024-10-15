 @extends('1_WebFrontend.1_Layouts.1_Main')
 @section('content')
     <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(1_WebFrontend/images/bg/bg9.jpg);">
         <div class="section-shape section-shape1 top-inherit bottom-0"
             style="background-image: url(1_WebFrontend/images/shape8.png);">
         </div>
         <div class="breadcrumb-outer">
             <div class="container">
                 <div class="breadcrumb-content text-center">
                     <h1 class="mb-3">About Us</h1>
                     <nav aria-label="breadcrumb" class="d-block">
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('IndexView') }}">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">About Us</li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
         <div class="dot-overlay"></div>
     </section>


     <section class="about-us pt-6"
         style="background-image:url(1_WebFrontend/images/background_pattern.png); background-position:bottom right;">
         <div class="container">
             <div class="about-image-box">
                 <div class="row d-flex align-items-center justify-content-between">
                     <div class="col-lg-6 ps-4">
                         <div class="about-content text-center text-lg-start">
                             <h4 class="theme d-inline-block mb-0">Get To Know Us</h4>
                             <h2 class="border-b mb-2 pb-1">Explore All Tour of the world with us.</h2>
                             <p class="border-b mb-2 pb-2">We The travel frolic are here to offer you an Unforgettable
                                 travel Experience that will stay with you for a lifetime. Our mission is to make travel
                                 accesible and enjoyable for everyone.At Travel frolic we believe the travel. should be
                                 sustainable & responsible.we believe in providing Our Customen with receptional service
                                 every step of the way.
                                 <br><br> Our expert team who has expertise in the travel industries is dedicated for
                                 Creating tailor made itinearies for every budget and taste.Ready to start planning your
                                 rest adventure with destinations with us explore your destinations with us Discover

                             </p>
                             <div class="about-listing">
                                 <ul class="d-flex justify-content-between">
                                     <li><i class="icon-location-pin theme"></i> Tour Guide</li>
                                     <li><i class="icon-briefcase theme"></i> Friendly Price</li>
                                     <li><i class="icon-folder theme"></i> Reliable Tour Package</li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 mb-4 pe-4">
                         <div class="about-image" style="animation:none; background:transparent;">
                             <img class="about-img" src="1_WebFrontend/images/munnar.jpg" alt>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="white-overlay"></div>
     </section>

     <section class="testimonial pt-9" style="background-image:url(1_WebFrontend/images/testimonial.png)">
         <div class="container">
             <div class="section-title mb-6 text-center w-75 mx-auto">
                 <h4 class="mb-1 theme1">Our Testimonails</h4>
                 <h2 class="mb-1">Good Reviews By <span class="theme">Clients</span></h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                 </p>
             </div>
             <div class="row align-items-center">
                 <div class="col-lg-5 pe-4">
                     <div class="testimonial-image">
                         <img class="about-img" src="1_WebFrontend/images/varkala.jpg" alt>
                     </div>
                 </div>
                 <div class="col-lg-7 ps-4">
                     <div class="row review-slider">
                         @foreach ($testimonials as $testimonial)
                             <div class="col-sm-4 item">
                                 <div class="testimonial-item1 rounded">
                                     <div class="author-info mt-2 d-flex align-items-center mb-4">
                                         <a href="#"><img
                                                 src="/storage/file_uploads/testimonial/{{ $testimonial->id }}/{{ $testimonial->image }}"
                                                 alt></a>
                                         <div class="author-title ms-3">
                                             <h5 class="m-0 theme">{{ $testimonial->user_name }}</h5>
                                             <span>Client</span>
                                         </div>
                                     </div>
                                     <div class="details">
                                         <p class="m-0"><i
                                                 class="fa fa-quote-left me-2 fs-1"></i>{{ $testimonial->message }}</p>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endsection
