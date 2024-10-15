<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\AdminPasswordRequest;
use App\Http\Requests\AdminProfileEditRequest;
use Illuminate\Validation\ValidationException;



class AuthController extends Controller
{


    public function login()
    {
        return view('2_AdminPanel.2_Pages.0_Auth.login');
    }

    public function admin_login(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        if (Auth::user()->status == 0) {
            throw ValidationException::withMessages([
                'email' => 'You account has been dismissed.'
            ]);
        }
        $request->session()->regenerate();

        return redirect()->route('DashboardView');
    }


    public function logout_admin(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('LoginView')->withHeaders([

            'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate, post-check=0, pre-check=0',

            'Pragma' => 'no-cache',

            'Expires' => 'Sat, 26 Jul 1997 05:00:00 GMT',

        ]);
    }

    public function dashboard()
    {
        return view('2_AdminPanel.2_Pages.1_Dashboard.dashboard');
    }

    public function profile()
    {
        $View = view("2_AdminPanel.3_Components.Profile.Profile")->render();

        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function form()
    {
        $View = view("2_AdminPanel.3_Components.EditProfile.Profile")->render();

        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function edit(AdminProfileEditRequest $request)
    {
        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $directory = storage_path('app/public/file_uploads/profile_img/' .  $user->id);

            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0775, true, true);
            }

            $image->move($directory, $imagename);
        } else {
            $imagename = $user->image;
        }


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imagename,
            'phone' => $request->phone,
        ]);

        return ArrayResp(
            Data: $user,
            Message: "Edited Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function password_form()
    {
        $View = view("2_AdminPanel.3_Components.AdminPassword.AdminPassword")->render();

        return ArrayResp(
            Data: $View,
            Message: "Model Rendered Succesfully!",
            NeedCount: FALSE,
            Misc: []
        );
    }

    public function change_password(AdminPasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        $UserData = [
            'name' => $user->name,
            'email' => $user->email
        ];

        if (!Hash::check($request->current_password, $user->password)) {
            $error = [
                'current_password' => [
                    'The current password is incorrect.',
                ]
            ];
            return response()->json([
                'message' => 'The current password is incorrect.',
                'errors' => [
                    'current_password' => [
                        'The current password is incorrect.'
                    ]
                ]
            ], 422);
        } else {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return ArrayResp(
                Data: $UserData,
                Message: "Password Changed Successfully!",
                NeedCount: FALSE,
                Misc: []
            );
        }
    }
}
