 @extends('1_WebFrontend.1_Layouts.1_Main')
 @section('content')
     <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(1_WebFrontend/images/bg/bg9.jpg);">
         <div class="section-shape section-shape1 top-inherit bottom-0"
             style="background-image: url(1_WebFrontend/images/shape8.png);">
         </div>
         <div class="breadcrumb-outer">
             <div class="container">
                 <div class="breadcrumb-content text-center">
                     <h1 class="mb-3">Gallery One</h1>
                     <nav aria-label="breadcrumb" class="d-block">
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('IndexView') }}">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Gallery One</li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
         <div class="dot-overlay"></div>
     </section>


     <div class="gallery pt-6 pb-0">
         <div class="container">
             <div class="section-title mb-6 text-center w-75 mx-auto">
                 <h4 class="mb-1 theme1">Our Gallery</h4>
                 <h2 class="mb-1">Some Beautiful <span class="theme">Snapshoots</span></h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
             </div>
             {{-- <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/trending/trending1.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Barcelona -
                                 Spain</h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending1.jpg" data-lightbox="gallery" data-title="Title"><i
                                             class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/trending/trending2.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Beijing -
                                 China
                             </h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending2.jpg" data-lightbox="gallery" data-title="Title"><i
                                             class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/trending/trending3.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Moscow -
                                 Russia
                             </h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending3.jpg" data-lightbox="gallery" data-title="Title"><i
                                             class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/trending/trending4.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Bangkok -
                                 Thailand</h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending4.jpg" data-lightbox="gallery" data-title="Title"><i
                                             class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/trending/trending8.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">FLorida - USA
                             </h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending5.jpg" data-lightbox="gallery" data-title="Title"><i
                                             class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/destination/destination14.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Tokyo - Japan
                             </h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending6.jpg" data-lightbox="gallery" data-title="Title"><i
                                             class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/destination/destination7.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Bali -
                                 Indonesia</h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending7.jpg" data-lightbox="gallery"
                                         data-title="Title"><i class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/destination/destination6.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Bangkok -
                                 Thailand</h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending8.jpg" data-lightbox="gallery"
                                         data-title="Title"><i class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                     <div class="gallery-item mb-4 rounded overflow-hidden">
                         <div class="gallery-image">
                             <img src="1_Webfrontend/images/destination/destination4.jpg" alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Bangkok -
                                 Thailand</h5>
                             <ul>
                                 <li><a href="1_Webfrontend/images/trending/trending8.jpg" data-lightbox="gallery"
                                         data-title="Title"><i class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-link"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div> --}}
             <div class="gallery grid">
                 @foreach ($gallery_images as $gallery_image)
                     <div class="gallery-item mb-2 rounded overflow-hidden grid-item">
                         <div class="gallery-image">
                             <img src="/storage/file_uploads/gallery/{{ $gallery_image->id }}/{{ $gallery_image->image }}"
                                 alt="image">
                         </div>
                         <div class="gallery-content">
                             <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">
                                 {{ $gallery_image->destination_name }} -
                                 {{ $gallery_image->destination_state }}</h5>
                             <ul>
                                 <li><a href="/storage/file_uploads/gallery/{{ $gallery_image->id }}/{{ $gallery_image->image }}"
                                         data-lightbox="gallery" data-title="{{ $gallery_image->name }}"><i
                                             class="fa fa-eye"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 @endforeach
                 <!-- More gallery items -->
             </div>
         </div>
     </div>
 @endsection
