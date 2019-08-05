<?php

namespace App\Http\Controllers\AdminlteControllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class contactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at' , 'desc')->paginate(10);
        return view ('adminDashBord.contacts.index',compact('contacts' ));
    }


    public function show($id)
    {
        $contact = Contact::find($id);
        return view ('adminDashBord.contacts.show',compact('contact' ));
    }



    public function destroy($id)
    {

        Contact::find($id)->delete();
        session()->flash('success' , 'deleting success');
        return redirect('/contacts');

    }

    public function search(Request $request)
    {
        if( !empty($request->date_from) && !empty($request->date_to) )
        {
            $start = Carbon::parse($request->date_from);
            $end = Carbon::parse($request->date_to);

            $contacts = Contact::whereDate('created_at' , '>=' , $start->format('Y-m-d 00:00:00'))->
            whereDate('created_at' , '<=' , $end->format('Y-m-d 00:00:00'))->orderBy('created_at' , 'desc')->paginate(10);

            if(count($contacts))
            {

                session()->flash('success' , 'search success');
                return view('adminDashBord.contacts.index',compact('contacts'));

            }else
            {
                session()->flash('fail' , 'Records not found');
                return redirect('/contacts');
            }
        }

        elseif (!empty($request->date_from) )
        {
            $start = Carbon::parse($request->date_from);
            $contacts = Contact::whereDate('created_at' , '>=' , $start->format('Y-m-d 00:00:00'))->orderBy('created_at' , 'desc')->paginate(10);

            if(count($contacts))
            {

                session()->flash('success' , 'search success');
                return view('adminDashBord.contacts.index',compact('contacts'));

            }else
            {

                session()->flash('fail' , 'Records not found');
                return redirect('/contacts');
            }
        }

        elseif (!empty($request->date_to))
        {
            $end = Carbon::parse($request->date_to);
            $contacts = Contact::whereDate('created_at' , '<=' , $end->format('Y-m-d 00:00:00'))->orderBy('created_at' , 'desc')->paginate(10);

            if(count($contacts))
            {
                session()->flash('success' , 'search success');
                return view('adminDashBord.contacts.index',compact('contacts'));

            }else
            {
                session()->flash('fail' , 'Records not found');
                return redirect('/contacts');
            }
        }
        else {
            session()->flash('fail' , 'Input fails');
            return redirect('/contacts');
        }
    }
}
