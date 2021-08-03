<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\post;

use Auth;
use Storage;

class profileController extends Controller
{
    function index()
    {
        $select = DB::table('posts')->where([['user_id','=',Auth::user()->id]])->paginate(10);

        $comments =DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->get();

        return view('/userProfile')->with('post',$select)->with('comment',$comments);
    }

    function allPost()
    {
        $select = DB::table('posts')->paginate(10);

        $comments =DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->get();

        return view('/home')->with('post',$select)->with('comment',$comments); 
    }

    function updateUserProfilePic(Request $request)
    {
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->file('profile_pic'))
        {
            $imagePath = $request->file('profile_pic');
            $imageName = $imagePath->getClientOriginalName();

            $randomeName=date('mdYHis') . uniqid().'bloguser.jpg';
            $request->file('profile_pic')->storeAs('uploads', $randomeName, 'public');

            Storage::delete('/public/uploads/' . Auth::user()->profile_pic);

            DB::table('users')->where([['id','=',Auth::user()->id]])->update([
                'profile_pic' =>$randomeName
            ]);

            return redirect()->back()->with('msg','Edited');
        }
    }

    function updateUserinfo(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            'phone' => ['required', 'string','max:12', 'unique:users,phone,'.Auth::user()->id],
        ]);

        DB::table('users')->where([['id','=',Auth::user()->id]])->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
        ]);

        return redirect()->back()->with('msg','Edited');

    }

    function updateUserPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_password' => ['same:new_password'],
        ]);

        if(Hash::check($request->current_password, Auth::user()->password))
        {
            DB::table('users')->where([['id','=',Auth::user()->id]])->update([
                'password' =>Hash::make($request->new_password),
            ]);

            return redirect()->back()->with('msg','Edited');
        }
        else {
            # code...
            return redirect()->back()->with('error','You entered Current password is wrong');

        }
    }

    function latest()
    {
        $select = DB::table('posts')->orderBy('created_at', 'desc')->paginate(10);

        $comments =DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->get();
        return view('/home')->with('post',$select)->with('comment',$comments);
    }

    function oldest()
    {
        $select = DB::table('posts')->orderBy('created_at', 'ASC')->paginate(10);
        $comments =DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->get();
        return view('/home')->with('post',$select)->with('comment',$comments);
    }
}
