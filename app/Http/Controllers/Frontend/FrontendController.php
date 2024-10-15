<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Enquire;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnquiryPostRequest;

class FrontendController extends Controller
{
    public function add(EnquiryPostRequest $request)
    {

        $enquiry = Enquire::create([
            'name' => $request->name,
            'email' => $request->email_id,
            'phone' => $request->phone,
            'package_id' => $request->package_id ?? null,
            'message' => $request->message ?? null,
        ]);

        return ArrayResp(
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function fetch(Request $request)
    {
        $query = Package::select(
            'packages.id',
            'packages.package_name',
            'packages.destination_id',
            'destination.place_name AS destination_name',
            'packages.duration_id',
            'duration.days AS days',
            'duration.nights AS nights',
            'packages.description',
            'packages.price',
            'packages.rating',
            'packages.status'
        )
            ->leftJoin('destination', 'destination.id', 'packages.destination_id')
            ->leftJoin('duration', 'duration.id', 'packages.duration_id')
            ->with(['package_images' => function ($query) {
                $query->latest()->take(1); // Get the latest 3 images
            }]);

        // Filter by destination_id
        if ($request->filled('destination_id')) {
            $query->where('packages.destination_id', $request->get('destination_id'));
        }

        // Filter by duration_id
        if ($request->filled('duration_id')) {
            $query->where('packages.duration_id', $request->get('duration_id'));
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'id');
        switch ($sortBy) {
            case 'price_asc':
                $query->orderBy('packages.price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('packages.price', 'desc');
                break;
            case 'rating':
                $query->orderBy('packages.rating', 'desc');
                break;
            default:
                $query->orderBy('packages.created_at', 'DESC');
                break;
        }

        // Infinite scrolling (pagination)
        $perPage = $request->get('per_page', 10); // Default to 10 items per page
        $records = $query->paginate($perPage);

        return ArrayResp(
            Data: $records,
            Message: "Fetched Successfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
