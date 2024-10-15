 @extends('2_AdminPanel.1_Layouts.1_Main')
 @section('content')
     <div class="page-content">
         <nav class="page-breadcrumb d-flex align-items-center justify-content-between">
             <ol class="breadcrumb mb-0">
                 <li class="breadcrumb-item"><a href="{{ route('DashboardView') }}">Dashboard</a></li>
                 <li class="breadcrumb-item active" aria-current="page">/ Company Profile</li>
             </ol>
             {{-- <a href="adduser.html" id="AddDataModelToggle" class="btn btn-primary" data-bs-toggle="modal"
                 data-bs-target="#CommonModel">Add
                 Testomonial</a> --}}
         </nav>
         <div class="row profile-body">

             <div class="col-lg-12">
                 <div class="card rounded">
                     <div class="card-body">
                         <input type="hidden" name="id" value="{{ $company_info->id }}" id="CompanyProfileId">
                         <div class="d-flex align-items-center justify-content-between mb-2">
                             <h6 class="card-title mb-0"><b>Company Name</b></h6>
                         </div>
                         <p>{{ $company_info->company_name }}</p>
                         <div class="mt-3">
                             <label class="fw-bolder mb-0 text-uppercase">Address</label>
                             <p>{{ $company_info->address }}</p>
                         </div>
                         
                         <div class="mt-3">
                             <label class="fw-bolder mb-0 text-uppercase">Main Contact</label>
                             <hr class="m-0">
                         </div>
                         <div class="mt-3">
                             <label class="fw-bolder mb-0 text-uppercase">Email</label>
                             <p>{{ $company_info->email_1 }}</p>
                         </div>
                         <div class="mt-3">
                             <label class="fw-bolder mb-0 text-uppercase">Phone No.:</label>
                             <p>{{ $company_info->phone_1 }}</p>
                         </div>
                          <div class="mt-3">
                             <label class="fw-bolder mb-0 text-uppercase">Sub Contact</label>
                             <hr class="m-0">
                         </div>
                         <div class="mt-3">
                             <label class="fw-bolder mb-0 text-uppercase">Email</label>
                             <p>{{ $company_info->email_2 }}</p>
                         </div>
                         <div class="mt-3">
                             <label class="fw-bolder mb-0 text-uppercase">Phone No.:</label>
                             <p>{{ $company_info->phone_2 }}</p>
                         </div>
                         <div class="d-flex align-items-center justify-content-end mb-2">
                             <a href="adduser.html" id="AddDataModelToggle" class="btn btn-primary" data-bs-toggle="modal"
                                 data-bs-target="#CommonModel">Edit Profie</a>
                         </div>
                     </div>
                 </div>
             </div>

             {{-- 
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="mb-4">User Profile</h4>
                         <form class="forms-sample">
                             <div class="row">
                                 <div class="col-lg-12 mb-3">
                                     <label for="upload" class="form-label">User Image</label>
                                     <input class="form-control" type="file" id="upload">
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label for="firstname" class="form-label"> First Name</label>
                                     <input type="text" class="form-control" id="firstname" autocomplete="off"
                                         placeholder>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label for="lastname" class="form-label"> Last Name</label>
                                     <input type="text" class="form-control" id="lastname" autocomplete="off"
                                         placeholder>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label for="email" class="form-label"> Email Address</label>
                                     <input type="email" class="form-control" id="email" autocomplete="off"
                                         placeholder>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label for="phoneno" class="form-label"> Phone Number</label>
                                     <input type="email" class="form-control" id="phoneno" autocomplete="off"
                                         placeholder>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label for="username" class="form-label"> Username</label>
                                     <input type="text" class="form-control" id="username" autocomplete="off"
                                         placeholder>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label for="password" class="form-label"> Password</label>
                                     <input type="password" class="form-control" id="password" autocomplete="off"
                                         placeholder>
                                 </div>
                                 <div class="text-center">
                                     <button type="submit" class="btn btn-primary"><i class="link-icon"
                                             data-feather="plus"></i> Update Profile</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div> --}}


         </div>
     </div>
 @endsection
