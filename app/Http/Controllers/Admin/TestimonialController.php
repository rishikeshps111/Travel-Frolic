<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialPostRequest;
use Illuminate\Support\Facades\File;


class TestimonialController extends Controller
{
    public function list()
    {
        return view('2_AdminPanel.2_Pages.TestimoniallList.testimoniallist');
    }

    public function form(Request $request, $id = NULL)
    {

        $readonly = $request->readonly;

        if ($id) {
            $testimonial = Testimonial::find($id);
            $View = view("2_AdminPanel.3_Components.TestimonialList.AddDataForm", compact('testimonial', 'readonly'))->render();
        } else {
            $View = view("2_AdminPanel.3_Components.TestimonialList.AddDataForm")->render();
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

        $records = Testimonial::get();

        return ArrayResp(
            Data: $records,
            Message: "Fetched Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function add(TestimonialPostRequest $request)
    {
        $image = $request->file('image');
        $imagename = $image->getClientOriginalName();

        $testimonial_id = Testimonial::insertGetId([
            'user_name' => $request->name,
            'message' => $request->message,
            'image' => $imagename,
        ]);

        $directory = storage_path('app/public/file_uploads/testimonial/' .  $testimonial_id);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0775, true, true);
        }

        $image->move($directory, $imagename);

        return ArrayResp(
            Data: $testimonial_id,
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function edit(TestimonialPostRequest $request)
    {

        $testimonial = Testimonial::find($request->id);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $directory = storage_path('app/public/file_uploads/testimonial/' .  $testimonial->id);

            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0775, true, true);
            }

            $image->move($directory, $imagename);
        } else {
            $imagename = $testimonial->image;
        }

        $testimonial->update([
            'user_name' => $request->name,
            'message' => $request->message,
            'image' => $imagename,
        ]);

        return ArrayResp(
            Data: $testimonial,
            Message: "Edited Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function delete($id)
    {
        $record = Testimonial::find($id);
        $record->delete();

        return ArrayResp(
            Message: "Deleted Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
