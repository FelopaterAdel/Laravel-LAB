<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function index(){
        $users = User::all(); 
        return UserResource::collection($users);
    }
    function show($id){

        $users=User::find($id);

         return $users;
    }

    function store (Request $request){
        
        $user=new User;
        $user->id= $request->id;

         $user->name= $request->name;
         $user->email= $request->email;
         $user->password= $request->password;

         $user->save();
       
           return "add done";
       }

       function update($id,Request $request ){
          $user=User::find($id);

         $user->name= $request->name;
         $user->email= $request->email;

         $user->save();
   
         return "done";
   
       }

       function destroy ($id){
        User::find($id)->delete();

      return "done";

    }
    }