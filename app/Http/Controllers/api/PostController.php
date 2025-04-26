<?php

namespace App\Http\Controllers\api;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $post = Post::all();    
        return PostResource::collection($post);
    }
    function show($id){

        $post=Post::find($id);

         return $post;
    }

    function store (StorePostRequest $request){
        
        $post=new Post;
         $post->title= $request->title;
         $post->body= $request->body;
         $post->user_id=$request->user_id;
         $post->save();
       
           return "add done";
       }

       function update($id,Request $request ){
          $post=Post::find($id);

         $post->title= $request->title;
         $post->body= $request->body;

         $post->save();
   
         return "done";
   
       }

       function destroy ($id){
        Post::find($id)->delete();

      return "done";

    }
    }
