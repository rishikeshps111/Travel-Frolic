 @extends('1_WebFrontend.1_Layouts.1_Main')
 @section('content')
     <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(/1_WebFrontend/images/bg/bg1.jpg);">
         <div class="section-shape section-shape1 top-inherit bottom-0"
             style="background-image: url(/1_WebFrontend/images/shape8.png);">
         </div>
         <div class="breadcrumb-outer">
             <div class="container">
                 <div class="breadcrumb-content text-center">
                     <h1 class="mb-3">Tour Details</h1>
                     <nav aria-label="breadcrumb" class="d-block">
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Tour Details</li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
         <div class="dot-overlay"></div>
     </section>


     <section class="trending pt-6 pb-0 bg-lgrey overflow-hidden">
         <div class="container">
             <div class="single-content">
                 <div id="highlight">
                     <div class="single-full-title border-b mb-2 pb-2">
                         <div class="single-title text-center">
                             <h2 class="mb-1">{{ $package_detail->package_name }}</h2>
                             <div class="rating-main">
                                 <p class="mb-0 me-2 d-inline-block"><i class="icon-location-pin"></i>
                                     {{ $package_detail->destination_name }},
                                     {{ $package_detail->destination_state }}</p>
                                 {{-- <div class="rating me-2 d-inline-block">
                                     @for ($i = 1; $i <= 5; $i++)
                                         @if ($i <= $package_detail->rating)
                                             <span class="fa fa-star checked"></span>
                                         @else
                                             <span class="fa fa-star"></span>
                                         @endif
                                     @endfor
                                 </div> --}}
                                 {{-- <span>(1,186 Reviews)</span> --}}
                             </div>
                         </div>
                     </div>
                     <div class="description-images mb-4">
                         <div class="row">
                             @if ($package_detail->package_images->isNotEmpty())
                                 @foreach ($package_detail->package_images as $image)
                                     <div class="col"><img
                                             src="/storage/file_uploads/package/{{ $image->id }}/{{ $image->image }}" alt
                                             class="rounded"></div>
                                 @endforeach
                             @else
                                 <div class="col d-flex justify-content-center">
                                     <div class="alert alert-warning p-3" role="alert">
                                         <p class="mb-0" style="color:#6c757d">No images available for this package.</p>
                                     </div>
                                 </div>
                             @endif
                         </div>
                     </div>
                     <div class="description mb-2">
                         <h4>Description</h4>
                         <p>{{ $package_detail->description }}</p>
                     </div>
                 </div>
                 <div id="iternary" class="accrodion-grp faq-accrodion mb-4" data-grp-name="faq-accrodion">
                     @foreach ($daywise_details as $day)
                         <div class="accrodion">
                             <div class="accrodion-title rounded">
                                 <h5 class="mb-0"><span>Day {{ $day['day'] }}</span> - {{ $day['title'] }}</h5>
                             </div>
                             <div class="accrodion-content" style="display: block;">
                                 <div class="inner">
                                     <p>{{ $day['description'] }}</p>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </section>
 @endsection
