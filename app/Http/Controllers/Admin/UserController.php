<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChangePasswordPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function users_list()
    {
        return view('2_AdminPanel.2_Pages.UsersList.userslist');
    }

    public function form(Request $request, $id = NULL)
    {

        $readonly = $request->readonly;

        if ($id) {
            $user = User::find($id);
            $View = view("2_AdminPanel.3_Components.UserList.AddDataForm", compact('user', 'readonly'))->render();
        } else {
            $View = view("2_AdminPanel.3_Components.UserList.AddDataForm")->render();
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

        $records = User::get();

        return ArrayResp(
            Data: $records,
            Message: "Fetched Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function add(UserPostRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        return ArrayResp(
            Data: $user,
            Message: "Added Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function edit(UserPostRequest $request)
    {
        $user = User::find($request->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status
        ]);

        return ArrayResp(
            Data: $user,
            Message: "Edited Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function delete($id)
    {
        $record = User::find($id);
        $record->delete();

        return ArrayResp(
            Message: "Deleted Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function password_form($id)
    {   
        $user = User::find($id);
        
        $View = view("2_AdminPanel.3_Components.UserList.ChangePassword",compact('user'))->render();

        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function change_password(ChangePasswordPostRequest $request)
    {
        $user = User::find($request->id);
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return ArrayResp(
            Data: $user,
            Message: "Password Changed Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }
}
