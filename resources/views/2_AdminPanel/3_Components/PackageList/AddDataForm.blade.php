@php
    $PackageEdit = isset($package) ?? 0;
    if ($PackageEdit):
        $route = 'EditPackage';
        $PackageId = $package->id;
        $PackagePackageName = $package->package_name;
        $PackageDestinationId = $package->destination_id;
        $PackageDestinationName = $package->destination_name;
        $PackageDurationId = $package->duration_id;
        $PackageDays = $package->days;
        $PackageNights = $package->nights;
        $PackageDescription = $package->description;
        $PackagePrice = $package->price;
        $PackageRating = $package->rating;

        //$PackageDaywiseDetails = $package->daywise_details;

        $PackageStatus = $package->status;

        if ($PackageStatus == '1'):
            $Active = 'checked';
        else:
            $Inactive = 'checked';
        endif;

        $hidden = 'hidden' ?? null;
    else:
        $route = 'AddPackage';
    endif;

    if (isset($readonly)):
        $disabled = 'disabled' ?? null;
        $hide = 'hidden' ?? null;
    else:
    endif;

    if (isset($packageDaywiseDetails)):
        $show = '';
    else:
        $show = 'hidden';
    endif;
@endphp

@extends('2_AdminPanel.1_Layouts.1_Main')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb d-flex align-items-center justify-content-between">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">/ Add Package</li>
            </ol>
            <a href="{{ route('PackageListView') }}" class="btn btn-primary"><i class="link-icon"
                    data-feather="arrow-left"></i>
                Back To List</a>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route($route) }}" method="post" id="CommonForm"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $PackageId ?? null }}">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label for="package_name" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="package_name" name="package_name"
                                        placeholder="Enter the Package Name" value="{{ $PackagePackageName ?? null }}"
                                        {{ $disabled ?? null }}>
                                </div>
                                <div class="col-6">
                                    <label for="destination" class="form-label">Main Destination</label>
                                    <select class="form-select" id="destination" name="destination" {{ $disabled ?? null }}>
                                        <option value="{{ $PackageDestinationId ?? null }}">
                                            {{ $PackageDestinationName ?? 'Select Destination' }}
                                        </option>
                                        @foreach ($desinations as $desination)
                                            <option value="{{ $desination->id }}">{{ $desination->place_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="duration" class="form-label">Duration</label>
                                    <select class="form-select" id="duration" name="duration" {{ $disabled ?? null }}>
                                        <option value="{{ $PackageDurationId ?? null }}">
                                            {{ isset($PackageDays, $PackageNights) ? $PackageDays . ' Days/' . $PackageNights . ' Nights' : 'Select Duration' }}
                                        </option>
                                        @foreach ($durations as $duration)
                                            <option value="{{ $duration->id }}">{{ $duration->days }}
                                                Days/{{ $duration->nights }} Nights</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="price" class="form-label">Price Per Person</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Enter the Price" value="{{ $PackagePrice ?? null }}"
                                        {{ $disabled ?? null }}>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter the description"
                                        value="" {{ $disabled ?? null }}>{{ $PackageDescription ?? null }}</textarea>
                                </div>
                                <div class="col-6">
                                    <label for="rating" class="form-label">Rating</label>
                                    <select class="form-select" id="rating" name="rating" {{ $disabled ?? null }}>
                                        <option value="{{ $PackageRating ?? null }}">
                                            {{ isset($PackageRating) ? $PackageRating.' Star' : 'Select Rating' }}
                                        </option>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Star</option>
                                        <option value="3">3 Star</option>
                                        <option value="4">4 Star</option>
                                        <option value="5">5 Star</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                                value="1" {{ $Active ?? 'checked' }} {{ $disabled ?? null }}>
                                            <label class="form-check-label" for="inlineRadio1">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                                value="0" {{ $Inactive ?? null }} {{ $disabled ?? null }}>
                                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <label for="description" class="form-label">Images</label>
                                    <div action="/target" class="dropzone" id="my-great-dropzone"></div>
                                </div> --}}
                                <div class="mt-0" id="DaywiseHeading" {{ $show }}>
                                    <h5 class="m-3">Daywise Details</h5>
                                    <hr class="m-0">
                                </div>

                                <div id="DaywiseFields" class="row g-4 mt-0 pe-0">
                                    @if (isset($packageDaywiseDetails))
                                        @foreach ($packageDaywiseDetails as $detail)
                                            <input type="hidden" name="daywise_day[]"
                                                value="{{ $detail->day ?? null }}">
                                            <div class="col-4 ps-2">
                                                <label for="daywise_title" class="form-label">Day 1 - Title</label>
                                                <input type="text" class="form-control" id="daywise_title"
                                                    name="daywise_title[]" placeholder="Enter the title"
                                                    value="{{ $detail->title ?? null }}" {{ $disabled ?? null }}>
                                            </div>
                                            <div class="col-8 pe-0">
                                                <label for="daywise_description" class="form-label">Description</label>
                                                <textarea type="text" class="form-control" id="daywise_description" name="daywise_description[]"
                                                    placeholder="Enter the description" value="" {{ $disabled ?? null }}>{{ $detail->description ?? null }}</textarea>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" id="submit" class="btn btn-primary"
                                            {{ $hide ?? null }}>Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
