<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyProfilePostRequest;

class CompanyProfileController extends Controller
{
    public function profile()
    {
        $company_info = ContactInfo::first();
        
        return view('2_AdminPanel.2_Pages.CompanyProfile.company',compact('company_info'));
    }

    public function form($id)
    {

        $contact_info = ContactInfo::find($id);

        $View = view("2_AdminPanel.3_Components.CompanyProfile.AddDataForm", compact('contact_info'))->render();


        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function edit(CompanyProfilePostRequest $request)
    {

        $contact_info = ContactInfo::find($request->id);

        $contact_info->update([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'email_1' => $request->email_1,
            'phone_1' => $request->phone_1,
            'email_2' => $request->email_2,
            'phone_2' => $request->phone_2,
            'location' => $request->phone_2,
        ]);

        return ArrayResp(
            Data: $contact_info,
            Message: "Edited Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
