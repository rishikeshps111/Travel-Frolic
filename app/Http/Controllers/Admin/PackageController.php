<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\Duration;
use App\Models\Destination;
use App\Models\PackageImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PackagePostRequest;
use App\Http\Requests\PackageImagePostRequest;

class PackageController extends Controller
{
    public function list()
    {
        return view('2_AdminPanel.2_Pages.PackageList.packagelist');
    }

    public function form(Request $request, $id = NULL)
    {
        $readonly = $request->readonly;

        $desinations = Destination::where('status', 1)->get();
        $durations = Duration::where('status', 1)->get();

        $viewMode = request()->segment(3);
        // dd($viewMode);

        if ($viewMode === 'view') {
            $readonly = true;
        }

        if ($id) {
            $package = Package::select(
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
                'packages.status',
                'packages.daywise_details',

            )->leftJoin('destination', 'destination.id', 'packages.destination_id')
                ->leftJoin('duration', 'duration.id', 'packages.duration_id')
                ->find($id);
            $packageDaywiseDetails = json_decode($package->daywise_details);

            $View = view("2_AdminPanel.3_Components.PackageList.AddDataForm", compact('package', 'desinations', 'durations', 'readonly', 'packageDaywiseDetails'));
        } else {
            $View = view("2_AdminPanel.3_Components.PackageList.AddDataForm", compact('desinations', 'durations'));
        }

        return $View;
    }

    public function fetch()
    {

        $records = Package::select(
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
            'packages.status',

        )->leftJoin('destination', 'destination.id', 'packages.destination_id')
            ->leftJoin('duration', 'duration.id', 'packages.duration_id')
            ->with(['package_images' => function ($query) {
                $query->latest()->take(3); // Get the latest 3 images
            }])
            ->get();


        return ArrayResp(
            Data: $records,
            Message: "Fetched Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function add(PackagePostRequest $request)
    {
        $days = $request->daywise_day;
        $titles = $request->daywise_title;
        $descriptions = $request->daywise_description;

        $combinedData = [];

        for ($i = 0; $i < count($days); $i++) {
            // Combine the data into an associative array
            $combinedData[] = [
                'day' => $days[$i],
                'title' => $titles[$i],
                'description' => $descriptions[$i],
            ];
        }

        $jsonData = json_encode($combinedData);

        $package = Package::Create([
            'package_name' => $request->package_name,
            'destination_id' => $request->destination,
            'duration_id' => $request->duration,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
            'daywise_details' => $jsonData,
            'status' => $request->status,
        ]);

        return ArrayResp(
            Data: $package,
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function edit(PackagePostRequest $request)
    {
        $package = Package::find($request->id);

        $days = $request->daywise_day;
        $titles = $request->daywise_title;
        $descriptions = $request->daywise_description;

        $combinedData = [];

        for ($i = 0; $i < count($days); $i++) {
            // Combine the data into an associative array
            $combinedData[] = [
                'day' => $days[$i],
                'title' => $titles[$i],
                'description' => $descriptions[$i],
            ];
        }

        $jsonData = json_encode($combinedData);

        $package->update([
            'package_name' => $request->package_name,
            'destination_id' => $request->destination,
            'duration_id' => $request->duration,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
            'daywise_details' => $jsonData,
            'status' => $request->status,
        ]);

        return ArrayResp(
            Data: $package,
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function delete($id)
    {
        $record = Package::find($id);
        $record->delete();

        return ArrayResp(
            Message: "Deleted Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function image_view()
    {
        $View = view("2_AdminPanel.3_Components.PackageList.ImageDataForm")->render();

        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function upload_image(PackageImagePostRequest $request, $id)
    {
        $package = Package::find($id);

        $image = $request->file('file');
        $imagename = $image->getClientOriginalName();

        $PackageImage_Id = PackageImage::insertGetId([
            'image' => $imagename,
            'package_id' => $package->id
        ]);

        $directory = storage_path('app/public/file_uploads/package/' .  $PackageImage_Id);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0775, true, true);
        }

        $image->move($directory, $imagename);

        return ArrayResp(
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function fetchImages($id)
    {

        $package = Package::find($id);

        if (!$package) {
            return ArrayResp(
                Message: "No Package Found!",
                NeedCount: FALSE,
                Misc: []
            );
        }

        // Assuming you have a relationship set up in the Package model to fetch images
        $images = PackageImage::where('package_id', $package->id)->get(); // Execute the query to get results

        // Check if images are found
        if ($images->isEmpty()) {
            return ArrayResp(
                Message: "No Images Records Found!",
                NeedCount: FALSE,
                Misc: []
            );
        }

        // Format the images as needed for Dropzone
        $formattedImages = $images->map(function ($image) {
            return [
                'name' => $image->image, // Original filename
                'size' => filesize(storage_path("app/public/file_uploads/package/{$image->id}/{$image->image}")), // File size
                'url' => asset("storage/file_uploads/package/{$image->id}/{$image->image}"), // URL to access the image
            ];
        });

        return ArrayResp(
            Data: $formattedImages,
            Message: "Fetched Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
