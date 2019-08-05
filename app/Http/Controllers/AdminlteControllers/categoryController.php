<?php

namespace App\Http\Controllers\AdminlteControllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view ('adminDashBord.category.index',compact('categories'));
    }

    public function store()
    {
        $data = validator()->make(\request()->all() ,['name'=>'required' ]);
        if($data->fails())
        {
            return redirect('/create_category')->withInput()->withErrors($data->errors());
        }
        Category::create(request()->all());
        session()->flash('success' , 'adding success');
        return redirect('/category');
    }

    public function destroy($id)
    {
        Category::where( 'id' , $id )->delete();
        session()->flash('success' , 'deleting success');
        return back();
    }

    public function edit_form($id)
    {
        $category = Category::find($id);

        return view ('adminDashBord.category.edit',compact('category'));
    }



    public function edit($id)
    {
        $data = validator()->make(\request()->all() ,['name'=>'required' ]);
        if($data->fails())
        {
            return redirect('/edit_category_form/'.$id)->withInput()->withErrors($data->errors());
        }
        $data = Category::where('id' , $id)->update(['name' =>request('name')]);
        if($data)
        {
            session()->flash('success', 'update success');
            return redirect('/category');
        }else
        {
            session()->flash('fail', 'update failed');
            return redirect('/category');
        }
    }

    public function category_name(Request $request)
    {
        $validator = validator()->make($request->all(),['name'=>'required']);
        if($validator->fails())
        {
            session()->flash('fail' , 'input failed');

            return redirect('/category');
        }

        $categories = Category::where('name' , $request->name)->get();

        if(count($categories))
        {
            return view('adminDashBord.category.index' , compact('categories'));

        }else
        {
            session()->flash('fail' , 'The Category not found');
            return redirect('/category');
        }




    }
}
