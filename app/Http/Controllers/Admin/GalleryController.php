<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryPostRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function list()
    {   
        $Images = Gallery::select('gallery.*','destination.place_name AS destination_name')
        ->leftjoin('destination','destination.id','gallery.destination_id')
        ->get();
        return view('2_AdminPanel.2_Pages.GalleryList.gallerylist',compact('Images'));
    }

    public function form(Request $request, $id = NULL)
    {

        $destinations = Destination::get();

        $View = view("2_AdminPanel.3_Components.GalleryList.AddDataForm", compact('destinations'))->render();

        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function add(GalleryPostRequest $request)
    {
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $imagename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image_id = Gallery::insertGetId([
                    'name' => $imagename,
                    'image' => $imagename,
                    'destination_id' => $request->destination
                ]);

                $directory = storage_path('app/public/file_uploads/gallery/' .  $image_id);

                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0775, true, true);
                }

                $image->move($directory, $imagename);
            }
        }
        return ArrayResp(
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function delete($id)
    {
        $record = Gallery::find($id);
        $record->delete();

        return ArrayResp(
            Message: "Deleted Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
