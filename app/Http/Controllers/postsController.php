<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\post;
use App\Models\comments;


use Auth;
use Storage;

class postsController extends Controller
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

        return redirect()->back()->with('msg','Added');
    }
    function updatepost($id)
    {

        $select = DB::table('posts')->where([['id','=',$id]])->get();
        return view('update-post')->with('data',$select);
    }


    function updateuserpost(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'postid'=>'required'
        ]);

        DB::table('posts')->where([['id','=',$request->postid],['user_id','=',Auth::user()->id]])->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'status'=>'modified'
        ]);

        return redirect()->back()->with('msg','Updated');
    }

    function dropPost(Request $request)
    {
        DB::table('posts')->where([['id','=',$request->id],['user_id','=',Auth::user()->id]])->delete();
        echo 'done';
    }

    function updateuserpostimage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->file('image'))
        {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $randomeName=date('mdYHis') . uniqid().'bloguser.jpg';
            $request->file('image')->storeAs('postImages', $randomeName, 'public');


            $oldImage=DB::table('posts')->select('image')->where([['id','=',$request->postid]])->get();
            Storage::delete('/public/postImages/' . $oldImage[0]->image);

            DB::table('posts')->where([['id','=',$request->postid]])->update([
                'image' =>$randomeName,
                'status'=>'modified'
            ]);

            return redirect()->back()->with('msg','Updated');
        }
    }
}
