<?php

namespace App\Http\Controllers\AdminlteControllers;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class governorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::all();
        return view ('adminDashBord.governrate.index',compact('governorates'));
    }

    public function store()
    {
        $data = validator()->make(\request()->all() ,['name'=>'required' ]);
        if($data->fails())
        {
            return redirect('/create')->withInput()->withErrors($data->errors());
        }
        Governorate::create(request()->all());
        session()->flash('success' , 'adding success');
        return redirect('/governorate');
    }

    public function destroy($id)
    {
         Governorate::where( 'id' , $id )->delete();
         session()->flash('success' , 'deleting success');
         return back();
    }

    public function edit_form($id)
    {
        $governorate = Governorate::find($id);

        return view ('adminDashBord.governrate.edit',compact('governorate'));
    }



    public function edit($id)
    {
        $data = validator()->make(\request()->all() ,['name'=>'required' ]);
        if($data->fails())
        {
            return redirect('/edit_form/'.$id)->withInput()->withErrors($data->errors());
        }
        $data = Governorate::where('id' , $id)->update(['name' =>request('name')]);
        if($data)
        {
            session()->flash('success', 'update success');
            return redirect('/governorate');
        }else
        {
            session()->flash('fail', 'update failed');
            return redirect('/governorate');
        }
    }
}
