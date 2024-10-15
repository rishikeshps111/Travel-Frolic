 @extends('2_AdminPanel.1_Layouts.1_Main')
 @section('content')
     <div class="page-content">
         <nav class="page-breadcrumb d-flex align-items-center justify-content-between">
             <ol class="breadcrumb mb-0">
                 <li class="breadcrumb-item"><a href="{{ route('DashboardView') }}">Dashboard</a></li>
                 <li class="breadcrumb-item active" aria-current="page">/ Testomonial</li>
             </ol>
             <a href="adduser.html" id="AddDataModelToggle" class="btn btn-primary" data-bs-toggle="modal"
                 data-bs-target="#CommonModel">Add
                 Testomonial</a>
         </nav>
         <div class="row">
             <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <div class="table-responsive" id="CommonTable">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         {{-- <div class="row">
             <div class="dataTables_paginate">
                 <ul class="pagination">
                     <li class="paginate_button page-item">
                         <a href="#" class="page-link">Previous</a>
                     </li>
                     <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                     <li class="paginate_button page-item"><a href="#" class="page-link">2</a></li>
                     <li class="paginate_button page-item"><a href="#" class="page-link">3</a></li>
                     <li class="paginate_button page-item"><a href="#" class="page-link">Next</a></li>
                 </ul>
             </div>
         </div> --}}
     </div>
 @endsection
