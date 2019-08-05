<?php

namespace App\Http\Controllers\AdminlteControllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Donation_request;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class citiesController extends Controller
{
    public function index()
    {
        $governorates = Governorate::all();
        $clients = Client::all();
        $clients = $clients->count();

        $donations = Donation_request::all()->count();
        $cities = City::paginate(10);
        return view ('adminDashBord.cities.index',compact('cities' ,'governorates' ,'clients','donations'));
    }

    public function city_governotate(Request $request)
    {
        $governorates = Governorate::all();
        $clients = Governorate::find($request->governorate_id)->client()->count();


        $donations = Donation_request::whereHas('city',function ($q) use($request){
            $q->where('governorate_id',$request->governorate_id);
        })->get()->count();

        $cities = Governorate::find( $request->governorate_id)->cities()->paginate(10);

        return view ('adminDashBord.cities.index',compact('cities' ,'governorates' ,'clients','donations'));
    }

    public function city_name(Request $request)
    {

        $validator = validator()->make($request->all(),['name'=>'required']);
        if($validator->fails())
        {
            session()->flash('fail' , 'input failed');

            return redirect('/city');
        }

        $governorates = Governorate::all();
        $cities = City::where('name' , $request->name)->first();

        if($cities)
        {
            $donations = $cities->donation_requests()->get()->count();
            $clients = $cities->clients()->get()->count();
            $cities = City::where('name' , $request->name)->paginate(10);
            return view('adminDashBord.cities.index' , compact('cities','governorates','clients', 'donations'));

        }else
        {
            session()->flash('fail' , 'The City not found');
            return redirect('/city');
        }




    }



    public function store()
    {
        $data = validator()->make(\request()->all() ,['name'=>'required' ,'governorate_id'=>'required']);
        if($data->fails())
        {
            return redirect('/create_city')->withInput()->withErrors($data->errors());
        }
        City::create(request()->all());
        session()->flash('success' , 'adding success');
        return redirect('/city');
    }

    public function destroy($id)
    {
        City::find($id)->delete();
        session()->flash('success' , 'deleting success');
        return back();
    }

    public function edit_form($id)
    {
        $city = City::find($id);

        return view ('adminDashBord.cities.edit',compact('city'));
    }



    public function edit($id)
    {
        $data = validator()->make(\request()->all() ,['name'=>'required' ]);
        if($data->fails())
        {
            return redirect('/edit_form_city/'.$id)->withInput()->withErrors($data->errors());
        }
        $data = City::where('id' , $id)->update(['name' =>request('name')]);
        if($data)
        {
            session()->flash('success', 'Update success');
            return redirect('/city');
        }else
        {
            session()->flash('fail', 'Update failed');
            return redirect('/city');
        }
    }
}
