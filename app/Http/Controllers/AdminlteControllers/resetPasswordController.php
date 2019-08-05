<?php

namespace App\Http\Controllers\AdminlteControllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class resetPasswordController extends Controller
{
    public function index()
    {
        return view('adminDashBord.auth.reset');
    }

    public function reset(Request $request)
    {
        $validator = validator()->make($request->all() ,
            [

                'old_password' => 'required',
                'password' => 'required|confirmed',

            ]
        );

        if ($validator->fails())
        {
            return redirect('/reset')->withInput()->withErrors($validator->errors());
        }
        if(Hash::check($request->old_password,auth()->user()->password))
        {
            User::where('id',auth()->user()->id)->update(['password'=>Hash::make($request->password)]);

            session()->flash('success', 'update success');
            return redirect('/reset');

        }else{
            session()->flash('fail', 'update failed the old password is not correct');
            return redirect('/reset');
        }

    }
}
