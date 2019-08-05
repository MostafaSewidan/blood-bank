<?php

namespace App\Http\Controllers\AdminlteControllers;

use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view ('adminDashBord.posts.index' , compact('posts' ));
    }


    public function favorite_post($id)
    {

        $clients =Post::find($id)->clients()->get();

        if(count($clients))
        {
            return view ('adminDashBord.client.index',compact('clients'));
        }else
        {
            session()->flash('fail' , 'no client favorite this post ');
            return view ('adminDashBord.client.index',compact('clients'));
        }
    }


    public function post_word(Request $request)
    {
        $validator = validator()->make($request->all(),['word'=>'required']);
        if($validator->fails())
        {
            session()->flash('fail' , 'input failed');

            return redirect('/posts');
        }

        $posts = Post::where(function ($query) use($request){
            $query->where('title' , 'like' , '%'.$request->word.'%')
                ->orWhere('body' , '%'.$request->word.'%');
        })->get();



        if(count($posts))
        {
            return view('adminDashBord.posts.index' , compact('posts' ));

        }else
        {
            session()->flash('fail' , 'The post not found');
            return redirect('/posts');
        }

    }

    public function category_post(Request $request)
    {


        $posts = Category::find($request->category_id)->posts()->get();



        if(count($posts))
        {
            return view('adminDashBord.posts.index' , compact('posts' ));

        }else
        {
            session()->flash('fail' , 'no posts in this category');
            return redirect('/posts');
        }

    }


    public function store_post(Request $request)
    {
        $validator = validator()->make($request->all(),
            [
                'title'=>'required',
                'body'=>'required',
                'file'=>'required|image|mimes:jpg,png,jpeg'

            ]);
        if($validator->fails())
        {
            return view('adminDashBord.posts.create' , ['errors'=> $validator->errors()]);
        }

        $file = $request->file('file');
        $name =str_random(20). '.' .$file->getClientOriginalExtension();
        $file->move(public_path('Adminlte/img' ) ,$name);

        Post::create(
            [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'body' => $request->body,
                'image' => $name

            ]);

        session()->flash('success' , 'adding post success');
        return redirect('/posts');
    }

    public  function destroy_post($id)
    {
        $post = Post::find($id);

        $img_name = public_path('Adminlte/img/'.$post->image );
        File::delete($img_name);

        $post->delete();

        session()->flash('success' , 'Deleting post success');
        return redirect('/posts');

    }
}
