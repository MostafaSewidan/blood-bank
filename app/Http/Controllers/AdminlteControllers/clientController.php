<?php

namespace App\Http\Controllers\AdminlteControllers;


use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class clientController extends Controller
{
    public function index()
    {

        $clients = Client::paginate(10);


        return view ('adminDashBord.client.index',compact('clients'));
    }

    public function manege_client($id)
    {

        $client = Client::find($id);
        if($client)
        {

            $governorate = City::find($client->city_id)->governorate;
            return view ('adminDashBord.client.show',compact('client' , 'governorate'));
        }else
        {
            session()->flash('fail' , 'client not found');
            return redirect('/client');
        }
    }

    public function delete($id)
    {

        Client::find($id)->delete();
        session()->flash('success' , 'deleting success');
        return redirect('/client');

    }

   public function block($id)
    {

        $client = Client::find($id);
        if( $client->activation == 'true')
        {
            $client->activation ='false';
            $client->save();
            session()->flash('success' , 'client blocked success');
            return redirect('/manage_client/'.$client->id);
        }
        elseif ($client->activation == 'false')
        {
            $client->activation ='true';
            $client->save();
            session()->flash('success' , 'client unblocked success');
            return redirect('/manage_client/'.$client->id);
        }


    }


    public function client_name(Request $request)
    {
        $validator = validator()->make($request->all(),['name'=>'required']);
        if($validator->fails())
        {
            session()->flash('fail' , 'input failed');

            return redirect('/client');
        }

        $clients = Client::where('name' , $request->name)->get();



        if(count($clients))
        {
            return view('adminDashBord.client.index' , compact('clients'));

        }else
        {
            session()->flash('fail' , 'The client not found');
            return redirect('/client');
        }




    }

    public function client_governotate(Request $request , $id = null)
    {
        if($id != null)
        {
            return 'yes';
        }else{
            return 'no';
        }
        $clients = Governorate::find($request->governorate_id)->client()->paginate(10);

        return view ('adminDashBord.client.index',compact('clients'));
    }



}
