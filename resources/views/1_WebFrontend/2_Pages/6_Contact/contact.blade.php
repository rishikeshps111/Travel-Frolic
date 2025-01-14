 @extends('1_WebFrontend.1_Layouts.1_Main')
 @section('content')
     <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(1_WebFrontend/images/bg/bg9.jpg);">
         <div class="section-shape section-shape1 top-inherit bottom-0"
             style="background-image: url(1_WebFrontend/images/shape8.png);">
         </div>
         <div class="breadcrumb-outer">
             <div class="container">
                 <div class="breadcrumb-content text-center">
                     <h1 class="mb-3">Contact Us</h1>
                     <nav aria-label="breadcrumb" class="d-block">
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('IndexView') }}">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
         <div class="dot-overlay"></div>
     </section>


     <section class="contact-main pt-6 pb-60">
         <div class="container">
             <div class="contact-info-main mt-0">
                 <div class="row">
                     <div class="col-lg-10 col-offset-lg-1 mx-auto">
                         <div class="contact-info bg-white">
                             <div class="contact-info-title text-center mb-4 px-5">
                                 <h3 class="mb-1">INFORMATION ABOUT US</h3>
                                 <p class="mb-0">Sagittis posuere id nam quis vestibulum vestibulum a facilisi at elit
                                     hendrerit scelerisque sodales nam dis orci.</p>
                             </div>
                             <div class="contact-info-content row mb-1">
                                 <div class="col-lg-4 col-md-6 mb-4">
                                     <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                         <div class="info-icon mb-2">
                                             <i class="fa fa-map-marker-alt theme"></i>
                                         </div>
                                         <div class="info-content">
                                             <h3>Office Location</h3>
                                             <p class="m-0">Aluva - 680543, Kerala, India</p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4 col-md-6 mb-4">
                                     <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                         <div class="info-icon mb-2">
                                             <i class="fa fa-phone theme"></i>
                                         </div>
                                         <div class="info-content">
                                             <h3>Phone Number</h3>
                                             <p class="m-0">+91 73569 90225</p>
                                             {{-- <p class="m-0">977-444-222-000</p> --}}
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4 col-md-12 mb-4">
                                     <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                         <div class="info-icon mb-2">
                                             <i class="fa fa-envelope theme"></i>
                                         </div>
                                         <div class="info-content ps-4">
                                             <h3>Email Address</h3>
                                             <p class="m-0"><a
                                                     href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection"
                                                     class="__cf_email__"
                                                     data-cfemail="bcd5d2dad3fcced9ddd0cfd4d5d9d0d892dfd3d1">[email&#160;protected]</a>
                                             </p>
                                             {{-- <p class="m-0"><a
                                                     href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection"
                                                     class="__cf_email__"
                                                     data-cfemail="d5bdb0b9a595a7b0b4b9a6bdbcb0b9b1fbb6bab8">[email&#160;protected]</a>
                                             </p> --}}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div id="contact-form1" class="contact-form">
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="map rounded overflow-hiddenb rounded mb-md-4">
                                             <div style="width: 100%">
                                                 <iframe height="500"
                                                     src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div id="contactform-error-msg"></div>
                                         <form method="post" action="#" name="contactform2" id="contactform2">
                                             <div class="form-group mb-2">
                                                 <input type="text" name="first_name" class="form-control" id="fullname"
                                                     placeholder="First Name">
                                             </div>
                                             <div class="form-group mb-2">
                                                 <input type="text" name="last_name" class="form-control" id="llastname"
                                                     placeholder="Last Name">
                                             </div>
                                             <div class="form-group mb-2">
                                                 <input type="email" name="email" class="form-control" id="email"
                                                     placeholder="Email">
                                             </div>
                                             <div class="form-group mb-2">
                                                 <input type="text" name="phone" class="form-control" id="phnumber"
                                                     placeholder="Phone">
                                             </div>
                                             <div class="textarea mb-2">
                                                 <textarea name="comments" placeholder="Enter a message"></textarea>
                                             </div>
                                             <div class="comment-btn text-center">
                                                 <input type="submit" class="nir-btn" id="submit2" value="Send Message">
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endsection
