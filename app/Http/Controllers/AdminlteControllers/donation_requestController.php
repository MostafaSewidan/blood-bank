<?php

namespace App\Http\Controllers\AdminlteControllers;

use App\Models\Donation_request;
use App\Models\Governorate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class donation_requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Donation_request::paginate(10);


        return view('adminDashBord.donations.index' , compact('requests'));
    }



    public function show($id)
    {
        $request = Donation_request::find($id);


        return view('adminDashBord.donations.show' , compact('request'));
    }


    public function destroy($id)
    {
        Donation_request::find($id)->delete();
        session()->flash('success' , 'deleting success');
        return redirect('/donations');
    }

    public function search(Request $request)
    {

        $filters = [];

        if(!empty($request->date_from))
        {
            $start = Carbon::parse($request->date_from)->format('Y-m-d 00:00:00');
            $filters['date_from']  = $start;

        }else{
            $filters['date_from']  = null;
        }

        if(!empty($request->date_to))
        {
            $end = Carbon::parse($request->date_to)->format('Y-m-d 00:00:00');
            $filters['date_to']  = $end;

        }else{
            $filters['date_to']  = null;
        }

        if($request->governorate_id != 0)
        {
            $filters['governorate_id'] = $request->governorate_id;

        }else{
            $filters['governorate_id'] = null;
        }

        if($request->blood_type_id != 0)
        {
            $filters['blood_type_id']  = $request->blood_type_id;

        }else{
            $filters['blood_type_id']  = null;
        }

        if(
            $filters['date_from'] == null
            && $filters['date_to'] == null
            && $filters['blood_type_id'] == null
            && $filters['governorate_id'] == null)
        {
            session()->flash('fail' , 'please give input');
            return redirect('/donations');
        }


        $requests = Donation_request::where(function ($q) use($filters)
                                                {
                                                    if($filters['date_from'] != null)
                                                    {
                                                        $q->whereDate('created_at' , '>=' , $filters['date_from']);
                                                    }
                                                    if($filters['date_to'] != null)
                                                    {
                                                        $q->whereDate('created_at' , '<=' , $filters['date_to']);
                                                    }
                                                    if($filters['blood_type_id'] != null)
                                                    {
                                                        $q->where('blood_type_id' , '=' , $filters['blood_type_id']);
                                                    }
                                                    if($filters['governorate_id'] != null)
                                                    {
                                                        $q->whereHas('city',function ($q) use($filters)
                                                        {
                                                            $q->where('governorate_id',$filters['governorate_id']);
                                                        });
                                                    }


                                                })->paginate(10);


        if(count($requests))
        {
            session()->flash('success' , 'searching success');
            return view('adminDashBord.donations.index' , compact('requests'));
        }else{
            session()->flash('fail' , 'no requests');
            return redirect('/donations');
        }




    }
}
