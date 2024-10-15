<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DurationPostRequest;
use App\Models\Duration;
use Illuminate\Http\Request;

class DurationController extends Controller
{
    public function list()
    {
        return view('2_AdminPanel.2_Pages.DurationList.durationlist');
    }

    public function form(Request $request, $id = NULL)
    {

        $readonly = $request->readonly;

        if ($id) {
            $duration = Duration::find($id);
            $View = view("2_AdminPanel.3_Components.DurationList.AddDataForm", compact('duration', 'readonly'))->render();
        } else {
            $View = view("2_AdminPanel.3_Components.DurationList.AddDataForm")->render();
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

        $records = Duration::get();

        return ArrayResp(
            Data: $records,
            Message: "Fetched Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function fetch_detail($id)
    {

        $record = Duration::find($id);

        return ArrayResp(
            Data: $record,
            Message: "Fetched Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function add(DurationPostRequest $request)
    {

        $duration = Duration::updateOrCreate([
            'days' => $request->days,
            'nights' => $request->nights,
        ], [
            'status' => $request->status
        ]);

        return ArrayResp(
            Data: $duration,
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function edit(DurationPostRequest $request)
    {
        $duration = Duration::find($request->id);

        $duration->update([
            'days' => $request->days,
            'nights' => $request->nights,
            'status' => $request->status
        ]);

        return ArrayResp(
            Data: $duration,
            Message: "Edited Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function delete($id)
    {
        $record = Duration::find($id);
        $record->delete();

        return ArrayResp(
            Message: "Deleted Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
