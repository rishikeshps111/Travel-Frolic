<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationPostRequest;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    public function list()
    {
        return view('2_AdminPanel.2_Pages.DestinationList.destination');
    }

    public function form(Request $request, $id = NULL)
    {

        $readonly = $request->readonly;

        if ($id) {
            $destination = Destination::find($id);
            $View = view("2_AdminPanel.3_Components.DestinationList.AddDataForm", compact('destination', 'readonly'))->render();
        } else {
            $View = view("2_AdminPanel.3_Components.DestinationList.AddDataForm")->render();
        }

        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }


    public function fetch()
    {

        $records = Destination::get();

        return ArrayResp(
            Data: $records,
            Message: "Fetched Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function add(DestinationPostRequest $request)
    {

        $image = $request->file('image');
        $imagename = $image->getClientOriginalName();


        $destination_id = Destination::insertGetId([
            'place_name' => $request->place_name,
            'state' => $request->state,
            'country' => $request->country,
            'image' => $imagename,
            'description' => $request->description ?? null,
            'status' => $request->status,

        ]);
        $directory = storage_path('app/public/file_uploads/destination/' .  $destination_id);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0775, true, true);
        }

        $image->move($directory, $imagename);


        return ArrayResp(
            Data: $destination_id,
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function edit(DestinationPostRequest $request)
    {
        $destination = Destination::find($request->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $directory = storage_path('app/public/file_uploads/destination/' .  $destination->id);

            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0775, true, true);
            }

            $image->move($directory, $imagename);
        } else {
            $imagename = $destination->image;
        }

        $destination->update([
            'place_name' => $request->place_name,
            'state' => $request->state,
            'country' => $request->country,
            'image' => $imagename,
            'description' => $request->description ?? null,
            'status' => $request->status,

        ]);

        return ArrayResp(
            Data: $destination,
            Message: "Edited Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function delete($id)
    {
        $record = Destination::find($id);
        $record->delete();

        return ArrayResp(
            Message: "Deleted Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
