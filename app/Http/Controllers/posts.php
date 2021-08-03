<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\post;

use Auth;
use Storage;

class posts extends Controller
{
    function addPost()
    {
        return view('new-post');
    }
    function newpost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title'=>'required',
            'Description'=>'required'
        ]);

        
        $imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();

        $randomeName=date('mdYHis') . uniqid().'blogpost.jpg';
        $request->file('image')->storeAs('postImages', $randomeName, 'public');    


        post::create([
            'user_id' =>Auth::user()->id,
            'image'=>$randomeName,
            'title'=>$request->title,
            'description' =>$request->Description,
            'status'=>'modified'
        ]);


    }
}
