 @extends('1_WebFrontend.1_Layouts.0_Minimal')
 @section('content')
     <section class="error overflow-hidden" style="padding:0px;">
         <div class="container">
             <div class="error-content text-center">
                 <h2 class="mb-2">Oops! Something went wrong on our end. Please try again later.</h2>
                 <img src="1_WebFrontend/images/404-1.svg" alt class="mb-4 w-75 mx-auto">
                 <div class="error-btn mt-4">
                     <a href="{{ route('IndexView') }}" class="nir-btn me-2">GO TO HOMEPAGE</a>
                     <a href="{{ route('ContactView') }}" class="nir-btn">GO TO CONTACT PAGE</a>
                 </div>
             </div>
         </div>
     </section>
 @endsection
