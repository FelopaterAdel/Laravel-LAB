<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index(){
        $post = Post::paginate(8);    
        return view('index', ["posts" => $post]);
    }
    
    
    function edit($id){

        $post=Post::find($id);

       return view('edit' ,["post"=>$post]);



    }
    
    function update($id,Request $request ){
        
        $imagePath = null;
     if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('images', 'public');  
     }
       $post=Post::find($id);
      $post->title= $request->title;
      $post->body= $request->body;
      $post->image=$imagePath;
      $post->save();

      return to_route("posts.index");

    }
    function destroy ($id){
        Post::find($id)->delete();

           //$post=Post::find($id);
           // Post::destroy($id);
      return to_route("posts.index");

    }

    function create (){

        return view('create' );

    }
    function store (StorePostRequest $request){
     $imagePath = null;
     if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('images', 'public');  
     }

     $post=new Post;
      $post->title= $request->title;
      $post->body= $request->body;
      $post->image=$imagePath;
      $post->user_id=Auth::id();;
      $post->save();
     
    
       // return redirect("posts.index" );
        return to_route("posts.index");


    }
    function show($id){

        $post=Post::find($id);
        $posts = Post::with('user')->get();

         return view('view' ,["post"=>$post]);

    }
    public function restore() {
        $posts = Post::onlyTrashed()->get();
        return view('restore', ["posts" => $posts]);
    }
    
    public function restored($id) {
        $post = Post::withTrashed()->find($id);
    
        if ($post) {
            $post->restore();
            return redirect()->route('posts.index')->with('success', 'Post restored successfully!');
        } else {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }
    }
}    