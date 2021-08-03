<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;
use Storage;

class administrator extends Controller
{
    function index()
    {   
        return view('admin.admin-login');
    }
    function checkAdmin(Request $request)
    {
        $request->validate([
            'u_name' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $user=DB::table('admins')->select('password')->where([['id','=',1]])->get();

        if(Hash::check($request->password,$user[0]->password))
        {
            Session::put('admin','logged');
            return redirect('admin-home');
        }
        else {
            # code...
            return redirect()->back()->with('msg','credentials not valid');
        }
    }

    function logout()
    {
        session()->forget('admin');
        session()->flush();

        return redirect('home');

    }

    function adminHome()
    {  

        if(Session::has('admin'))
        {
            $users=DB::table('users')->paginate(10);
            return view('admin.admin-home')->with('users',$users); 
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function adminUsersUPdate($id)
    {
        if(Session::has('admin'))
        {
            $usersDetails=DB::table('users')->where([['id','=',$id]])->get();
            return view('admin.admin-user-update')->with('userData',$usersDetails);
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function adminUpdateUser(Request $request)
    {
        if(Session::has('admin'))
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
                'phone' => ['required', 'string','max:12', 'unique:users,phone,'.$request->id],
            ]);
    
            DB::table('users')->where([['id','=',$request->id]])->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
            ]);
    
            $users=DB::table('users')->paginate(10);
            return redirect('admin-home')->with('users',$users); 
        }
        else {
            # code...
            return redirect('home');
        }
    
    }

    function userDelete($id)
    {
        if(Session::has('admin'))
        {
            DB::table('users')->where([['id','=',$id]])->delete();
            $users=DB::table('users')->paginate(10);
            return redirect('admin-home')->with('users',$users); 
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function adminAllpost()
    {
        if(Session::has('admin'))
        {
            $select = DB::table('posts')->paginate(10);

            $comments =DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->get();

            return view('admin.admin-all-post')->with('post',$select)->with('comment',$comments);
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function dropAdminPost($id)
    {
        if(Session::has('admin'))
        {

            $oldImage=DB::table('posts')->select('image')->where([['id','=',$id]])->get();
            Storage::delete('/public/postImages/' . $oldImage[0]->image);

            DB::table('posts')->where([['id','=',$id]])->delete();

            $select = DB::table('posts')->paginate(10);

            $comments =DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->get();

            return redirect('admin-posts')->with('post',$select)->with('comment',$comments);
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function Makechked($id)
    {
        if(Session::has('admin'))
        {
            DB::table('posts')->where([['id','=',$id]])->update([
                'status'=>'chekd'
            ]);

            $select = DB::table('posts')->paginate(10);

            $comments =DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->get();

            return redirect('admin-posts')->with('post',$select)->with('comment',$comments);
        }
        else {
            # code...
            return redirect('home');
        }
    }


    function adminGetPostDetails()
    {
        if(Session::has('admin'))
        {
            $select = DB::table('posts')->where([['id','=',$id]])->get();
            return view('admin.admin-update-post')->with('data',$select);
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function viewpostupdateAdmin($id)
    {
        if(Session::has('admin'))
        {
            $select = DB::table('posts')->where([['id','=',$id]])->get();
             return view('admin.admin-update-post')->with('data',$select);
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function updateuserpost(Request $request)
    {
        

        if(Session::has('admin'))
        {
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'postid'=>'required'
            ]);
    
            DB::table('posts')->where([['id','=',$request->postid]])->update([
                'title' =>$request->title,
                'description' =>$request->description,
                'status'=>'modified'
            ]);
    
            return redirect()->back()->with('msg','Updated');
        }
        else {
            # code...
            return redirect('home');
        }
    }

    function updateuserpostimage(Request $request)
    {
        if(Session::has('admin'))
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'postid' => 'required',
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
                    'status'=>'chekd'
                ]);
    
                return redirect()->back()->with('msg','Updated');
            }
        }
        else {
            # code...
            return redirect('home');
        }
    }


}
