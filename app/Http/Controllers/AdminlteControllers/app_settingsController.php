<?php

namespace App\Http\Controllers\AdminlteControllers;

use App\Models\App_setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class app_settingsController extends Controller
{
    public function index()
    {
        $app_settings = App_setting::all();
        return view('adminDashBord.app_settings.index' , compact('app_settings'));
    }

    public function edit(Request $request)
    {

        $valedator = validator()->make($request->all(),
            [
                'email'=>'required|email',
                'phone'=>'required|regex:/(01)[0-9]{9}/',
                'facebook_link'=>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
                'twitter_link'=>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
                'youtube_link'=>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
                'googleplus_link'=>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
                'whats_app'=>'required',
                'about_app'=>'required',

            ]
            );
        if($valedator->fails())
        {
            return redirect('/app_settings')->withInput()->withErrors($valedator->errors());
        }

        App_setting::find(1)->update($request->all());
        session()->flash('success' , 'updating success');
        return redirect('/app_settings');
    }
}
