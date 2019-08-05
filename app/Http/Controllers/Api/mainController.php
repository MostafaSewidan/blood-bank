<?php

namespace App\Http\Controllers\Api;

use App\Model\Token;
use App\Models\App_setting;
use App\Models\Blood_type;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation_request;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class mainController extends Controller
{

    public function responsejson( $status ,$massage  , $data=null )
    {

        $response =
            [
                'status' => $status,
                'massage' => $massage ,
                'data' => $data
            ];
        return response()->json($response);

    }


    function notifyByFirebase($title,$body,$tokens,$data = [])        // paramete 5 =>>>> $type
    {

        $registrationIDs = $tokens;

        $fcmMsg = array(
            'body' => $body,
            'title' => $title,
            'sound' => "default",
            'color' => "#203E78"
        );

        $fcmFields = array(
            'registration_ids' => $registrationIDs,
            'priority' => 'high',
            'notification' => $fcmMsg,
            'data' => $data
        );
        $headers = array(
            'Authorization: key='.env('FIREBASE_API_ACCESS_KEY'),
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    //////////////////////////////////////////////////

    // get the blood types
    public function blood_type(Request $request)
    {
        // get the blood types with id

     if ($request->has('id'))
     {
         $blood_type_with_id = Blood_type::where('id' , $request->id)->get();
         return $this->responsejson(true , 'success'  , $blood_type_with_id);
     }else
     {
         // get the all blood types
         $blood_type = Blood_type::all();
         return $this->responsejson(true , 'success'  , $blood_type);
     }

    }
    ///////////////////////////////////////

    // get the governoments
    public function governorate(Request $request)
    {
        // get the governoments with id

        if ($request->has('id'))
        {
            $governoment_with_id = Governorate::where('id' , $request->id)->get();
            return $this->responsejson(true , 'success'  , $governoment_with_id);
        }else
        {
            // get the all governoments
            $governoment = Governorate::all();
            return $this->responsejson(true , 'success'  , $governoment);
        }

    }
    ///////////////////////////////////////

    // get the cities
    public function cities(Request $request)
    {
        // get the cities with id

        if ($request->has('id'))
        {
            $cities_with_id = City::where('id' , $request->id)->get();
            return $this->responsejson(true , 'success'  , $cities_with_id);
        }
        elseif ($request->has('governorate_id'))
        {
            // get the all cities with governorate id
            $cities_with_governorate_id = Governorate::find($request->governorate_id)->cities()->get();
            return $this->responsejson(true , 'success'  , $cities_with_governorate_id);
        }

        else
        {
            // get the all cities
            $cities = City::all();
            return $this->responsejson(true , 'success'  , $cities);
        }

    }
    /////////////////////////////////////
    ///
    // get the category
    public function category(Request $request)
    {
        // get the category with id

        if ($request->has('id'))
        {
            $categories_with_id = Category::where('id' , $request->id)->get();
            return $this->responsejson(true , 'success'  , $categories_with_id);
        }
        else
        {
            // get the all categories
            $categories = Category::all();
            return $this->responsejson(true , 'success'  , $categories);
        }

    }

    // get the app stings
    public function app_sting()
    {

            // get the all app stings
            $app_stings = App_setting::all();
            return $this->responsejson(true , 'success'  , $app_stings);


    }
    /////////////////////////////////////
    ///
    ///
    //////////////////////////////////////////////////

    // add contact
    public function add_contact(Request $request)
    {


        $validator = validator()->make($request->all() ,
            [
                'client_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'sms_title' => 'required',
                'sms_body' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return $this->responsejson(false , $validator->errors()->first() , $validator->errors());
        }

        $contact = Contact::create($request->all());

        $contact->save();

        return $this->  responsejson(true , 'تم الاضافة بنجاح' ,$contact );
    }

    // show contact
    public function show_contacts(Request $request)
    {

        // get the contact with id

        if ($request->has('id'))
        {
            $contact_with_id = Contact::where('id' , $request->id)->get();
            return $this->responsejson(true , 'success'  , $contact_with_id);
        }
        elseif ($request->has('client_id'))
        {
            // get the all contacts with client id
            $contact_with_client_id = Client::find($request->client_id)->contacts()->get();
            return $this->responsejson(true , 'success'  , $contact_with_client_id);
        }
        else
        {
            // get the all contacts
            $contacts = Contact::all();
            return $this->responsejson(true , 'success'  , $contacts);
        }
    }

    ///////////////////////////////////////
    ///
    /***************************( Post cycle)******************************/

    // get the posts
    public function posts(Request $request)
    {
        // get the cities with id

        if ($request->has('category_id'))
        {
            $posts_with_category_id = Category::find($request->category_id)->posts()->get();
            return $this->responsejson(true , 'success'  , $posts_with_category_id);
        }
        elseif ($request->has('key_word'))
        {
            $posts_with_key_word = Post::where(function ($query) use ($request)
            {
                $query->where('title' , 'like' , '%'.$request->key_word.'%')->
                orWhere('body' , 'like' , '%'.$request->key_word.'%');
            })->get();

            return $this->responsejson(true , 'success' , $posts_with_key_word);
        }

        else
        {
            // get the all posts
            $posts = Post::all();
            return $this->responsejson(true , 'success'  , $posts);
       }

    }
    /////////////////////////////////////
    ///
    ///
    // get the fetch posts
    public function fetch_post(Request $request)
    {

            $fetch_post = Post::find($request->id);
            return $this->responsejson(true , 'success'  , $fetch_post);

    }
    ///////////////////////////////////////
    ///
     // get the fetch favorite_post
        public function favorite_post(Request $request)
        {
                if($request->has('id'))
                {
                    $post = Post::find($request->id);
                    $client = auth()->user();
                    $post->clients()->toggle($client->id);
                    return $this->responsejson(true, 'تم العملية بنجاح');
                }else{
                    return $this->responsejson(false, 'الرجاء ادخال post id');
                }
        }
        ///////////////////////////////////////
    ///////////////////////////////////////
        ///
         // get the fetch show favorit epost
            public function show_favorite_post()
            {
                $client = auth()->user();


                        $post = Client::find($client->id)->posts()->get();
                        return $this->responsejson(true, 'تم العملية بنجاح' , $post);

            }
            ///////////////////////////////////////

    /*****************************************************************/



    //////////////////////////////////////////////////

    /***************************( Donation cycle)******************************/
    // api add donation request
    public function donation_request(Request $request)
    {

        $validator = validator()->make($request->all() ,
            [
                'city_id' => 'required',
                'blood_type_id' => 'required',
                'patient_name' => 'required',
                'phone' => 'required|numeric|regex:/(01)[0-9]{9}/',
                'bags_number' => 'required|max:10',
                'age' => 'required',
                'hospital_name' => 'required',
                'hospital_address' => 'required',
                'detail' => 'required'

            ]
        );

        if ($validator->fails())
        {
            return $this->responsejson(false , $validator->errors()->first() , $validator->errors());
        }


        $donation_request = Donation_request::create($request->all());
        $donation_request->save();


        ///////////////////////////////////////

        $clients = $donation_request->city->governorate->clients()
            ->whereHas('blood_type' , function ($q) use ($request , $donation_request){
                $q->where('blood_type_id' , $donation_request->blood_type_id);
            })->where('clients.id' , '!=' , auth()->user()->id)->pluck('clients.id')->toArray();


        if(count($clients))
        {
            // create a notification in notification table

            $notification = $donation_request->notifications()->create([
                'title'=>'this is a title of notification',
                'body'=>'this is a body of notification'
            ]);

            // create a notification in notification_client table
            $notification->clients()->attach($clients);
            ///////////////////////////////////////

            //خدبالك انت ناسي تعمل insert token service
            $tokens = Token::whereIn('client_id' , $clients)->pluck('token')->toArray();
            $data =
                [
                    'donation_id' => $donation_request->id
                ];


            if(count($tokens))
            {
                 $this->notifyByFirebase('this is a title', 'this is a body', $tokens , $data );
            }

        }

        return $this->  responsejson(true , 'تم الاضافة بنجاح' ,  $clients  );
    }

    /////////////////////////////////////////////////////
    ///
    ///
    /// ************* show donation requests

    public function show_donation_requests(Request $request)
    {

        // get donation requests with blood type id

        if ($request->has('blood_type_id'))
        {
            $donation_request_with_blood_type_id = Blood_type::find($request->blood_type_id)->donation_requests()->get();
            $donation_request_with_blood_type_id = $donation_request_with_blood_type_id->toArray();
            if (!empty($donation_request_with_blood_type_id))
            {
                return $this->responsejson(true , 'success' , $donation_request_with_blood_type_id);
            }else
            {
                return $this->responsejson(false, 'لا يوجد طلبات تبرع في هذه المدينه ');
            }
        }

        // get donation requests with city id
        elseif ($request->has('city_id'))
        {
             $donation_request_with_city_id = City::find($request->city_id)->donation_requests()->get();
             $donation_request_with_city_id = $donation_request_with_city_id->toArray();
            if (!empty($donation_request_with_city_id))
            {
                return $this->responsejson(true , 'success' , $donation_request_with_city_id);
            }else
                {
                return $this->responsejson(false, 'لا يوجد طلبات تبرع في هذه المدينه ');
            }

        }

        else
        {
            // get the all donation requests
            $donation_requests = Donation_request::all();
            return $this->responsejson(true , 'success'  , $donation_requests);
        }

    }
    /////////////////////////////////////
    ///

    //////////// this fetch donation requests
    public function fetch_donation_request(Request $request)
    {
        if ($request->has('donation_request_id'))
        {
            $donation_request = Donation_request::where( 'id' , $request->donation_request_id)->get()->toArray();
            if(!empty($donation_request))
            {
                return $this->responsejson(true,'success' , $donation_request);
            }else{
                return $this->responsejson(false, 'لا يوجد طلب تبرع لهاذا ال id');
            }
        }else{
            return $this->responsejson(false , 'الرجاء ادخال donation_request_id ');
        }
    }

    /*****************************************************************/


    /****************************( notification cycle )**********************************/
//////////// this fetch donation requests
    public function notification_sting(Request $request)
    {

        $user = auth()->user();

        if($request->has('blood_type_id') && $request->has('governorate_id') )
        {

            $user->blood_type()->sync($request->blood_type_id);
            $user->governorates()->sync($request->governorate_id);
            return $this->responsejson(true , 'تمت العمليه بنجاح');

        }
        elseif ($request->has('governorate_id'))
        {

            return $this->responsejson(false , 'الرجاء ادخال (blood_type_id)');
        }
        elseif ($request->has('blood_type_id'))
        {
            return $this->responsejson(false , 'الرجاء ادخال (governorate_id)');
        }
        else{
            $user->blood_type()->detach();
            $user->governorates()->detach();
            return $this->responsejson(false ,'تم ايقاف الاشعارات لهذا المستخدم');
        }

    }

    /*****************************************************************/
}
